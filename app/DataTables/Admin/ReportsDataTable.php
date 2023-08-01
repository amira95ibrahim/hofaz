<?php

namespace App\DataTables\Admin;

use App\Models\Donation;
use App\Models\Project;
use App\Models\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReportsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->editColumn('model', function ($donation) {
            if ($donation->model === 'project') {
                // Assuming you have a "Project" model
                $project = Project::find($donation->model_id);
                return $project ? $project->name : '';
            }

            return $donation->model;
        })
        ->editColumn('donor_id', function ($donation) {
            $donor = User::find($donation->donor_id);
            return $donor ? $donor->name : 'فاعل خير';
        })
        ->editColumn('marketer_id', function ($donation) {
            return $donation->marketer ? $donation->marketer->name_ar : '';
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Marketer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Donation $model)
    {
        // Start with the base query
        return  $query = $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                        'extend' => 'excel',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-download"></i> export Excel',
                    ],
                ],
                'language' => [
                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                ],
                // Set date format and date range options for the datepicker
                'initComplete' => 'function () {
                    $("#start_date, #end_date").datepicker({
                        format: "yyyy-mm-dd",
                        autoclose: true,
                        todayHighlight: true,
                        clearBtn: true,
                        orientation: "auto",
                        endDate: new Date(),
                        startDate: new Date(new Date().setFullYear(new Date().getFullYear() - 10))
                    });
                }',
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(['title' => " رقم المشروع", 'data' => 'model_id', 'searchable' => true]),
            'project' => new Column(['title' => " اسم المشروع ", 'data' => 'model', 'searchable' => true]),
            'donor_id' => new Column(['title' => " المتبرع ", 'data' => 'donor_id', 'searchable' => true]),
            'payment_method' => new Column(['title' => "طريقة الدفع ", 'data' => 'payment_method', 'searchable' => true]),
            'status' => new Column(['title' => "الحالة ", 'data' => 'status', 'searchable' => true]),
            'amount' => new Column(['title' => "  مبلغ التبرع", 'data' => 'amount', 'searchable' => true]),
            'created_at' => new Column(['title' => "تاريخ التبرع ", 'data' => 'created_at', 'searchable' => true]),
            'marketer_id' => new Column(['title' => " المسوق ", 'data' => 'marketer_id', 'searchable' => true]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'reports_datatable_' . time();
    }
}

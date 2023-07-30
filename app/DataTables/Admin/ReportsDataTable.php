<?php

namespace App\DataTables\Admin;

use App\Models\Donation;
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

        return $dataTable
        ->addColumn('action', 'admin.reports.datatables_actions')
            // ->editColumn('status', function ($q) {
            //     return ($q->status) ? '<span class="tag tag-success">نشط </span>' : '<span class="tag tag-warning">غير نشط </span>';
            // })
            ->rawColumns(['action', 'status', 'homepage'])
            // ->editColumn('country_id', function ($q) {
            //     return $q->country->name;
            // })
            ->editColumn('cost', function ($q) {
                return number_format($q->cost) . ' د.ك';
            })
            ->editColumn('paid', function ($q) {
                return number_format($q->paid) . ' د.ك';
            })
            ->editColumn('homepage', function ($q) {
                $homepage = ($q->homepage) ? 'checked=""' : '';
                return '<label class="switch switch-text switch-success-outline-alt"><input type="checkbox" data-id="' . $q->id . '" class="switch-input homepage"' . $homepage . '><span class="switch-label" data-on="نعم" data-off="لا"></span><span class="switch-handle"></span></label>';
            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Marketer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Donation $model)
    {
        return  $model->newQuery();
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
            ->addAction(['width' => '150px', 'printable' => false, 'title' => "العملية"])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                        'extend' => 'create',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-plus"></i> إنشاء'
                    ],
                    [
                        'extend' => 'export',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-download"></i> تنزيل'
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-print"></i> طباعة'
                    ],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-refresh"></i> تحديث الجدول'
                    ],
                ],
                'language' => [
                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                ],
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
            'id' => new Column(['title' => " رقم المشروع", 'data' => 'donor_id']),
            'name_ar' => new Column(['title' => " اسم المشروع ", 'data' => 'notes']),
            'id' => new Column(['title' => " المتبرع ", 'data' => 'donor_id']),
            'payment_method' => new Column(['title' => "طريقة الدفع ", 'data' => 'payment_method']),
            'status' => new Column(['title' => "الحالة ", 'data' => 'status']),
            'amount' => new Column(['title' => "  مبلغ التبرع", 'data' => 'amount']),
            'created_at' => new Column(['title' => "تاريخ التبرع ", 'data' => 'created_at']),
            // 'Marketer' => new Column(['title' => " المسوق ", 'data' => '']),

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

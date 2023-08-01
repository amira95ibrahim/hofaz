<?php

namespace App\DataTables\Admin;

use App\Models\Project;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProjectDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.projects.datatables_actions')
            ->editColumn('active', function ($q){
            return ($q->active) ? '<span class="tag tag-success">نشط </span>' : '<span class="tag tag-warning">غير نشط </span>';
            })
            ->rawColumns(['action', 'active', 'homepage'])
            ->editColumn('country_id', function($q) {
                return $q->country->name;
            })
            // ->editColumn('id', function($q) {
            //     // Use the dot operator for string concatenation
            //     return '<a href="https://hofaz.alexadigitals.com/project/'.$q->id.'">رابط المشروع</a>';
            // })


            ->editColumn('cost', function($q) {
                return number_format($q->cost) . ' د.ك';
            })
            ->editColumn('paid', function($q) {
                return number_format($q->paid) . ' د.ك';
            })
            ->editColumn('homepage', function ($q){
                $homepage = ($q->homepage) ? 'checked=""' : '' ;
                return '<label class="switch switch-text switch-success-outline-alt"><input type="checkbox" data-id="' . $q->id . '" class="switch-input homepage"' . $homepage . '><span class="switch-label" data-on="نعم" data-off="لا"></span><span class="switch-handle"></span></label>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
    {
        return $model->newQuery();
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
            'name_ar' => new Column(['title' => "الاسم بالعربية", 'data' => 'name_ar']),
            'country_id' => new Column(['title' => "الدولة", 'data' => 'country_id']),
            'cost' => new Column(['title' => "قيمة المشروع", 'data' => 'cost']),
            'paid' => new Column(['title' => "المحصل من المشروع", 'data' => 'paid']),
            'active' => new Column(['title' => "الحالة", 'data' => 'active']),
            'homepage' => new Column(['title' => 'الصفحة الرئيسية', 'data' => 'homepage']),
            // 'marketer_name' => new Column([
            //     'title' => 'المسوق',
            //     'data' => 'marketer.name_ar', // This assumes the relationship is correctly set up.
            //     'defaultContent' => ' ', // If marketer is not assigned, display an empty cell.
            // ]),
            // 'marketer_name' => new Column([
            //     'title' => 'المسوق',
            //     'data' => 'marketers',
            //     'render' => 'function (data, type, row, meta) {
            //         if (data && data.length > 0) {
            //             var marketerNames = data.map(function (marketer) {
            //                 return marketer.name_ar;
            //             });
            //             return marketerNames.join(", ");
            //         } else {
            //             return " ";
            //         }
            //     }'
            // ]),
            // 'id' => new Column([
            //     'title' => "رابط المشروع",
            //     'data' => 'id',

            // ]),
        ];
    }



//"<a href=\"https://hofaz.alexadigitals.com/project/" + data + "\">رابط المشروع</a>";

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'projects_datatable_' . time();
    }
}

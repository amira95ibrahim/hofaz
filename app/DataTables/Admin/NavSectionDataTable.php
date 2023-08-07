<?php

namespace App\DataTables\Admin;

use App\Models\NavSection;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NavSectionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.nav_sections.datatables_actions')
            ->editColumn('active', function ($q) {
                return ($q->active) ? '<span class="tag tag-success">نشط </span>' : '<span class="tag tag-danger">غير نشط </span>';
            })
            ->rawColumns(['action', 'active']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NavSection $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NavSection $model)
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
            ->addAction(['width' => '150px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    //                    [
                    //                       'extend' => 'create',
                    //                       'className' => 'btn btn-default btn-sm no-corner',
                    //                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    //                    ],
                    [
                        'extend' => 'excel',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-download"></i> تنزيل ',
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
            'name_en' => new Column(['title' => "الاسم بالانجليزية", 'data' => 'name_en']),
            'active' => new Column(['title' => __('models/navSections.fields.active'), 'data' => 'active'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'nav_sections_datatable_' . time();
    }
}

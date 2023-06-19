<?php

namespace App\DataTables\Admin;

use App\Models\HomepageSlider;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class HomepageSliderDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.homepage_sliders.datatables_actions')
            ->editColumn('image', function ($q){
                return '<img src="' . asset($q->image) . '" width="500px">';
            })
            ->editColumn('link', function ($q){
                return '<a class="btn btn-outline-secondary btn-xs" href="' . url($q->link) . '" target="_blank"><i class="icon-link"></i></a>';
            })
            ->editColumn('active', function ($q){
                return ($q->active) ? '<span class="tag tag-success">نشط </span>' : '<span class="tag tag-warning">غير نشط </span>';
            })
            ->rawColumns(['action', 'image', 'active', 'link']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HomepageSlider $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HomepageSlider $model)
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
            ->addAction(['width' => '200px', 'printable' => false, 'title' => "العملية"])
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
            'image' => new Column(['title' => 'البنر', 'data' => 'image']),
            'link' => new Column(['title' => 'الرابط', 'data' => 'link']),
            'active' => new Column(['title' => 'الحالة', 'data' => 'active'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'homepage_sliders_datatable_' . time();
    }
}

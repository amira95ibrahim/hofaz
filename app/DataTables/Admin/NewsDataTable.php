<?php

namespace App\DataTables\Admin;

use App\Models\News;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.news.datatables_actions')
            ->editColumn('description_ar', function ($q){
                return mb_substr($q->description_ar, 0, 200,'utf-8') . ' ...';
            })
            ->editColumn('description_en', function ($q){
                return substr($q->description_en, 0, 200) . ' ...';
            })
            ->editColumn('active', function ($q){
                return ($q->active) ? '<span class="tag tag-success">نشط </span>' : '<span class="tag tag-warning">غير نشط </span>';
            })
            ->editColumn('homepage', function ($q){
                $homepage = ($q->homepage) ? 'checked=""' : '' ;
                return '<label class="switch switch-text switch-success-outline-alt"><input type="checkbox" data-id="' . $q->id . '" class="switch-input homepage"' . $homepage . '><span class="switch-label" data-on="نعم" data-off="لا"></span><span class="switch-handle"></span></label>';
            })
            ->rawColumns(['action', 'active', 'homepage']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\News $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(News $model)
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => "العملية"])
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
            'name_ar' => new Column(['title' => "العنوان بالعربية", 'data' => 'name_ar']),
            'name_en' => new Column(['title' => "العنوان بالانجليزية", 'data' => 'name_en']),
            'description_ar' => new Column(['title' => "مختصر بالعربية", 'data' => 'description_ar']),
            'description_en' => new Column(['title' => "مختصر بالانجليزية", 'data' => 'description_en']),
//            'slug_en' => new Column(['title' => __('models/news.fields.slug_en'), 'data' => 'slug_en']),
//            'slug_ar' => new Column(['title' => __('models/news.fields.slug_ar'), 'data' => 'slug_ar']),
            'active' => new Column(['title' => "الحالة", 'data' => 'active']),
            'homepage' => new Column(['title' => 'الصفحة الرئيسية', 'data' => 'homepage']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'news_datatable_' . time();
    }
}

<?php

namespace App\DataTables\Admin;

use App\Models\Testimonial;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TestimonialDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.testimonials.datatables_actions')
            ->editColumn('testimonial_ar', function ($q){
                return mb_substr($q->testimonial_ar, 0, 200,'utf-8') . ' ...';
            })
            ->editColumn('active', function ($q){
                return ($q->active) ? '<span class="tag tag-success">نشط </span>' : '<span class="tag tag-warning">غير نشط </span>';
            })
            ->rawColumns(['action', 'active']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Testimonial $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Testimonial $model)
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'العملية'])
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
            'name_ar' => new Column(['title' => 'الاسم', 'data' => 'name_ar']),
//            'name_en' => new Column(['title' => 'الاسم بالانجليزية', 'data' => 'name_en']),
            'job_ar' => new Column(['title' => 'الوظيفة', 'data' => 'job_ar']),
//            'job_en' => new Column(['title' => 'الوظيفة بالانجليزية', 'data' => 'job_en']),
            'testimonial_ar' => new Column(['title' => 'قال', 'data' => 'testimonial_ar']),
//            'testimonial_en' => new Column(['title' => 'المقولة بالانجليزية', 'data' => 'testimonial_en']),
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
        return 'testimonials_datatable_' . time();
    }
}

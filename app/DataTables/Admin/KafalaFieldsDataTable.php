<?php

namespace App\DataTables\Admin;

use App\Models\KafalaField;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KafalaFieldsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.kafala_fields.datatables_actions')
            ->editColumn('active', function ($q){
            return ($q->active) ? '<span class="tag tag-success">نشط </span>' : '<span class="tag tag-warning">غير نشط </span>';
            })
            ->editColumn('mandatory', function ($q){
                return ($q->mandatory) ? '<span class="tag tag-success">نعم </span>' : '<span class="tag tag-warning">لا </span>';
            })
            ->rawColumns(['action', 'active', 'mandatory']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KafalaField $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KafalaField $model)
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
            'name_ar' => new Column(['title' => "الاسم بالعربية", 'data' => 'name_ar']),
            'name_en' => new Column(['title' => "الاسم بالانجليزية", 'data' => 'name_en']),
            'datatype' => new Column(['title' => 'نوع الحقل', 'data' => 'datatype']),
            'active' => new Column(['title' => "الحالة", 'data' => 'active']),
            'mandatory' => new Column(['title' => "مطلوب", 'data' => 'mandatory']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'kafala_fields_datatable_' . time();
    }
}

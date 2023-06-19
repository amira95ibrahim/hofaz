<?php

namespace App\DataTables\Admin;

use App\Models\Achievement;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AchievementDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.achievements.datatables_actions')
            ->editColumn('image', function ($q){
                return '<img src="' . asset($q->image) . '" width="60px" height="60px" />';
            })->rawColumns(['image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Achievement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Achievement $model)
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
            'name_ar' => new Column(['title' => 'العنوان بالعربية', 'data' => 'name_ar']),
            'name_en' => new Column(['title' => 'العنوان بالانجليزية', 'data' => 'name_en']),
            'number' => new Column(['title' => 'الرقم', 'data' => 'number']),
            'image' => new Column(['title' => 'الصورة', 'data' => 'image'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'achievements_datatable_' . time();
    }
}

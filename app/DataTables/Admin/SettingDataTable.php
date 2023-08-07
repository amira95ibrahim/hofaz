<?php

namespace App\DataTables\Admin;

use App\Models\Setting;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SettingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.settings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Setting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Setting $model)
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                        'extend' => 'excel',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-download"></i> تنزيل ',
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
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
            'site_title_ar' => new Column(['title' => __('models/settings.fields.site_title_ar'), 'data' => 'site_title_ar']),
            'site_title_en' => new Column(['title' => __('models/settings.fields.site_title_en'), 'data' => 'site_title_en']),
            'logo' => new Column(['title' => __('models/settings.fields.logo'), 'data' => 'logo']),
            'keywords_ar' => new Column(['title' => __('models/settings.fields.keywords_ar'), 'data' => 'keywords_ar']),
            'keywords_en' => new Column(['title' => __('models/settings.fields.keywords_en'), 'data' => 'keywords_en']),
            'facebook' => new Column(['title' => __('models/settings.fields.facebook'), 'data' => 'facebook']),
            'whatsapp' => new Column(['title' => __('models/settings.fields.whatsapp'), 'data' => 'whatsapp']),
            'googlePlus' => new Column(['title' => __('models/settings.fields.googlePlus'), 'data' => 'googlePlus']),
            'instagram' => new Column(['title' => __('models/settings.fields.instagram'), 'data' => 'instagram']),
            'adminFooter' => new Column(['title' => __('models/settings.fields.adminFooter'), 'data' => 'adminFooter']),
            'frontWebsiteFooter_ar' => new Column(['title' => __('models/settings.fields.frontWebsiteFooter_ar'), 'data' => 'frontWebsiteFooter_ar']),
            'frontWebsiteFooter_en' => new Column(['title' => __('models/settings.fields.frontWebsiteFooter_en'), 'data' => 'frontWebsiteFooter_en']),
            'youtubeAddress' => new Column(['title' => __('models/settings.fields.youtubeAddress'), 'data' => 'youtubeAddress']),
            'twitterAddress' => new Column(['title' => __('models/settings.fields.twitterAddress'), 'data' => 'twitterAddress']),
            'location' => new Column(['title' => __('models/settings.fields.location'), 'data' => 'location']),
            'phoneNumber' => new Column(['title' => __('models/settings.fields.phoneNumber'), 'data' => 'phoneNumber']),
            'postalCode' => new Column(['title' => __('models/settings.fields.postalCode'), 'data' => 'postalCode']),
            'address' => new Column(['title' => __('models/settings.fields.address'), 'data' => 'address'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'settings_datatable_' . time();
    }
}

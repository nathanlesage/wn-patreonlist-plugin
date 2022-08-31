<?php namespace HendrikErz\PatreonList;

use Backend\Facades\Backend;
use System\Classes\PluginBase;
use Illuminate\Support\Facades\Lang;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Patreon List',
            'description' => 'Manage your list of Patrons for your website',
            'author' => 'Hendrik Erz',
            'icon' => 'icon-credit-card',
            'homepage' => 'https://www.hendrik-erz.de'
        ];
    }

    public function registerComponents()
    {
        return [
            'HendrikErz\PatreonList\Components\Patreons' => 'patreonList',
            'HendrikErz\PatreonList\Components\Tiers' => 'patreonTiers',
        ];
    }

    public function registerNavigation()
    {
        return [
            'main' => [
                'label' => 'Patreon List',
                'url' => Backend::url('hendrikerz/patreonlist/patrons'),
                'permissions' => ['hendrikerz.patreonlist.manage'],
                'icon' => 'icon-credit-card',
                'sideMenu' => [
                    'list' => [
                        'label' => Lang::get('hendrikerz.patreonlist::lang.plugin.list_patrons'),
                        'url' => Backend::url('hendrikerz/patreonlist/patrons'),
                        'icon' => 'icon-list-ul'
                    ],
                    'import' => [
                        'label' => Lang::get('hendrikerz.patreonlist::lang.plugin.import_csv'),
                        'url' => Backend::url('hendrikerz/patreonlist/patrons/import'),
                        'icon' => 'icon-table'
                    ],
                    'tiers' => [
                        'label' => 'Tiers',
                        'url' => Backend::url('hendrikerz/patreonlist/tiers'),
                        'icon' => 'icon-sitemap'
                    ]
                ]
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'hendrikerz.patreonlist.manage' => [
                'label' => 'Access the Patreon List Plugin',
                'tab'   => 'Patreon List',
                'order' => 200,
                'roles' => [\Backend\Models\UserRole::CODE_DEVELOPER, \Backend\Models\UserRole::CODE_PUBLISHER],
            ],
            // ...
        ];
    }

    public function registerSettings()
    {
    }

    // Register custom column types
    public function registerListColumnTypes()
    {
        return [
            'hide_indicator' => function ($val) {
                // No display if hide_from_all is 0
                if (!$val) {
                    return '';
                }

                // Else: Display a hidden indicator
                $title = Lang::get('hendrikerz.patreonlist::lang.columns.hide_from_all_tooltip');
                return '<span data-toggle="tooltip" data-placement="top" title="' . $title . '" class="oc-icon-eye-slash text-danger"></span>';
            },
            'patron_status' => function ($val) {
                if ($val) {
                    // Active patron
                    return '<span class="oc-icon-circle text-success">' . Lang::get('hendrikerz.patreonlist::lang.columns.status_active') . '</span>';
                } else {
                    // Inactive patron
                    return '<span class="oc-icon-circle text-danger">' . Lang::get('hendrikerz.patreonlist::lang.columns.status_inactive') . '</span>';
                }
            },
            'tier_description' => function ($val) {
                return $val; // Don't filter out the HTML
            },
        ];
    }
}

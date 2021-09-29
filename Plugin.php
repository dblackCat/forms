<?php namespace CatDesign\Forms;

use Backend;
use CatDesign\Forms\Components\Forms;
use CatDesign\Forms\Models\Settings;
use Event;
use Lovata\OrdersShopaholic\Classes\Processor\OrderProcessor;
use System\Classes\PluginBase;

/**
 * Plugin - Forms
 * Author: Semen Kuznetsov (CatDesign Group)
 * Author url: http://cat-design.ru
 */
class Plugin extends PluginBase
{
    /**
     * Settings model data
     * @var mixed
     */
    private $settings;


    /**
     * Plugin information
     * @return array
     */
    public function pluginDetails() : array
    {
        return [
            'name'        => 'catdesign.forms::lang.plugin.name',
            'description' => 'catdesign.forms::lang.plugin.description',
            'author'      => 'Semen Kuznetsov',
            'icon'        => 'icon-envelope-o'
        ];
    }


    /**
     * Register components
     * @return array
     */
    public function registerComponents() : array
    {
        return [
            Forms::class => 'Forms',
        ];
    }


    /**
     * Register permission
     * @return array
     */
    public function registerPermissions() : array
    {
        return [
            'catdesign.forms.forms' => [
                'tab' => 'catdesign.forms::lang.permissions.tab',
                'label' => 'catdesign.forms::lang.permissions.forms'
            ],
            'catdesign.forms.settings' => [
                'tab' => 'catdesign.forms::lang.permissions.tab',
                'label' => 'catdesign.forms::lang.permissions.settings'
            ],
            'catdesign.forms.forms.fields' => [
                'tab' => 'catdesign.forms::lang.permissions.tab',
                'label' => 'catdesign.forms::lang.permissions.fields'
            ],
            'catdesign.forms.dev' => [
                'tab' => 'catdesign.forms::lang.permissions.tab',
                'label' => 'catdesign.forms::lang.permissions.dev'
            ]
        ];
    }


    /**
     * Register navigation
     * @return array
     */
    public function registerNavigation() : array
    {
        return [
            'forms' => [
                'label'       => 'catdesign.forms::lang.navigation.forms',
                'url'         => Backend::url('catdesign/forms/forms'),
                'icon'        => 'icon-envelope-o',
                'iconSvg'     => '/plugins/catdesign/forms/assets/plugin_icon.svg',
                'permissions' => ['catdesign.forms.forms'],
                'order'       => 500,
                'sideMenu' => [
                    'forms' => [
                        'label'       => 'catdesign.forms::lang.navigation.forms',
                        'icon'        => 'icon-list',
                        'url'         => Backend::url('catdesign/forms/forms'),
                        'permissions' => ['catdesign.forms.forms'],
                    ],
                    'settings' => [
                        'label'       => 'catdesign.forms::lang.navigation.settings',
                        'icon'        => 'icon-cog',
                        'url'         => Backend::url('system/settings/update/catdesign/forms/settings'),
                        'permissions' => ['catdesign.forms.settings'],
                    ],
                ]
            ],
        ];
    }


    /**
     * Register settings
     * @return array
     */
    public function registerSettings() : array
    {
        return [
            'settings' => [
                'label'       => 'catdesign.forms::lang.settings.label',
                'description' => 'catdesign.forms::lang.settings.description',
                'category'    => 'system::lang.system.categories.mail',
                'icon'        => 'icon-envelope-o',
                'class'       => Settings::class,
                'order'       => 500,
                'keywords'    => 'catdesign.forms::lang.settings.keywords',
                'permissions' => ['catdesign.forms.settings']
            ]
        ];
    }


    public function onRun() {

    }
    /**
     * Subscribe events
     */
    public function boot()
    {
        $this->shopaholicSendPulseIntegration();
    }


    /**
     * Integration SendPulse for Shopaholic
     */
    private function shopaholicSendPulseIntegration()
    {
        $this->settings = Settings::instance();

        if ($this->settings->enable_sendpulse_shopaholic and class_exists('OrderProcessor')) {
            Event::listen(OrderProcessor::EVENT_UPDATE_ORDER_AFTER_CREATE, function($order) {
                $forms = new Forms();
                $name  = $order->property[$this->settings->sendpulse_name]  ?? '';
                $phone = $order->property[$this->settings->sendpulse_phone] ?? '';
                $email = $order->property[$this->settings->sendpulse_email] ?? '';
                $forms->sendContactinSendPulse(
                    $this->settings->sendpulse_shopahilic_address_book_id,
                    $email,
                    $phone,
                    $name
                );
            });
        }
    }
}

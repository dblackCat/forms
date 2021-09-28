<?php namespace CatDesign\Forms\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Plugin - Forms
 * Author: Semen Kuznetsov (CatDesign Group)
 * Author url: http://cat-design.ru
 */
class Forms extends Controller
{
    public $bodyClass = 'compact-container';

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var string listConfig file
     */
    public $relationConfig = 'config_relation.yaml';

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('CatDesign.Forms', 'forms', 'forms');
    }
}

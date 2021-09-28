<?php namespace CatDesign\Forms\Models;

use Lang;
use Lovata\OrdersShopaholic\Models\OrderProperty;
use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'catdesign_forms_settings';

    public $settingsFields = 'fields.yaml';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'manager_emails'                       => 'required',
        'sendpulse_email'                      => 'required_if:enable_sendpulse_shopaholic,1',
        'sendpulse_shopahilic_address_book_id' => 'required_if:enable_sendpulse_shopaholic,1'
    ];

    /**
     * @var array message validation rules
     */
    public $customMessages = [
        'manager_emails.required'                          => 'catdesign.forms::lang.validation.settings_model.manager_emails',
        'sendpulse_email.required_if'                      => 'catdesign.forms::lang.validation.settings_model.sendpulse_email',
        'sendpulse_shopahilic_address_book_id.required_if' => 'catdesign.forms::lang.validation.settings_model.sendpulse_shopahilic_address_book_id'
    ];


    /**
     * Get options for dropdown fields
     * @param $fieldName
     * @param $value
     * @param $formData
     * @return array
     */
    public function getDropdownOptions($fieldName, $value, $formData) : array
    {
        $options = [null => Lang::get('catdesign.forms::lang.validation.settings_model.empty_dropdown')];
        $property_models = OrderProperty::get();

        foreach ($property_models as $property) {
            $options[$property->code] = $property->name;
        }
        return $options;
    }
}

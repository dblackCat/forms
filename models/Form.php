<?php namespace CatDesign\Forms\Models;

use Lang;
use Model;
use October\Rain\Exception\ValidationException;

/**
 * Plugin - Forms
 * Author: Semen Kuznetsov (CatDesign Group)
 * Author url: http://cat-design.ru
 */
class Form extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string Sluggable params
     */
    protected $slugs = ['code' => 'title'];

    /**
     * @var string Model table
     */
    public $table = 'catdesign_forms';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'title'                     => 'required',
        'forward_email'             => 'required_if:is_forward,1',
        'sendpulse_address_list_id' => 'required_if:is_sendpulse,1',
        'user_template'             => 'required_if:is_answer,1'
    ];

    /**
     * @var array message validation rules
     */
    public $customMessages = [
        'title.required'                        => 'catdesign.forms::lang.validation.form_model.title',
        'button_text.required'                  => 'catdesign.forms::lang.validation.form_model.button_text',
        'forward_email.required_if'             => 'catdesign.forms::lang.validation.form_model.forward_email',
        'sendpulse_address_list_id.required_if' => 'catdesign.forms::lang.validation.form_model.sendpulse_address_list_id',
        'user_template.required_if'             => 'catdesign.forms::lang.validation.form_model.user_template'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = ['events', 'properties'];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];


    /**
     * Before save functions
     * @throws ValidationException
     */
    public function beforeSave()
    {
        $this->validateForwards();
        $this->validateIsAnswer();
    }


    /**
     * Get form by code
     * @param $query
     * @param $code
     * @return mixed
     */
    public function scopeCode($query, $code)
    {
        return $query->where('code', $code);
    }


    /**
     * Get active form
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }


    /**
     * Check availability forwards
     * @throws ValidationException
     */
    private function validateForwards()
    {
        if ($this->is_forward == false and Settings::get('manager_emails') == false) {
            throw new ValidationException([
                'message' => Lang::get('catdesign.forms::lang.validation.form_model.is_forward')
            ]);
        }
    }


    /**
     * Check and validate condition for function is_answer
     * @throws ValidationException
     */
    private function validateIsAnswer()
    {
        if ($this->is_answer and $this->fields->count() > 0) {
            foreach ($this->fields as $field) {
                if ($field->type == 'email') {
                    return true;
                } else {
                    throw new ValidationException([
                        'message' => Lang::get('catdesign.forms::lang.validation.form_model.is_answer')
                    ]);
                }
            }
        }
    }


    /**
     * Get first email field value
     * @return string
     */
    public function getEmailFieldValue()
    {
        if ($this->fields) {
            foreach ($this->fields as $field) {
                if ($field->type == 'email') {
                    return input($field->name);
                }
            }
        }
    }


    /**
     * Get field in current form by name
     * @param $name
     * @return mixed
     */
    public function getFieldByName($name)
    {
        return $this->fields->where('name', $name)->first();
    }


    /**
     * @var array hasMany and other relations
     */
    public $hasMany = [
        'fields' => Field::class
    ];

    public $belongsTo = [
        'admin_template' => 'System\Models\MailTemplate',
        'user_template' => 'System\Models\MailTemplate'
    ];
}

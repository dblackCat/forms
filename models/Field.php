<?php namespace CatDesign\Forms\Models;

use Lang;
use Model;
use October\Rain\Exception\ValidationException;

/**
 * Plugin - Forms
 * Author: Semen Kuznetsov (CatDesign Group)
 * Author url: http://cat-design.ru
 */
class Field extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * Implement Behaviors
     * @var array
     */
    public $implement = [
        '@RainLab.Translate.Behaviors.TranslatableModel',
    ];


    /**
     * Translatable field support
     * @var array
     */
    public $translatable = ['attribute[value]', 'attribute[placeholder]', 'comment', 'value_list'];


    /**
     * @var string table associated with the model
     */
    public $table = 'catdesign_fields';


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
        'label' => 'required',
        'name'  => 'required|unique:catdesign_fields|regex:#^[a-z+_]+$#'
    ];


    /**
     * @var array message validation rules
     */
    public $customMessages = [
        'label.required'  => 'catdesign.forms::lang.validation.field_model.label',
    ];


    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];


    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = ['attribute', 'events', 'value_list', 'properties'];


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
     * @var array hasOne and other relations
     */
    public $belongsTo = [
        'form' => Form::class
    ];
}

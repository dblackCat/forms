<?php namespace Catdesign\Forms\Models;

use Model;

/**
 * Plugin - Forms
 * Author: Semen Kuznetsov (CatDesign Group)
 * Author url: http://cat-design.ru
 */
class Field extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string Sluggable params
     */
    protected $slugs = ['name' => 'label'];


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
     * Before create model event
     */
    public function beforeCreate() {
        $this->codeGenerate();
    }


    /**
     * Generate code for field
     */
    private function codeGenerate()
    {
        $new_name = str_replace('-', '_', $this->name);
        $this->name = $new_name;
    }


    /**
     * @var array hasOne and other relations
     */
    public $belongsTo = [
        'form' => Form::class
    ];
}

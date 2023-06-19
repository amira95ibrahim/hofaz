<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KafalaField
 * @package App\Models
 * @version April 29, 2023, 10:03 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $kafalaTypes
 * @property \Illuminate\Database\Eloquent\Collection $kafalatValues
 * @property string $name_en
 * @property string $name_ar
 * @property string $datatype
 * @property array $select_options
 * @property boolean $active
 * @property boolean $mandatory
 * @property-read string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Country active()
 */
class KafalaField extends Model
{
    use SoftDeletes, HasFactory, NameAttribute;

    const datatypeEnum = ['text', 'number', 'date', 'select'];

    public $table = 'kafala_fields';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['name'];

    public $fillable = [
        'name_en',
        'name_ar',
        'datatype',
        'select_options',
        'active',
        'mandatory'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name_en' => 'string',
        'name_ar' => 'string',
        'datatype' => 'string',
        'select_options' => 'array',
        'active' => 'boolean',
        'mandatory' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'datatype' => 'required|string',
        'select_options' => 'nullable',
        'active' => 'required|boolean',
        'mandatory' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function kafalaTypes()
    {
        return $this->belongsToMany(\App\Models\KafalaType::class, 'kafala_type_fields');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kafalatValues()
    {
        return $this->hasMany(\App\Models\KafalaValue::class, 'field_id');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}

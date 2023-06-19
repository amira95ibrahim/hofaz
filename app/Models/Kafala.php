<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kafala
 * @package App\Models
 * @version May 2, 2023, 6:19 am UTC
 *
 * @property \App\Models\Country $country
 * @property \App\Models\KafalaType $type
 * @property integer $type_id
 * @property integer $country_id
 * @property string $name_en
 * @property string $name_ar
 * @property number $monthly_amount
 * @property boolean $active
 * @property string $image
 * @property-read string $name
 * @property-read $kafalatValues
 * @method static \Illuminate\Database\Eloquent\Builder|Kafala active()
 * @method kafalatMales()
 */
class Kafala extends Model
{
    use SoftDeletes, HasFactory, NameAttribute;

    public $table = 'kafalat';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'type_id',
        'country_id',
        'name_en',
        'name_ar',
        'monthly_amount',
        'active',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_id' => 'integer',
        'country_id' => 'integer',
        'name_en' => 'string',
        'name_ar' => 'string',
        'monthly_amount' => 'float',
        'active' => 'boolean',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_id' => 'required',
        'country_id' => 'required',
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'monthly_amount' => 'required|numeric',
        'active' => 'required|boolean',
        'image' => 'nullable|file',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type()
    {
        return $this->belongsTo(\App\Models\KafalaType::class, 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function kafalatValues()
    {
        return $this->belongsToMany(\App\Models\KafalaField::class, 'kafalat_values', 'kafala_id', 'field_id')->withPivot('value_en', 'value_ar');
    }

    public function kafalatMale()
    {
        return $this->belongsToMany(\App\Models\KafalaField::class, 'kafalat_values', 'kafala_id', 'field_id')
            ->withPivot('value_en', 'value_ar')
            ->where('name_en', 'gender')
            ->where(function (Builder $query) {
                return $query->where('value_en', '=', 'male')
                    ->orWhere('value_ar', '=', 'ذكر');
            });
    }

    public function kafalatFemale()
    {
        return $this->belongsToMany(\App\Models\KafalaField::class, 'kafalat_values', 'kafala_id', 'field_id')
            ->withPivot('value_en', 'value_ar')
            ->where('name_en', 'gender')
            ->where(function (Builder $query) {
                return $query->where('value_en', '=', 'female')
                    ->orWhere('value_ar', '=', 'انثي');
            });
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

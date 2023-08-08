<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Waqf
 * @package App\Models
 * @version May 4, 2023, 4:04 pm UTC
 *
 * @property Country $country
 * @property integer $country_id
 * @property string $name_en
 * @property string $name_ar
 * @property string $description_en
 * @property string $description_ar
 * @property number $cost
 * @property number $paid
 * @property number $initial_amount
 * @property boolean $show_remaining
 * @property boolean $active
 * @property boolean $homepage
 * @property string $image
 * @property-read string $name
 * @property-read string $description
 * @method static \Illuminate\Database\Eloquent\Builder|Waqf active()
 * @method static \Illuminate\Database\Eloquent\Builder|Waqf homepage()
 * @method save()
 */
class Waqf extends Model
{
    use SoftDeletes, HasFactory, NameAttribute;

    public $table = 'waqf';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'country_id',
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'cost',
        'paid',
        'initial_amount',
        'show_remaining',
        'active',
        'homepage',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'name_en' => 'string',
        'name_ar' => 'string',
        'description_en' => 'string',
        'description_ar' => 'string',
        'cost' => 'float',
        'paid' => 'float',
        'initial_amount' => 'float',
        'show_remaining' => 'boolean',
        'active' => 'boolean',
        'homepage' => 'boolean',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required',
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'description_en' => 'nullable|string|max:255',
        'description_ar' => 'nullable|string|max:255',
        'cost' => 'required|numeric',
        'paid' => 'required|numeric',
        'initial_amount' => 'required|numeric',
        'show_remaining' => 'required|boolean',
        'active' => 'required|boolean',
        'homepage' => 'boolean',
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
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function gifts()
    {
        return $this->morphMany(Gift::class, 'giftable');
    }

    public function getDescriptionAttribute(){

        $description = 'description_' . app()->getLocale();
        return $this->$description;
    }

    public function scopeHomepage($query)
    {
        return $query->where('homepage', true);
    }
}

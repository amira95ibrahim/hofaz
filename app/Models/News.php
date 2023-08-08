<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 * @package App\Models
 * @version May 5, 2023, 6:48 pm UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property string $description_en
 * @property string $description_ar
 * @property string $image
 * @property string $slug_en
 * @property string $slug_ar
 * @property boolean $active
 * @property boolean $homepage
 * @property string $publishing_date
 * @property-read string $name
 * @property-read string $description
 * @method static \Illuminate\Database\Eloquent\Builder|News active()
 * @method static \Illuminate\Database\Eloquent\Builder|News homepage()
 */
class News extends Model
{
    use SoftDeletes, HasFactory, NameAttribute;

    public $table = 'news';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image',
        'slug_en',
        'slug_ar',
        'active',
        'homepage',
        'publishing_date'
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
        'description_en' => 'string',
        'description_ar' => 'string',
        'image' => 'string',
        'slug_en' => 'string',
        'slug_ar' => 'string',
        'active' => 'boolean',
        'homepage' => 'boolean',
        'publishing_date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'image' => 'file',
        'publishing_date' => 'required|date',
//        'slug_en' => 'required|string',
//        'slug_ar' => 'required|string',
        'active' => 'required|boolean',
        'homepage' => 'boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function getDescriptionAttribute(){

        $description = 'description_' . app()->getLocale();
        return $this->$description;
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

    public function scopeHomepage($query)
    {
        return $query->where('homepage', true);
    }

}

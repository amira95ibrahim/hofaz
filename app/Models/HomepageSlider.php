<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HomepageSlider
 * @package App\Models
 * @version May 26, 2023, 11:00 am UTC
 *
 * @property string $image
 * @property string $link
 * @property boolean $active
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageSlider active()
 */
class HomepageSlider extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'homepage_slider';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'link',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'link' => 'string',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'nullable|file',
        'link' => 'nullable|string|max:255',
        'active' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


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

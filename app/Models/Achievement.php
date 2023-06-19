<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Achievement
 * @package App\Models
 * @version May 5, 2023, 9:27 pm UTC
 *
 * @property string $name_ar
 * @property string $name_en
 * @property integer $number
 * @property string $image
 * @property-read string $name
 */
class Achievement extends Model
{
    use HasFactory, NameAttribute;

    public $table = 'achievements';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_ar',
        'name_en',
        'number',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name_ar' => 'string',
        'name_en' => 'string',
        'number' => 'integer',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_ar' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'number' => 'required|integer',
        'image' => 'required|file',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}

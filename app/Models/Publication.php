<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Publication
 * @package App\Models\Admin
 * @version May 5, 2023, 4:51 pm UTC
 *
 * @property string $name_ar
 * @property string $name_en
 * @property string $image
 * @property string $pdf
 * @property boolean $active
 * @property boolean $homepage
 * @property-read string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Publication active()
 * @method static \Illuminate\Database\Eloquent\Builder|Publication homepage()
 */
class Publication extends Model
{
    use SoftDeletes, HasFactory, NameAttribute;

    public $table = 'publications';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'name_ar',
        'name_en',
        'image',
        'pdf',
        'active',
        'homepage',
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
        'image' => 'string',
        'pdf' => 'string',
        'active' => 'boolean',
        'homepage' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_ar' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'image' => 'file',
        'pdf' => 'file',
        'active' => 'required|boolean',
        'homepage' => 'required|boolean',
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

    public function scopeHomepage($query)
    {
        return $query->where('homepage', true);
    }


}

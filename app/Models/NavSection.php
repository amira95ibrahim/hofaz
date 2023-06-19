<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NavSection
 * @package App\Models
 * @version May 4, 2023, 8:53 pm UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property boolean $active
 * @property-read string $name
 * @method static \Illuminate\Database\Eloquent\Builder|NavSection save()
 * @method static \Illuminate\Database\Eloquent\Builder|NavSection active()
 * @method static all()
 */
class NavSection extends Model
{
    use SoftDeletes, NameAttribute, HasFactory;

    public $table = 'nav_sections';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'active'
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
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
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

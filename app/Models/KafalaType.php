<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KafalaType
 * @package App\Models
 * @version April 29, 2023, 9:16 pm UTC
 *
 * @property Collection $kafalaFields
 * @property string $name_en
 * @property string $name_ar
 * @property string $description_en
 * @property string $description_ar
 * @property boolean $active
 * @property-read string $name
 * @property-read string $description
 * @method static \Illuminate\Database\Eloquent\Builder|Country active()
 */
class KafalaType extends Model
{
    use SoftDeletes, HasFactory, NameAttribute;

    public $table = 'kafala_types';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'active'
    ];

    protected $appends = ['name'];

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
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'active' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function kafalaFields()
    {
        return $this->belongsToMany(\App\Models\KafalaField::class, 'kafala_type_fields', 'type_id', 'field_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kafalat()
    {
        return $this->hasMany(\App\Models\Kafala::class, 'type_id');
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

    public function getDescriptionAttribute(){

        $description = 'description_' . app()->getLocale();
        return $this->$description;
    }
}

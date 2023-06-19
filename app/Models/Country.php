<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use App\Traits\NameAttribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Country
 * @package App\Models
 * @version April 25, 2023, 10:48 am UTC
 *
 * @property Collection $donors
 * @property Collection $kafalats
 * @property Collection $reliefs
 * @property Collection $waqf
 * @property string $name_en
 * @property string $name_ar
 * @property string $code
 * @property string $phone_code
 * @property boolean $active
 * @property-read string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Country active()
 * @method static whereHas(string $string, \Closure $closure = null)
 */
class Country extends Model
{
    use SoftDeletes, HasFactory, NameAttribute;

    public $table = 'countries';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'code',
        'phone_code',
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
        'code' => 'string',
        'phone_code' => 'string',
        'active' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'phone_code' => 'nullable|string|max:255',
        'active' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function donors()
    {
        return $this->hasMany(\App\Models\Donor::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kafalat()
    {
        return $this->hasMany(\App\Models\Kafala::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reliefs()
    {
        return $this->hasMany(\App\Models\Relief::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function waqf()
    {
        return $this->hasMany(\App\Models\Waqf::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class, 'country_id');
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

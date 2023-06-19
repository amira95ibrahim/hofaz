<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class Gift
 * @package App\Models
 * @version April 29, 2023, 1:51 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $giftCards
 * @property string $model
 * @property integer $model_id
 * @property boolean $active
 * @method static \Illuminate\Database\Eloquent\Builder|Gift active()
 * @method static \Illuminate\Database\Eloquent\Builder|Gift where(string $string, string $string)
 * @method static whereNotIn(string $string, mixed $gift_select)
 * @method static updateOrCreate(array $array, array $array)
 * @method static whereActive(Boolean $Boolean)
 *
 */
class Gift extends Model
{

    use HasFactory;

    public $table = 'gifts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model',
        'model_id',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'model' => 'string',
        'model_id' => 'integer',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'model' => 'required|string|max:255',
        'model_id' => 'required|integer',
        'active' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function giftCards()
    {
        return $this->hasMany(\App\Models\GiftCard::class, 'gift_id');
    }

    public function giftable()
    {
        return $this->morphTo(__FUNCTION__, 'model', 'model_id');
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

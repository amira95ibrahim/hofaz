<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KafalaValue
 * @package App\Models
 * @version May 2, 2023, 12:46 pm UTC
 *
 * @property \App\Models\KafalaField $field
 * @property \App\Models\Kafalat $kafala
 * @property integer $kafala_id
 * @property integer $field_id
 * @property string $value_en
 * @property string $value_ar
 */
class KafalaValue extends Model
{

    use HasFactory;

    public $table = 'kafalat_values';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kafala_id',
        'field_id',
        'value_en',
        'value_ar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kafala_id' => 'integer',
        'field_id' => 'integer',
        'value_en' => 'string',
        'value_ar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kafala_id' => 'required',
        'field_id' => 'required',
        'value_en' => 'required|string',
        'value_ar' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function field()
    {
        return $this->belongsTo(\App\Models\KafalaField::class, 'field_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kafala()
    {
        return $this->belongsTo(\App\Models\Kafalat::class, 'kafala_id');
    }
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscriber
 * @package App\Models\Admin
 * @version May 6, 2023, 9:20 am UTC
 *
 * @property string $email
 */
class Subscriber extends Model
{
    use HasFactory;

    public $table = 'subscribers';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}

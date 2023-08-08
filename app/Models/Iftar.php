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
 */
class Iftar extends Model
{
    use  HasFactory, NameAttribute;

    public $table = 'iftar';




    public $fillable = [
        'duration',
        'amount',

    ];



    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'duration' => 'required|string',
        'amount' => 'required',
    ];



}

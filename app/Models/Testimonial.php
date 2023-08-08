<?php

namespace App\Models;

use App\Traits\NameAttribute;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Testimonial
 * @package App\Models
 * @version May 6, 2023, 7:46 am UTC
 *
 * @property string $name_ar
 * @property string $name_en
 * @property string $job_ar
 * @property string $job_en
 * @property string $testimonial_ar
 * @property string $testimonial_en
 * @property boolean $active
 * @property-read string $name
 * @property-read string $job
 * @property-read string $testimonial
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial active()
 */
class Testimonial extends Model
{
    use SoftDeletes, HasFactory, NameAttribute;

    public $table = 'testimonials';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_ar',
        'name_en',
        'job_ar',
        'job_en',
        'testimonial_ar',
        'testimonial_en',
        'image',
        'active'
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
        'job_ar' => 'string',
        'job_en' => 'string',
        'testimonial_ar' => 'string',
        'testimonial_en' => 'string',
        'image' => 'string',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_ar' => 'required|string|max:255',
        'name_en' => 'nullable|string|max:255',
        'job_ar' => 'required|string|max:255',
        'job_en' => 'nullable|string|max:255',
        'testimonial_ar' => 'required|string',
        'testimonial_en' => 'nullable|string',
        'image' => 'file',
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

    public function getJobAttribute(){

        $job = 'job_' . app()->getLocale();
        return $this->$job;
    }

    public function getTestimonialAttribute(){

        $testimonial= 'testimonial_' . app()->getLocale();
        return $this->$testimonial;
    }


}

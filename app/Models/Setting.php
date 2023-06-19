<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 * @package App\Models
 * @version May 6, 2023, 3:29 pm UTC
 *
 * @property string $site_title_ar
 * @property string $site_title_en
 * @property string $logo
 * @property string $keywords_ar
 * @property string $keywords_en
 * @property string $facebook
 * @property string $whatsapp
 * @property string $googlePlus
 * @property string $instagram
 * @property string $adminFooter
 * @property string $frontWebsiteFooter_ar
 * @property string $frontWebsiteFooter_en
 * @property string $youtubeAddress
 * @property string $twitterAddress
 * @property string $location
 * @property string $phoneNumber
 * @property string $postalCode
 * @property string $address
 * @property-read string $site_title
 * @property-read string $keywords
 * @property-read string $frontWebsiteFooter
 */
class Setting extends Model
{

    use HasFactory;

    public $table = 'settings';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'site_title_ar',
        'site_title_en',
        'logo',
        'keywords_ar',
        'keywords_en',
        'facebook',
        'whatsapp',
        'googlePlus',
        'instagram',
        'adminFooter',
        'frontWebsiteFooter_ar',
        'frontWebsiteFooter_en',
        'youtubeAddress',
        'twitterAddress',
        'location',
        'phoneNumber',
        'postalCode',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'site_title_ar' => 'string',
        'site_title_en' => 'string',
        'logo' => 'string',
        'keywords_ar' => 'string',
        'keywords_en' => 'string',
        'facebook' => 'string',
        'whatsapp' => 'string',
        'googlePlus' => 'string',
        'instagram' => 'string',
        'adminFooter' => 'string',
        'frontWebsiteFooter_ar' => 'string',
        'frontWebsiteFooter_en' => 'string',
        'youtubeAddress' => 'string',
        'twitterAddress' => 'string',
        'location' => 'string',
        'phoneNumber' => 'string',
        'postalCode' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'site_title_ar' => 'required|string|max:255',
        'site_title_en' => 'required|string|max:255',
        'logo' => 'nullable|string|max:255',
        'keywords_ar' => 'required|string',
        'keywords_en' => 'required|string',
        'facebook' => 'required|string|max:255',
        'whatsapp' => 'required|string|max:30',
        'googlePlus' => 'nullable|string|max:255',
        'instagram' => 'required|string|max:255',
        'adminFooter' => 'required|string|max:255',
        'frontWebsiteFooter_ar' => 'required|string|max:255',
        'frontWebsiteFooter_en' => 'required|string|max:255',
        'youtubeAddress' => 'required|string|max:255',
        'twitterAddress' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'phoneNumber' => 'required|string|max:30',
        'postalCode' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function getSiteTitleAttribute(){

        $siteTitle = 'site_title_' . app()->getLocale();
        return $this->$siteTitle;
    }

    public function getKeywordsAttribute(){

        $keywords = 'keywords_' . app()->getLocale();
        return $this->$keywords;
    }

    public function getFrontWebsiteFooterAttribute(){

        $frontWebsiteFooter = 'frontWebsiteFooter_' . app()->getLocale();
        return $this->$frontWebsiteFooter;
    }


}

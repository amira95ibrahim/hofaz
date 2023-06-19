<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\SitePagesDetail
 *
 * @property-read string $title
 * @property-read string $details
* @method static \Illuminate\Database\Eloquent\Builder|SitePagesDetail SadaqahPage()
* @method static \Illuminate\Database\Eloquent\Builder|SitePagesDetail ZakahPage()
* @method static \Illuminate\Database\Eloquent\Builder|SitePagesDetail kafalahPage()
* @method static \Illuminate\Database\Eloquent\Builder|SitePagesDetail reliefPage()
* @method static \Illuminate\Database\Eloquent\Builder|SitePagesDetail waqfPage()
* @method static \Illuminate\Database\Eloquent\Builder|SitePagesDetail projectsPage()
 */
class SitePagesDetail extends Model
{
    use HasFactory;

    public function getTitleAttribute(){

        $title = 'title_' . app()->getLocale();
        return $this->$title;
    }

    public function getDetailsAttribute(){

        $details = 'details_' . app()->getLocale();
        return $this->$details;
    }

    public function scopeSadaqahPage(Builder $query): Builder
    {
        return $query->where('model', 'sadaqah');
    }

    public function scopeZakahPage(Builder $query): Builder
    {
        return $query->where('model', 'zakah');
    }

    public function scopeKafalahPage(Builder $query): Builder
    {
        return $query->where('model', 'kafalah');
    }

    public function scopeReliefPage(Builder $query): Builder
    {
        return $query->where('model', 'relief');
    }

    public function scopeWaqfPage(Builder $query): Builder
    {
        return $query->where('model', 'waqf');
    }

    public function scopeProjectsPage(Builder $query): Builder
    {
        return $query->where('model', 'project');
    }
}

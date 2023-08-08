<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'number',
        'active',
        'project_id'

    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}

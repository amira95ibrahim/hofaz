<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';

    protected $fillable = ['donor_id', 'amount', 'status','model','model_id','notes','marketer_id'];


    public function donor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function marketer()
    {
        return $this->belongsTo(Marketer::class);
    }
}

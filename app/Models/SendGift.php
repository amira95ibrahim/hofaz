<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendGift extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'consignee',
        'email',
        'phone',
        'card',
    ];

    public function routeNotificationForMail()
    {
        return $this->email; // Replace 'email' with the actual field name storing the email address
    }

}

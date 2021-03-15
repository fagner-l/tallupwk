<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Events\ContactCreated;

class Contact extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['name', 'email', 'address'];

    // Laravel Event example: "sends" the welcome email (queued)
    protected $dispatchesEvents = [
        'created' => ContactCreated::class
    ];
}

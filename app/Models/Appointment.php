<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstname',
        'middlename',
        'lastname',
        'address',
        'number',
        'appointment_date',
        'type_of_action',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'subject',
        'first_name',
        'last_name',
        'email',
        'message',
        'read_at',
    ];
}

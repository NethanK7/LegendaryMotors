<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'status',
        'first_name',
        'last_name',
        'email',
        'phone',
        'delivery_method',
        'notes',
        'configuration',
    ];

    protected $casts = [
        'configuration' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

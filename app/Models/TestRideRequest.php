<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestRideRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'motorcycle_id', 'desired_date', 'comment', 'status',
    ];

    protected $casts = [
        'desired_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }
}

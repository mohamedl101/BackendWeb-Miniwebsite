<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id', 'name', 'type', 'price', 'cc', 'description', 'image_url', 'stock',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function testRideRequests()
    {
        return $this->hasMany(TestRideRequest::class);
    }
}

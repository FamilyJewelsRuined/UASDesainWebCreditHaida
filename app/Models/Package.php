<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model 
{
    use HasFactory;

    protected $fillable = ['package_name', 'slug', 'departure_date', 'description', 'image', 'price', 'duration_days', 'is_active'];

    public function  registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function travelSchedule()
    {
        return $this->hasOne(TravelSchedule::class);
    }
}

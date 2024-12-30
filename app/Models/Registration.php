<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'package_id', 
        'number_of_people', 
        'unit_amount', 
        'total_amount', 
        'payment_method', 
        'payment_status', 
        'status', 
        'notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function jamaah()
    {
    return $this->hasMany(Jamaah::class);
    }

}

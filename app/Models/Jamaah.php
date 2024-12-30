<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $fillable = [
        'registration_id',
        'nama',
        'alamat',
        'no_telepon',
        'email',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}

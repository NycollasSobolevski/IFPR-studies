<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle';

    protected $fillable = ['plate', 'brand', 'model', 'year', 'color', 'id_image', 'id_user', 'is_active'];

    public $timestamps = true;

    // Relação com Image
    public function image()
    {
        return $this->belongsTo(Image::class, 'id_image');
    }

    // Relação com User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relação com VehicleAccessLog
    public function accessLogs()
    {
        return $this->hasMany(VehicleAccessLog::class, 'id_vehicle');
    }
}

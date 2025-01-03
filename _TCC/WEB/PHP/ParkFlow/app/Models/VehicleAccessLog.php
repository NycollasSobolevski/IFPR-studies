<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleAccessLog extends Model
{
    use HasFactory;

    protected $table = 'vehicle_access_log';

    protected $fillable = ['in', 'out', 'is_active', 'id_vehicle'];

    public $timestamps = true;

    // Relação com Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle');
    }
}

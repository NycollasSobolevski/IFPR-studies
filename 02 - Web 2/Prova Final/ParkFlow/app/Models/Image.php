<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'image';

    protected $fillable = ['data', 'is_active'];

    public $timestamps = true;

    // Relação com Vehicle
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'id_image');
    }

    // Relação com User
    public function users()
    {
        return $this->hasMany(User::class, 'id_image');
    }
}

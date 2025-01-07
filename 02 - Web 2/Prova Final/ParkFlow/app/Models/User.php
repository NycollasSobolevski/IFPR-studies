<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = ['name', 'document', 'email', 'hash', 'phone', 'id_address', 'id_role', 'id_image', 'id_company', 'is_active'];

    public $timestamps = true;

    // Relação com Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    // Relação com Address
    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }

    // Relação com Image
    public function image()
    {
        return $this->belongsTo(Image::class, 'id_image');
    }

    // Relação com Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }

    // Relação com GoogleAuthentication
    public function googleAuthentication()
    {
        return $this->hasOne(GoogleAuthentication::class, 'id_user');
    }

    // Relação com Vehicle
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'id_user');
    }
}

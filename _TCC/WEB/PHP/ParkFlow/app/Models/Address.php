<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = ['cep', 'country', 'state', 'city', 'neighborhood', 'street', 'number', 'is_active'];

    public $timestamps = true;

    // Relação com o Company
    public function company()
    {
        return $this->hasOne(Company::class, 'id_address');
    }

    // Relação com o User
    public function users()
    {
        return $this->hasMany(User::class, 'id_address');
    }
}

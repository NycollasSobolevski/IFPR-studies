<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $fillable = ['name', 'cnpj', 'id_address', 'id_plan', 'id_settings', 'is_active'];

    public $timestamps = true;

    // Relação com Address
    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }

    // Relação com Plan
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'id_plan');
    }

    // Relação com CompanySetting
    public function settings()
    {
        return $this->belongsTo(CompanySetting::class, 'id_settings');
    }

    // Relação com User
    public function users()
    {
        return $this->hasMany(User::class, 'id_company');
    }
}

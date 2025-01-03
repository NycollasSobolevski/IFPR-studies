<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    use HasFactory;

    protected $table = 'company_settings';

    protected $fillable = ['vehicle_per_user', 'is_active'];

    public $timestamps = true;

    // Relação com Company
    public function companies()
    {
        return $this->hasMany(Company::class, 'id_settings');
    }
}

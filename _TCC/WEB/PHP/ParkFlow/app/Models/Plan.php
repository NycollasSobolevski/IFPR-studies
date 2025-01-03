<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plan';

    protected $fillable = ['plan', 'title', 'description', 'price', 'is_active'];

    public $timestamps = true;

    // Relação com Company
    public function companies()
    {
        return $this->hasMany(Company::class, 'id_plan');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleAuthentication extends Model
{
    use HasFactory;

    protected $table = 'google_authentication';

    protected $fillable = ['token', 'is_active', 'id_user'];

    public $timestamps = true;

    // Relação com User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';

    protected $fillable = ['role', 'is_active'];

    public $timestamps = true;

    // Relação com o User
    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}
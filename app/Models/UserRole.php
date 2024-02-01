<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $guarded = [ ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role');
    }
}

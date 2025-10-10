<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


/**
 * @method bool hasRole(string|array $roles, string|null $guard = null)
 * @method bool hasAnyRole(string|array $roles, string|null $guard = null)
 * @method bool hasAllRoles(string|array $roles, string|null $guard = null)
 * @method $this assignRole(...$roles)
 * @method bool hasPermissionTo(string|array $permission, string|null $guard = null)
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 11+ otomatis bcrypt
    ];

    public function requests()
    {
        return $this->hasMany(RekomRequests::class);
    }
}

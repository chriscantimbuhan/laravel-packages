<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Ccantimbuhan\LaravelRatings\Traits\HasRatings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRatings;

    const ATTR_ROLE_ID = 'role_id';
    const ROUTE_KEY = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Attach portal role to web user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<\App\Portal\PortalRole\Models\PortalRole>
     */
    public function userRole()
    {
        return $this->belongsTo(UserRole::class, self::ATTR_ROLE_ID);
    }
}

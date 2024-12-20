<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
    * @OA\Schema(
    * title="User",
    * description="Model User"),

    * @OA\Property(
    * property="id",
    * type="integer",
    * description="Id user"
    * ),
        
    * @OA\Property(
    * property="name",
    * type="string",
    * description="Nama user"
    * ),

    * @OA\Property(
    * property="role",
    * type="string",
    * description="Role user"
    * ),


    * @OA\Property(
    * property="email",
    * type="string",
    * description="Email user"
    * ),

    * @OA\Property(
    * property="password",
    * type="string",
    * description="Password user"
    * )
    * )
    */


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
}

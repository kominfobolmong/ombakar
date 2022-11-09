<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kapals()
    {
        return $this->hasMany(Kapal::class);
    }

    public function isAdmin()
    {
        return $this->is_admin == 'Y';
    }

    public function gravatar($size = 150)
    {
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=mp&s=" . $size;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'role' => $this->getRoleNames()
        ];
    }

    public static function generateUserName($name)
    {
        $username = Str::lower(Str::slug($name));
        $uniqueUserName = $username . '-' . Str::lower(Str::random(4));

        return $uniqueUserName;
    }
}

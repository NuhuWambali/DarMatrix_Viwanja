<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\SendPasswordNotification;
use App\Notifications\ResendPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'phone',
        'role_id',
        'email',
        'password',
        'role_id'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // public function roles()
    // {
    //   return $this->hasMany(Roles::class);
    // }

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }


    public function sendPasswordNotification($username,$email,$password)
    {
        $this->notify(new SendPasswordNotification($username,$email,$password));
    }

    public function resendPasswordNotification($username,$userEmail,$password)
    {
        $this->notify(new ResendPasswordNotification($username,$userEmail,$password));
    }
}

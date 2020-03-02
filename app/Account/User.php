<?php

namespace App\Account;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function account() {
        return $this->hasOne('App\Account\Account');
    }

    public function settings() {
        return $this->hasMany('App\Account\UserSetting');
    }

    public function checkins() {
        return $this->belongsToMany('App\Study\Checkin');
    }

    public function routeNotificationForNexmo($notification)
    {
        if ( env('APP_ENV') == 'local' ) {
            return env('TEST_PHONE');
        } else {
            return $this->account->phone;
        }
    }

    public function routeNotificationForMail($notification)
    {
        if ( env('APP_ENV') == 'local' ) {
            return env('TEST_EMAIL');
        } else {
            return $this->email;
        }
    }
}

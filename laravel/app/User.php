<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public static function attributeNames() {
        return [
            'name' => 'Имя пользователя',
            'password' => 'Пароль',
            'email' => "Электронная почта"
        ];
    }

    public static function rules() {
        return [
            'name' => 'required|max:20|unique:users,name',
            'password' => 'required|confirmed|min:6|max:12',
            'email' => 'required|email'

        ];
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socialUsers()
    {
        return $this->hasMany(SocialUser::class);
    }

    public function mixComments()
    {
        return $this->hasMany(MixComment::class, 'created_by');
    }

    public function mixes()
    {
        return $this->hasMany(Mix::class, 'created_by');
    }
}

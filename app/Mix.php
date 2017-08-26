<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mix extends Model
{
    public function comments()
    {
        return $this->hasMany(MixComment::class);
    }

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function ingredients()
    {
        return $this->hasMany(MixFlavour::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mix extends Model
{
    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}

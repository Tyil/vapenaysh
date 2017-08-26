<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    public function mixFlavours()
    {
        return $this->hasMany(MixFlavour::class);
    }
}

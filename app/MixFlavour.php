<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MixFlavour extends Model
{
    public function flavour()
    {
        return $this->belongsTo(Flavour::class);
    }
}

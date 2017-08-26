<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MixComment extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function mix()
    {
        return $this->belongsTo(Mix::class);
    }
}

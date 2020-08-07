<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicBook extends Model
{
    //

    public function links()
    {
        return $this->hasMany('\App\Models\Link');
    }
}

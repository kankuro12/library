<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lent extends Model
{
    protected $table = 'lent';
    protected $fillable = [
        'id', 'user_id', 'book_id', 'lent_at', 'due_at', 'renewed'
    ];
}

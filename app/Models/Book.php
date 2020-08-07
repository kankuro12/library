<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        "id",
        "isbn",
        "name",
        "author",
        "description",
        "cover",
        "file",
        "category_id",
        "created_at",
        "updated_at",
    ];
}

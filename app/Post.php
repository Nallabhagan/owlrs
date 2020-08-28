<?php

namespace App;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use Taggable;
    protected $fillable = [
        'user_id', 'book_source', 'book_click', 'status', 'description'
    ];
}

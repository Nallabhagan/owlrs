<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReaderClub extends Model
{
    protected $fillable = [
        'name', 'image', 'slug'
    ];
}

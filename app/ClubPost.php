<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubPost extends Model
{
	protected $fillable = [
	    'club_id', 'post_id'
	];
}

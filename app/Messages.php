<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable=[
		'receiver',
		'subject',
		'details',
		'sender',
		'imp',
	];
	public $timestamps=false;
}

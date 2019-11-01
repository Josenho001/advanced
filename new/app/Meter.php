<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{ 
	public $table = 'meters';
	public $primaryKey = 'id';

    protected $fillable = ['id','meter'];

}

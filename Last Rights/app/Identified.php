<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identified extends Model
{
    public $table = 'identified';
	public $primaryKey = 'id';

    protected $fillable = ['id','name','height','avg','marks','gender'];

}

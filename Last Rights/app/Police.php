<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    
    public $table = 'missing';
	public $primaryKey = 'id';

    protected $fillable = ['id','image','name','skin','last','height','avg','mind','gender','cloth','parent','phone'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tran extends Model
{
    
	public $table = 'trans';
	public $primaryKey = 'id';

    protected $fillable = ['id','phone','amount','reference'];
}

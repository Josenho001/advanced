<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidentified extends Model
{
     public $table = 'unidentified';
	public $primaryKey = 'id';

    protected $fillable = ['id','skin','height','avg','marks','gender','area','ob','pname','national','phone'];

}

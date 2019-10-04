<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zagonlog extends Model
{
    protected $fillable = ['day', 'zagid','count','type'];
	
	
}

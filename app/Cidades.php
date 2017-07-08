<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{

    protected $table = "cidades";

    protected $fillable = [
    	'estado_id',
		'url',
		'status',
		'head'
    ];
}

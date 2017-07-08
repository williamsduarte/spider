<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table = "empresas";

    protected $fillable = [
		'cidade_id',
		'estado_id',
		'url',
		'status',
		'head',
		'filter',
    ];
}


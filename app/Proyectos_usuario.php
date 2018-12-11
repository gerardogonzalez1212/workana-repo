<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos_usuario extends Model
{
	protected $table = 'proyectos_usuarios';
    protected $fillable = [
    	'id_usuario','nombre','habilidades','edad'
    ];

    public $timestamps = false;

}

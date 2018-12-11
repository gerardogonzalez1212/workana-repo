<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $fillable = [
    	'id_usuario','nombre','descripcion','giro'
    ];

    public function usuario(){
    	return $this->belongsToMany('App\User','proyectos_usuarios','id_proyecto','id_usuario');
    }

}

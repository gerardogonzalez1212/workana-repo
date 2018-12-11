<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Proyecto;
use App\Proyectos_usuario;

class ProyectoController extends Controller
{

	public function postular(Request $request){
		$nuevo = new Proyectos_usuario;
		$nuevo->id_proyecto = $request->id_proyecto;
		$nuevo->id_usuario = Auth::id();
		$nuevo->save();
	}

	public function getProyectosFreelance(){
		$proyecto = Proyecto::join('proyectos_usuarios','proyectos_usuarios.id_proyecto','=','proyectos.id')
		->select(
			'proyectos.id',
			'proyectos.nombre','proyectos.descripcion','proyectos.categoria',
			'proyectos.created_at'
		)->where([
            ['proyectos_usuarios.id_usuario','=',Auth::id()]
		])
		->orderBy('proyectos.created_at','desc')
		->get();
		return $proyecto;
	}

	public function getProyectosEmpresa2(){
		$proyecto = Proyecto::join('users','proyectos.id_usuario','=','users.id')
		->select(
			'proyectos.id',
			'proyectos.nombre','proyectos.descripcion','proyectos.categoria',
			'proyectos.created_at','users.nombre as empresa'
		)
		->orderBy('proyectos.created_at','desc')
		->get();
		return $proyecto;
	}

	public function getProyectosEmpresa(){
		$proyecto = Proyecto::join('users','proyectos.id_usuario','=','users.id')
		->select(
			'proyectos.id',
			'proyectos.nombre','proyectos.descripcion','proyectos.categoria',
			'proyectos.created_at','users.nombre as empresa'
		)->where('users.id','=',Auth::id())
		->orderBy('proyectos.created_at','desc')
		->get();
		return $proyecto;
	}

    public function store(Request $request){
        if(!$request->ajax()) return redirect('/');
        $Proyecto = new Proyecto;
        $Proyecto->id_usuario = Auth::id();
        $Proyecto->nombre = $request->nombre;
        $Proyecto->descripcion = $request->descripcion;
        $Proyecto->categoria = $request->categoria;
        $Proyecto->save();
    }
}

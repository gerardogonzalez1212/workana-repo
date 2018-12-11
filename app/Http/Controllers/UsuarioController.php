<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsuarioController extends Controller{
    public function store(Request $request){
        if(!$request->ajax()) return redirect('/');
        $User = new User;
        $User->usuario = $request->usuario;
        $User->password = bcrypt($request->password);
        $User->estado = $request->estado;
        $User->nombre = '';
        $User->nombre2 = '';
        $User->descripcion = '';
        $User->giro = '';
        $User->habilidades = '';
        $User->edad = 0;
        $User->save();
    }

    public function updateFreelance(Request $request){
        if(!$request->ajax()) return redirect('/');
        $user = User::findOrFail(Auth::id());
        $user->nombre2 = $request->nombre;
        $user->habilidades = $request->habilidades;
        $user->edad = $request->edad;
        $user->save();
    }

    public function updateEmpresa(Request $request){
        if(!$request->ajax()) return redirect('/');
        $User = User::findOrFail(Auth::id());;
        // $User->usuario = $request->usuario;
        // $User->password = bcrypt($request->password);
        // $User->estado = $request->estado;
        $User->nombre = $request->nombre;
        $User->descripcion = $request->descripcion;
        $User->giro = $request->giro;
        // $User->habilidades = '';
        // $User->edad = 0;
        $User->save();
    }

    public function getInfo(Request $request){
        if(!$request->ajax()) return redirect('/');
        $user = User::findOrFail(Auth::id());
        return $user;
    }
}

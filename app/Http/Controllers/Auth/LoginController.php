<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function login(Request $request){
        // if(!$request->ajax()) return redirect('/');
        $this->validateLogin($request);

        if(Auth::attempt([
            'usuario'   => $request->usuario,
            'password'  => $request->password,
            'estado'    => 1
        ])){
            return redirect()->route('freelance');
        }else if(Auth::attempt([
            'usuario'   => $request->usuario,
            'password'  => $request->password,
            'estado'    => 0
        ])){
            return redirect()->route('empresa');
        }
        return back()->withErrors([
            'usuario'   => trans('auth.failed')
        ])->withInput(request(['usuario']));
    }

    protected function validateLogin(Request $request){
        $this->validate($request,[
            'usuario'   => 'required|string',
            'password'  => 'required|string',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

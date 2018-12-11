@extends('auth.contenido')
@section('login')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card-group mb-0 shadow-lg">
                <div class="card p-4">
                    <form action="{{ route('login-entrar') }}" method="POST" accept-charset="utf-8">
                         @csrf
                        <div class="card-body">
                            <h1>Acceder</h1>
                            <p class="text-muted">Control de acceso al sistema</p>
                            <div class="form-group mb-3 {{$errors->has('usuario' ? 'is-invalid' : '')}} ">

                                <input value="{{ old('usuario') }}" type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                                {!! $errors->first('usuario','<span class="invalid-feedback"> :message </span>') !!}
                            </div>
                            <div class="form-group mb-4 {{$errors->has('password' ? 'is-invalid' : '')}}">

                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                                {!! $errors->first('password','<span class="invalid-feedback"> :message </span>') !!}
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-lock-open"></i> Acceder
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                 <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Login para Workana 2</h2>
                            <p>
                                Aplicación web que ayuda a las empresas a colocar sus proyectos para que
                                freelances puedan resolver estos proyectos. Si aún no cuentas con un usuario
                                entonces regresa al inicio para que crees una cuenta en la sección de "registrarse".
                            </p>
                            <a href="/" class="btn btn-primary active mt-3">
                                <i class="fas fa-arrow-circle-left"></i> Volver al inicio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

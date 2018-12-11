@extends('principal')
@section('inicio_contenido')

    <template v-if="menu=='inicio'">
        <inicio></inicio>
    </template>

    <template v-if="menu=='registrarse'">
        <registrarse></registrarse>
    </template>

@endsection
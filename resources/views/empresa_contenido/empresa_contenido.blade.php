
@extends('empresa')
@section('empresa_contenido')

    <template v-if="menu=='informacion-empresa'">
        <informacion-empresa></informacion-empresa>
    </template>

    <template v-if="menu=='inicio'">
        <proyectos-empresa></proyectos-empresa>
    </template>
@endsection
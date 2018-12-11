@extends('freelance')

@section('freelance_contenido')
	 <template v-if="menu=='informacion-freelance'">
        <informacion-freelance></informacion-freelance>
    </template>

    <template v-if="menu=='inicio'">
        <proyectos2></proyectos2>
    </template>

    <template v-if="menu=='proyectos-freelance'">
        <proyectos-freelance></proyectos-freelance>
    </template>
@endsection
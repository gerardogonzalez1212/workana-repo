<template>
    <div class="col-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4>Información de la empresa</h4>
                        <hr>
                    </div>
                    <div class="col-6">
                        <h4>Crear un proyecto</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">
                                Nombre
                            </label>
                            <div class="col-8">
                                <input :class=" nombre.length==0 ? 'border-danger' : 'border-success' " v-model="nombre" placeholder="Nombre" class="form-control" type="text">
                                <span v-if="nombre.length==0" class="help-block badge badge-danger">
                                    <i class="fas fa-times-circle"></i> Este campo no puede estar vacio.</span>
                                <span v-else class="help-block badge badge-success">
                                    <i class="fas fa-check-circle"></i> Todo correcto</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">
                                Descripción
                            </label>
                            <div class="col-8">
                                <textarea :class=" descripcion.length==0 ? 'border-danger' : 'border-success' " v-model="descripcion" placeholder="Descripción" class="form-control"></textarea>
                                <span v-if="descripcion.length==0" class="help-block badge badge-danger">
                                    <i class="fas fa-times-circle"></i> Este campo no puede estar vacio.</span>
                                <span v-else class="help-block badge badge-success">
                                    <i class="fas fa-check-circle"></i> Todo correcto</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">
                                Giro
                            </label>
                            <div class="col-8">
                                <input :class=" giro.length==0 ? 'border-danger' : 'border-success' " v-model="giro" placeholder="Giro" class="form-control" type="text">
                                <span v-if="giro.length==0" class="help-block badge badge-danger">
                                    <i class="fas fa-times-circle"></i> Este campo no puede estar vacio.</span>
                                <span v-else class="help-block badge badge-success">
                                    <i class="fas fa-check-circle"></i> Todo correcto</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button @click="updateInfo()" type="button" class="btn btn-primary">
                                    <i class="fas fa-sync"></i> Actualizar mi información
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">
                                Nombre
                            </label>
                            <div class="col-8">
                                <input :class=" nombre_proyecto.length==0 ? 'border-danger' : 'border-success' " v-model="nombre_proyecto" placeholder="Nombre" class="form-control" type="text">
                                <span v-if="nombre_proyecto.length==0" class="help-block badge badge-danger">
                                    <i class="fas fa-times-circle"></i> Este campo no puede estar vacio.</span>
                                <span v-else class="help-block badge badge-success">
                                    <i class="fas fa-check-circle"></i> Todo correcto</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">
                                Descripción
                            </label>
                            <div class="col-8">
                                <textarea :class=" descripcion_proyecto.length==0 ? 'border-danger' : 'border-success' " v-model="descripcion_proyecto" placeholder="Descripción" class="form-control"></textarea>
                                <span v-if="descripcion_proyecto.length==0" class="help-block badge badge-danger">
                                    <i class="fas fa-times-circle"></i> Este campo no puede estar vacio.</span>
                                <span v-else class="help-block badge badge-success">
                                    <i class="fas fa-check-circle"></i> Todo correcto</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">
                                Categoría
                            </label>
                            <div class="col-8">
                                <input :class=" categoria.length==0 ? 'border-danger' : 'border-success' " v-model="categoria" placeholder="Categoría" class="form-control" type="text">
                                <span v-if="categoria.length==0" class="help-block badge badge-danger">
                                    <i class="fas fa-times-circle"></i> Este campo no puede estar vacio.</span>
                                <span v-else class="help-block badge badge-success">
                                <i class="fas fa-check-circle"></i> Todo correcto</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button @click="newProject()" type="button" class="btn btn-success">
                                    <i class="fas fa-save"></i> Crear proyecto
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                nombre: '',
                descripcion: '',
                giro: '',
                nombre_proyecto: '',
                descripcion_proyecto: '',
                categoria: ''
            }
        },
        methods: {
            validar(){
                let me = this;
                return ( (!me.nombre) || (!me.descripcion) || (!me.giro)) ? false : true;
            },
            validar2(){
                let me = this;
                return ( (!me.nombre_proyecto) || (!me.descripcion_proyecto) || (!me.categoria)) ? false : true;
            },
            limpiarformproyecto(){
                let me = this;
                me.nombre_proyecto = '';
                me.descripcion_proyecto = '';
                me.categoria = '';
            },
            newProject(){
                let me = this;
                if(me.validar2()){
                    axios.post('proyecto/nuevo',{
                        nombre: me.nombre_proyecto,
                        descripcion: me.descripcion_proyecto,
                        categoria: me.categoria
                    }).then(function (response) {
                        toastr.success('Proyecto creado.','Éxito',{
                            "progressBar": true,
                            "timeOut": "3000",
                        });
                        me.limpiarformproyecto();
                    }).catch(function (error) {
                        console.log(error);
                    });
                }else{
                    toastr.error('Verifique el registro.','ERROR',{
                        "progressBar": true,
                        "timeOut": "3000",
                    });
                }
            },
            updateInfo(){
                let me = this;
                if(me.validar()){
                    axios.post('empresa/actualizar',{
                        nombre: me.nombre,
                        descripcion: me.descripcion,
                        giro: me.giro
                    }).then(function (response) {
                        toastr.success('Información actualizada.','Éxito',{
                            "progressBar": true,
                            "timeOut": "3000",
                        });
                    }).catch(function (error) {
                        console.log(error);
                    });
                }else{
                    toastr.error('Verifique el registro.','ERROR',{
                        "progressBar": true,
                        "timeOut": "3000",
                    });
                }
            },
            getInfo(){
                let me = this;
                axios.get('empresa/getInfo').then(response=> {
                   let d = response.data;
                    me.nombre = d.nombre;
                    me.descripcion = d.descripcion;
                    me.giro = d.giro;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        },
        mounted() {
            let me = this;
            me.getInfo();
        }
    }
</script>

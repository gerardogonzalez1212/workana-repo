<template>
   <div class="col-12">

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4>Información del freelance</h4>
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
                                Habilidades
                            </label>
                            <div class="col-8">
                                <textarea :class="habilidades.length==0 ? 'border-danger' : 'border-success' " v-model="habilidades" placeholder="Habilidades" class="form-control"></textarea>
                                <span v-if="habilidades.length==0" class="help-block badge badge-danger">
                                    <i class="fas fa-times-circle"></i> Este campo no puede estar vacio.</span>
                                <span v-else class="help-block badge badge-success">
                                    <i class="fas fa-check-circle"></i> Todo correcto</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">
                                Edad
                            </label>
                            <div class="col-8">
                                <input :class=" edad<=0 ? 'border-danger' : 'border-success' " v-model="edad" placeholder="edad" class="form-control" type="number">
                                <span v-if="edad<=0" class="help-block badge badge-danger">
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
                </div>
            </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                nombre: '',
                habilidades: '',
                edad: 0
            }
        },
        methods: {
            validar(){
                let me = this;
                return ( (!me.nombre) || (!me.habilidades) || (me.edad<=0)) ? false : true;
            },
            updateInfo(){
                let me = this;
                if(me.validar()){
                    axios.post('freelance/actualizar',{
                        nombre: me.nombre,
                        habilidades: me.habilidades,
                        edad: me.edad
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
                    me.nombre = d.nombre2;
                    me.habilidades = d.habilidades;
                    me.edad = d.edad;
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

<template>
    <div class="row justify-content-center">
    <div class="col-6">
    <div class="card-body">
        <h1>Ingresa tus datos</h1>
        <p class="text-muted">Se un freelance o una empresa.</p>
        <div class="form-group mb-3">
            <input :class=" usuario.length==0 ? 'border-danger' : 'border-success' " type="text" v-model="usuario" class="form-control" placeholder="Nombre del usuario">
            <span v-if="usuario.length==0" class="help-block badge badge-danger">Este campo no puede estar vacio.</span>
            <span v-else class="help-block badge badge-success">Todo correcto</span>
        </div>
        <div class="form-group mb-4">
            <input :class=" password.length==0 ? 'border-danger' : 'border-success' " type="password" placeholder="Contraseña" v-model="password" class="form-control" >
            <span v-if="password.length==0" class="help-block badge badge-danger">Este campo no puede estar vacio.</span>
            <span v-else class="help-block badge badge-success">Todo correcto</span>
        </div>
        <div class="form-group row">
            <label class="col-md-12 form-control-label font-weight-bold" for="text-input">
                ¿Qué es?
            </label>
            <div class="col-md-5">
                <label>
                    <input type="radio" value="1" v-model="estado" > Feelance
                </label>
                <label>
                    <input type="radio" value="0" v-model="estado" > Empresa
                </label>
                <div class="col-md-12">
                    <span v-if="estado==2" class="help-block badge badge-danger">Este campo no puede estar vacio</span>
                    <span v-else class="help-block badge badge-success">Todo correcto</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-12 text-center">
                <button @click="registrarUsuario()" type="button" class="btn btn-success">
                    <i class="fas fa-user-circle"></i> Crear tu cuenta
                </button>
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
                usuario: '',
                password: '',
                estado: 2
            }
        },
        methods: {
            validar(){
                let me = this;
                return ( (!me.usuario) || (!me.password) || (!me.estado)) ? false : true;
            },
            limpiar(){
                let me = this;
                me.usuario = '';
                me.password = '';
                me.estado = 2;
            },
            registrarUsuario(){
                let me = this;
                if(me.validar()){
                    axios.post('/usuario/registrar',{
                        usuario: me.usuario,
                        password: me.password,
                        estado: me.estado
                    }).then(function (response) {
                        me.limpiar();
                        toastr.success('Usuario registrado.','Éxito',{
                            "progressBar": true,
                            "timeOut": "3000",
                        });
                    }).catch(function (error) {
                        console.log(error);
                    });
                }else{
                    toastr.error('Ya estas postulado en este proyecto.','ERROR',{
                        "progressBar": true,
                        "timeOut": "3000",
                    });
                }
            }
        }
    }
</script>

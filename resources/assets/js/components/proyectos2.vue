<template>
    <div class="container">
        <div class="row">
            <div v-for="item in proyectos" :key="item.id" class="col-lg-3 col-md-4 col-sm-6 mb-4 mt-4 portfolio-item">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 v-text="item.nombre" class="card-title">
                        </h4>
                        <small v-text="item.created_at"></small> /
                        <small v-text="item.categoria"></small>
                        <p v-text="item.descripcion" class="card-text">
                        </p>
                    </div>
                    <div class="card-footer">
                        <button @click="postularme(item.id)" class="btn btn-primary">
                            <i class="fas fa-check-circle"></i> Postularme
                        </button>
                    </div>
                </div>
            </div>
            <div v-if="proyectos.length<=0" class="col-lg-3 col-md-4 col-sm-6 mb-4 mt-4 portfolio-item">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">
                            No hay proyectos disponibles.
                        </h4>
                        <p class="card-text">
                            Cuando una empresa agrege un nuevo proyecto aquí se verá reflejado.
                        </p>
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
                proyectos: '',
                proyectos_postulado: ''
            }
        },
        methods: {
            validarRegistro(id){
                let me = this;
                let ban = true;
                let i = 0;
                for (i = 0; i < me.proyectos_postulado.length; i++) {
                    if(id==me.proyectos_postulado[i].id){
                        ban = false;
                        break;
                    }
                }
                return ban;
            },
            postularme(id){
                let me = this;
                if (me.validarRegistro(id)){
                        axios.post('/freelance/postular',{
                        id_proyecto: id
                    }).then(function (response) {
                        toastr.success('Te postulaste con éxito.','Éxito',{
                            "progressBar": true,
                            "timeOut": "3000",
                        });
                    }).catch(function (error) {
                        console.log(error);
                    });
                    me.getProyectosUsuarios();
                }else{
                    toastr.error('Ya estas postulado en este proyecto.','ERROR',{
                        "progressBar": true,
                        "timeOut": "3000",
                    });
                }
            },
            getProyectos(){
                let me = this;
                axios.get('proyecto/getProyectos2').then(response=> {
                   me.proyectos = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            getProyectosUsuarios(){
                let me = this;
                axios.get('proyecto/getProyectosFreelance').then(response=> {
                   me.proyectos_postulado = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        },
        mounted() {
            let me = this;
            me.getProyectos();
            me.getProyectosUsuarios();
        }
    }
</script>

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
                        <button class="btn btn-success">
                            <i class="fas fa-eye"></i> Ver información
                        </button>
                    </div>
                </div>
            </div>
            <div v-if="proyectos.length<=0" class="col-lg-3 col-md-4 col-sm-6 mb-4 mt-4 portfolio-item">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">
                            No tienes proyectos creados.
                        </h4>
                        <p class="card-text">
                            Ve a la sección de "información" y crea los proyectos que necesites.
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
                empresa: ''
            }
        },
        methods: {
            getProyectos(){
                let me = this;
                axios.get('proyecto/getProyectos').then(response=> {
                   me.proyectos = response.data;
                   me.empresa = response.data.empresa;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        },
        mounted() {
            let me = this;
            me.getProyectos();
        }
    }
</script>

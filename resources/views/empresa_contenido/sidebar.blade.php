 <nav class="navbar navbar-expand-lg fixed-top mb-5 nv">
    <div class="container">
        <li class="nav-item list-unstyled" >
            <a style="padding: 7px !important;" class="navbar-brand t" href="/">Workana 2</a>
        </li>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a  class="nav-link" href="#">
                        <i class="fas fa-hand-peace"></i> Hola: {{ auth()->user()->usuario }} /
                    </a>
                </li>
                 <li @click="menu='inicio'" class="nav-item">
                    <a  class="nav-link" href="#">
                        <i class="fas fa-folder"></i> Mis proyectos
                    </a>
                </li>
                <li @click="menu='informacion-empresa'" class="nav-item">
                    <a  class="nav-link" href="#">
                        <i class="fas fa-building"></i> Mi información
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST" accept-charset="utf-8">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary rounded mt-1 ml-1">
                            <i class="fas fa-lock"></i> Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
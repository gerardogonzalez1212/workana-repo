<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Workana 2</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC:600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/solid.css" integrity="sha384-rdyFrfAIC05c5ph7BKz3l5NG5yEottvO/DQ0dCrwD8gzeQDjYBHNr1ucUpQuljos" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body class="bg">

    <div id="app" class="container card mt-4 mb-5 shadow-lg">
        @include('empresa_contenido.sidebar')
        @yield('empresa_contenido')
    </div>

     <footer class="foo mt-5">
      <div class="container">
        <p class="m-0 text-center text-white">
         Copyright &copy; Workana2 - 2018
       </p>
      </div>
      <!-- /.container -->
    </footer>


    <script src="js/app.js"></script>
    <script src="js/inicio.js"></script>
</body>
</html>
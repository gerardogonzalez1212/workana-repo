let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.styles([
    'resources/assets/app/css/bootstrap.min.css',
    'resources/assets/app/css/small-business.css',
    'resources/assets/app/css/toastr.min.css'
], 'public/css/inicio.css')
.scripts([
    'resources/assets/app/js/jquery.min.js',
    'resources/assets/app/js/bootstrap.bundle.min.js',
    'resources/assets/app/js/toastr.min.js'
], 'public/js/inicio.js')
.js(['resources/assets/js/app.js'],'public/js/app.js');

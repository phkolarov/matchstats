const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'node_modules/noty/lib/noty.css',
    'node_modules/noty/lib/themes/bootstrap-v4.css',
    'node_modules/noty/lib/themes/mint.css',
    'node_modules/datatables.net-dt/css/jquery.dataTables.css',
    'public/css/datatable-dt.css',
], 'public/css/all.css');

mix.babel([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/popper.js/dist/umd/popper.js',
    'node_modules/noty/lib/noty.js',
    'node_modules/tippy.js/umd/index.all.js',
    'node_modules/datatables.net/js/jquery.dataTables.js',

], 'public/js/all.js');
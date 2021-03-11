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
mix.setResourceRoot("../");

mix.styles([
   'public/theme/css/sb-admin-2.min.css',
   'public/theme/css/filepond.css',
   'public/theme/css/style.css',
], 
'public/css/combine.css').version();

mix.scripts([
   'public/theme/vendor/jquery/jquery.min.js',
   'public/theme/vendor/bootstrap/js/bootstrap.bundle.min.js',
   'public/theme/vendor/jquery-easing/jquery.easing.min.js',
   'public/theme/js/sb-admin-2.min.js',
   'public/theme/js/filepond/filepond.min.js',
],
'public/js/combine.js').version();

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

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

mix.js('resources/assets/js/app.js', 'public/js')
    /* HOME */
   .sass('resources/assets/sass/app.scss', 'public/css')
   /* GENERAL */
   .sass('resources/assets/sass/layouts.scss', 'public/css')
   .sass('resources/assets/sass/navbar.scss', 'public/css')
   /* TASKS */
   .sass('resources/assets/sass/tasks.scss', 'public/css')
   .browserSync('stepping-in-space.test');


    // mix.styles([
    //     'normalize.css',
    //     'main.css'
    // ], 'public/assets/css/site.css');
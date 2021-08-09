const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
        .styles(['resources/app/css/style.css'],
                'public/assets/app/css/style.css')
        .js(['resources/app/js/app.js'],
                'public/assets/app/js/app.js')
        .js(['resources/app/js/register_ajax.js'],
                'public/assets/app/js/register_ajax.js')
        .version();
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

const jsSources = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'resources/assets/js/app.js',
];

mix.js(jsSources, 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .autoload({
        jquery: ['$', 'jQuery', 'window.jQuery'],
        tether: ['Tether', 'window.Tether'],
    })
    .copy('node_modules/font-awesome/fonts', 'public/fonts');

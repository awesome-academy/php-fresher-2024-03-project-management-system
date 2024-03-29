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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/pages/workFlows/index.js', 'public/js/pages/workFlows')
    .js('resources/js/pages/workFlows/edit.js', 'public/js/pages/workFlows')
    .js('resources/js/pages/issueTypes/index.js', 'public/js/pages/issueTypes')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

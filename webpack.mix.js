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
    .sass('resources/assets/sass/app.scss', 'public/css')
    .version();

/* Scripts and Styles for plugins */
mix.styles([
    'resources/assets/plugins/font-awesome/css/font-awesome.min.css',
    'resources/assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'
], 'public/css/plugins.css').version();

mix.scripts([
    'resources/assets/plugins/popper.js/umd/popper.min.js',
    'resources/assets/plugins/jquery.cookie/jquery.cookie.js',
    /*'resources/assets/plugins/chart.js/Chart.min.js',*/
    'resources/assets/plugins/jquery-validation/jquery.validate.min.js',
    'resources/assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'
], 'public/js/plugins.js').version();

/* Scripts and Styles for each page from this theme */
mix.styles([
    'resources/assets/css/fontastic.css',
    'resources/assets/css/grasp_mobile_progress_circle-1.0.0.min.css',
    'resources/assets/css/style.default.css',
    'resources/assets/css/custom.css'
], 'public/css/allTheme.css').version();

mix.scripts([
    'resources/assets/js/grasp_mobile_progress_circle-1.0.0.min.js',
    /*'resources/assets/js/charts-home.js',*/
    'resources/assets/js/front.js'
], 'public/js/allTheme.js').version();

/* Scripts and Styles for each module */
/*mix.styles([
    'resources/assets/css/custom.css'
], 'public/css/all.css').version();*/

mix.scripts([
    'resources/assets/js/module/server.js'
], 'public/js/all.js').version();
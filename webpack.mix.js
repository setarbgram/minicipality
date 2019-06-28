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
    // .sass('resources/assets/sass/app.scss', 'public/css')

    /*______________________Admin____________________________*/


    .styles([
        'resources/assets/css/admin/base_css/bootstrap.min.css',
        'resources/assets/css/admin/app/plugin/bootstrap-rtl/bootstrap-rtl.min.css',
        'resources/assets/css/admin/base_css/font-awesome.css',
        'resources/assets/css/admin/base_css/animate.css',
        'resources/assets/css/admin/base_css/style.css',
        'resources/assets/css/admin/app/plugin/IRANSans/fontiran.css',

    ], 'public/css/admin/base_css_admin/admin_base_css.css')

    .scripts([
        'resources/assets/js/app/base_js/jquery-2.1.1.js',
        'resources/assets/js/app/base_js/bootstrap.min.js'
        /*'resources/assets/js/app/base_js/inspinia.js',
         'resources/assets/js/admin/base_js/pace.min.js',*/
    ], 'public/js/app/base_js/base_admin_js.js')

    .scripts([
        'resources/assets/js/app/base_js/inspinia.js',
    ],'public/js/app/main.js')

    .copyDirectory([
        'resources/assets/fonts',
    ], 'public/fonts')

    .copyDirectory([
        'resources/assets/js/app/plugin',
    ], 'public/js/app/plugin')

    .copyDirectory([
        'resources/assets/css/admin/app/plugin',
    ], 'public/css/app/plugin')

    .copyDirectory([
        'resources/assets/img/admin',
    ], 'public/img/admin')
;

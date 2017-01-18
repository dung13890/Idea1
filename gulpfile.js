process.env.DISABLE_NOTIFIER = true;
const elixir = require('laravel-elixir');

var plugins = require('./npm/plugins');
var config = require('./npm/config');

require('./npm/elixir.extensions');
require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
        .copy(config.paths.plugins.img.in, config.paths.plugins.img.out)
        .copy(config.paths.plugins.template.in, config.paths.plugins.template.out)
        .bower(config.paths.plugins.bower, plugins.bower)
        .webpack('app.js')
        .sass('app.scss', 'public/assets/css/app.css')
        .styles([
            '../bower/sweetalert/dist/sweetalert.css',
            '../bower/animate.css/animate.min.css',
            '../bower/toastr/toastr.min.css',
            '../bower/bootstrap-toggle/css/bootstrap-toggle.min.css',
            ], 'public/assets/css/plugins.css')
        .scripts([
            'main.js',
        ], 'public/assets/js/main.js')
        .scripts([
            '../bower/AdminLTE/dist/js/app.min.js',
            '../bower/jquery-slimscroll/jquery.slimscroll.min.js',
            '../bower/sweetalert/dist/sweetalert.min.js',
            '../bower/toastr/toastr.min.js',
            '../bower/bootstrap-toggle/js/bootstrap-toggle.min.js',
          ], 'public/assets/js/app.js')
        .version([
            'assets/js/app.js',
            'assets/css/app.css',
        ]);
});

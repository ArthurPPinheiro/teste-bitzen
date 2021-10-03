const mix = require('laravel-mix');
const { max } = require('lodash');

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

// mix.copy('resources/assets/img', 'public/admin/img');
// mix.copy('resources/assets/fontawesome/webfonts', 'public/admin/webfonts');
// mix.copy('resources/assets/plugins/ckeditor', 'public/admin/ckeditor');

// mix.scripts([

//     'resources/assets/js/cropper.min.js',
//     'resources/assets/js/dropzone.js',
//     'resources/assets/js/jquery-3.1.0.min.js',
//     'resources/assets/plugins/pickadate/lib/picker.js',
//     'resources/assets/plugins/pickadate/lib/picker.date.js',
//     'resources/assets/plugins/taggle/src/taggle.js',
//     'resources/assets/plugins/jQuery/jquery-2.2.3.min.js',
//     'resources/assets/plugins/jQueryUI/jquery-ui.min.js',
//     'resources/assets/js/alertUtil.js',
//     // 'resources/assets/js/jquery.maskedinput.js',
//     // 'resources/assets/plugins/input-mask/jquery.inputmask.js',
//     // 'resources/assets/plugins/input-mask/jquery.maskMoney.min.js'

// ], 'public/admin/js/admin-header.js');

mix.copy('resources/assets/img', 'public/img');
// mix.copy('resources/assets/images', 'public/images');
// mix.copy('resources/assets/plugins', 'public/plugins');


mix.scripts([

    'resources/assets/js/core/popper.min.js',
    'resources/assets/js/core/bootstrap.min.js',

    'resources/assets/vendor/jquery/dist/jquery.min.js',
    'resources/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
    'resources/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js',
    'resources/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
    'resources/assets/vendor/chart.js/dist/Chart.min.js',
    'resources/assets/vendor/clipboard/dist/clipboard.min.js',

    // 'resources/assets/js/app.js',
    // 'resources/assets/js/argon.js',

    'resources/assets/js/components/charts/chart-bars.js',
    'resources/assets/js/components/charts/chart-line.js',
    'resources/assets/js/components/custom/form-control.js',
    'resources/assets/js/components/init/chart-init.js',
    'resources/assets/js/components/init/copy-icon.js',
    'resources/assets/js/components/init/navbar.js',
    'resources/assets/js/components/init/popover.js',
    'resources/assets/js/components/init/scroll-to.js',
    'resources/assets/js/components/init/tooltip.js',
    'resources/assets/js/components/maps/maps-default.js',

    'resources/assets/js/soft-ui-dashboard.js',
    // 'resources/assets/js/soft-ui-dashboard.js.map',
    'resources/assets/js/plugins/bootstrap-notify.js',
    'resources/assets/js/plugins/Chart.extension.js',
    'resources/assets/js/plugins/chartjs.min.js',
    'resources/assets/js/plugins/perfect-scrollbar.min.js',
    'resources/assets/js/plugins/smooth-scrollbar.min.js'

], 'public/adm/js/admin.js');

// mix.styles([
//     'resources/assets/css/home.css',
//     'resources/assets/css/home.css.map',
//     'resources/assets/css/style.css',
//     'resources/assets/css/style.css.map'
// ], 'public/css/template.css');

mix.styles([
    'resources/assets/css/nucleo-icons.css',
    'resources/assets/css/nucleo-svg.css',
    'resources/assets/css/soft-ui-dashboard.css',
    'resources/assets/css/soft-ui-dashboard.css.map',
    'resources/assets/css/soft-ui-dashboard.min.css',
], 'public/adm/css/soft-ui-dashboard.css');

mix.sass('resources/assets/scss/app.scss', 'public/adm/css/admin.css');

mix.js('resources/assets/js/app.js', 'public/js')
    // .postCss('resources/assets/css/app.css', 'public/css', [
    //     //
    // ])
    ;

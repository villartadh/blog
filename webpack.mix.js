const { mix } = require('laravel-mix');

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
mix.options({ processCssUrls: false });
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .less('node_modules/admin-lte/build/less/AdminLTE.less', 'public/admin/css')
   .less('node_modules/admin-lte/build/less/skins/skin-blue.less', 'public/admin/css')
   /*.copyDirectory('node_modules/admin-lte/dist/img', 'public/dist/img')
   .copy('node_modules/font-awesome/fonts', 'public/fonts')*/
   .styles([
		'public/admin/css/AdminLTE.css',
		'public/admin/css/skin-blue.css'
	], 'public/css/admin.css')
   .scripts([
		'node_modules/admin-lte/dist/js/app.min.js'
	], 'public/js/all.js');
   

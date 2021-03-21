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
    .sass('resources/css/app.scss', 'public/css')
    .sass('resources/css/findo/meanmenu.scss', 'public/findo/css')
    .sass('resources/css/findo/style.scss', 'public/findo/css')
    .sass('resources/css/findo/responsive.scss', 'public/findo/css')
    .options({
        processCssUrls: false,
        postCss: [
            require("@tailwindcss/jit"),
            require('postcss-import'),
            require('autoprefixer'),
        ],
    });

if (mix.inProduction()) {
    mix.version();
}

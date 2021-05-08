'use strict';

const mix = require('laravel-mix');
const webpack = require('webpack');
require('laravel-mix-imagemin');

const imagemin = require('imagemin-keep-folder');
const imageminMozjpeg = require('imagemin-mozjpeg');
const imageminPngquant = require('imagemin-pngquant');
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

// mix.setResourceRoot('../img/');
mix.setResourceRoot('/public/assets/');

mix.options({
   processCssUrls: false,
   purifyCss: false,
   extractVueStyles: false,
   imgLoaderOptions: {
     enabled: false
   }
 });

// imagemin(['public/assets/img/**/*.{jpg,png}'], {
//    plugins: [
//       imageminMozjpeg({quality: 50}),
//       imageminPngquant({
//          quality: [0.6, 0.8]
//       })
//    ]
//    }).then(files => {
// });

mix.scripts('public/assets/js/main.js', 'public/assets/js/main.min.js')
   .scripts('public/assets/js/main-en.js', 'public/assets/js/main-en.min.js')
   .scripts('public/assets/js/media.js', 'public/assets/js/media.min.js')
   .scripts('public/assets/js/plugins.js', 'public/assets/js/plugins.min.js')
   .sass('public/assets/css/style.scss', 'public/assets/css/style.css')
   .version()
   .sourceMaps(false)

mix.webpackConfig({
   plugins: [
      //@source https://github.com/moment/moment/issues/2373
   new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
   ]
});

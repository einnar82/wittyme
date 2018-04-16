let mix = require('laravel-mix');
const imageminMozjpeg = require("imagemin-mozjpeg");
const ImageminPlugin = require("imagemin-webpack-plugin").default;

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
   .options({
    processCssUrls: false
  })
  .webpackConfig({
    plugins: [
      new ImageminPlugin({
        test: /\.(jpe?g|png|gif|svg)$/i,
        plugins: [
          imageminMozjpeg({
            quality: 80
          })
        ]
      })
    ]
  });

const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig(webpack =>{
    return{
        resolve : {
            alias: {
                videojs: 'video.js',
                WaveSurfer: 'wavesurfer.js',
                RecordRTC: 'recordrtc'
            }
        },
        plugins: [
            new webpack.ProviderPlugin({
                videojs: 'video.js/dist/video.cjs.js',
                RecordRTC: 'recordrtc'
            })
        ]
    }
})


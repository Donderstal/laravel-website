const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const SassLintPlugin = require('sass-lint-webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');

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

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/client.js', 'public/js') 
    .copyDirectory('resources/docs', 'public/docs')
    .copyDirectory('resources/fonts', 'public/fonts')

    .sass('resources/sass/app.scss', 'public/css', {
        implementation: require('node-sass')
    })
    .sass('resources/sass/admin.scss', 'public/css', {
        implementation: require('node-sass')
    }).sourceMaps()
    .options({
        processCssUrls: false
    })
    .disableNotifications()
    .webpackConfig({
        devtool: "inline-source-map",
        plugins: [
            /* new CleanWebpackPlugin({
                cleanOnceBeforeBuildPatterns: ['public/img', 'public/fonts'],
                verbose: true
            }), */
            new CopyWebpackPlugin([{
                from: 'resources/img',
                to: 'img',
            }]),
            new ImageminPlugin({
                test: /\.(jpe?g|png|gif|svg)$/i,
                plugins: [
                    imageminMozjpeg({
                        quality: 80,
                    })
                ]
            }),
            // new SassLintPlugin()
        ]
    });

mix.version(['public/img', 'public/fonts']);
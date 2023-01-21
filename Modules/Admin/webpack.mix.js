const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();
mix.webpackConfig({
    output: {
        chunkFilename: 'vendor/admin/js/chunks/[name].js'
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname+'/../Panel/Resources/js/src'),
            '@modules.js':path.resolve(__dirname+"/../../resources/js/modules.js"),
            '@assets': path.resolve(__dirname+'/../Panel/Resources/assets'),
            '@sass': path.resolve(__dirname+'/../Panel/Resources/sass'),
            '@external_modules':path.resolve(__dirname, '../../Modules'),
            '@base_resources':path.resolve(__dirname+'/../Panel/resources/js'),
            '@node_modules':path.resolve(__dirname+'/../Panel/node_modules'),
            "@babel/runtime/regenerator":path.resolve(__dirname+'/../Panel/node_modules/@babel/runtime/regenerator'),
        }
    }
})

mix.js(__dirname + '/Resources/js/app.js', 'vendor/admin/js/app.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'vendor/admin/css/app.css');

// if (mix.inProduction()) {
//     mix.version();
// }



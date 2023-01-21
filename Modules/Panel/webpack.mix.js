const mix = require('./node_modules/laravel-mix');
const dotenvExpand = require('./node_modules/dotenv-expand');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
dotenvExpand(require('./node_modules/dotenv').config({ path: '../../.env'/*, debug: true*/}));
let tailwindcss = require('./node_modules/tailwindcss');
// mix
//     .setPublicPath("../../public/vendor/panel")
//     .sass('Resources/sass/app.scss', 'css').options({
//         postCss:[require('./node_modules/autoprefixer'), require('./node_modules/postcss-rtl')]
//     })
//     .postCss('Resources/assets/css/main.css', 'css', [
//         tailwindcss('tailwind.js'), require('postcss-rtl')()
//     ])
    // .options({
    //       postCss: [require('tailwindcss')]
    // })
    // .purgeCss();
mix
.setPublicPath("../../public/vendor/panel")
.webpackConfig({
    output: {
        // chunkFilename: 'js/chunk[name].js',
        // chunkFilename: (pathData) => {
        //     return ['app','vendor'].includes(pathData.chunk.name) ? '[name].js': 'vendor/panel/js/chunk.[name].js';
        // },
        publicPath:"/vendor/panel/"
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'Resources/js/src'),
            '@modules.js':path.resolve(__dirname+"/../../resources/js/modules.js"),
            '@assets': path.resolve(__dirname, 'Resources/assets'),
            '@sass': path.resolve(__dirname, 'Resources/sass'),
            '@external_modules':path.resolve(__dirname, '../../Modules'),
            '@base_resources':path.resolve(__dirname, '../../resources/js'),
            '@vuexy':path.resolve(__dirname, '../../resources/sass/vuexy'),
            '@node_modules':path.resolve(__dirname, 'node_modules'),
            // "vue": 'vue/dist/vue.js',
            // 'node_modules':path.resolve(__dirname, 'node_modules')
            "@babel/runtime/regenerator":path.resolve(__dirname, 'node_modules/@babel/runtime/regenerator'),
        }
    },
    plugins:[
        // new webpack.WatchIgnorePlugin([/.*\.php/,"Modules/Panel/"]),
        // new VuetifyLoaderPlugin({
        //     options: {}
        // })
        // new BundleAnalyzerPlugin()
        // new WebpackShellPlugin({onBuildStart:['gulp'], onBuildEnd:['']})
    ],
    // watchOptions: {
    //     ignored: ['Modules/Panel/public/**', 'node_modules/**']
    // }
})

mix.js('Resources/js/app.js', 'js')
    .extract([
        "apexcharts",
        "vue-apexcharts",
        'vue',
        'moment',
        // "apexcharts",
        // "vue-apexcharts",
        "vue-feather-icons",
        'vuex',
        "vuesax",
        "filepond",
        "filepond-plugin-file-validate-type",
        "filepond-plugin-image-crop",
        "filepond-plugin-image-edit",
        "filepond-plugin-image-exif-orientation",
        "filepond-plugin-image-preview",
        "filepond-plugin-image-resize",
        "secure-ls",
        "vue-quill-editor",
        "quill",
        "jalali-moment",
        "vuex-persistedstate",
        "vue-sweetalert2",
        "vue-progressbar",
        "vue-persian-datetime-picker",
        "idle-vue",
        "form-backend-validation",
        "@ag-grid-enterprise/menu",
        // "@ag-grid-community",
        "@ag-grid-enterprise/server-side-row-model",
        "@ag-grid-enterprise/set-filter"
    ]);


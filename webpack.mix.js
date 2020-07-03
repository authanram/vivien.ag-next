const mix = require('laravel-mix')

require('laravel-mix-tailwind')

mix
    .babelConfig({
        plugins: ['@babel/plugin-syntax-dynamic-import'],
    })

    .ts('resources/js/app.ts', 'public/js')

    .postCss('resources/css/app.pcss', 'public/css', [
        require('tailwindcss'),
        require('postcss-nested'),
        require('autoprefixer'),
    ])

    .tailwind('./tailwind.config.js')

    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.tsx?$/,
                    loader: 'ts-loader',
                    options: {appendTsSuffixTo: [/\.vue$/]},
                    exclude: /node_modules/,
                }
            ]
        },

        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'resources/js/'),
            },
            extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],
        }

    })

    .sourceMaps(false)

    .extract()

if (mix.inProduction()) {

    const ASSET_URL = process.env.ASSET_URL + "/"

    mix

        .webpackConfig(webpack => ({
            plugins: [new webpack.DefinePlugin({'process.env.ASSET_PATH': JSON.stringify(ASSET_URL)})],
            output: { publicPath: ASSET_URL },
        }))

        .version()

}

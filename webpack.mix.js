const mix = require('laravel-mix')

require('laravel-mix-tailwind')

mix
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

            extensions: ['.js', '.jsx', '.vue', '.ts', '.tsx'],
        }

    })

    .sourceMaps(false)

    .extract()

    .version()

const path = require('path')
const mix = require('laravel-mix')

mix.ts('resources/js/app.ts', 'public/js')
    .postCss('resources/css/app.pcss', 'public/css', [
        require('postcss-import'),
        require('postcss-nested'),
        require('tailwindcss'),
    ])
    .vue({ version: 2 })
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'resources/js/'),
            },

            extensions: ['.js', '.jsx', '.vue', '.ts', '.tsx'],
        }

    })
    .extract();

if (mix.inProduction()) {
    mix.version();
}

mix.sourceMaps(false, 'source-map');

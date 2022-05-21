const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/dist/js')
    .postCss('resources/css/app.pcss', 'public/dist/css', [
        require('tailwindcss/nesting'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .version();

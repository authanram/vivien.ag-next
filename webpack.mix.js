const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/dist/js');

if (mix.inProduction()) {
    mix.version();
}

mix.sourceMaps(false, 'source-map');

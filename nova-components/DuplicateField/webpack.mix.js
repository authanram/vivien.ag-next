let mix = require('laravel-mix')

mix
    .setPublicPath('dist')
    .js('resources/js/field.js', 'js')
    .postCss('resources/css/field.pcss', 'css', [
        require('postcss-import'),
        require('postcss-nested'),
    ])
    .vue();

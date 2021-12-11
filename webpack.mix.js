const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
    .copyDirectory('resources/images', 'public/images');

mix.browserSync({
    proxy: 'fivem-meos.test',
    host: 'fivem-meos.test',
    open: 'external',
    files: [
        'public/js/**/*',
        'public/css/**/*',
        'public/**/*.+(html|php)',
        'resources/views/**/*.php',
        'resources/lang/**/**.php'
    ],
});

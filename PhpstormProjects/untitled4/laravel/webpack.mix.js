const path = require("path");
const mix = require("laravel-mix");

// Rezolve Ziggy
mix.alias({
    ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue"),
});

// Build files
mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}

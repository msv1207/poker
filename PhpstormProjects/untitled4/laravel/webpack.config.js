const path = require('path');

mix.alias({
    ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue"),
});

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);
module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};

// const mix =require("laravel-mix");


// const tailwindcss = require('tailwindcss');





// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css')
//    .options({
//       processCssUrls: false,
//     //   postCss: [tailwindcss('./dashboard/asset/css/tailwind.config.js')],
//     postCss:[tailwindcss('./dashboard/asset/tailwind.config.js')],
//    });

// mix.webpackConfig({
//     stats: {
//       children: true,
//     },
//   });
// mix.js('resources/js/app.js','public/js').sass("resources/sass/app.scss",'public/css');
const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

// Compile JavaScript
mix.js('resources/js/app.js', 'public/js')

// Compile SASS
mix.sass('resources/sass/app.scss', 'public/css')
   .options({
        processCssUrls: false,
        postCss: [tailwindcss('tailwind.config.js')],
   });

// Webpack specific configurations
mix.webpackConfig({
    stats: {
        children: true,
    },
});

var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass([
    	'./resources/my/sass/app.scss'
    ], 'public/css/style.css');
    mix.scripts([
    	'./resources/jquery/dist/jquery.js',
    	'./resources/isotope/dist/isotope.pkgd.js',
    	'./resources/angular/angular.js',
    	'./resources/my/js/app.js'
    	//'./resources/my/js/isotope.js'
    ], 'public/js/script.js');
});

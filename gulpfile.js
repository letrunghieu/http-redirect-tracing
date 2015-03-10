var elixir = require('laravel-elixir');
var Q = require('q');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

function one() {
    var deferred = Q.defer();
    elixir(function (mix) {
        mix.sass()
                .coffee(['app.coffee'], 'resources/js')
                .scripts(['modernizr.js'], 'public/js/modernizr.js')
                .scripts(['jquery.js', 'bootstrap.js', 'app.js'], 'public/js/app.js')
                .copy('resources/assets/fonts', 'public/build/fonts');
        deferred.resolve();
    });
    return deferred.promise;
}

function two() {
    var deferred = Q.defer();
    elixir(function (mix) {
        mix.version([
            'css/app.css',
            'js/app.js',
            'js/modernizr.js'
        ]);
        deferred.resolve();
    });

    return deferred.promise;
}



one()
        .then(two)
        .done();

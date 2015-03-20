<!doctype html>
<html class="no-js" lang="{{ App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title or "HTTP Redirect tracer" }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {!! favicon(FAVICON_ENABLE_ALL, ['tile_color' => '#006D51']) !!}

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
        <script src="{{ elixir('js/modernizr.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header class="navbar navbar-default navbar-fixed-top" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ L10n::getLocalizedURL(null, '/') }}" class="navbar-brand">
                        @lang("app.name")
                    </a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="abouts">
                                @lang('app.about this app')
                            </a>
                        </li>
                        <li>
                            <a href="https://www.hieule.info">
                                hieule.info
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div id="container">
            <div class="container">
                @yield('content')
            </div>
        </div>

        <footer id="site-footer" class="text-center">

            <p class="languages">
                <?php
                $currentLocale = L10n::getCurrentLocale();
                foreach(L10n::getSupportedLocales() as $localeCode => $properties) 
                {
                    $localeUrl = L10n::getLocalizedURL($localeCode);
                    $langs[] = Html::link($localeUrl, $properties['native'], ['class' => ($currentLocale == $localeCode ? 'disabled' : ''), 'hreflang' => $localeCode, 'rel' => 'alternate']);
                }
                ?>

                {!! implode(' - ', $langs) !!}
            </p>
            
            <p>
            @lang('app.source code is released under AGPL license')
            - 
            <a href="https://github.com/letrunghieu/http-redirect-tracing">
            Github
            </a>
            </p>

        </footer>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>

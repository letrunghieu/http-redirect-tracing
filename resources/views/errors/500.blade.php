<html lang="{{L10n::getCurrentLocale()}}">
    <head>
        <meta charset="utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        <title>404 - @lang('app.errors.page not found')</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                color: #FFFFFF;
                background: #00D49F;
                display: table;
                font-family: 'Source Sans Pro', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
                overflow: hidden;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
                font-weight: 200;
            }
            .links {
                background: rgba(0, 109, 81, 0.33);
                float: left;
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }
            .links a {
                color: #FFFFFF;
                text-decoration: none;
                display: block;
                float: left;
                padding: 10px 15px;
                border-right: 1px solid #00D49F;
                transition: background 0.2s linear 0s;
            }
            .links a:last-child {
                border-right: none;
            }
            .links a:hover {
                background: #049B74;
            }
        </style>
    </head>
    <body class='page-error error-404'>
        <div class="container">
            <div class="content">
                <div class="title">
                    @lang('app.errors.there are somethings wrong')
                </div>
                <div class="links">
                    <a href="{{ URL::to('/') }}">
                        @lang('app.home page')
                    </a>
                    <a href="https://www.hieule.info">
                        hieule.info
                    </a>
                    <a href="#">
                        @lang('app.my cv')
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

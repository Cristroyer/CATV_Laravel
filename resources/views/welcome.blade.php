<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Intranet Catv</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            footer {
                position: relative;
                /*height: 10px;*/
                width: 100%;
                background-color: #fff;
            }

            p.copyright {
                position: absolute;
                width: 100%;
                color: #636b6f;
                line-height: 40px;
                font-size: 1em;
                text-align: center;
                bottom:0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>{{-- 
                        <a href="{{ route('register') }}">Registro</a> --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Catv
                </div>

                <div class="links">
                    {{-- <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://www.youtube.com/watch?v=EwqZgypiKYk&list=PLhCiuvlix-rSgQNLIl7Qg2KbQni3fz-ea&index=1">Roles y Permisos</a>
                    <a href="https://www.youtube.com/watch?v=naJklgh-ZLs&index=1&list=PLIddmSRJEJ0sxS-RmqdRMlkyWOQWvEGEt">Curso de Laravel</a>
                    <a href="https://www.youtube.com/watch?v=AwTiTrP3M7o&list=PLe30vg_FG4OTjUsNsjkGQF-Qco1HSgy13">Data Table</a>
                </div>
            </div>
        </div>
        <footer>
            <p class="copyright">© CATV 2018</p>
        </footer>
    </body>
</html>

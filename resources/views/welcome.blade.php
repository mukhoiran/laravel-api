<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel API
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                <hr>
                <ol>
                  <li>Configure DB on .env</li>
                  <li>Move User model to folder Models</li>
                  <li>Delete password migrate</li>
                  <li>Rename field name to username on user migrate</li>
                  <li>fillable username</li>
                  <li>php artisan migrate</li>
                  <li>Installing postman</li>
                  <li>create route group API</li>
                  <li>create AuthController</li>
                  <li>create function signup</li>
                  <li>Testing signup (header and body)</li>
                  <li>composer require tymon/jwt-auth:1.0.* --prefer-source</li>
                  <li>add tymon providers (2) on config/app.php</li>
                  <li>php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"</li>
                  <li>generate jwt token => php artisan jwt:secret</li>
                  <li>add JWT_SECRET on .env (token)</li>
                  <li>adjust User model path on config/jwt.php and auth.php</li>
                  <li>create route signin</li>
                  <li>add function signin on AuthController (get from docs)</li>
                  <li>Modify model User</li>
                  <li>Testing login (header and body)</li>
                  <li>Add middleware route on Kernel.php</li>
                  <li>create group routes jwt.auth</li>
                  <li>create userController@show</li>
                  <li>test access page profile</li>
                  <li>php artisan make:migration create_tutorials_table --create=tutorials</li>
                  <li>add fields title(string), slug(string)->unique, body(text), user_id(BigInteger)->unsigned() foreignkey,</li>
                  <li>create routes tutorial</li>
                  <li>create controller TutorialController</li>
                  <li>add function create on the controller</li>
                  <li>php artisan make:model Tutorial</li>
                  <li>set up the model belogsTo</li>
                  <li>set User modals hasMany</li>
                  <li>Test create tutorial</li>
                  <li>create routes show tutorial</li>
                  <li>change mothod create to store</li>
                  <li>add function index</li>
                  <li>add function show</li>
                  <li>test read tutorial</li>
                  <li>create routes update and delete</li>
                  <li> add function update and delete</li>
                  <li>test update and delete</li>
                  <li>create route post comment</li>
                  <li>create migration table comment</li>
                  <li>create controller and model for comment</li>
                  <li>add function store on comment controller</li>
                  <li>test posting comment</li>
                  <li>Create middleware Cors for avoid ajax cors issue</li>
                  <li>add middleware to kernel</li>
                  <li>modify tutorialController for show comments</li>
                  <li>Add Middleware Cors</li>
                </ol>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Notebook</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: url("site_images/hero-bg.jpg");
                background-size: cover;
                opacity: 0.9;
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

            .links > a {
                /*padding: 0 25px;*/
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .title-welcome
            {
                font-size: 28px;
                font-weight: bold;
                line-height: 38px;
                color: #825B4F;
            }

            .card-title
            {
                padding: 30px;
                margin-top: 22px;
                background-color: #AAADBF;
                border-radius: 5px;
            }

            .title-project
            {
                margin: 0 0 10px 0;
                font-size: 48px;
                font-weight: bold;
                text-transform: uppercase;
                color: #4F5359;
            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-dark">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-dark">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title-welcome">
                    <button class="btn btn-outline-dark">Welcome to NOTEBOOK</button>
                </div>
                <div class="card-title">
                    <p class="title-project">
                        where you can easily make notes
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
    <html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <style>
            body {
                font-family: "Lato", sans-serif;
            }

            .sidepanel  {
                width: 0;
                position: fixed;
                z-index: 1;
                height: 250px;
                top: 0;
                left: 0;
                background-color: #B8D477;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidepanel a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .sidepanel a:hover {
                color: #f1f1f1;
            }

            .sidepanel .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
            }

            .div-opnbtn
            {
                padding: 23px;
                background-color: #F6F4F4;
                display: flex;
                justify-content: space-between;
            }

            .openbtn {
                font-size: 20px;
                cursor: pointer;
                background-color: #B8D477;
                color: white;
                padding: 10px 15px;
                border: none;
            }

            .openbtn:hover {
                background-color:#444;
            }

            .hi
            {
                color: #B8D477;
            }

            .note
            {
                margin: 45px;
                padding: 23px;
                box-shadow: 2px 2px 4px 3px #B8D477;
            }

            .btn-outline-dark
            {
                margin-right: 13px;
            }

            .title
            {
                color: #B8D477;
            }

            .alert-div
            {
                margin-top: 46px;
                margin-left: 45px;
                background-color: #B8D477;
                color: #ffffff;
            }

        </style>
    </head>
    <body>

    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="{{url('/home')}}" class="nav-link active">Home</a>
        <a href="{{url('/create')}}">Create notes</a>
        <a href="{{url('/logout')}}">Logout</a>
    </div>

    <div class="div-opnbtn">
        <button class="openbtn" onclick="openNav()">☰</button>
        <h1 style="font-weight: bold">NOTEBOOK<img src="/site_images/note.png" style="width: 25px; margin-left: 7px"></h1>
        <p class="hi">hi <span style="font-size: 23px">{{Auth::user()->name}} {{Auth::user()->lastname}}</span></p>
    </div>
    <div class="container">
        @if(count($my_notes) == 0)
            <div class="alert alert-div" role="alert">
                <h3>You don't have any registrated notes yet!
                    You can registrate your notes by clicking on the top ' ☰ ' sign, selecting "Create notes" from the menu
                </h3>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            @foreach($my_notes as $note)
                    <div class="col-md-4 note">
                        <div class="container">
                            <form method="post" action="{{url('/delete/'.$note->id)}}">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col-md-12"><h4 class="title"><strong>{{$note->title}}</strong></h4></div>
                                </div>
                                <div class="row">
                                    <div class="offset-md-4"><p style="font-size: 11px"><i class="fas fa-clock"></i> {{$note->created_at}}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><p>{{$note->description}}</p></div>
                                </div>
                                <div class="row">
                                    <a href="{{url('/edit/'.$note->id)}}" class="btn btn-outline-dark">Edit</a>
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    {{$my_notes->links()}}



    <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }
    </script>

    </body>
    </html>

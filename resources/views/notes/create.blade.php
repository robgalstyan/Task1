
<!doctype html>
<html lang="en">
<head>
    <title>Create Notes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="jumbotron jumbotron-fluid">

    <div class="jumbotron jumbotron-fluid">
        <div class="offset-sm-4">
            <h1>Create your notes
                <img src="/site_images/note.png" style="width: 25px">
            </h1>
        </div>
        <div class="offset-sm-3 col-sm-6" style="margin-top: 40px">
            <form method="post" action="{{url('/store')}}" enctype="multipart/form-data">
                @csrf
                {{--                @method('PUT')--}}
                <div class="form-group">
                    <label for="name">Note Title:</label>
                    <i class="fas fa-file-signature"></i>
                    <input name="title" value="{{old('title')}}" type="text" class="form-control" id="title">
                    @if($errors->has('title'))
                        <div class="has-error alert alert-danger">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Note Description:</label>
                    <i class="fas fa-file-alt"></i>
                    <textarea name="description" value="{{old('description')}}"  type="text" class="form-control" id="description" rows="5"></textarea>
                    @if($errors->has('description'))
                        <div class="has-error  alert alert-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ url('home') }}">
                        <button type="button" class="btn btn-dark">Cancel</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

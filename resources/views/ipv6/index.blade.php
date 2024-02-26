<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error}} <br>
                @endforeach
            </div>
        @endif

        <form action="{{ route('validate.ip') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="">Ip Address</label>
                <input type="text" class="form-control" name="ip-address">
            </div>
            <div>
                <button class="btn btn-danger">Send</button>
            </div>
        </form>

    </div>
</body>
</html>
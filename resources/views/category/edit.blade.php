<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repository Pattern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <h1>Upadet Category</h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('categories.update',$category->id) }}">
                    @csrf
                    @method('put')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input class="form-control" type="text" id="name" name="name" value="{{ $category->name }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="text" id="email" name="email" value="{{ $category->email }}">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input class="form-control" type="text" id="phone" name="phone" value="{{ $category->phone }}">
    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Save</button>
    </div>                    
                      
                     
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
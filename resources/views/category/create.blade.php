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
        <h1>Add Category</h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input class="form-control @error('name') is-invalid          
        @enderror" type="text" id="name" name="name" placeholder="Name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input class="form-control @error('email') is-invalid          
        @enderror" type="text" id="email" name="email" placeholder="Email">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input class="form-control @error('phone') is-invalid          
        @enderror" type="text" id="phone" name="phone" placeholder="Phone">
        @error('phone')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- <div class="mb-3">
        <label for="photo_img" class="form-label">Image</label>
        <input type="file" class="form-control @error('photo_img') is-invalid          
        @enderror"  id="photo_img" name="photo_img" placeholder="image">
        @error('photo_img')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}

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
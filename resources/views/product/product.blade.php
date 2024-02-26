<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  </head>
    
  <body>

    <div class="container">
        <h1 class="text-center">Jquery and Ajax Search</h1>
        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</a>
        <input type="text" name="search" id="search" class="mb-3 mt-3 form-control w-75" placeholder="Search product...">

      <div class="table-data">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($product as $key => $item)
              <tr>
                <th >{{ $key+1 }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="" class="btn btn-success update_data_form" data-bs-toggle="modal" data-bs-target="#updateModal"
                    data-id="{{ $item->id }}"
                    data-name="{{ $item->name }}"
                    data-price="{{ $item->price }}"
                    ><i class="fa-solid fa-pen-to-square"></i></a>

                    <a href="" class="btn btn-danger delete_data"
                    data-id="{{ $item->id }}"
                    ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              @endforeach
             
             
            </tbody>
          </table>
          
            {{ $product->links() }}

      </div>
        
        
    </div>
    



    

    @include('product.add_product_modal')
    @include('product.product_js')
    {!! Toastr::message() !!}
  </body>
</html>
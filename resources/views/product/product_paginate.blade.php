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
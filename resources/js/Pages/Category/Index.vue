<script setup>

defineProps({
  categories : Object
});


</script>




<template>
 <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key=>$cat)
                  <tr>
                    <th >{{ $key+1 }}</th>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->email }}</td>
                    <td>{{ $cat->phone }}</td>
                    <td>
                        <a href="{{ route('categories.edit',$cat->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('categories.destroy',$cat->id) }}" method="POST"
                            onsubmit="return confirm('{{ trans('are You Sure ? ') }}');"
                            style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger"
                                value="Delete">
                        </form>
            
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              
        </div>
    </div>
</template>
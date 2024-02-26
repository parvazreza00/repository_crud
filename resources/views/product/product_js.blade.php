<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click','.add_product', function(e){
                e.preventDefault();
                let name = $('#name').val();
                let price = $('#price').val();
                // console.log(name + price);

                $.ajax({
                    url:"{{ route('add.product') }}",
                    method:'post',
                    data:{name:name, price:price},
                    success:function(res){
                        if(res.status == 'success'){
                            $('#exampleModal').modal('hide');
                            $('#addForm')[0].reset();
                            $('.table').load(location.href + ' .table');
                            Command: toastr["success"]("Product Inserted Successfully!")

                            toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                    },
                    error:function(err){
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value){
                            $('.errorMsgContainer').append('<span class="text-danger">' +value +'</span>'+'<br>');
                           
                        });
                    }
                })
            });
            // data update -------------------
            $(document).on('click', '.update_data_form', function(){
                let id = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');

                $('#uid').val(id);
                $('#uname').val(name);
                $('#uprice').val(price);

            });
            // update product data
            $(document).on('click','.update_product', function(e){
                e.preventDefault();
                let id = $('#uid').val();
                let name = $('#uname').val();
                let price = $('#uprice').val();
                // console.log(name + price);

                $.ajax({
                    url:"{{ route('update.product') }}",
                    method:'post',
                    data:{id:id, name:name, price:price},
                    success:function(res){
                        if(res.status == 'success'){
                            $('#updateModal').modal('hide');
                            $('#updateForm')[0].reset();
                            $('.table').load(location.href + ' .table');
                            Command: toastr["success"]("Product Updated Successfully!")

                            toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                    },
                   
                })
            });

             // delete product data
             $(document).on('click','.delete_data', function(e){
                e.preventDefault();
                let product_id = $(this).data('id');
                // console.log(product_id);
               if(confirm('Are you sure to delete Product?')){
                $.ajax({
                    url:"{{ route('delete.product') }}",
                    method:'get',
                    data:{product_id:product_id},
                    success:function(res){
                        if(res.status == 'success'){
                            
                            $('.table').load(location.href + ' .table');
                            Command: toastr["success"]("Product Deleted Successfully!")

                            toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                    },
                   
                })
               }

                
            });

            $(document).on('click','.pagination a', function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1]
                product(page);
            });

            function product(page){
                $.ajax({
                    url:"/pagination/pagination-data?page="+page,
                    success:function(res){
                        $('.table-data').html(res);
                    },

                });
            }

            $(document).on('keyup', function(e){
                e.preventDefault();
                let search_string = $('#search').val();
                // console.log(search_string);
                $.ajax({
                    url:"{{ route('search.product') }}",
                    method:'Get',
                    data:{search_string:search_string},
                    success:function(res){
                        $('.table-data').html(res);
                        if(res.status == 'No Data Found'){
                            $('.table-data').html('<span class="text-danger">'+'No Data Found'+'</span>');
                        }
                    }
                });
            });




        });
    </script>
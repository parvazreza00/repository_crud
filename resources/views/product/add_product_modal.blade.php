 
 
  <!-- product add Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <form action="" method="post" id="addForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                
                
                <button type="button" class="btn-close" id="closebtn" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- error message --}}
                <div class="errorMsgContainer">
    
                </div>

               <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
               </div>
               <div class="form-group my-3">
                <label for="">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter price">
               </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closebtn">Close</button>
                <button type="button" class="btn btn-primary add_product">Save Product</button>
              </div>
            </div>
          </div>
    </form>
  </div>

  <!-- product update Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    
    <form action="" method="post" id="updateForm">
        @csrf

        <input type="hidden" id="uid">

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Product</h1>
                
                
                <button type="button" class="btn-close" id="closebtn" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- error message --}}
                <div class="errorMsgContainer">
    
                </div>

               <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="uname" class="form-control" placeholder="Enter name">
               </div>
               <div class="form-group my-3">
                <label for="">Price</label>
                <input type="text" name="price" id="uprice" class="form-control" placeholder="Enter price">
               </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closebtn">Close</button>
                <button type="button" class="btn btn-primary update_product">Update Product</button>
              </div>
            </div>
          </div>
    </form>
  </div>
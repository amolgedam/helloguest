<form method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="Modal_addSku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
                SKU
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                 
                  <div class="col-lg-4 col-md-4">
                      <div>
                        <label>Product Category</label>
                      </div>
                      <div>
                        <input type="text" name="product_category" class="form-control">
                      </div>
                  </div>

                   <div class="col-lg-4 col-md-4">
                      <div>
                        <label>Product Sub-Category</label>
                      </div>
                      <div>
                        <input type="text" name="product_subcategory" class="form-control">
                      </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                      <div>
                        <label>SKU</label>
                      </div>
                      <div>
                        <input type="text" name="sku" class="form-control">
                      </div>
                  </div>

                   <div class="col-lg-4 col-md-4">
                      <div>
                        <label>Product Name</label>
                      </div>
                      <div>
                        <input type="text" name="product_name" class="form-control">
                      </div>
                  </div>

                   <div class="col-lg-4 col-md-4">
                      <div>
                        <label>GST % while Selling</label>
                      </div>
                      <div>
                        <input type="text" name="gst" class="form-control">
                      </div>
                  </div>

                  <br>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="save" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </div>
  </form>
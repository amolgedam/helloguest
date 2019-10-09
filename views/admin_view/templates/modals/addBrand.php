  <form method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="Modal_addBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
                Brand
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                 
                  <div class="col-lg-12 col-md-12">
                      <div>
                        <label>Brand Category</label>
                      </div>
                      <div>
                        <input type="text" name="brand_name" class="form-control">
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
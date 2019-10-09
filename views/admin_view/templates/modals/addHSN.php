<form method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="Modal_addHsn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
                HSN
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                 
                  <div class="col-lg-6 col-md-6">
                      <div>
                        <label>HSN Product Name</label>
                      </div>
                      <div>
                        <input type="text" name="product_name" class="form-control">
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                       <div>
                        <label>HSN Product Code</label>
                      </div>
                      <div>
                        <input type="text" name="product_code" class="form-control">
                        
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
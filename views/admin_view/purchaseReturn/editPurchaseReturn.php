
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Purchase Return
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Purchase Return</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
                  
                <div class="row">
                
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Purchase Return No</label>
                      <input type="text" name="preturn_no" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Purchase Return Date</label>
                      <input type="date" name="preturn_date" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Purchase Account</label>
                      <select name="paccount" class="form-control">
                        <option>---Select One---</option>
                      </select>
                    </div>
                  </div>

                   <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Account</label>
                      <select name="account" class="form-control">
                        <option>---Select One---</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Sale Type</label>
                      <select name="saletype" class="form-control">
                        <option>---Select One---</option>
                      </select>
                    </div>
                  </div>  
                 
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Division</label>
                      <select name="division" class="form-control">
                        <option>---Select One---</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Branch</label>
                      <select name="branch" class="form-control">
                        <option>---Select One---</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Location</label>
                      <select name="division" class="form-control">
                        <option>---Select One---</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Shipping Type</label>
                      <input type="text" name="shipping_type" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Payment Type</label>
                      <select name="purchase_type" class="form-control">
                        <option>---Select One---</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Base Total</label>
                      <input type="text" name="base_total" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Total Discount</label>
                      <input type="text" name="total_discount" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Gross Total</label>
                      <input type="text" name="gross_total" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Total Tax</label>
                      <input type="text" name="total_tax" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Adjustment(+/-)</label>
                      <input type="text" name="adjustment" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                      <label>Total Invoice Value</label>
                      <input type="text" name="total_invoice" class="form-control" readonly="">
                    </div>
                  </div>             
              </div>


              <hr>
              <div align="right">
                 <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_createLedger" class="btn btn-info">Create Ledger</a>
                 
                  <input type="submit" name="save" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url() ?>" class="btn btn-success">Save and Print</a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>


          <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped mydatatable">
                    <thead>
                      <tr>
                        <th>Product No</th>
                        <th>Qty</th>
                        <th>Conversion</th>
                        <th>Conversion</th>
                        <th>Base Price</th>
                        <th>Gross Price</th>
                        <th>GST</th>
                        <th>GST Amt</th>
                        <th>Salesman Comm.</th>
                        <th>Final Price</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>0000002717</td>
                        <td>2</td>
                        <td>2</td>
                        <td></td>
                        <td>2000</td>
                        <td>0.00</td>
                        <td>12%</td>
                        <td>1000</td>
                        <td>500</td>
                        <td>2500</td>
                        <td>GI-452-6001</td>
                        <td>Mens</td>
                        <td>T-Shirt</td>
                        <td>Sold</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>

        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <!--  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>




<!-- FOR SHIPPING MODAL OPEN -->
<?php
  // $this->load->view('admin_view/includes/modals/shippingType');
  $this->load->view('admin_view/includes/modals/createLedger');
?>
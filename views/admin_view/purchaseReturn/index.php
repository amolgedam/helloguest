
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Return
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase Return</li>
      </ol>
    </section>

<!-- view popup -->

            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-print"></i> Purchase Invoice</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                  <div class="col-md-4 col-xs-12 pull pull-left">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Supplier</label>
                      <div class="col-sm-7">
                        <input type="text" name="supplier" class="form-control" readonly>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Billing Date </label>
                      <div class="col-sm-7">
                        <input type="text" name="billing_date" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Invoice no</label>
                      <div class="col-sm-7">
                        <input type="text" name="invoice_no" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Payment Method</label>
                      <div class="col-sm-7">
                        <input type="text" name="showSalesType" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Transaction Type</label>
                      <div class="col-sm-7">
                        <input type="text" name="transaction_type" id="billdate" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Due Date</label>
                      <div class="col-sm-7">
                        <input type="text" name="salesman" id="billdate" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>

                  <br><br><br><br>
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:15%">Product</th>
                      <th style="width:10%">Size</th>
                      <th style="width:10%">HSN</th>
                      <th style="width:10%">GST(%)</th>
                      <th style="width:15%">Price</th>
                      <th style="width:10%">Quality</th>
                      <th style="width:15%">Tax</th>
                      <th style="width:15%">Total</th>
                    </tr>
                  </thead>
                   <tbody id="orderData">
                     
                   </tbody>
                </table>

                <div class="col-md-6 col-xs-12 pull pull-right">

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label">Sub Total</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="subtotal" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 40px;">
                    <label for="gst_amount" class="col-sm-5 control-label">Tax</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="tax" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 80px;">
                    <label for="discount" class="col-sm-5 control-label">Total</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="total" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 120px;">
                    <label for="net_amount" class="col-sm-5 control-label">Amount Paid</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="amoutn_paid" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 160px;">
                    <label for="net_amount" class="col-sm-5 control-label">Amount Due</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="amoutn_due" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 200px;">
                    <label for="net_amount" class="col-sm-5 control-label">Due Date</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="due_date" readonly>
                    </div>
                  </div>

                </div>

              </div>
         

              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
      
    </div>
  </div>
  
            <!-- / view popup -->



<!-- Edit popup -->

            <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-pencil-square"></i> Edit Purchase return Order</h4>
        </div>
        <div class="modal-body">
          <form role="form">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Amount</label>
                  <input type="text" class="form-control"  placeholder="">
                </div>


                  <div class="form-group">
                  <label for="exampleInputEmail1">Pay Amount</label>
                  <input type="text" class="form-control"  placeholder="">
                </div>
               
                <div class="form-group">
                  <label > Payment Method</label>
                  <select class="form-control">
                    <option>Card</option>
                    <option>Cash</option>                    
                  </select>
                </div>

               
               
                

              </div>
              <!-- /.box-body -->

              
                   </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg  fa-pencil-square-o" aria-hidden="true"></i> Update</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
      
    </div>
  </div>
  
            <!-- / Edit popup -->



    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No</th>
                      <th>Supplier Name</th>
                      <th>PO Invoice No.</th>
                      <th>Invoice Date</th>
                      <th>Transaction Type</th>
                      
                      <th>Due Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>sagar</td>
                      <td>123</td>
                      
                      <td>4/23/2019</td>
                      <td>xxx</td>
                      <td>04/07/2018</td>
                      <td>456</td>
                      <td><span class="label label-success">Active</span></td>
                      <td width="240px">
                        <a class="btn btn-sm btn-success"  title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal1">
                          <i style="color: white" class="fa fa-edit"></i> Edit
                        </a>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_deleteSKU" class="btn btn-sm btn-danger">
                          <i style="color: white" class="fa fa-trash"></i> Delete
                        </a>
                         
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
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


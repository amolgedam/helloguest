<!--< ?php echo "<pre>"; print_r($quantity); exit; ?>-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <i class="fa fa-tachometer"></i>
              Dashboard
            <small>Control panel</small>
        </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
    <!--  <div class="col-md-6">-->
    <!--    <div class="box box-info">-->
    <!--      <div class="box-header with-border">-->
    <!--        <h3 class="box-title">Amount To be Paid</h3>-->
            
    <!--      </div>-->
    <!--      <div class="box-body">-->
    <!--        <div class="table-responsive">-->
    <!--          <table class="table no-margin">-->
    <!--            <thead>-->
    <!--                <tr>-->
    <!--                  <th>Bill. No</th>-->
    <!--                  <th>Supplier Name</th>-->
    <!--                  <th>Due Amount</th>-->
    <!--                  <th>Bill Date</th>-->
    <!--                </tr>-->
    <!--            </thead>-->
    <!--            <tbody>-->
                   
    <!--                <?php foreach($paid as $rows): ?>-->
    <!--                 <tr>-->
    <!--                    <td>-->
    <!--                        <a onclick="viewPurchaseFunc(<?php echo $rows->invoice_no ?>)" title="View" data-toggle="modal" data-target="#myModal">-->
    <!--                          <?php echo $rows->invoice_no; ?>-->
    <!--                        </a>-->
    <!--                    </td>-->
    <!--                  <td><?php echo $rows->name; ?></td>-->
    <!--                  <td><?php echo $rows->dueamount; ?></td>-->
    <!--                  <td><?php echo $rows->billing_date; ?></td>-->
    <!--                   </tr>-->
    <!--                <?php endforeach; ?>-->
               
    <!--            </tbody>-->
    <!--          </table>-->
    <!--        </div>-->
    <!--      </div>-->
          
    <!--    </div>-->
        
    <!--</div>-->
    <!--<div class="col-md-6">-->
    <!--    <div class="box box-info">-->
    <!--      <div class="box-header with-border">-->
    <!--        <h3 class="box-title">Amount To be Received</h3>-->
    <!--      </div>-->
    <!--      <div class="box-body">-->
    <!--        <div class="table-responsive">-->
    <!--          <table class="table no-margin">-->
    <!--            <thead>-->
    <!--                <tr>-->
    <!--                  <th>Bill. No</th>-->
    <!--                  <th>Customer Name</th>-->
    <!--                  <th>Due Amount</th>-->
    <!--                  <th>Bill Date</th>-->
    <!--                </tr>-->
    <!--            </thead>-->
    <!--            <tbody>-->
    <!--            <tr>-->
    <!--                <?php foreach($received as $rows): ?>-->
    <!--                  <td>-->
    <!--                      <a onclick="viewFunc(<?php echo $rows->invoice_no ?>)" title="View" data-toggle="modal" data-target="#viewModal">-->
    <!--                        <?php echo $rows->invoice_no; ?>-->
    <!--                        </a>-->
    <!--                    </td>-->
    <!--                  <td><?php echo $rows->name; ?></td>-->
    <!--                  <td><?php echo $rows->dueamount; ?></td>-->
    <!--                  <td><?php echo $rows->billing_date; ?></td>-->
    <!--                <?php endforeach; ?>-->
    <!--            </tr>-->
    <!--            </tbody>-->
    <!--          </table>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
      
      <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Less Stock</h3>
            <!--<div class="box-tools pull-right">-->
            <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
            <!--  </button>-->
            <!--  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
            <!--</div>-->
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin mydatatable">
                <thead>
                    <tr>
                      <th>Sr. No</th>
                      <th>Product Name</th>
                      <th>Product Category</th>
                      <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php  $no=1; foreach($quantity as $rows): ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $rows->name; ?></td>
                      <td><?php echo $rows->cname; ?></td>
                      <td><?php echo $rows->quantity; ?></td>
                      </tr>
                    <?php $no++; endforeach; ?>
                
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- <div class="box-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
          </div> -->
        </div>
      </div>

      
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

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
  
  <!--  Purchase View -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
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
                        <input type="text" name="viewsupplier" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Billing Date </label>
                      <div class="col-sm-7">
                        <input type="text" name="viewbilling_date" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Invoice no</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewinvoice_no" id="pino" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Payment Method</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewpmethod" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;" id="tranType">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Transaction Type</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewpterm" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Due Date</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewduedate" class="form-control" readonly>
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
                      <th style="width:10%">Quantity</th>
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
                      <input type="text" class="form-control" name="viewsubtotal" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 40px;">
                    <label for="gst_amount" class="col-sm-5 control-label">Tax</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewtax" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 80px;">
                    <label for="discount" class="col-sm-5 control-label">Total</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewtotal" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 120px;">
                    <label for="net_amount" class="col-sm-5 control-label">Amount Paid</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewamoutn_paid" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 160px;">
                    <label for="net_amount" class="col-sm-5 control-label">Amount Due</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewamoutn_due" readonly>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        <div class="modal-footer">
            <a href="javascript:void(0)" id="editPurchaseInvoice" class="btn btn-sm btn-info">
              <i style="color: white" class="fa fa-edit"></i> Edit
            </a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
      
    </div>
  </div>
  
  
  <!--  for sales view -->
  
<form>
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-4 col-xs-12 pull pull-left">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Customer</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewcustomer" class="form-control" readonly>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Billing Date </label>
                      <div class="col-sm-7">
                        <input type="text" name="viewbilling_date" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Invoice no</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewinvoice_no" id="sid" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Payment Method</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewpmethod" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Transaction Type</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewtterm" id="billdate" class="form-control" readonly>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-4 col-xs-12 pull pull-left" style="margin-top: 5px;">
                    <div class="form-group">
                      <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Salesman</label>
                      <div class="col-sm-7">
                        <input type="text" name="viewsalesman" id="billdate" class="form-control" readonly>
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
                      <th style="width:10%">Tax</th>
                      <th style="width:10%">Discount</th>
                      <th style="width:10%">Total</th>
                    </tr>
                  </thead>
                   <tbody id="salesOrderData">
                     
                   </tbody>
                </table>

                <div class="col-md-6 col-xs-12 pull pull-right">

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label">Sub Total</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewsubtotal" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 40px;">
                    <label for="gst_amount" class="col-sm-5 control-label">Tax</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewtax" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 80px;">
                    <label for="discount" class="col-sm-5 control-label">Total</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewtotal" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 120px;">
                    <label for="net_amount" class="col-sm-5 control-label">Amount Paid</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewamoutn_paid" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 160px;">
                    <label for="net_amount" class="col-sm-5 control-label">Amount Due</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewdueamount" readonly>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 200px;">
                    <label for="net_amount" class="col-sm-5 control-label">Due Date</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="viewdue_date" readonly>
                    </div>
                  </div>

                </div>

              </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="printInvoice_no" id="printInvoice_no">
            <a href="javascript:void(0)" id="printInvoice" class="btn btn-sm btn-success">Print</a>
            <a href="javascript:void(0)" id="editSalesInvoice" class="btn btn-sm btn-info">
              <i style="color: white" class="fa fa-edit"></i> Edit
            </a>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?>.</strong> All rights reserved By <a href="https://weborbits.in">WEB ORBITS</a>
  </footer>
  
   <div class="control-sidebar-bg"></div>
  
  <script>
        var base_url = "<?php echo base_url(); ?>";
        
        $('#editPurchaseInvoice').on('click', function()
        {
            var pino = $('#pino').val();
            window.location = base_url + 'purchase_invoice/editInvoice/' + pino;
        });
        
        function viewPurchaseFunc(invoice_no)
        {
            // alert(invoice_no);
            if(invoice_no) {
              // alert(id);
               // var id = id;
                $.ajax({
                  url: base_url + 'purchase_invoice/invoiceData' ,
                  type: 'POST',
                  async : false,
                  data: { invoice_no:invoice_no }, 
                  dataType: 'json',
                  success:function(data) {
    
                    // console.log(data);
                    
                    if(data[0]['pterm'] == null)
                    {
                        $('#tranType').hide();    
                    }
                    
                    $('[name="viewsupplier"]').val(data[0]['sname']);
                    $('[name="viewbilling_date"]').val(data[0]['created']);
                    $('[name="viewinvoice_no"]').val(data[0]['invoice_no']);
                    $('[name="viewpmethod"]').val(data[0]['pmethod']);
                    $('[name="viewpterm"]').val(data[0]['pterm']);
                    $('[name="viewduedate"]').val(data[0]['due_date']);
    
                    $('[name="viewsubtotal"]').val(data[0]['total']);
                    $('[name="viewtax"]').val(data[0]['tax']);
                    $('[name="viewtotal"]').val(data[0]['gross_total']);
                    $('[name="viewamoutn_paid"]').val(data[0]['paidamount']);
                    $('[name="viewamoutn_due"]').val(data[0]['dueamount']);
    
                    var html = '';
                    var i;
                    for(i = 0; i<data[1].length; i++)
                    {
                      html += '<tr>'+
                                  '<td>'+ 
                                      '<input type="text" name="product" class="form-control" value="'+data[1][i]['pname']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="size" class="form-control" value="'+data[1][i]['sname']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="hsn" class="form-control" value="'+data[1][i]['hsn']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="gst" class="form-control" value="'+data[1][i]['gst']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="price" class="form-control" value="'+data[1][i]['pprice']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="qty" class="form-control" value="'+data[1][i]['qty']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="tax" class="form-control" value="'+data[1][i]['tax']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="total" class="form-control" value="'+data[1][i]['total']+'" readonly>'+
                                  '</td>'+
                              '</tr>';
                    }
                    $('#orderData').html(html);
    
                    // $('#myModal').modal('show');
                   // console.log(data);
                  }
                }); 
    
                return false;
            }
        }
        
        
        // for sales invoice
        
        $('#printInvoice').on('click', function(){

            var invoice_no = $('#printInvoice_no').val();
            // alert(invoice_no);
            window.location = base_url + "sales_invoice/printInvoice/" + invoice_no; 
        });
        
        $('#editSalesInvoice').on('click', function()
        {
            var sid = $('#sid').val();
            window.location = base_url + 'sales_invoice/update/' + sid;
        });
        
        function viewFunc(invoice_no)
        {
            // alert(invoice_no);
            // console.log(invoice_no);
            
            // var invoice_no = ('00000' + invoice_no).slice(-5);
            console.log(invoice_no);
            if(invoice_no) {
                
            //   alert(invoice_no);
               // var id = id;
                $.ajax({
                  url: base_url + 'sales_invoice/salesInvoiceData' ,
                  type: 'POST',
                  async : false,
                  data: {invoice_no:invoice_no}, 
                  dataType: 'json',
                  success:function(data) {
    
                    console.log(data);
                    $('[name="printInvoice_no"]').val(data[0]['invoice_no']);
                    $('[name="viewcustomer"]').val(data[0]['cname']);
                    $('[name="viewbilling_date"]').val(data[0]['billing_date']);
                    $('[name="viewinvoice_no"]').val(data[0]['invoice_no']);
                    $('[name="viewpmethod"]').val(data[0]['pmethod']);
                    $('[name="viewtterm"]').val(data[0]['pterm']);
                    $('[name="viewsalesman"]').val(data[0]['salesmanname']);
    
                    $('[name="viewsubtotal"]').val(data[0]['total']);
                    $('[name="viewtax"]').val(data[0]['tax']);
                    $('[name="viewtotal"]').val(data[0]['gross_total']);
                    $('[name="viewamoutn_paid"]').val(data[0]['paidamount']);
                    $('[name="viewdueamount"]').val(data[0]['dueamount']);
                    $('[name="viewdue_date"]').val(data[0]['due_date']);
    
                    var html = '';
                    var i;
                    for(i = 0; i<data[1].length; i++)
                    {
                      html += '<tr>'+
                                  '<td>'+ 
                                      '<input type="text" name="product" class="form-control" value="'+data[1][i]['pname']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="size" class="form-control" value="'+data[1][i]['sname']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="hsn" class="form-control" value="'+data[1][i]['hsn']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="gst" class="form-control" value="'+data[1][i]['gst']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="price" class="form-control" value="'+data[1][i]['sprice']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="qty" class="form-control" value="'+data[1][i]['qty']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="tax" class="form-control" value="'+data[1][i]['tax']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="discount" class="form-control" value="'+data[1][i]['discount']+'" readonly>'+
                                  '</td>'+
                                  '<td>'+ 
                                      '<input type="text" name="total" class="form-control" value="'+data[1][i]['total']+'" readonly>'+
                                  '</td>'+
                              '</tr>';
                    }
                    $('#salesOrderData').html(html);
    
                    // $('#myModal').modal('show');
                   // console.log(data);
                  }
                }); 
    
                return false;
            }
        } 
  </script>
</div>
<!-- ./wrapper -->

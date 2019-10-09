<!--< ?php echo "<pre>"; print_r($allData); exit; ?>-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales Invoice
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales Invoice</li>
      </ol>
    </section>

    <div style="padding: 10px;">
        <?php
            if($feedback = $this->session->flashdata('feedback'))
            {
                $feedback_class = $this->session->flashdata('feedback_class');
        ?>
                <div class="form-group col-12">
                    <div class="">
                        <div class="alert <?= $feedback_class?>">
                            <?= $feedback ?>
                        </div>
                    </div>
                </div>
        <?php }?>
    </div>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>

            <?php if(in_array('createSalesInvoice', $user_permission)): ?>
              <div style="float:right">
                <a href="<?php echo base_url() ?>sales_invoice/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Sales Invoice</a>
              </div>
            <?php endif; ?>


            <br><br>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr. No</th>
                      <th>Customer Name</th>
                      <th>Invoice No.</th>
                      <th>Invoice Date</th>
                      <th>Total</th>
                      <th>Transaction Type</th>
                      <!-- <th>Status</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($allData as $rows): ?>
                    
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo ucwords($rows->cname); ?></td>
                        <td><?php echo $rows->invoice_no; ?></td>
                        <td><?php echo $rows->billing_date; ?></td>
                        <td><?php echo $rows->gross_total; ?></td>
                        <td><?php echo $rows->pterm; ?></td>
                        <!-- <td><span class="label label-success">Hold</span></td> -->
                        <td width="340px">

                          <?php if(in_array('viewSalesInvoice', $user_permission)): ?>
                            <!--< ?php echo $rows->invoice_no; ?>-->
                            <!--<a class="btn btn-sm btn-success" onclick="viewFunc(< ?php echo $rows->invoice_no ?>); " title="View" ><i class="fa fa-eye" aria-hidden="true"></i> View</a>-->
                            <!--<a class="btn btn-sm btn-success" onclick="viewFunc(< ?php echo $rows->invoice_no ?>)" data-invoice_id="< ?php echo $rows->invoice_no ?>" title="View" data-toggle="modal" data-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i>< ?php echo $rows->invoice_no ?> View</a>-->
                          
                            <a class="btn btn-sm btn-success btnView" data-invoice_id="<?php echo $rows->invoice_no ?>" title="View" data-toggle="modal" data-target="#viewModal" ><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                          <?php endif; ?>


                          <?php if(in_array('updateSalesInvoice', $user_permission)): ?>
                            <a href="<?php echo base_url() ?>sales_invoice/update/<?php echo $rows->invoice_no; ?>" class="btn btn-sm btn-info">
                              <i style="color: white" class="fa fa-edit"></i> Edit
                            </a>
                          <?php endif; ?>


                          <?php if(in_array('deleteSalesInvoice', $user_permission)): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger paymentor_Delete" data-id="<?php echo $rows->invoice_no ?>"><i class="fa fa-trash"></i>Delete</a>
                          <?php endif; ?>
              
                            <a href="<?php echo base_url() ?>sales_invoice/printInvoice/<?php echo $rows->invoice_no ?>" target="_blank" class="btn btn-sm btn-info">
                              <i style="color: white" class="fa fa-trash"></i> Print
                            </a>  
                          <!-- <a href="#" class="btn btn-sm btn-info">
                            <i style="color: white" class="fa fa-edit"></i> Return
                          </a> -->
                        </td>
                      </tr>
                    <?php $no++; endforeach; ?>
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


  <!-- MODAL Edit-->
  <form role="form" action="<?php echo base_url('sales_invoice/deleteSalesInvoice') ?>" method="post" id="deleteForm">
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Unit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
              <div class="modal-body">
                <input type="hidden" id="id_edit" name="id_edit" >

                <strong>Are you sure to delete this record? <br><span style="color: red"> If you delete this record then Stock may vary</span></strong>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Delete</button>
              </div>
          </div>
        </div>
      </div>
  </form>


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
                        <input type="text" name="viewinvoice_no" class="form-control" readonly>
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
                      <!--<th style="width:10%">Size</th>-->
                      <th style="width:10%">HSN</th>
                      <th style="width:10%">GST(%)</th>
                      <th style="width:15%">Price</th>
                      <th style="width:10%">Quality</th>
                      <th style="width:10%">Tax</th>
                      <th style="width:10%">Discount</th>
                      <th style="width:10%">Total</th>
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
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    </form>


<script type="text/javascript">

    var base_url = "<?php echo base_url(); ?>";

    $('#printInvoice').on('click', function(){

        var invoice_no = $('#printInvoice_no').val();
        // alert(invoice_no);
        window.location = base_url + "sales_invoice/printInvoice/" + invoice_no; 
    });

     $('.paymentor_Delete').on('click', function(){

        var id = $(this).data('id');
        $('#deleteModal').modal('show');
        $('[name="id_edit"]').val(id);
    });
    
    $('.btnView').on('click', function(){
        
          var invoice_no = $(this).data('invoice_id');
        //   alert(invoice_number);
        
        
        // console.log(invoice_no);
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

                // console.log(data);
                $('[name="printInvoice_no"]').val(data[0]['invoice_no']);
                $('[name="viewcustomer"]').val(data[0]['name_id']);
                $('[name="viewbilling_date"]').val(data[0]['created']);
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
                            //   '<td>'+ 
                            //       '<input type="text" name="size" class="form-control" value="'+data[1][i]['sname']+'" readonly>'+
                            //   '</td>'+
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
                $('#orderData').html(html);

                $('#myModal').modal('show');
                
                // console.log('Modal Open');
               // console.log(data);
              }
            }); 

            // return false;
        }
    });

    function viewFunc(invoice_no)
    {
        // alert(invoice_no);
      
        // console.log(invoice_no);
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

                // console.log(data);
                $('[name="printInvoice_no"]').val(data[0]['invoice_no']);
                $('[name="viewcustomer"]').val(data[0]['name_id']);
                $('[name="viewbilling_date"]').val(data[0]['created']);
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
                            //   '<td>'+ 
                            //       '<input type="text" name="size" class="form-control" value="'+data[1][i]['sname']+'" readonly>'+
                            //   '</td>'+
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
                $('#orderData').html(html);

                $('#myModal').modal('show');
               // console.log(data);
              }
            }); 

            return false;
        }
    } 
</script>
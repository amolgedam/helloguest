
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Invoice
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase Invoice</li>
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
                      <!--<th style="width:10%">Size</th>-->
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
                  <!-- <div class="form-group" style="margin-top: 200px;">
                    <label for="net_amount" class="col-sm-5 control-label">Due Date</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="due_date" readonly>
                    </div>
                  </div> -->

                </div>

              </div>
          </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-success"><i class="fa fa-print"></i> Print</button> -->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- / view popup -->

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>

            <?php if(in_array('createPurchaseInvoice', $user_permission)): ?>
              <div style="float:right">
                <a href="<?php echo base_url() ?>purchase_invoice/addInvoice" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Purchase Invoice</a>
              </div>
            <?php endif; ?>


            <br><br>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No</th>
                      <th>Supplier Name</th>
                      <th>PO Invoice No.</th>
                      <th>Invoice Date</th>
                      <!-- <th>Transaction type</th> -->
                      <th>Due Date</th>
                      <th>Total</th>
                      <!-- <th>Status</th> -->
                      <?php if(in_array('viewPurchaseInvoice', $user_permission) || in_array('updatePurchaseInvoice', $user_permission) || in_array('deletePurchaseInvoice', $user_permission) ): ?>
                        <th>Action</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($allData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows->sname; ?></td>
                        <td><?php echo $rows->invoice_no; ?></td>
                        <td><?php echo $rows->billing_date; ?></td>
                        <!-- <td><?php echo $rows->pterm; ?></td> -->
                        <td><?php echo $rows->due_date; ?></td>
                        <td><?php echo $rows->gross_total; ?></td>
                        <!-- <td><span class="label label-success">Active</span></td> -->
                      <?php if(in_array('viewPurchaseInvoice', $user_permission) || in_array('updatePurchaseInvoice', $user_permission) || in_array('deletePurchaseInvoice', $user_permission) ): ?>

                        <td width="200px">

                          <?php if(in_array('viewPurchaseInvoice', $user_permission)): ?>
                            <a class="btn btn-sm btn-success" onclick="viewFunc(<?php echo $rows->invoice_no ?>)" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                          <?php endif; ?>


                          <?php if(in_array('updatePurchaseInvoice', $user_permission)): ?>
                            <a href="<?php echo base_url() ?>purchase_invoice/editInvoice/<?php echo $rows->invoice_no; ?>" class="btn btn-sm btn-info">
                              <i style="color: white" class="fa fa-edit"></i> Edit
                            </a>
                          <?php endif; ?>


                          <?php if(in_array('deletePurchaseInvoice', $user_permission)): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger paymentor_Delete" data-id="<?php echo $rows->invoice_no ?>"><i class="fa fa-trash"></i>Delete</a>
                          <?php endif; ?>

                         <!--  <a href="< ?php echo base_url() ?>purchase_invoice/deleteInvoice/< ?php echo $rows->invoice_no; ?>" class="btn btn-sm btn-danger">
                            <i style="color: white" class="fa fa-trash"></i> Delete
                          </a> -->

                          <!-- <a href="#" class="btn btn-sm btn-info">Return</a> -->
                        </td>
                          <?php endif; ?>
                        
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
  <form role="form" action="<?php echo base_url('purchase_invoice/deleteInvoice') ?>" method="post" id="deleteForm">
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

<script type="text/javascript">

    var base_url = "<?php echo base_url(); ?>";

     $('.paymentor_Delete').on('click', function(){

        var id = $(this).data('id');
        $('#deleteModal').modal('show');
        $('[name="id_edit"]').val(id);
    });

    function viewFunc(invoice_no)
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
</script>
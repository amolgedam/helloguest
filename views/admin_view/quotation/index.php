
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Quotation
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Quptation</li>
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
                          <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Quotation Date </label>
                          <div class="col-sm-7">
                            <input type="text" name="viewbilling_date" class="form-control" readonly>
                          </div>
                        </div>
                        <br>
                      </div>
                      <div class="col-md-4 col-xs-12 pull pull-left">
                        <div class="form-group">
                          <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Quotation no</label>
                          <div class="col-sm-7">
                            <input type="text" name="viewinvoice_no" class="form-control" readonly>
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

                    </div>

                  </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="printInvoice_no" id="printInvoice_no">
                <a href="javascript:void(0)" id="printInvoice" class="btn btn-sm btn-success">Print</a>
                <!-- <a href="#" class="btn btn-sm btn-success">Print</a> -->
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </form>
           
  
    <!-- / view popup -->



    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>

            <?php if(in_array('createQuotation', $user_permission)): ?>
              <div class="box-header" style="float:right">
                <a href="<?php echo base_url() ?>quotation/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                      <th>Quotation Date</th>
                      <th>Quotation Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($allData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->date; ?></td>
                        <td><?php echo $rows->invoice_no; ?></td>
                        <td width="270px">
                      
                          <?php if(in_array('viewQuotation', $user_permission)): ?>
                            <a class="btn btn-sm btn-success" onclick="viewFunc(<?php echo $rows->invoice_no ?>)" title="View" data-toggle="modal" data-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                          <?php endif; ?>

                          
                          <?php if(in_array('updateQuotation', $user_permission)): ?>
                            <a href="<?php echo base_url() ?>quotation/update/<?php echo $rows->invoice_no ?>" class="btn btn-sm btn-info">
                              <i style="color: white" class="fa fa-edit"></i> Edit
                            </a>
                          <?php endif; ?>

                          <?php if(in_array('deleteQuotation', $user_permission)): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger paymentor_Delete" data-id="<?php echo $rows->invoice_no ?>"><i class="fa fa-trash"></i>Delete</a>
                          <?php endif; ?>


                          <a href="<?php echo base_url() ?>quotation/printInvoice/<?php echo $rows->invoice_no ?>" target="_blank" class="btn btn-sm btn-info">
                            <i style="color: white" class="fa fa-trash"></i> Print
                          </a> 
                            
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
  <div class="control-sidebar-bg"></div>

</div>


  <!-- MODAL Edit-->
  <form role="form" action="<?php echo base_url('quotation/deleteQuotation') ?>" method="post" id="deleteForm">
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

                <strong>Are you sure to delete this record?</strong>
               
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

     $('#printInvoice').on('click', function(){

        var invoice_no = $('#printInvoice_no').val();
        // alert(invoice_no);
        window.location = base_url + "quotation/printInvoice/" + invoice_no; 
    });

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
              url: base_url + 'quotation/viewQuoation' ,
              type: 'POST',
              async : false,
              data: { invoice_no:invoice_no }, 
              dataType: 'json',
              success:function(data) {

                // console.log(data);
                $('[name="printInvoice_no"]').val(data[0]['invoice_no']);

                $('[name="viewcustomer"]').val(data[0]['name']);
                $('[name="viewbilling_date"]').val(data[0]['date']);
                $('[name="viewinvoice_no"]').val(data[0]['invoice_no']);

                $('[name="viewsubtotal"]').val(data[0]['subtotal']);
                $('[name="viewtax"]').val(data[0]['tax']);
                $('[name="viewtotal"]').val(data[0]['total']);

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
                $('#orderData').html(html);

                $('#myModal').modal('show');
               // console.log(data);
              }
            }); 

            return false;
        }
    } 
</script>
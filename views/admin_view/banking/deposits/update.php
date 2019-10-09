
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i> Update Deposits

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Deposits</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <!--  -->
              <div class="row">
  <div class="col-md-12">

    <?php echo validation_errors(); ?>

    <form role="form" action="<?php echo base_url('deposits/updateDeposits') ?>" enctype="multipart/form-data" method="post">
          <div class="tile">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >Account Holder Name</label>
                      <input type="hidden" name="editid" class="form-control" value="<?php echo $depositeData['depositid'] ?>" readonly="">
                      <input type="hidden" name="edit_acid" value="<?php echo $depositeData['acid'] ?>"  class="form-control" readonly="">
                      <input type="text" name="edit_name" value="<?php echo $depositeData['holdername'] ?>"  class="form-control" readonly="">
                    </div> 
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >Account Number</label>
                        <input type="text" class="form-control" name="edit_no" value="<?php echo $depositeData['acno'] ?>" readonly placeholder="Enter Date">
                    </div>
                 </div>
                 
                
                 <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >Amount</label>
                      <input type="text" class="form-control" value="<?php echo $depositeData['amount'] ?>"  name="edit_amount" placeholder="Enter Amount">
                      <input type="hidden" class="form-control" value="<?php echo $depositeData['amount'] ?>"  name="old_amount" placeholder="Enter Amount">
                    </div>
                 </div>

                 <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >Payment Method</label>
                      <select name="payment_method" class="form-control">
                        <?php foreach($paymentmethod as $rows): ?>
                          <option value="<?php echo $rows->id; ?>" <?php echo ($depositeData['pmethod'] == $rows->id) ? "selected" : "" ; ?> ><?php echo $rows->name; ?></option>
                        <?php endforeach; ?>
                      </select>               
                    </div>
                 </div>
               
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                   <div class="form-group">
                  <label >Reference</label>
                  <input type="text" name="edit_reference" value="<?php echo $depositeData['reference'] ?>"  class="form-control" >
                </div>
              </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                 <div class="form-group">
                  <label>Attachment</label>
                  <input type="file" name="file" class="form-control" >
                </div>
              </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                   <label >Description</label>
                  <textarea name="description" class="form-control" placeholder="Enter Description"><?php echo $depositeData['deposit_desc'] ?></textarea>
                  </div>
                 </div>

            </div>
          </div>
              <br><br>
            <hr>
            <div style="float: right;">
            <a href="<?php echo base_url() ?>deposits" class="btn btn-danger">Cancel</a>
              
              <button type="submit" name="submit" id="demoNotify" class="btn btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
        </div>
      </form> 
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

<!-- FOR SHIPPING MODAL OPEN -->

<!-- < ?php
  $this->load->view('admin_view/includes/modals/shippingType');
  $this->load->view('admin_view/includes/modals/createLedger');
?> -->


<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";

  $('#accountholder').on('blur', function(){

      // alert('hi');
      var accountholderID = $(this).val();
      // alert(accountholderID);
      $.ajax({
              type : "POST",
              url  : base_url + 'banking/holderData',
              dataType : "JSON",
              data : {accountholderID:accountholderID},
              success: function(data){
                  // alert(data);
                  // console.log(data);
                  $('#account_id').val(data['id']);
                  $('#number').val(data['ac_number']);
                  $('#pre_amt').val(data['amt']);
              }
          });
  });

   $('.editData').on('click', function(){

        var id = $(this).data('id');
        var acid = $(this).data('acid');
        var name = $(this).data('name');
        var no = $(this).data('no');
        var description = $(this).data('desc');
        var amount = $(this).data('amt');
        var pmethod = $(this).data('pmethod');
        var cheque_no = $(this).data('cheque_no');
        var reference = $(this).data('reference');
        // alert(pmethod);
        $('#myModal1').modal('show');
        // alert(status);
        $('[name="editid"]').val(id);
        $('[name="edit_acid"]').val(acid);
        $('[name="edit_name"]').val(name);
        $('[name="edit_no"]').val(no);
        $('[name="edit_description"]').val(description);
        $('[name="edit_amount"]').val(amount);
        $('[name="edit_payment_method"]').val(pmethod);
        $('[name="edit_cheque_no"]').val(cheque_no);
        $('[name="edit_reference"]').val(reference);

    });

  $('.deleteData').on('click', function(){

        var id = $(this).data('id');
        // alert(id);
        $('#deleteWaiterModal').modal('show');
        $('[name="id_edit"]').val(id);
    });
</script>
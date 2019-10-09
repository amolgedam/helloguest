<!--< ?php echo "<pre>"; print_r($allData); echo "</pre"; exit; ?>-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i> Update Expences

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Expences</li>
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

    <form role="form" action="<?php echo base_url('expences/updateExpences') ?>" enctype="multipart/form-data" method="post">
          <div class="tile">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1"><span style="color:red">*</span>Name</label>
                      <input type="text" class="form-control" name="expensename" value="<?php echo set_value('expensename', $expencesData['name']); ?>" placeholder="Enter full name" readonly>

                      <input type="hidden" name="id" value="<?php echo set_value('id', $expencesData['id']); ?>">
                    </div>
                 </div>
                 
                 <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Date</label>
                      <input type="date" class="form-control" name="date" value="<?php echo set_value('date', $expencesData['date']); ?>" placeholder="Enter email address" readonly>
                    </div>
                 </div>

                 <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Amount</label>
                      <input type="number" min="1" class="form-control" name="amount" value="<?php echo set_value('amount', $expencesData['amount']); ?>" placeholder="Enter email address" readonly>
                    </div>
                 </div>
                 
                 <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label class="control-label">Expences Category<span style="color:red">*</span></label> 
                    <select name="expences_cat" class="form-control">
                      <?php foreach($allData as $rows): ?>
                        <option value="<?php echo $rows->id; ?>" <?php echo $expencesData['expcat_id'] == $rows->id ? "Selected" : ""; ?> ><?php echo $rows->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" name="methodname" id="methodname"> -->
                  </div>
                 </div>

                 <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label class="control-label">Payment Method</label> 
                    <select name="payment_method" id="payment_method" class="form-control">
                      <?php foreach($paymentmethod as $rows): ?>
                        <option value="<?php echo $rows->id; ?>" <?php echo $expencesData['payment_method'] ==  $rows->id ? "selected" : "" ; ?> ><?php echo $rows->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                 </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12" id="chequeDiv" style="<?php echo ($expencesData['cheque_no'] == "" ?  '".display: none."' : ""); ?>">
                  <div class="form-group">
                  <label class="control-label">Cheque No/Cash</label> 
                <input type="text" name="cheque_no" placeholder="Cheque No/Cash" value="<?php echo set_value('cheque_no', $expencesData['cheque_no']) ?>" class="form-control">
                </div>
              </div>
                <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group">
                  <label class="control-label">Reference</label> 
                <input type="text" name="reference" value="<?php echo set_value('cheque_no', $expencesData['reference']) ?>" class="form-control">
                </div>
              </div>
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label class="control-label">Attachment</label> 
                  <input type="file" name="file">
                </div>
              </div>
        

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" name="description" placeholder="Enter Description"><?php echo set_value('description', $expencesData['description']); ?></textarea>
                </div>
             </div>
            </div>
          </div>
              <br><br>
            <hr>
            <div style="float: right;">
            <a href="<?php echo base_url() ?>expences" class="btn btn-danger">Cancel</a>
              
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

  $('#payment_method').on('change', function(){

      var pmethod_id = $(this).val();
      
      $.ajax({

          url: base_url + 'payment_method/fecthDataByID',
          type: 'post',
          data: {pmethod_id : pmethod_id},
          dataType:'json',
          success:function(response) {

            if(response.name == 'cheque')
            {
                $('#chequeDiv').show();
            }
            else
            {
                $('#chequeDiv').hide();

            }
          }
      });
  });
 
</script>
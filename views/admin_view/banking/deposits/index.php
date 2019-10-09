<!-- < ?php print_r($depositsData); exit(); ?> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bank" aria-hidden="true"></i> Bank Accounts Deposits
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bank Accounts Deposits</li>
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

            <?php if(in_array('createBankDeposit', $user_permission)): ?>
              <div class="box-header">
                <a href="<?php echo base_url() ?>deposits/create" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                <!-- <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New</a> -->
              </div>
            <?php endif; ?>
            

<form role="form" action="<?php echo base_url('deposits/create') ?>" enctype="multipart/form-data" method="post" id="createForm">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Create Account Deposit</h4>
        </div>
        <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label >Account Holder Name </label>
                  <select name="accountholder" id="accountholder" class="form-control">
                    <?php foreach($allData as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo ucwords($rows->name); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              
                <div class="form-group">
                  <label >Account Number</label>
                  
                  <input type="text" class="form-control" id="account_id" name="account_id" placeholder="Enter Account Number" autocomplete="off" readonly="">
                  <input type="text" class="form-control" id="number" name="number" placeholder="Enter Account Number" autocomplete="off" readonly="">
                </div>

                <div class="form-group">
                  <label >Description</label>
                  <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                  <label >Amount</label>
                  <input type="hidden" name="pre_amt" id="pre_amt" class="form-control" required placeholder="Enter Amount">
                  <input type="text" name="amount" class="form-control" required placeholder="Enter Amount">
                </div>

                <!-- <div class="form-group">
                  <label >Category</label>
                  <select class="form-control">
                    <option>Select one</option>
                    
                  </select>               
                </div> -->

                <div class="form-group">
                  <label >Payment Method</label>
                  <select name="payment_method" class="form-control">
                    <?php foreach($paymentmethod as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                  </select>               
                </div>

                 <div class="form-group">
                  <label>Reference</label>
                  <input type="text" name="reference" class="form-control" >
                </div>

                <div class="form-group">
                  <label>Attachment</label>
                  <input type="file" name="file" class="form-control" >
                </div>
              </div>
              <!-- /.box-body -->

                   </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save Changes</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
           
        </div>
      </div>
      
    </div>
  </div>
</form>
  
<form role="form" action="<?php echo base_url('deposits/update') ?>" method="post" id="deleteForm">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Account Deposit</h4>
        </div>
        <div class="modal-body">
          <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label >Account Holder Name</label>
                  <input type="hidden" name="editid" class="form-control" readonly="">
                  <input type="hidden" name="edit_acid" class="form-control" readonly="">
                  <input type="text" name="edit_name" class="form-control" readonly="">
                </div>
                
                <div class="form-group">
                  <label >Account Number</label>
                  
                  <input type="text" class="form-control" name="edit_no" readonly placeholder="Enter Date">
                </div>
                
                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" name="edit_description" placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                  <label >Amount</label>
                  <input type="text" class="form-control" name="edit_amount" placeholder="Enter Amount">
                  <!-- <input type="text" class="form-control" name="amount" placeholder="Enter Amount"> -->
                </div>

               <!--  <div class="form-group">
                  <label >Category</label>
                  <select class="form-control">
                    <option>Select one</option>
                    
                  </select>               
                </div> -->

                <div class="form-group">
                  <label >Payment Method</label>
                   <select name="edit_payment_method" class="form-control">
                    <?php foreach($paymentmethod as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                  </select>               
                </div>

                 <div class="form-group">
                  <label >Reference</label>
                  <input type="text" name="edit_reference" class="form-control" >
                </div>

                <div class="form-group">
                  <label>Attachment</label>
                  <input type="file" name="file" class="form-control" >
                </div>
              </div>
              <!-- /.box-body -->
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save Changes</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
</form>

  <form role="form" action="<?php echo base_url('deposits/delete') ?>" method="post" id="deleteForm">
      <div class="modal fade" id="deleteWaiterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
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

   

  
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Account Holder Name</th>
                      <th>Account Number</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Date Time</th>

                      <?php if(in_array('updateBankDeposit', $user_permission) || in_array('deleteBankDeposit', $user_permission)): ?>
                        <th>Manage</th>
                      <?php endif; ?>

                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=1; foreach($depositsData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows->holdername; ?></td>
                        <td><?php echo $rows->acno; ?></td>
                        <td><?php echo $rows->deposit_desc; ?></td>
                        <td><?php echo $rows->amount; ?></td>
                        <td><?php echo $rows->created; ?></td>
                      <?php if(in_array('updateBankDeposit', $user_permission) || in_array('deleteBankDeposit', $user_permission)): ?>

                        <td width="170px">

                          <?php if(in_array('updateBankDeposit', $user_permission)): ?>
                            <a href="<?php echo base_url() ?>deposits/update/<?php echo $rows->depositid ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>
                          <?php endif; ?>

                          <!-- <a href="javascript:void(0);" class="btn btn-sm btn-info editData" data-id="< ?php echo $rows->depositid ?>" data-acid="< ?php echo $rows->acid ?>" data-name="< ?php echo $rows->holdername; ?>" data-no="< ?php echo $rows->acno; ?>" data-desc="< ?php echo $rows->deposit_desc; ?>" data-amt="< ?php echo $rows->amount; ?>" data-pmethod="< ?php echo $rows->deposit_desc; ?>" data-reference="< ?php echo $rows->reference; ?>">
                            <i style="color: white" class="fa fa-edit"></i> Edit
                          </a> -->

                          <!--
                          < ?php if(in_array('deleteBankDeposit', $user_permission)): ?>
                              <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteData" data-id="< ?php echo $rows->depositid ?>"><i class="fa fa-trash"></i>Delete</a> 
                          < ?php endif; ?>

                          -->

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
  
  <div class="control-sidebar-bg"></div>

</div>

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
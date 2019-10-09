
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bank" aria-hidden="true"></i> Bank Accounts
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bank Accounts</li>
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


            <?php if(in_array('createBankAccount', $user_permission)): ?>
              <div class="box-header">
                <a href="<?php echo base_url() ?>banking/createAccount" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                <!-- <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New</a> -->
              </div>
            <?php endif; ?>
            

            <!-- popup -->
<form role="form" action="<?php echo base_url('banking/createAccount') ?>" method="post">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Create Bank Account</h4>
        </div>
        <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Account Holder Name</label>
                  <input type="text" class="form-control" name="name"  placeholder="Enter Account Name">
                </div>
                <div class="form-group">
                  <label >Account Type</label>
                  <select name="type" class="form-control">
                    <option value="saving">Saving Account</option>
                    <option value="current">Current Account</option>
                    <option value="cheking">Checking Account</option>
                    <option value="deposite">Deposit Account</option>
                  </select>
                </div>
                <div class="form-group">
                  <label >Account Number</label>
                  <input type="text" name="number" class="form-control" required placeholder="Enter Account Number">
                </div>
                <div class="form-group">
                  <label >Bank Name</label>
                  <input type="text" name="bank_name" class="form-control" required placeholder="Enter Bank Name">
                </div>
                <div class="form-group">
                  <label >Opening Balance</label>
                  <input type="number" name="opening_balance" required="" class="form-control" placeholder="0">
                </div>
                <div class="form-group">
                  <label >Bank Address</label>
                  <textarea class="form-control" name="address" placeholder="Enter Bank Address"></textarea>
                </div>
                <div class="form-group">
                  <label >IFSC Code</label>
                  <input type="text" name="ifsc_code" class="form-control" >
                </div>
                <div class="form-group">
                  <label >Default Account</label>
                  <select name="default_account" class="form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>               
                </div>
              </div>
       </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save Changes</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>
  
<form role="form" action="<?php echo base_url('banking/updateAccount') ?>" method="post">

  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Bank Account</h4>
        </div>
        <div class="modal-body">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Account Holder Name</label>
                  <input type="text" name="edit_name" class="form-control"  placeholder="Enter Account Name">
                  <input type="hidden" name="edit_id" class="form-control"  placeholder="Enter Account Name">
                </div>

                <div class="form-group">
                  <label >Account Type</label>
                  <select name="edit_type" class="form-control">
                    <option value="saving">Saving Account</option>
                    <option value="current">Current Account</option>
                    <option value="cheking">Checking Account</option>
                    <option value="deposite">Deposit Account</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label >Account Number</label>
                  <input type="text" name="edit_ac_number" class="form-control"  placeholder="Enter Account Number">
                </div>

                <div class="form-group">
                  <label >Bank Name</label>
                  <input type="text" name="edit_bank_name" class="form-control"  placeholder="Enter Bank Name">
                </div>

                <div class="form-group">
                  <label >Opening Balance</label>
                  <input type="number" name="edit_opbalance" class="form-control" placeholder="0">
                </div>

                <div class="form-group">
                  <label >Bank Address</label>
                  <textarea name="edit_address" class="form-control" placeholder="Enter Bank Address"></textarea>
                </div>

                <div class="form-group">
                  <label >IFSC Code</label>
                  <input name="edit_ifsc" type="text" class="form-control" >
                </div>

                <div class="form-group">
                  <label >Default Account</label>
                  <select name="edit_default_ac" class="form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>               
                </div>

              </div>
              <!-- /.box-body -->

              
                   </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>

 <form role="form" action="<?php echo base_url('banking/deleteAccount') ?>" method="post" id="deleteForm">
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
                      <th>Bank Name</th>
                      <th>Bank Address</th>
                      <th>Amount</th>
                      
                      <?php if(in_array('updateBankAccount', $user_permission) || in_array('deleteBankAccount', $user_permission)): ?>
                        <th>Manage</th>
                      <?php endif; ?>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($allData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo ucwords($rows->name); ?></td>
                        <td><?php echo $rows->ac_number; ?></td>
                        <td><?php echo ucwords($rows->bank_name); ?></td>
                        <td><?php echo ucwords($rows->address); ?></td>
                        <td><?php echo $rows->amt; ?></td>
                      <?php if(in_array('updateBankAccount', $user_permission) || in_array('deleteBankAccount', $user_permission)): ?>

                        <td width="170px">

                          <?php if(in_array('updateBankAccount', $user_permission)): ?>
                            <a href="<?php echo base_url() ?>banking/updateAccount/<?php echo $rows->id ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>
                          <?php endif; ?>

                          <!-- <a href="javascript:void(0);" class="btn btn-sm btn-info editData" data-id="< ?php echo $rows->id ?>" data-name="< ?php echo $rows->name ?>" data-type="< ?php echo $rows->type ?>" data-ac_number ="< ?php echo $rows->ac_number?>" data-bank_name="< ?php echo $rows->bank_name ?>" data-opening_balance="< ?php echo $rows->opening_balance ?>" data-amt="< ?php echo $rows->amt?>" data-address="< ?php echo $rows->address ?>" data-ifsc="< ?php echo $rows->ifsc ?>" data-default_ac="< ?php echo $rows->default_ac ?>" ><i class="fa fa-pencil"></i>Edit</a> -->

                          <!-- < ?php if(in_array('deleteBankAccount', $user_permission)): ?> -->
                            <!-- <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteData" data-id="< ?php echo $rows->id ?>"><i class="fa fa-trash"></i>Delete</a> -->
                          <!-- < ?php endif; ?> -->

                        </td>
                      <?php endif; ?>
                        
                      </tr>
                    <?php endforeach; ?>
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
    $('.editData').on('click', function(){

        var id = $(this).data('id');
        var name = $(this).data('name');
        var type = $(this).data('type');
        var ac_number = $(this).data('ac_number');
        var bank_name = $(this).data('bank_name');
        var opening_balance = $(this).data('opening_balance');
        var amt = $(this).data('amt');
        var address = $(this).data('address');
        var ifsc = $(this).data('ifsc');
        var default_ac = $(this).data('default_ac');

        $('#myModal1').modal('show');
        // alert(status);
        $('[name="edit_id"]').val(id);
        $('[name="edit_name"]').val(name);
        $('[name="edit_type"]').val(type);
        $('[name="edit_ac_number"]').val(ac_number);
        $('[name="edit_bank_name"]').val(bank_name);
        $('[name="edit_opbalance"]').val(opening_balance);
        $('[name="edit_amt"]').val(amt);
        $('[name="edit_address"]').val(address);
        $('[name="edit_ifsc"]').val(ifsc);
        $('[name="edit_default_ac"]').val(default_ac);
    });


    $('.deleteData').on('click', function(){

        var id = $(this).data('id');
        // alert(id);
        $('#deleteWaiterModal').modal('show');
        $('[name="id_edit"]').val(id);
    });
</script>
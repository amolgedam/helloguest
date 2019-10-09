
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bank" aria-hidden="true"></i> Bank Accounts Withdraw
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bank Accounts Withdraw</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>

            <?php if(in_array('createTransfer', $user_permission)): ?>
              <div class="box-header">
                <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New</a>
              </div>
            <?php endif; ?>


            
<form role="form" action="<?php echo base_url('withdraw/create') ?>" enctype="multipart/form-data" method="post">

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Create Account Withdraw</h4>
        </div>
        <div class="modal-body">
              <div class="box-body">

                <div class="form-group">
                  <label >Account Holder</label>
                  <select name="accountholder" id="accountholder" class="form-control">
                    <?php foreach($allData as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo ucwords($rows->name); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                 <div class="form-group">
                  <label>Available Balance</label>
                  <input type="text" name="pre_amt" id="pre_amt" class="form-control" readonly>
                </div>
                
                <div class="form-group">
                  <label >Account Number</label>
                  <input type="hidden" class="form-control" id="account_id" name="account_id">
                  <input type="text" class="form-control" id="number" name="number" placeholder="Enter Account Number" autocomplete="off" readonly="">
                </div>

                
                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                  <label >Amount</label>
                  <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount">
                  <div id="eamount" style="background-color: red; padding-left: 5px; color: white; display: none;">
                      <p>Amount More than Available Balance</p>
                  </div>
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
                  <label >Reference</label>
                  <input type="text" name="reference" class="form-control" >
                </div>

                <div class="form-group">
                  <label >Attachment</label>
                  <input type="file" name="file" class="form-control" >
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

<form role="form" action="<?php echo base_url('withdraw/delete') ?>" method="post" id="deleteForm">
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

            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Account Name</th>
                      <th>Account Number</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <!-- <th>Manage</th> -->
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=1; foreach($withdrawData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->acno; ?></td>
                        <td><?php echo $rows->desc; ?></td>
                        <td><?php echo $rows->amount; ?></td>
                        <td><?php echo $rows->created; ?></td>
                        <!-- <td width="170px">
                          < ?php if(in_array('updateTransfer', $user_permission)): ?>
                            <a href="#" class="btn btn-sm btn-info"  data-toggle="modal" data-target="#myModal1">
                              <i style="color: white" class="fa fa-edit"></i> Edit
                            </a>
                          < ?php endif; ?>


                        < ?php if(in_array('deleteTransfer', $user_permission)): ?>
                          <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteData" data-id="< ?php echo $rows->withdrawid ?>"><i class="fa fa-trash"></i>Delete</a>
                        < ?php endif; ?>


                        </td> -->
                      </tr>
                    <?php $no++; endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
     
            <!--Edit popup -->

            <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Account Withdraw</h4>
        </div>
        <div class="modal-body">
          <form role="form">
              <div class="box-body">

                

                <div class="form-group">
                  <label >Account </label>
                  <select class="form-control">
                    
                    <option>Select One</option>
                    
                  </select>
                </div>
                
                <div class="form-group">
                  <label >Account Number</label>
                  
                  <input type="tel" value="" id="demoDate" class="form-control" name="date" placeholder="Enter  Date" autocomplete="off" required="">
                </div>

                
                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                  <label >Amount</label>
                  <input type="text" class="form-control" placeholder="Enter Amount">
                </div>

                <!-- <div class="form-group">
                  <label >Category</label>
                  <select class="form-control">
                    <option>Select one</option>
                    
                  </select>               
                </div> -->

                <div class="form-group">
                  <label >Payment Method</label>
                  <select class="form-control">
                    <option>Card</option>
                    
                    <option>Select one</option>
                    <option>Card</option>
                    <option>Cash</option>
                  </select>               
                </div>

                 <div class="form-group">
                  <label >Reference</label>
                  <input type="text" class="form-control" >
                </div>

                <div class="form-group">
                  <label >Attachment</label>
                  <input type="file" class="form-control" >
                </div>
              </div>
              <!-- /.box-body -->

              
                   </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
      
    </div>
  </div>
  
            <!-- /Editpopup -->

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

  $('#amount').on('blur', function(){

      var from = $('#pre_amt').val();
      var amount = $('#amount').val();
      // alert(from); alert(amount);
      var total = from - amount;
      // alert(total);
      if(total < 0)
      {
          $('#eamount').show();
          $('#amount').val('');
          $('#amount').focus();
      }
      else
      {
          $('#eamount').hide();
      }
  });

  $('.deleteData').on('click', function(){

        var id = $(this).data('id');
        // alert(id);
        $('#deleteWaiterModal').modal('show');
        $('[name="id_edit"]').val(id);
    });
</script>
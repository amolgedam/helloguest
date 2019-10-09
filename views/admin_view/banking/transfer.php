<!-- < ?php echo "<pre>"; print_r($transferData); echo "</pre>"; exit(); ?> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bank" aria-hidden="true"></i> Bank Accounts Transfer
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bank Accounts Transfer </li>
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



<form role="form" action="<?php echo base_url('transfer/create') ?>" enctype="multipart/form-data" method="post">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Create Account Transfers</h4>
        </div>
        <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label >From(Account Name) </label>
                  <select name="accountholderfrom" id="accountholderfrom" class="form-control">
                    <?php foreach($allData as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo ucwords($rows->name); ?></option>
                    <?php endforeach; ?>
                  </select>

                  <input type="hidden" name="fromid" id="fromid">
                  <input type="hidden" name="fromname" id="fromname">
                </div>
                <div class="form-group">
                  <label>Available Balance</label>
                  <input type="text" name="fromamt" id="fromamt" class="form-control" readonly>
                </div>


                <div class="form-group">
                  <label >To(Account Name) </label>
                  <select name="accountholderto" id="accountholderto" class="form-control">
                    <?php foreach($allData as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo ucwords($rows->name); ?></option>
                    <?php endforeach; ?>
                  </select>

                  <input type="hidden" name="toid" id="toid">
                  <input type="hidden" name="toamt" id="toamt">
                  <input type="hidden" name="toname" id="toname">
                </div>
              
                <div class="form-group">
                  <label >Date</label>
                  
                  <input type="date" class="form-control" name="date" placeholder="Enter Date" autocomplete="off" required="">
                </div>
                
                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                  <label >Amount</label>
                  <input type="text" name="amount" id="amount" required class="form-control" placeholder="Enter Amount">
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
                  <label>Attachment</label>
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

<form role="form" action="<?php echo base_url('transfer/delete') ?>" method="post" id="deleteForm">
      <div class="modal fade" id="deleteWaiterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Payment-Term</h5>
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
  
            <!-- /popup -->


              <!--Edit popup -->

            <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Account Transfers</h4>
        </div>
        <div class="modal-body">
          <form role="form">
              <div class="box-body">

                

                <div class="form-group">
                  <label >From(Account Name) </label>
                  <select class="form-control">
                    
                    <option>Select One</option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label >To (Account Name) </label>
                  <select class="form-control">
                    
                    <option>Select One</option>
                    
                  </select>
                </div>
                
                <div class="form-group">
                  <label >Date</label>
                  
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

               <!--  <div class="form-group">
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
          <button type="button" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save Changes</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
      
    </div>
  </div>

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
                      <th>From Account Name</th>
                      <th>To Account Name</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <!-- <th>Manage</th> -->
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=1; foreach($transferData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows->accountfrom_name; ?></td>
                        <td><?php echo $rows->accountto_name; ?></td>
                        <td><?php echo $rows->description ; ?></td>
                        <td><?php echo $rows->amount ; ?></td>
                        <td><?php echo $rows->date; ?></td>
                        <!-- <td width="170px">

                          < ?php if(in_array('updateTransfer', $user_permission)): ?>

                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal1">
                              <i style="color: white" class="fa fa-edit"></i> Edit
                            </a>
                          < ?php endif; ?>

                          < ?php if(in_array('deleteTransaction', $user_permission)): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteData" data-id="< ?php echo $rows->id ?>"><i class="fa fa-trash"></i>Delete</a>
                          < ?php endif; ?>

                        </td> -->
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

  $('#accountholderfrom').on('blur', function(){

      // alert('hi');
      var accountholderfrom = $(this).val();
      // alert(accountholderfrom);
      $.ajax({
              type : "POST",
              url  : base_url + 'banking/holderData',
              dataType : "JSON",
              data : {accountholderID:accountholderfrom},
              success: function(data){
                  // alert(data);
                  // console.log(data);
                  $('#fromid').val(data['id']);
                  $('#fromamt').val(data['amt']);
                  $('#fromname').val(data['name']);
              }
          });
  });

  $('#accountholderto').on('blur', function(){

      // alert('hi');
      var accountholderto = $(this).val();
      // alert(accountholderfrom);
      $.ajax({
              type : "POST",
              url  : base_url + 'banking/holderData',
              dataType : "JSON",
              data : {accountholderID:accountholderto},
              success: function(data){
                  // alert(data);
                  // console.log(data);
                  $('#toid').val(data['id']);
                  $('#toamt').val(data['amt']);
                  $('#toname').val(data['name']);
              }
          });
  });

  $('#amount').on('blur', function(){

      var from = $('#fromamt').val();
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
        $('#deleteWaiterModal').modal('show');
        $('[name="id_edit"]').val(id);
    });
</script>
<!--< ?php echo "<pre>"; print_r($allData); echo "</pre>"; exit; ?>-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-gift" aria-hidden="true"></i> Expenses

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Expenses </li>
      </ol>
    </section>

    <div style="padding: 10px">
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

            <?php if(in_array('createProduct', $user_permission)): ?>
              <div class="box-header">
                <a href="<?php echo base_url() ?>expences/create" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                <!-- <a href="#" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New</a> -->
              </div>
            <?php endif; ?>


            
<form role="form" action="<?php echo base_url('expences/createExpences') ?>" enctype="multipart/form-data" method="post" id="createForm">
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create New Expense</h4>
                </div>
                <div class="modal-body">
                      <div class="box-body">

               <div class="form-group">
                  <label class="control-label">Expense Name</label>
                  <span style="color:red;">∗</span>
                  <input type="text" name="expensename" class="form-control">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Date</label> <span style="color:red;">∗</span>
                 <input type="date" class="form-control" name="date" placeholder="Enter  Date" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Description</label> <span style="color:red;">∗</span>
                
                   <input type="text" name="description" class="form-control" placeholder="Enter  description" required="">
                  
                </div>
                <div class="form-group">
                  <label class="control-label">Amount</label> <span style="color:red;">∗</span>
                
                   <input type="tel" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required="">
                  
                </div>
               <!--  <div class="form-group">
                  <label class="control-label">Category </label> 
                    <select class="form-control" name="category_id" id="category_id" aria-required="true">
                    <option value="">Select one</option>
                                  </select>
  
                </div> -->
                <div class="form-group">
                  <label class="control-label">Payment Method</label> 
                  <select name="payment_method" class="form-control">
                    <?php foreach($paymentmethod as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Cheque No/Cash</label> 
                <input type="text" name="cheque_no" placeholder="Cheque No/Cash" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">Reference</label> 
                <input type="text" name="reference" value="" class="form-control">
                </div>
                <div class="form-group">

                  <label class="control-label">Attachment</label> 
                <input type="file" name="file" class="form-control">
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

<form role="form" action="<?php echo base_url('expences/deleteExpences') ?>" method="post" id="deleteForm">
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
                      <th>Expence Name</th>
                      <th>Category Name</th>
                      <th>Date</th>
                      <!-- <th>Expences Category</th> -->
                      <th>Description</th>
                      <th>Amount</th>
                      <?php if(in_array('updateProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                        <th>Manage</th>
                      <?php endif; ?>

                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=1; foreach($allData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows->ename; ?></td>
                        <td><?php echo $rows->cat_name; ?></td>
                        <td><?php echo $rows->exp_date; ?></td>
                        <td><?php echo $rows->description; ?></td>
                        <td><?php echo $rows->amount; ?></td>

                      <?php if(in_array('updateProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>

                        <td width="170px">

                          <?php if(in_array('updateProduct', $user_permission)): ?>
                           <a href="<?php echo base_url() ?>expences/updateExpences/<?php echo $rows->id ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>
                          <?php endif; ?>

                         <!--  <a href="javascript:void(0);" class="btn btn-sm btn-info editData" data-id="< ?php echo $rows->id ?>" data-name="< ?php echo $rows->name ?>" data-date="< ?php echo $rows->date ?>" data-description="< ?php echo $rows->description ?>" data-amount="< ?php echo $rows->amount ?>" data-pmethod="< ?php echo $rows->payment_method ?>" data-cheque_no ="< ?php echo $rows->cheque_no ?>" data-reference ="< ?php echo $rows->reference ?>" ><i class="fa fa-pencil"></i>Edit</a> -->

                          <?php if(in_array('deleteProduct', $user_permission)): ?>
                           <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteData" data-id="<?php echo $rows->id ?>"><i class="fa fa-trash"></i>Delete</a>
                          <?php endif; ?>

                        </td>
                          <?php endif; ?>
                        
                      </tr>
                    <?php $no++; endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
 <!-- Edit popup -->
<form role="form" action="<?php echo base_url('expences/updateExpences') ?>" enctype="multipart/form-data" method="post" id="createForm">

  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-pencil-square"></i> Edit Expenses</h4>
        </div>
        <div class="modal-body">
              <div class="box-body">

               <div class="form-group">
                  <div class="form-group">
                      <label class="control-label">Expense Name</label>
                      <span style="color:red;">∗</span>
                      <input type="hidden" name="expenseid" class="form-control">
                      <input type="text" name="edit_expensename" readonly="" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label">Date</label> <span style="color:red;">∗</span>
                 <input type="text" class="form-control" readonly="" name="edit_date" placeholder="Enter  Date" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Description</label> <span style="color:red;">∗</span>
                   <input type="text" name="edit_description" class="form-control" placeholder="Enter  description" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Amount</label> <span style="color:red;">∗</span>
                   <input type="tel" name="edit_amount" id="amount" readonly="" class="form-control" placeholder="Enter Amount" required="">
                </div>
                <!-- <div class="form-group">
                  <label class="control-label">Category </label> 
               <select class="form-control" name="category_id" id="category_id" aria-required="true">
                 <option value="">Select one</option>
                </select>
                </div> -->
                <div class="form-group">
                  <label class="control-label">Payment Method</label> 
                  <select name="edit_payment_method" class="form-control">
                    <?php foreach($paymentmethod as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                  </select>     

                </div>
                <div class="form-group">
                  <label class="control-label">Cheque No/Cash</label> 
                <input type="text" name="edit_cheque_no" placeholder="Cheque No/Cash" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">Reference</label> 
                <input type="text" name="edit_reference" value="" class="form-control">
                </div>
                <div class="form-group">

                  <label class="control-label">Attachment</label> 
                <input type="file" name="file" class="form-control">
                </div>
                
              </div>
                   </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg  fa-pencil-square-o" aria-hidden="true"></i> Update</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
 
        </div>
      </div>
      
    </div>
  </div>
  </form>

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
        var name = $(this).data('name');
        var date = $(this).data('date');
        var description = $(this).data('description');
        var amount = $(this).data('amount');
        var pmethod = $(this).data('pmethod');
        var cheque_no = $(this).data('cheque_no');
        var reference = $(this).data('reference');

        $('#myModal1').modal('show');
        // alert(status);
        $('[name="expenseid"]').val(id);
        $('[name="edit_expensename"]').val(name);
        $('[name="edit_date"]').val(date);
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
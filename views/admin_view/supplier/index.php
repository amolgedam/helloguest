
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users" aria-hidden="true"></i> Supplier List
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>add-supplier"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Supplier List</li>
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


            <?php if(in_array('createSupplier', $user_permission)): ?>
              <div class="box-header">
                <!-- <a href="#" class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New</a>
                 -->
                <a href="<?php echo base_url() ?>supplier/create" class="btn btn-sm btn-primary pull-right" ><i class="fa fa-plus"></i> Add New</a>
              </div>
            <?php endif; ?>

            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                      <th>GSTIN Number</th>
                      <th>Address</th>
                      <th>Status</th>
                      <?php if(in_array('updateSupplier', $user_permission) || in_array('deleteSupplier', $user_permission)): ?>
                        <th>Manage</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($allData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo ucwords($rows->name); ?></td>
                        <td><?php echo $rows->email; ?></td>
                        <td><?php echo $rows->phone; ?></td>
                        <td><?php echo $rows->gstin; ?></td>
                        <td><?php echo ucwords($rows->address); echo ", ".ucwords($rows->city); echo ", ".ucwords($rows->state); ?></td>
                        <td>
                          <label class="label <?php echo $rows->status == 'active' ? 'label-success' : 'label-danger' ?>"><?php echo ucwords($rows->status) ?></label>
                        </td>

                      <?php if(in_array('updateSupplier', $user_permission) || in_array('deleteSupplier', $user_permission)): ?>

                        <td width="170px">

                          <?php if(in_array('updateSupplier', $user_permission)): ?>
                            <a href="<?php echo base_url() ?>supplier/update/<?php echo $rows->id ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>
                          <?php endif; ?>


                          <!-- <a href="javascript:void(0);" class="btn btn-sm btn-info editData" data-id="< ?php echo $rows->id ?>" data-name="< ?php echo $rows->name ?>" data-email="< ?php echo $rows->email ?>" data-phone="< ?php echo $rows->phone ?>" data-gstin="< ?php echo $rows->gstin ?>" data-pan="< ?php echo $rows->pan ?>" data-address="< ?php echo $rows->address ?>" data-state="< ?php echo $rows->state ?>" data-city="< ?php echo $rows->city ?>" data-postal_code="< ?php echo $rows->postal_code ?>" data-status="< ?php echo $rows->status ?>" ><i class="fa fa-pencil"></i>Edit</a> -->
                          
                          <?php if(in_array('deleteSupplier', $user_permission)): ?>
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

<form role="form" action="<?php echo base_url('supplier/update') ?>" method="post" id="editForm">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-pencil-square"></i> Edit supplier</h4>
        </div>
        <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="hidden" class="form-control" name="edit_id"  placeholder="Enter full name">
                  <input type="text" class="form-control" name="edit_name" readonly placeholder="Enter full name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" name="edit_email"  placeholder="Enter email address">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Contact Number</label>
                  <input type="text" class="form-control" name="edit_phone"  placeholder="Enter contact number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">GSTIN Number</label>
                  <input type="text" class="form-control" name="edit_gstin" placeholder="Enter your GSTIN Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">PAN Number</label>
                  <input type="text" class="form-control" name="edit_pan" placeholder="Enter your PAN Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <textarea class="form-control" name="edit_address" placeholder="Enter your address"></textarea>
                </div>
                <div class="form-group">
                  <label >State</label>
                  <select name="edit_state" class="form-control">
                    <option value="mh">Maharashtra</option>                    
                  </select>
                </div>
                <div class="form-group">
                  <label >City</label>
                  <select name="edit_city" class="form-control">
                    <option value="nagpur">Nagpur</option>                  
                  </select>
                </div>
                <div class="form-group">
                  <label > Postal Code</label>
                  <input type="text" name="edit_postalcode" class="form-control"  placeholder="Enter your postal code">
                </div>
                <div class="form-group">
                  <label >Status</label>
                  <select name="edit_status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
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

 <form role="form" action="<?php echo base_url('supplier/delete') ?>" method="post" id="deleteForm">
      <div class="modal fade" id="deleteWaiterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Supplier</h5>
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
        var email = $(this).data('email');
        var phone = $(this).data('phone');
        var gstin = $(this).data('gstin');
        var pan = $(this).data('pan');
        var address = $(this).data('address');
        var state = $(this).data('state');
        var city = $(this).data('city');
        var postal_code = $(this).data('postal_code');
        var status = $(this).data('status');

        $('#myModal1').modal('show');
        // alert(status);
        $('[name="edit_id"]').val(id);
        $('[name="edit_name"]').val(name);
        $('[name="edit_email"]').val(email);
        $('[name="edit_phone"]').val(phone);
        $('[name="edit_gstin"]').val(gstin);
        $('[name="edit_pan"]').val(pan);
        $('[name="edit_address"]').val(address);
        $('[name="edit_state"]').val(state);
        $('[name="edit_city"]').val(city);
        $('[name="edit_postalcode"]').val(postal_code);
        $('[name="edit_status"]').val(status);
    });


    $('.deleteData').on('click', function(){

        var id = $(this).data('id');
        $('#deleteWaiterModal').modal('show');
        $('[name="id_edit"]').val(id);
    });
</script>
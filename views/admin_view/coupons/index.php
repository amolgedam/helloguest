

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Coupon</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Coupon</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>
            
            <?php if(in_array('createCoupon', $user_permission)): ?>
              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addGstModal">Add Coupon</button>
            <?php endif; ?>

            <br /> <br /> 

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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Coupon</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="9%">Sr. No.</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Off</th>
                  <th>Status</th>
                  <?php if(in_array('updateCoupon', $user_permission) || in_array('deleteCoupon', $user_permission)): ?>
                    <th>Action</th>
                  <?php endif; ?>

                </tr>
                </thead>
                <tbody>

                    <?php $no = 1; foreach($allData as $rows): ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo ucwords($rows->name); ?></td>
                      <td><?php echo ucwords($rows->description); ?></td>
                      <td><?php echo $rows->off; echo $rows->off_type == 'per' ? '  %' : '  RS'; ?></td>
                      <td>
                          <label class="label <?php echo $rows->status == 'active' ? 'label-success' : 'label-danger' ?>"><?php echo ucwords($rows->status) ?></label>
                      </td>
                  <?php if(in_array('updateCoupon', $user_permission) || in_array('deleteCoupon', $user_permission)): ?>

                      <td>
                        <?php if(in_array('updateCoupon', $user_permission)): ?>
                          <a href="javascript:void(0);" class="btn btn-sm btn-info paymentor_edit" data-id="<?php echo $rows->id ?>" data-name="<?php echo $rows->name ?>" data-description="<?php echo $rows->description ?>" data-off_type="<?php echo $rows->off_type ?>" data-off="<?php echo $rows->off ?>" data-start="<?php echo $rows->starting_slot ?>" data-end="<?php echo $rows->ending_slot ?>"  data-active="<?php echo $rows->status ?>" ><i class="fa fa-pencil"></i>Edit</a>
                        <?php endif; ?>

                        <?php if(in_array('deleteCoupon', $user_permission)): ?>
                          <a href="javascript:void(0);" class="btn btn-sm btn-danger paymentor_Delete" data-id="<?php echo $rows->id ?>"><i class="fa fa-trash"></i>Delete</a>
                        <?php endif; ?>

                      </td>
                        <?php endif; ?>
                      
                    </tr>
                  <?php $no++; endforeach; ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- MODAL Add-->
  <form role="form" action="<?php echo base_url('coupons/create') ?>" method="post" id="createForm">
      <div class="modal fade" id="addGstModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <!-- <form role="form" action="< ?php echo base_url('tables/create') ?>" method="post" id="createForm"> -->

              <div class="modal-body">

                <div class="form-group">
                  <label for="brand_name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Coupon name" autocomplete="off" required="">
                </div>
                <div class="form-group">
                  <label for="brand_name">Description</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description name" autocomplete="off" >
                </div>
                <div class="form-group">
                  <div><label for="brand_name">Off</label></div>
                  <div>
                    <input type="radio" name="off_type" class="off_type off_per" value="per" checked> Percentage(%)
                    <input type="radio" name="off_type" class="off_type off_amt" value="amt"> Amount(RS.)
                  </div>
                </div>
                <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-addon">
                          <span class="input-group-text per">OFFER</span>
                          <!-- <span class="input-group-text rs">RS</span> -->
                        </div>
                        <input type="text" class="form-control" name="off" required="">
                    </div>
                </div>
                <div class="form-group">
                  <label for="active">Starting Slot</label>
                 <input type="text" class="form-control" id="start" name="start" placeholder="Enter Starting Slot" autocomplete="off" required="">
                </div>
                <div class="form-group">
                  <label for="active">Ending Slot</label>
                  <input type="text" class="form-control" id="end" name="end" placeholder="Enter Ending Slot" autocomplete="off" required required="">
                </div>
                <div class="form-group">
                  <label for="active">Status</label>
                  <select name="status" class="form-control">
                    <option value="inactive">Inactive</option>
                    <option value="active">Active</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
              </div>

            <!-- </form> -->
          </div>
        </div>
      </div>
  </form>

  <!-- MODAL Edit-->
  <form role="form" action="<?php echo base_url('coupons/update') ?>" method="post" id="editForm">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Coupon</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
              <div class="modal-body">
                <input type="hidden" id="id_edit" name="id_edit" >

                   <div class="form-group">
                  <label for="brand_name">Name</label>
                  <input type="text" class="form-control" id="name" name="name_edit" placeholder="Enter Coupon name" autocomplete="off" required="">
                </div>
                <div class="form-group">
                  <label for="brand_name">Description</label>
                  <input type="text" class="form-control" id="description" name="description_edit" placeholder="Enter Description name" autocomplete="off" required="">
                </div>
                <div class="form-group">
                  <div><label for="brand_name">Off</label></div>
                  <div>
                    <input type="radio" name="off_type_edit" class="off_type off_per" value="per" checked> Percentage(%)
                    <input type="radio" name="off_type_edit" class="off_type off_amt" value="amt"> Amount(RS.)
                  </div>
                </div>
                <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-addon">
                          <span class="input-group-text per">OFFER</span>
                          <!-- <span class="input-group-text rs">OFF</span> -->
                        </div>
                        <input type="text" class="form-control" name="off_edit">
                    </div>
                </div>
                <div class="form-group">
                  <label for="active">Starting Slot</label>
                 <input type="text" class="form-control" id="start" name="start_edit" placeholder="Enter Starting Slot" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="active">Ending Slot</label>
                  <input type="text" class="form-control" id="end" name="end_edit" placeholder="Enter Ending Slot" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="active">Status</label>
                  <select name="status_edit" class="form-control">
                    <option value="inactive">Inactive</option>
                    <option value="active">Active</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
              </div>

          </div>
        </div>
      </div>
  </form>

  <!-- MODAL Edit-->
  <form role="form" action="<?php echo base_url('coupons/delete') ?>" method="post" id="deleteForm">
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Coupon</h5>
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
  //  $('.rs').hide();

  //  $('.off_type').on('click', function(){

  //     var off_type = $('input[name=off_type]:checked').val();
  //     if (off_type == 'amt')
  //     {
  //         $('.rs').show();
  //         $('.per').hide();
  //     }
  //     else
  //     {
  //         $('.per').show();
  //         $('.rs').hide();
  //     }
  // });



   //get data for update record
    $('.paymentor_edit').on('click', function(){

        var id = $(this).data('id');
        var name = $(this).data('name');
        var description = $(this).data('description');
        var off_type = $(this).data('off_type');
        var off = $(this).data('off');
        var start = $(this).data('start');
        var end = $(this).data('end');
        var active = $(this).data('active');
        // alert(off_type);

        $('#editModal').modal('show');

        $('[name="id_edit"]').val(id);
        $('[name="name_edit"]').val(name);
        $('[name="description_edit"]').val(description);
        $('[name="off_type_edit"]').val(off_type);
        $('[name="off_edit"]').val(off);
        $('[name="start_edit"]').val(start);
        $('[name="end_edit"]').val(end);
        $('[name="status_edit"]').val(active);
    });

    $('.paymentor_Delete').on('click', function(){

        var id = $(this).data('id');
        // alert(id);
        $('#deleteModal').modal('show');
        $('[name="id_edit"]').val(id);
    });

</script>
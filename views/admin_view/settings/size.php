

<!-- < ?php print_r($allData); exit(); ?> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Size</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Size</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>
          
          <?php if(in_array('createProductSize', $user_permission)): ?>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addModal">Add Size</button>
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
              <h3 class="box-title">Manage Size</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="9%">Sr. No.</th>
                  <th>Name</th>
                  <th>Status</th>
                  <?php if(in_array('updateProductSize', $user_permission) || in_array('deleteProductSize', $user_permission)): ?>
                    <th width="15%">Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>

                    <?php $no = 1; foreach($allData as $rows): ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo ucwords($rows->name); ?></td>
                      <td>
                        <label class="label <?php echo $rows->status == 'active' ? 'label-success' : 'label-danger' ?>"><?php echo ucwords($rows->status) ?></label>
                      </td>

                  <?php if(in_array('updateProductSize', $user_permission) || in_array('deleteProductSize', $user_permission)): ?>

                      <td>
                        <?php if(in_array('updateProductSize', $user_permission) || in_array('deleteProductSize', $user_permission)): ?>
                          <a href="javascript:void(0);" class="btn btn-sm btn-info paymentor_edit" data-id="<?php echo $rows->id ?>" data-name="<?php echo $rows->name ?>" data-active="<?php echo $rows->status ?>" ><i class="fa fa-pencil"></i>Edit</a>
                        <?php endif; ?>

                        <?php if(in_array('updateProductSize', $user_permission) || in_array('deleteProductSize', $user_permission)): ?>
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
  <form role="form" action="<?php echo base_url('size/create') ?>" method="post" id="createForm">
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Size</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

              <div class="modal-body">

                <div class="form-group">
                  <label for="brand_name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Size" autocomplete="off" required>
                </div>
               
                <div class="form-group">
                  <label for="active">Status</label>
                  <select class="form-control" id="active" name="active">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
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
  <form role="form" action="<?php echo base_url('size/update') ?>" method="post" id="editForm">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Size</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
              <div class="modal-body">
                <input type="hidden" id="id_edit" name="id_edit" >

                <div class="form-group">
                  <label for="brand_name">Name</label>
                  <input type="text" class="form-control" id="name_edit" name="name_edit" placeholder="Enter Size" autocomplete="off" required>
                </div>
               
                <div class="form-group">
                  <label for="active">Status</label>
                  <select class="form-control" id="active_edit" name="active_edit">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>

          </div>
        </div>
      </div>
  </form>


  <!-- MODAL Edit-->
  <form role="form" action="<?php echo base_url('size/delete') ?>" method="post" id="deleteForm">
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
    //get data for update record
    $('.paymentor_edit').on('click', function(){

        var id = $(this).data('id');
        var name = $(this).data('name');
        var active = $(this).data('active');
        // alert(waiter_id);
        $('#editModal').modal('show');
        $('[name="id_edit"]').val(id);
        $('[name="name_edit"]').val(name);
        $('[name="active_edit"]').val(active);
    });

    $('.paymentor_Delete').on('click', function(){

        var id = $(this).data('id');
        $('#deleteModal').modal('show');
        $('[name="id_edit"]').val(id);
    });

</script>
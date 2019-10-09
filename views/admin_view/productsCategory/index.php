<!-- < ?php echo "<pre>"; print_r($category); echo "</pre>"; exit(); ?> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Category 
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

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

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box" style="padding: 5px;">
            <br>

            <?php if(in_array('createCategory', $user_permission)): ?>
              <div style="float:right">
                   <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Category</a>
              </div>
            <?php endif; ?>


            <br><br>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No</th>
                      <th>Category Name</th>
                      <th>Status</th>
                      <?php if(in_array('updateCategory', $user_permission) || in_array('deleteCategory', $user_permission)): ?>
                        <th>Action</th>
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

                      <?php if(in_array('updateCategory', $user_permission) || in_array('deleteCategory', $user_permission)): ?>

                      <td>
                        <?php if(in_array('updateCategory', $user_permission)): ?>
                          <a href="javascript:void(0);" class="btn btn-sm btn-info editCategory" data-id="<?php echo $rows->id ?>" data-name="<?php echo $rows->name ?>" data-active="<?php echo $rows->status ?>" ><i class="fa fa-pencil"></i>Edit</a>
                        <?php endif; ?>

                        <?php if(in_array('deleteCategory', $user_permission)): ?>
                          <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteCategory" data-id="<?php echo $rows->id ?>"><i class="fa fa-trash"></i>Delete</a>
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
          </div>
        </div>


        <!-- Add popup -->
      <form role="form" action="<?php echo base_url('category/createCategory') ?>" method="post" id="createForm">
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Add Category</h4>
              </div>
              <div class="modal-body">
                <div class="box-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" name="name" class="form-control catAddName"  placeholder="Enter Category Name">
                    <div class="addCatError" style="background-color:red; color:white; display:none;">Category Already Exist</div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" class="form-control">
                      <option value="active">Active</option>
                      <option value="inaction">Inactive</option>
                    </select>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success catAddSubmit">Save changes</button>
                
              </div>
            </div>
          </div>
        </div>
      </form>

      
  <!-- MODAL Edit-->
  <form role="form" action="<?php echo base_url('category/updateCategory') ?>" method="post" id="editForm">
      <div class="modal fade" id="editModalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Unit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
              <div class="modal-body">
                <input type="hidden" id="categoryid_edit" name="categoryid_edit" >

                <div class="form-group">
                  <label for="brand_name">Name</label>
                  <input type="text" class="form-control" id="categoryname_edit" name="categoryname_edit" placeholder="Enter Unit" autocomplete="off" required>
                </div>
               
                <div class="form-group">
                  <label for="active">Status</label>
                  <select class="form-control" id="categoryactive_edit" name="categoryactive_edit">
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
  <form role="form" action="<?php echo base_url('category/deleteCategory') ?>" method="post" id="deleteForm">
      <div class="modal fade" id="deleteModalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


        <!-- sub catgory -->

        <!--<div class="col-md-12 col-sm-12 col-xs-12">-->
        <!--  <div class="box" style="padding: 5px;">-->
        <!--    <br>-->
        <!--    <div style="float:right">-->
        <!--         <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_addSubCategory" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Sub-Category</a>-->
        <!--    </div>-->
        <!--    <br><br>-->
        <!--    <div class="box-body">-->
        <!--      <div class="table-responsive">-->
        <!--        <table class="table table-bordered table-striped mydatatable">-->
        <!--          <thead>-->
        <!--            <tr>-->
        <!--              <th>Sr.No</th>-->
        <!--              <th>Sub-Category Name</th>-->
        <!--              <th>Status</th>-->
        <!--              <th>Action</th>-->
        <!--            </tr>-->
        <!--          </thead>-->
        <!--          <tbody>-->

        <!--             < ?php $no = 1; foreach($subcategory as $rows): ?>-->
        <!--                <tr>-->
        <!--                  <td>< ?php echo $no; ?></td>-->
        <!--                  <td>< ?php echo ucwords($rows->name); ?></td>-->
        <!--                  <td>-->
        <!--                      <label class="label < ?php echo $rows->status == 'active' ? 'label-success' : 'label-danger' ?>">< ?php echo ucwords($rows->status) ?></label>-->
        <!--                  </td>-->
        <!--                  <td width="170px">-->
        <!--                      <a href="javascript:void(0);" class="btn btn-sm btn-info editSubCategory" data-id="< ?php echo $rows->id ?>" data-name="< ?php echo $rows->name ?>" data-active="< ?php echo $rows->status ?>" data-category="< ?php echo $rows->category_id ?>"><i class="fa fa-pencil"></i>Edit</a>-->

        <!--                      <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteSubCategory" data-id="< ?php echo $rows->id ?>"><i class="fa fa-trash"></i>Delete</a>-->
        <!--                  </td>-->
        <!--                </tr>-->
        <!--              < ?php endforeach; ?>-->


        <!--          </tbody>-->
        <!--        </table>-->

        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

      </div>
    </section>
  </div>
  <div class="control-sidebar-bg"></div>

</div>

  
      <!-- edit Sub Category Modal -->
  <form role="form" action="<?php echo base_url('category/createSubCategory') ?>" method="post" id="createForm">
      <div class="modal fade" id="Modal_addSubCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    Add Sub Category
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div>
                            <label>Sub-Category Name</label>
                          </div>
                          <div>
                            <input type="text" name="name" id="subcate" class="form-control"  placeholder="Enter Sub-Category">
                            <div class="addSubCatError" style="background-color:red; color:white; display:none;">Sub-Category Already Exist</div>
                          </div>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div>
                            <label>Status</label>
                          </div>
                          <div>
                            <select name="status" class="form-control">
                              <option value="active">Active</option>
                              <option value="inaction">Inactive</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div>
                            <label>Category Name</label>
                          </div>
                          <div>
                            <select name="category"  id="category" class="form-control">
                                <?php foreach($category as $rows): ?>
                                    <option value="<?php echo $rows->id; ?>"><?php echo ucwords($rows->name); ?></option>
                                  <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" name="save" value="Submit" class="btn btn-sm btn-success addSubCateSub">
                </div>
              </div>
            </div>
          </div>
     </form>


      <!-- edit Sub Category Modal -->
<form role="form" action="<?php echo base_url('category/updateSubCategory') ?>" method="post" id="createForm">
        <div class="modal fade" id="Modal_editSubategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    Edit Sub Category
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden" name="subcategoryid_edit">
                          <div>
                            <label>Sub-Category Name</label>
                          </div>
                          <div>
                            <input type="text" name="subcategoryname_edit" class="form-control" placeholder="Enter Sub-Category">
                          </div>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div>
                            <label>Status</label>
                          </div>
                          <div>
                            <select name="subcategoryactive_edit" class="form-control">
                              <option value="active">Active</option>
                              <option value="inaction">InActive</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div>
                            <label>Category Name</label>
                          </div>
                          <div>
                            <select name="categoryid_edit"  id="category" class="form-control">
                                <?php foreach($category as $rows): ?>
                                    <option value="<?php echo $rows->id; ?>"><?php echo ucwords($rows->name); ?></option>
                                  <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" name="save" value="Submit" class="btn btn-sm btn-success">
                </div>
              </div>
            </div>
          </div>
      </form>

      <form role="form" action="<?php echo base_url('category/deleteSubCategory') ?>" method="post" id="deleteForm">
      <div class="modal fade" id="deleteModalSubCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

  var base_url = "<?php echo base_url(); ?>";
  // showCategory();
  
  $('.catAddSubmit').prop('disabled', true);
  
  $('.catAddName').on('blur', function(){
      
    var catAddName = $('.catAddName').val();
    
       $.ajax({
          
            url: base_url + '/category/fecthCategory/',
            type: 'post',
            dataType: 'json',
            data: {category : catAddName},
            success:function(response) {
            
                // console.log(response);
                if(response != null)
                {
                    $('.addCatError').show();
                }
                else
                {
                    $('.catAddSubmit').prop('disabled', false);
                    $('.addCatError').hide();
                }
            }
       });
  });
  
  $('.addSubCateSub').prop('disabled', true);
  
   $('#subcate').on('blur', function(){
      
    var subcate = $('#subcate').val();
        // alert(subcate);
       $.ajax({
          
            url: base_url + '/category/fecthSubCategory/',
            type: 'post',
            dataType: 'json',
            data: {subcate : subcate},
            success:function(response) {
            
                console.log(response);
                if(response != null)
                {
                    $('.addSubCatError').show();
                }
                else
                {
                    $('.addSubCateSub').prop('disabled', false);
                    $('.addSubCatError').hide();
                }
            }
       });
  });
  
  
  
  

  $('.editCategory').on('click', function(){

      var id = $(this).data('id');
      var name = $(this).data('name');
      var active = $(this).data('active');
      // alert(id);
      $('#editModalCategory').modal('show');
      $('[name="categoryid_edit"]').val(id);
      $('[name="categoryname_edit"]').val(name);
      $('[name="categoryactive_edit"]').val(active);
  });

  $('.deleteCategory').on('click', function(){

      var id = $(this).data('id');
      $('#deleteModalCategory').modal('show');
      $('[name="id_edit"]').val(id);
  });

  // for subcategory
  $('.editSubCategory').on('click', function(){

      var id = $(this).data('id');
      var name = $(this).data('name');
      var cat_id = $(this).data('category');
      var active = $(this).data('active');
      // alert(cat_id);
      $('#Modal_editSubategory').modal('show');
      $('[name="subcategoryid_edit"]').val(id);
      $('[name="subcategoryname_edit"]').val(name);
      $('[name="subcategoryactive_edit"]').val(active);
      $('[name="categoryid_edit"]').val(cat_id);
  });

  $('.deleteSubCategory').on('click', function(){

      var id = $(this).data('id');
      $('#deleteModalSubCategory').modal('show');
      $('[name="id_edit"]').val(id);
  });


</script>
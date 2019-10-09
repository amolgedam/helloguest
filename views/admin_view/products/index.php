
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Manage Product
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

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

        <div class="col-xs-12">
          <div class="box">
            <br>

            <?php if(in_array('createProduct', $user_permission)): ?>
              <div class="box-header">
                <a href="<?php echo base_url() ?>products/create" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
              </div>
            <?php endif; ?>

            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Product Name</th>
                      <th>Product Category</th>
                      <!--<th>Size</th>-->
                      <th>GST(%) </th>
                      <th>Purchase Price </th>
                      <th>Sales Price </th>
                      <th>Status</th>
                      <?php if(in_array('updateProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                        <th>Manage </th>
                      <?php endif; ?>

                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1; foreach($allData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo ucwords($rows->pname); ?></td>
                        <td><?php echo ucwords($rows->category); ?></td>
                        <!--<td>< ?php echo $rows->size; ?></td>-->
                        <td><?php echo $rows->gst; ?></td>
                        <td><?php echo $rows->purchase_price; ?></td>
                        <td><?php echo $rows->sales_price; ?></td>
                        <td>
                          <label class="label <?php echo $rows->status == 'active' ? 'label-success' : 'label-danger' ?>"><?php echo ucwords($rows->status) ?></label>
                        </td>

                      <?php if(in_array('updateProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>

                        <td width="170px">

                          <?php if(in_array('updateProduct', $user_permission)): ?>
                            <a href="<?php echo base_url() ?>products/updateProduct/<?php echo $rows->products_id ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>Edit</a>
                          <?php endif; ?>

                          <!-- <a href="javascript:void(0);" class="btn btn-sm btn-info editData" data-id="< ?php echo $rows->products_id ?>" data-code="< ?php echo $rows->product_code ?>" data-pname="< ?php echo $rows->pname ?>" data-purchase_price="< ?php echo $rows->purchase_price ?>" data-hsn="< ?php echo $rows->hsn ?>" data-sales_price="< ?php echo $rows->sales_price ?>" data-gst="< ?php echo $rows->gst ?>" data-size_id="< ?php echo $rows->size_id ?>" data-size="< ?php echo $rows->size ?>" data-description="< ?php echo $rows->description ?>"  data-active="< ?php echo $rows->status ?> " data-category="< ?php echo $rows->category ?>" data-subcategory_id="< ?php echo $rows->subcategory_id ?>" data-subcategory="< ?php echo $rows->subcategory ?>" data-unit="< ?php echo $rows->unit ?>" data-unit_id="< ?php echo $rows->unit_id ?>"   ><i class="fa fa-pencil"></i>Edit</a> -->

                          <?php if(in_array('deleteProduct', $user_permission)): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteData" data-id="<?php echo $rows->products_id ?>"><i class="fa fa-trash"></i>Delete</a>
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
<form role="form" action="<?php echo base_url('products/update') ?>" method="post" id="editForm">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-pencil-square"></i> Edit Product</h4>
        </div>
        <div class="modal-body">
              <div class="box-body">
                  <input type="hidden" class="form-control" name="edit_id"  placeholder="Enter Product Name" readonly>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Code</label>
                  <input type="text" class="form-control" name="edit_pcode"  placeholder="Enter Product Name" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="edit_pname"  placeholder="Enter Product Name" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" name="edit_category"  placeholder="Enter Product Category" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Sub Category</label>
                  <input type="hidden" class="form-control" name="edit_subcategory_id"  placeholder="Enter Product Sub-Category" readonly>
                  <input type="text" class="form-control" name="edit_subcategory"  placeholder="Enter Product Sub-Category" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" name="edit_desciption"></textarea>
                </div>
                <div class="form-group">
                  <label >Unit</label>
                  <select name="edit_unit" class="form-control">
                    <?php foreach($unit as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label >Size</label>
                  <select name="edit_size" class="form-control">
                    <?php foreach($size as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" >HSN/ASC</label>
                  <input type="text" class="form-control" name="edit_hsn"  placeholder="Enter email address">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" >GST(%)</label>
                  <input type="text" class="form-control" name="edit_gst" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" >Purchase price</label>
                  <input type="text" class="form-control" name="edit_purchaseprice" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" >Sales price</label>
                  <input type="text" class="form-control" name="edit_salesprice" placeholder="">
                </div>
                <div class="form-group">
                  <label >Status</label>
                   <select name="edit_status" class="form-control">
                      <option value="active">Active</option>
                      <option value="inactive">Dactive</option>
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
<!-- / Edit popup -->

  <form role="form" action="<?php echo base_url('products/delete') ?>" method="post" id="deleteForm">
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
        var code = $(this).data('code');
        var pname = $(this).data('pname');
        var purchase_price = $(this).data('purchase_price');
        var hsn = $(this).data('hsn');
        var pname = $(this).data('pname');
        var sales_price = $(this).data('sales_price');
        var gst = $(this).data('gst');
        var size = $(this).data('size_id');
        var description = $(this).data('description');
        var status = $(this).data('active');
        var category = $(this).data('category');
        var subcategory = $(this).data('subcategory');
        var subcategory_id = $(this).data('subcategory_id');

        var unit = $(this).data('unit');
        var unit_id = $(this).data('unit_id');

        $('#myModal1').modal('show');
        alert(status);
        $('[name="edit_id"]').val(id);
        $('[name="edit_pcode"]').val(code);
        $('[name="edit_pname"]').val(pname);
        $('[name="edit_category"]').val(category);
        $('[name="edit_subcategory"]').val(subcategory);
        $('[name="edit_subcategory_id"]').val(subcategory_id);
        $('[name="edit_desciption"]').val(description);
        $('[name="edit_unit"]').val(unit_id);
        $('[name="edit_size"]').val(size);
        $('[name="edit_hsn"]').val(hsn);
        $('[name="edit_gst"]').val(gst);
        $('[name="edit_purchaseprice"]').val(purchase_price);
        $('[name="edit_salesprice"]').val(sales_price);
        $('[name="edit_status"]').val(status);

    });


    $('.deleteData').on('click', function(){

        var id = $(this).data('id');
        $('#deleteWaiterModal').modal('show');
        $('[name="id_edit"]').val(id);
    });

</script>
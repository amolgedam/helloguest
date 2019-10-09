
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square"></i> Add New Product
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">

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


                <?php echo validation_errors(); ?>
                

              <form role="form" action="<?php echo base_url('products/create') ?>" method="post">
                 <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>Product Code</label>
                        <input type="text" name="product_code" class="form-control" value="<?php echo set_value('product_code', $product_code); ?>" readonly>
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name" value="<?php echo set_value('name'); ?>" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>Product Category</label>
                        <select name="category" id="category" class="form-control">
                          <option value="0">Select Category</option>
                          <?php foreach($category as $rows): ?>
                            <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                          <?php endforeach; ?>
                        </select> 
                      </div>
                    </div>

                    <!--<div class="col-md-6 col-sm-6 col-xs-12">-->
                    <!--  <div>-->
                    <!--    <label>Product Sub-Category</label>-->
                    <!--    <select name="subcategory" id="subcategory" class="form-control">-->
                    <!--    </select> -->
                    <!--  </div>-->
                    <!--</div>-->

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>Unit</label>
                        <select name="unit" class="form-control">
                          <?php foreach($unit as $rows): ?>
                            <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>Purchase Price</label>
                         <input type="text" name="purchase_price" class="form-control" placeholder="Enter Purchase Price" value="<?php echo set_value('purchase_price') ?>" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>HSN/SAC</label>
                         <input type="text" name="hsn" class="form-control" placeholder="Enter HSN/SAC code" value="<?php echo set_value('hsn') ?>" autocomplete="off">
                      </div>
                    </div>
                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>Sales Price</label>
                         <input type="text" name="sales_price" class="form-control" placeholder="Enter Sales Price" value="<?php echo set_value('sales_price') ?>" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>GST(%)</label>
                         <input type="text" name="gst" class="form-control" placeholder="Enter GST on product" value="<?php echo set_value('gst') ?>" autocomplete="off">
                      </div>
                    </div>

                    <!--<div class="col-md-6 col-sm-6 col-xs-12">-->
                    <!--  <div>-->
                    <!--    <label>Size</label>-->
                    <!--    <select name="size" class="form-control">-->
                    <!--      < ?php foreach($size as $rows): ?>-->
                    <!--        <option value="< ?php echo $rows->id; ?>">< ?php echo $rows->name; ?></option>-->
                    <!--      < ?php endforeach; ?>-->
                    <!--    </select>-->
                    <!--  </div>-->
                    <!--</div>-->
                    <br>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>Status</label>
                        <br>
                        <select name="status" class="form-control">
                          <option value="active">Active</option>
                          <option value="inactive">Dactive</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div>
                        <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Product Description" autocomplete="off"><?php echo set_value('description') ?></textarea>
                      </div>
                    </div>
                </div>
              
              <hr>
              
              <!--<input type="button" name="save" value="Cancel" class="btn btn-danger pull-left">-->
                &nbsp; &nbsp; &nbsp;
              <a href="<?php echo base_url(); ?>products" class="btn btn-danger pull-right">Cancel</a>
              
              <input type="submit" name="save" value="Save Changes" class="btn btn-success pull-right"> 
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      </div>
    </section>
    <!-- /.content -->
  </div>
  <div class="control-sidebar-bg"></div>

</div>



<!-- FOR SHIPPING MODAL OPEN -->
<!-- < ?php
  // $this->load->view('admin_view/includes/modals/shippingType');
  $this->load->view('admin_view/includes/modals/createLedger');
?> -->

<script type="text/javascript">

  var base_url = "<?php echo base_url(); ?>";

  $('#category').on('change', function(){

      // alert('hi');
      var category = $(this).val();
      $('#subcategory option').remove();
      $.ajax({

            url: base_url + 'category/fecthActiveSubCategoryData',
            type: 'post',
            data: {id : category},
            dataType:'json',
            success:function(response) {
                
                var html = '';
            //   console.log(response);
                $.each(response, function(index, value) {
                    html += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                
                $('#subcategory').html(html);
            }
      });
  });
</script>
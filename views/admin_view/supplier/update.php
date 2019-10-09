
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i> Edit Supplier

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Supplier</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <!--  -->
              <div class="row">
  <div class="col-md-12">

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

    <form role="form" action="<?php echo base_url('supplier/updateSupplier') ?>" method="post">
    
            <div class="tile">
              <div class="row">
              <!-- < ?php print_r($supplierData); exit(); ?> -->
               <!-- suppler -->
                  <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="name" value="<?php echo set_value('name', $supplierData['name']); ?>" placeholder="Enter full name" required readonly>
                  
                  <input type="hidden" name="id" value="<?php echo set_value('id', $supplierData['id']); ?>">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo set_value('email', $supplierData['email']); ?>" placeholder="Enter email address">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
             <div class="form-group">
                  <label for="exampleInputEmail1">Contact Number</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone', $supplierData['phone']); ?>" placeholder="Enter contact number">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">GSTIN Number</label>
                  <input type="text" class="form-control" name="gstin" value="<?php echo set_value('gstin', $supplierData['gstin']); ?>" placeholder="Enter your GSTIN Number">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">PAN Number</label>
                  <input type="text" class="form-control" name="pan" value="<?php echo set_value('pan', $supplierData['pan']); ?>" placeholder="Enter your PAN Number">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>State</label>
                  <select name="state" class="form-control">
                    <option value="mh" <?php if($supplierData['state'] == 'mh' ? "selected" : "") ?> >Maharashtra</option>                    
                  </select>
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>City</label>
                  <select name="city" class="form-control">
                    <option value="nagpur" <?php if($supplierData['city'] == 'mh' ? "selected" : "") ?>  >Nagpur</option>
                  </select>
                </div>
             </div>

              <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>Postal Code</label>
                  <input type="text" name="postal_code" value="<?php echo set_value('postal_code', $supplierData['postal_code']); ?>" class="form-control" placeholder="Enter your postal code">
                </div>
             </div>

              <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="active" <?php if($supplierData['status'] == 'active' ? "selected" : "") ?> >Active</option>
                    <option value="inactive" <?php if($supplierData['name'] == 'inactive' ? "selected" : "") ?>>Inactive</option>
                  </select>
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <textarea class="form-control" name="address" placeholder="Enter your address"><?php echo set_value('address', $supplierData['address']); ?></textarea>
                </div>
             </div>
            </div>

              <br><br>
            <hr>
            <div style="float: right;">
              <!-- <button type="reset" class="btn btn-danger">Cancel</button> -->
              <a href="<?php echo base_url() ?>supplier" class="btn btn-danger">Cancel</a>
              <button type="submit" name="submit" id="demoNotify" class="btn btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
          </div>
            </form>
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

<!-- FOR SHIPPING MODAL OPEN -->
<!-- 
< ?php
  $this->load->view('admin_view/includes/modals/shippingType');
  $this->load->view('admin_view/includes/modals/createLedger');
?> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i> Add Supplier

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Supplier</li>
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

    <form role="form" action="<?php echo base_url('supplier/create') ?>" method="post">
    
            <div class="tile">
              <div class="row">
             
               <!-- suppler -->
                  <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Enter full name" required>
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter email address">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
             <div class="form-group">
                  <label for="exampleInputEmail1">Contact Number</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Enter contact number">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">GSTIN Number</label>
                  <input type="text" class="form-control" name="gstin" value="<?php echo set_value('gstin'); ?>" placeholder="Enter your GSTIN Number">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">PAN Number</label>
                  <input type="text" class="form-control" name="pan" value="<?php echo set_value('pan'); ?>" placeholder="Enter your PAN Number">
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>State</label>
                  <select name="state" class="form-control">
                    <option value="mh">Maharashtra</option>                    
                  </select>
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>City</label>
                  <select name="city" class="form-control">
                    <option value="nagpur">Nagpur</option>
                  </select>
                </div>
             </div>

              <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>Postal Code</label>
                  <input type="text" name="postal_code" value="<?php echo set_value('postal_code'); ?>" class="form-control" placeholder="Enter your postal code">
                </div>
             </div>

              <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <textarea class="form-control" name="address" value="<?php echo set_value('address'); ?>" placeholder="Enter your address"></textarea>
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
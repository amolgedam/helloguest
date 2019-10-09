
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i> Update Customer

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Customer</li>
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

    <?php echo validation_errors(); ?>

    <form role="form" action="<?php echo base_url('customer/updateCustomer') ?>" method="post">
          <div class="tile">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1"><span style="color:red">*</span>Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo set_value('name', $customerData['name']); ?>" placeholder="Enter full name" readonly>

                      <input type="hidden" name="id" value="<?php echo set_value('id', $customerData['id']); ?>">
                    </div>
                 </div>
                 
                 <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" name="email" value="<?php echo set_value('email', $customerData['email']); ?>" placeholder="Enter email address">
                    </div>
                 </div>
             
                  <div class="col-lg-6 col-md-6 col-sm-12">
                   <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone', $customerData['phone']); ?>" placeholder="Enter contact number">
                      </div>
                   </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label for="exampleInputEmail1">GSTIN Number</label>
                          <input type="text" class="form-control" name="gstin" value="<?php echo set_value('gstin', $customerData['gstin']); ?>" placeholder="Enter your GSTIN Number">
                        </div>
                     </div>

                     <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label for="exampleInputEmail1">PAN Number</label>
                          <input type="text" class="form-control" name="pan" value="<?php echo set_value('pan', $customerData['pan']); ?>" placeholder="Enter your PAN Number">
                        </div>
                     </div>
           
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label>State</label>
                          <select name="state" class="form-control">
                            <option value="mh" <?php if($customerData['state'] == 'mh' ? "selected" : "") ?>>Maharashtra</option>                    
                          </select>
                        </div>
                     </div>
                    
                     <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label>City</label>
                          <select name="city" class="form-control">
                            <option value="nagpur" <?php if($customerData['city'] == 'mh' ? "selected" : "") ?>>Nagpur</option>
                          </select>
                        </div>
                     </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label>Postal Code</label>
                          <input type="text" name="postal_code" value="<?php echo set_value('postal_code' , $customerData['postal_code']); ?>" class="form-control" placeholder="Enter your postal code">
                        </div>
                     </div>
                      
                      <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="active" <?php if($customerData['status'] == 'mh' ? "selected" : "") ?>>Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                </div>
             </div>

             <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <textarea class="form-control" name="address" placeholder="Enter your address"><?php echo set_value('address', $customerData['address']); ?></textarea>
                </div>
             </div>
            </div>
          </div>
              <br><br>
            <hr>
            <div style="float: right;">
            <a href="<?php echo base_url() ?>customer" class="btn btn-danger">Cancel</a>
              
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

<!-- < ?php
  $this->load->view('admin_view/includes/modals/shippingType');
  $this->load->view('admin_view/includes/modals/createLedger');
?> -->
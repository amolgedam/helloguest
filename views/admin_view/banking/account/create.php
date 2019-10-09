
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i> Add Banking

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Banking</li>
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

    <form role="form" action="<?php echo base_url('banking/createAccount') ?>" enctype="multipart/form-data" method="post">
          <div class="tile">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group">
                      <label for="exampleInputEmail1">Account Holder Name</label>
                      <input type="text" class="form-control" name="name"  placeholder="Enter Account Name">
                    </div>
                  </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >Account Type</label>
                      <select name="type" class="form-control">
                        <option value="saving">Saving Account</option>
                        <option value="current">Current Account</option>
                        <option value="cheking">Checking Account</option>
                        <option value="deposite">Deposit Account</option>
                      </select>
                    </div>
                 </div>
                 
                 <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label >Account Number</label>
                    <input type="text" name="number" class="form-control" required placeholder="Enter Account Number">
                  </div>
                 </div>

                 <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >Bank Name</label>
                      <input type="text" name="bank_name" class="form-control" required placeholder="Enter Bank Name">
                    </div>
                 </div>

                 <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >Opening Balance</label>
                      <input type="number" min="0" name="opening_balance" required="" class="form-control" placeholder="0">
                    </div>
                 </div>
               
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                   <div class="form-group">
                  <label >IFSC Code</label>
                  <input type="text" name="ifsc_code" class="form-control" >
                </div>
              </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                  <label >Bank Address</label>
                  <textarea class="form-control" name="address" placeholder="Enter Bank Address"></textarea>
                </div>
              </div>
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label >Default Account</label>
                  <select name="default_account" class="form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>               
                </div>
              </div>
            </div>
          </div>
              <br><br>
            <hr>
            <div style="float: right;">
            <a href="<?php echo base_url() ?>banking/bankAccount" class="btn btn-danger">Cancel</a>
              
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
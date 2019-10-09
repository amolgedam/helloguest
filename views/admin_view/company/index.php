

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Company</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">company</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php
              if($feedback = $this->session->flashdata('feedback'))
              {
                  $feedback_class = $this->session->flashdata('feedback_class');
          ?>
                  <div class="form-group col-12">
                      <div class="">
                          <div class="alert <?= $feedback_class ?>">
                              <?= $feedback ?>
                          </div>
                      </div>
                  </div>
          <?php }?>
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Company Information</h3>
            </div>
            <form role="form" action="<?php base_url('company/update') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="company_name">Company Name</label>
                  <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="<?php echo $company_data['company_name'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" autocomplete="off" value="<?php echo $company_data['address'] ?>">
                </div>

                <div class="form-group">
                  <label for="state">State</label>
                  <select class="form-control select_group" id="state" name="state">
                    <option value="maharastra" <?php if($company_data['state'] == 'maharastra') { echo "selected";} ?> >Maharastra</option>
                  </select>
                </div>

                
                <div class="form-group">
                  <label for="state">City</label>
                  <select class="form-control select_group" id="city" name="city">
                    <option value="nagpur" <?php if($company_data['state'] == 'nagpur') { echo "selected";} ?>>Nagpur</option>
                    <option value="mumbai" <?php if($company_data['state'] == 'mumbai') { echo "selected";} ?>>Mumbai</option>
                    <option value="pune" <?php if($company_data['state'] == 'pune') { echo "selected";} ?>>Pune</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="phone">Postal Code</label>
                  <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code" value="<?php echo $company_data['postal_code'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="phone">GSTIN</label>
                  <input type="text" class="form-control" id="gstin" name="gstin" value="<?php echo $company_data['gstin'] ?>" placeholder="GSTIN Number" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="phone">PAN</label>
                  <input type="text" class="form-control" id="pan" name="pan" placeholder="PAN Number" autocomplete="off" value="<?php echo $company_data['pan'] ?>">
                </div>

                <div class="form-group">
                  <label for="phone">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" autocomplete="off" value="<?php echo $company_data['email'] ?>">
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" autocomplete="off" value="<?php echo $company_data['phone'] ?>">
                </div>

                <div class="form-group">
                  <label for="currency">Image</label>
                  <input type="text" class="form-control" name="profileName" value="<?php echo $company_data['image'] ?>">
                  <input type="file" name="img">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo base_url() ?>dashboard" class="btn btn-danger">Back to Dashboard</a>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>
            </form>
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

<script type="text/javascript">
  $(document).ready(function() {
    $("#companyMainNav").addClass('active');
    $("#message").wysihtml5();
  });
</script>


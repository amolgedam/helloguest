

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Compose SMS
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Compose SMS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <br>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <div class="col-sm-offset-2 col-sm-7">
                <br>
                    <div>
                    <div>
                      <label>SMS For</label>
                    </div>
                    <div>
                      <select name="for" class="form-control">
                        <option value="0">---select one---</option>
                        <option value="customer">Customer</option>
                        <option value="supplier">Supplier</option>
                      </select>
                    </div>
                </div>
                <br>
                <div>
                    <div>
                      <label>To</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" id="tokenfield"/>

                    </div>
                </div>
                <br>
                <div>
                    <div>
                      <label>Message</label>
                    </div>
                    <div>
                      <textarea name="message" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
                <div align="right">
                    <a href="#" class="btn btn-sm btn-success">Send SMS</a>
                     <a href="#" class="btn btn-sm btn-primary">Send Email</a> 
                </div>
              </div>
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
  <!-- /.content-wrapper -->
 <!--  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>

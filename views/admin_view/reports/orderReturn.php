

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('errors')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('errors'); ?>
          </div>
        <?php endif; ?>

        <!--< ?php if(in_array('createOrder', $user_permission)): ?>-->
        <!--  <a href="< ?php echo base_url('orders/create') ?>" class="btn btn-primary">Add Order</a>-->
        <!--  <br /> <br />-->
        <!--< ?php endif; ?>-->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sales Wise Report</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
        <form name="search" method="POST" action="<?php echo base_url() ?>reports/productReportData">
            <div class="box-header">
              <!-- <div class="col-md-6 col-xs-12 pull pull-left">
                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Waiter Name</label>
                    <div class="col-sm-7">
                      <select class="form-control select_group" id="showWaiter" name="showWaiter">
                      </select>
                    </div>
                  </div>
                </div> -->
       <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script>
      $( function() {
        $( "#datepicker" ).datepicker();
      } );
       $( function() {
        $( "#datepicker2" ).datepicker();
      } );
      </script>
      <?php
      
      $date=date('m/d/Y',time());
      ?>  
        
              <div class="col-md-3">
                <label>Year</label>
                <select name="year" class="form-control">
                  <option value="2019">2019</option>
                </select>  
              </div>
              <div class="col-md-3">
                <label>Month</label>
                <select name="month" class="form-control">
                  <option value="2019">2019</option>
                </select>  
              </div>
              <div class="col-md-3">
                <label>Stream</label>
                <select name="stream" class="form-control">
                  <option value="purchase">Purchase</option>
                  <option value="sales">Sales</option>
                </select>  
              </div>
        
              <div class="col-md-3">
                <br>
                <input type="submit" name="search" value="Search" class="btn btn-success">  
              </div>
            </div>
          </form>
          
        </div>
        
      
        <div style="padding:10px">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Sr. No</th>
                <th>Date</th>
                <th>Invoice No</th>
                <th>Customer Name</th>
                <th>Quality</th>
                <th>Sales Value</th>
                <th>Tax</th>
              </tr>
              </thead>


            </table>
        </div>
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

 <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";


    $(document).ready(function() {
      $('#myDataTables').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'csv', 'excel', 'pdf', 'print'
          ]
      } );
  } );
</script>
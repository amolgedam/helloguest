
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
            <h3 class="box-title">Purchase Wise Report</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
		    <form name="search" method="POST" action="<?php echo base_url() ?>reports/purchase">
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
<!--   <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
   $( function() {
    $( "#datepicker2" ).datepicker();
  } );
  </script> -->
  <?php
  
  $date=date('m/d/Y',time());
  ?>	
				
				
              <div class="col-md-3">
                <label>Date From</label>
                <input type="date" name="from" id="datepicker" class="form-control" value="<?= $date ?>">  
              </div>  
              <div class="col-md-3">
                <label>Date To</label>
                <input type="date" name="to" id="datepicker2" class="form-control" value="<?= $date ?>">  
              </div>
			        <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="gross_amount" class=" control-label" style="text-align:left;">Supplier Name</label>
                    <select class="form-control select_group" name="supplier" id="supplier">
                      <option value="0">All</option>
                      <?php foreach($customer as $rows): ?>
                          <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
              </div>
			  
              <div class="col-md-3">
                <br>
                <input type="submit" name="search" value="Search" class="btn btn-primary">  
              </div>
            </div>
          </form>
          
        </div>
		  
		<div style="padding:10px">
            <table id="myDataTablesExport" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sr. No</th>
                  <th>Date</th>
                  <th>Purchase No</th>
                  <th>Supplier Name</th>
                  <th>Purchase Volume</th>
                  <th>Total Amount</th>
                  <th>Balance Amount</th>
                </tr>
              </thead>
              <tbody> 

                <?php $no=1; foreach($purchaseReport as $rows): ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $rows->billing_date; ?></td>
                    <td><?php echo $rows->invoice_no; ?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->quantity; ?></td>
                    <td><?php echo $rows->gross_total; ?></td>
                    <td><?php echo $rows->dueamount; ?></td>
                  </tr>
                <?php $no++; endforeach; ?>

              </tbody>

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


<!-- <script type="text/javascript">
    
    $(document).ready(function() {
      $('#myDataTablesExport').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'csv', 'excel', 'pdf', 'print'
          ]
      } );
  } );
</script> -->
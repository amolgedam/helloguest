<!--< ?php echo "<pre>"; print_r($expencesReport); exit; ?>-->

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
            <h3 class="box-title">Expence Report</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
		    <form name="search" method="POST" action="<?php echo base_url() ?>reports/expences">
            <div class="box-header">
             
			         <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
  			        <div class="col-md-2 ">
                    <div class="form-group">
                      <label for="gross_amount" class=" control-label" style="text-align:left;">Date From</label>
                      <input type="date" name="from" class="form-control" required>
                    </div>  
                </div>
                <div class="col-md-2 ">
                    <div class="form-group">
                      <label for="gross_amount" class=" control-label" style="text-align:left;">Date To</label>
                      <input type="date" name="to" class="form-control" required>
                    </div>  
                </div>
                <div class="col-md-2 ">
                  <div class="form-group">
                    <label for="gross_amount" class=" control-label" style="text-align:left;">Expences Name</label>
                    <select class="form-control select_group" name="expences" id="supplier">
                      <option value="0">All</option>
                      <?php foreach($exp as $rows): ?>
                          <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
              </div>
              
              <div class="col-md-2 ">
                  <div class="form-group">
                    <label for="gross_amount" class=" control-label" style="text-align:left;">Expences Category</label>
                    <select class="form-control select_group" name="expencesCat">
                      <option value="0">All</option>
                      <?php foreach($expCategory as $rows): ?>
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
                    <th>Sr. No.</th>
                    <th>Expences Name</th>
                    <th>Expences Category</th>
                    <th>Date</th>
                    <th>Payment Method</th>
                    <!--<th>Cheque No</th>-->
                    <!-- <th>Reference</th> -->
                    <th>Amount</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php $no=1; foreach($expencesReport as $rows): 

                      $date = date("d-m-Y", strtotime($rows->date));
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo ucwords($rows->name); ?></td>
                        <td><?php echo ucwords($rows->exp_catemane); ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo ucwords($rows->payment_method); ?></td>
                        <!--<td>< ?php echo ucwords($rows->cheque_no); ?></td>-->
                        <!-- <td>< ?php echo $rows->reference ; ?></td> -->
                        <td><?php echo $rows->amount ; ?></td>
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

 <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
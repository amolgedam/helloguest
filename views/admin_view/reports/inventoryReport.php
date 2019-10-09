
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="app-menu__icon fa fa-bar-chart"></i> Inventory Report
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inventory Report</li>
      </ol>
    </section>

    <div style="padding: 10px;">
        
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
    </div>


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>

            <div class="box-header">
              <form method="post"  action="<?php echo base_url('reports/inventoryReport') ?>" name="inventory">
                <table class="table table-responsive-sm" style="border:none;">
                 <tbody>
                  <tr>
          
                   <td style="width:25%;">
                    <div class="form-group "> 
                      <label class="control-label">Category Name</label>
                      <select name="category" class="form-control" id="product">
                        <option value="0">Select Category</option>
                        <?php foreach($allData as $rows): ?>
                          <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <!-- </datalist> -->
                    </div>
                  </td>

                  <td style="width:25%;">
                    <div class="form-group "> 
                      <label class="control-label">Product Name</label>
                      <select name="product" class="form-control" id="product">
                        <option value="0">Select Name</option>
                        <?php foreach($products as $rows): ?>
                          <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <!-- </datalist> -->
                    </div>
                  </td>
                     
                  <td style="width:20%;">
                   <div class="form-group "> 
                    <label class="control-label">Size</label> 
                     <!-- <div class="input-group"> -->
                    <select name="size" class="form-control select2-hidden-accessible" id="size" tabindex="-1" aria-hidden="true">
                      <option value="0">Select Size</option>
                      <?php foreach($size as $rows): ?>  
                        <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                     <!--  </div> -->
                   
                  </div>
                  </td>
                  <td style="width:20%;">
                   <div class="form-group "> 
                    <label class="control-label">Select Product Stock</label> 
                     <!-- <div class="input-group"> -->
                    <select name="stock" class="form-control select2-hidden-accessible" id="size" tabindex="-1" aria-hidden="true">
                        <option value="0">All</option>
                        <option value="os">Opening Stock</option>
                        <option value="pi">Purchase Stock</option>
                        <option value="ic">Internal Consumption</option>
                        <option value="ds">Damage Stock</option>
                        <option value="si">Sales Stock</option>
                    </select>
                     <!--  </div> -->
                   
                  </div>
                  </td>
                    
                     <td>
                   <div class="form-group ">
                    <label class="control-label">&nbsp;</label> 
                     <div class="input-group">
                 <button name="filter" class="btn btn-primary btn-group-toggle">Filter</button>
                 
                      </div>
                   
                  </div>
                  </td>
                  
                  </tr>
                 </tbody></table>
           
               </form>
            </div>

            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myDataTablesExport">
                  <!-- <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>P.Name</th>
                      <th>P.Code</th>
                      <th>O.Stock</th>
                      <th>Pur.Stock</th>
                      <th>IC</th>
                      <th>D. Stock</th>
                      <th>S. Stock</th>
                      <th>S. Inhand</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> 1</td>
                      <td>sg </td>
                      <td>bb </td>
                      <td>;k </td>
                      <td>;k; </td>
                      <td> fk</td>
                      <td>dfg </td>
                      <td>jg </td>
                      <td>kh </td>
                    </tr>
                  </tbody> -->
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Product Category</th>
                      <th>Purchase Price</th>
                      <th>Sales Price</th>
                      <th>Quantity</th>
                      <!-- <th>D. Stock</th>
                      <th>S. Stock</th>
                      <th>S. Inhand</th> -->
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=1; foreach($reportData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo ucwords($rows->pname); ?></td>
                        <td><?php echo $rows->product_code; ?></td>
                        <td><?php echo ucwords($rows->category); ?></td>
                        <td><?php echo $rows->purchase_price; ?></td>
                        <td><?php echo $rows->sales_price; ?></td>
                        <td><?php echo $rows->quantity; ?></td>
                        <!-- <td>jg </td> -->
                        <!-- <td>kh </td> -->
                      </tr>
                    <?php $no++; endforeach; ?>

                  </tbody>
                </table>
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
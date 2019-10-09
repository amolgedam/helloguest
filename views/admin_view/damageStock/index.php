<!-- < ?php echo "<pre>"; print_r($damageStockData); echo "</pre>"; exit(); ?> -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Damage Stock
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Damage Stock</li>
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
                
            <?php if(in_array('createOpeningStock', $user_permission)): ?>
              <div style="float:right">
                <a href="<?php echo base_url() ?>damage_stock/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Stock</a>
              </div>
            <?php endif; ?>


            <br><br>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>P.Name</th>
                      <th>P.Category</th>
                      <th>Size</th>
                      <th>P.Unit</th>
                      <th>GST</th>
                      <th>Purch.Price</th>
                      <th>Sales.Price</th>
                      <th>Quantity</th>
                      <?php if(in_array('updateOpeningStock', $user_permission) || in_array('deleteOpeningStock', $user_permission)): ?>
                        <th>Action</th>
                      <?php endif; ?>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($damageStockData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows->pname; ?></td>
                        <td><?php echo $rows->category; ?></td>
                        <td><?php echo $rows->size; ?></td>
                        <td><?php echo $rows->unit; ?></td>
                        <td><?php echo $rows->gst; ?></td>
                        <td><?php echo $rows->purchase_price; ?></td>
                        <td><?php echo $rows->sales_price; ?></td>
                        <td><?php echo $rows->quantity; ?></td>
                      <?php if(in_array('updateOpeningStock', $user_permission) || in_array('deleteOpeningStock', $user_permission)): ?>

                        <td width="240px">

                          <?php if(in_array('updateOpeningStock', $user_permission)): ?>
                            <a href="<?php echo base_url() ?>damage_stock/update/<?php echo $rows->products_id ?>" class="btn btn-sm btn-info">
                              <i style="color: white" class="fa fa-edit"></i> Edit
                            </a>
                          <?php endif; ?>


                          <!-- 
                          < ?php if(in_array('deleteOpeningStock', $user_permission)): ?>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_deleteSKU" class="btn btn-sm btn-danger">
                              <i style="color: white" class="fa fa-trash"></i> Delete
                            </a> 
                          < ?php endif; ?>
                        -->
                        </td>
                          <?php endif; ?>
                        
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


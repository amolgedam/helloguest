<!--< ?php echo "<pre>"; print_r($productReport); exit; ?>-->

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
            <h3 class="box-title">Product Wise Report</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
		    <form name="search" method="POST" action="<?php echo base_url() ?>reports/productReport">
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
     <!--  <script>
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
                <input type="date" name="from" class="form-control" >  
              </div>
              <div class="col-md-3">
                <label>Date To</label>
                <input type="date" name="to"  class="form-control">  
              </div>
			        <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="gross_amount" class=" control-label" style="text-align:left;">Product Name</label>
                    <select class="form-control select_group" name="product">
                      <option value="0">All</option>
                      <?php foreach($products as $rows): ?>
                        <option value="<?php echo $rows['products_id'] ?>"><?php echo $rows['pname']; ?></option>
                      <?php endforeach ?>
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
                <!--<th>Date</th>-->
                <!--<th>Invoice No</th>-->
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Seling Amount</th>
                <th>Invoice Amount</th>
                <!--<th>Due Amount</th>-->
              </tr>
              </thead>
              <tbody>

                <?php
                  $no=1;
                  if(!empty($productReport1))
                    {

                    foreach ($productReport1 as $key => $value) {
                        
                        // echo "<br>".$value->products_id;
                        $productData = $this->model_products->fetchDataByID($value['products_id']);

                        // if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['product']))
                        // {
                        //     if(empty($_POST['from']) && empty($_POST['to']) && $_POST['product'] == 0)
                        //     {
                        //       $purchaseData = $this->model_products->purchaseData($value->products_id);
                        //     }
                        //     else if(empty($_POST['from']) && empty($_POST['to']) && $_POST['product'] != 0)
                        //     {
                        //       echo "By 1 Product<br>"; print_r($_POST['product']);
                        //       $purchaseData = $this->model_products->purchaseData($_POST['product']);
                        //     }
                        //     else
                        //     {
                        //       $purchaseData = $this->model_products->purchaseData1($_POST['from'], $_POST['to'], $_POST['product']);
                        //     }
                        // }
                        // else
                        // {
                          $purchaseData = $this->model_products->purchaseData($value['products_id']);

                        // }



                        // if(isset($_POST['from']) != '' && isset($_POST['to']) != '' && isset($_POST['product'] == 0))
                        // {
                        //   $purchaseData = $this->model_products->purchaseData($value->products_id);
                        // }
                        // if(isset($_POST['from']) == '' && isset($_POST['to']) == '' )

                        // else
                        // {
                        //   echo "Given";

                        //   $purchaseData = $this->model_products->purchaseData($value->products_id);
                        // }
                        // echo "<pre>"; print_r($purchaseData);
                    ?>
                      <?php if($purchaseData['qty'] > 0){ ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $productData['name']; ?></td>
                          <td><?php echo $purchaseData['qty']; ?></td>
                          <td><?php echo $productData['sales_price']; ?></td>
                          <td><?php echo $purchaseData['qty'] * $productData['sales_price']; ?></td>
                        </tr>
                      <?php } ?>
                  <?php

                        $no++;
                      }
                    }
                    else
                    {
                        if($_POST['from'] != '' && $_POST['to'] != '')
                        {
                          $productData = $this->model_products->fetchDataByID($productReport2['products_id']);
                          $purchaseData = $this->model_products->purchaseData1($_POST['from'], $_POST['to'], $productReport2['products_id']);
                        }
                        else
                        {
                          $productData = $this->model_products->fetchDataByID($productReport2['products_id']);
                          $purchaseData = $this->model_products->purchaseData($productReport2['products_id']);
                        }



                  ?>  
                      <?php if($purchaseData['qty'] > 0){ ?>

                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $productData['name']; ?></td>
                            <td><?php echo $purchaseData['qty']; ?></td>
                            <td><?php echo $productData['sales_price']; ?></td>
                            <td><?php echo $purchaseData['qty'] * $productData['sales_price']; ?></td>
                          </tr>
                        <?php } ?>

                  <?php
                    }
                  ?>
                
               <!--  < ?php $no=1; foreach($productReport as $rows): ?>
                    
                    < ?php 
                        foreach($products as $rows){
                            
                            
                        }
                    ?>
                    
                
                  
                < ?php $no++; endforeach; ?>
 -->
<!--<tr>-->
<!--                    <td>< ?php echo $no; ?></td>-->
                    <!--<td>< ?php echo $rows->billing_date; ?></td>-->
                    <!--<td>< ?php echo $rows->invoice_no; ?></td>-->
<!--                    <td>< ?php echo $rows->pname; ?></td>-->
<!--                    <td>< ?php echo $rows->quantity; ?></td>-->
<!--                    <td>< ?php echo $rows->sprice; ?></td>-->
                    <!--<td>< ?php echo $rows->paidamount; ?></td>-->
                    <!--<td>< ?php echo $rows->dueamount; ?></td>-->
<!--                  </tr>-->
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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-shopping-basket" aria-hidden="true"></i>  Sales order exchange


        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales order exchange</li>
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

<form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
         
              <div class="col-lg-6">
               
                  <div class="form-group ">
               
                    <label for="exampleInputEmail1">Search Sale Invoice / Product Serial Number</label> <span style="color:red;">∗</span>
                    <input class="form-control" id="exampleInputEmail1" name="sales_invoice_no" type="text" placeholder="" value="" required="">
                
                  </div>
                  </div>
                   <div class="col-lg-6">
                  <div class="form-group ">
                  <label>&nbsp;</label><br>
               <button type="submit" name="submit" id="demoNotify" class="btn btn-primary" style="float:left;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Find</button>
                  </div>
                 </div>
                 </div>
                 </form>
                 
<!-- /find -->

<br>
       
  <form method="post" name="insert" enctype="multipart/form-data" action="purchase-process.php">
          <div class="tile">
            <div class="row">
             
             <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Customer</label> <span style="color:red;">∗</span>
             <!--  -->
             <!-- <div class="input-group"> -->

                  <select name="customer" class="form-control">
                    <?php foreach($customer as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                </select>
  <!-- <div class="input-group-addon" ><i class="fa fa-plus-square" data-toggle="modal" data-target="#myModal"></i></div> -->
                <!-- </div> -->
             <!--  -->

              </div>
              </div>

              
              <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
                    <label class="control-label">Billing date</label> <span style="color:red;">∗</span>
                     <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                        <input class="form-control" name="billing_date" autocomplete="off" id="demoDate" type="date" placeholder="Select date" required="">
                        <!--<div class="input-group-append"><span class="input-group-text">.00</span></div>-->
                      </div>
                   
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
               <label class="control-label">Invoice No.</label> <span style="color:red;">∗</span>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text">SO</span></div>
                <input class="form-control" id="po_invoice_number" name="po_invoice_number" value="" type="text" placeholder="" required="">
                        </div>
               </div>
             </div>

<!--  -->
                 <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Payment Method</label> <span style="color:red;">∗</span>
                   <select name="customer" class="form-control">
                    <?php foreach($paymentmethod as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Transaction Type</label> <span style="color:red;">∗</span>
                 <select name="transactionterm" class="form-control">
                  <?php foreach($paymentterm as $rows): ?>
                    <option value="<?php echo $rows->id ?>"><?php echo $rows->name ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Salesman</label> <span style="color:red;">∗</span>
            
                <input list="customer" name="browser" class="form-control " placeholder="Type Salesman Name">
  <datalist id="customer">
    <option value="CHANDIRAM JI">
    <option value="DEEPAK DESIGNER">
    <option value="NEELUFER CREATIONS">
    <option value="SUNWAY">
    <option value="JAIPUR FAB">
  </datalist>
  


              </div>
              </div>
               
              </div>
              
              
              <h5 >Sales Invoice Products</h5>
              <div class="table-responsive">
                  <table class="table table-responsive-sm  table-bordered " id="customFields">
                          <thead>
                            <tr>
                              <th width="20%">Product Name</th>
                              <th width="7%">Size</th>
                              <th width="7%">HSN/SAC</th>
                              <th width="7%">GST(%)</th>
                              <th width="10%">Price</th>
                              <th width="8%">Quantity</th>
                              <th width="8%">TAX</th>
                              <th width="8%">Discount</th>
                              <th width="8%">Total</th>
                              <th width="2%">
                                <a href="javascript:void(0);" class="addCF">
                                  <button class="btn btn-success addmore " type="button" title="Add field">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                  </button> 
                                </a>
                              </th>
                            </tr>
                          </thead>
                        <tbody>
                          <tr id="row_1">
                            <td>
                              <input type="hidden" name="product_id[]" data-row-id="row_1" class="product_1 form-control autocomplete_txt" autocomplete="off">              
                              
                              <input list="product1"  class="form-control" onchange="getProductData(1)" placeholder="Type product name" data-row-id="row_1" id="pname_1 product_1" name="productName[]" required>
                              
                              <datalist id="product1">
                                <?php foreach($allData as $rows): ?>
                                  <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                <?php endforeach; ?>
                              </datalist>
                            </td>
                            <td>
                              <input type="text"  name="size[]" id="size_1" class="size_1 form-control ">
                              <!-- <input type="hidden"  name="size_value[]" id="size_value_1" class="size_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="hsn[]" id="hsn_1" class="hsn_1 form-control ">
                              <!-- <input type="hidden"  name="hsn_value[]" id="hsn_value_1" class="hsn_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="gst[]" id="gst_1" class="gst_1 form-control" >
                              <!-- <input type="hidden"  name="gst_value[]" id="gst_value_1" class="gst_value_1 form-control "> -->
                            </td> 
                            <td>
                              <input type="text" name="purchasePrice[]" id="pprice_1" class="pprice_1 form-control">
                              <!-- <input type="hidden"  name="purchasePrice_value[]" id="pprice_value_1" class="pprice_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="quantity[]" id="quantity_1" class="quantity_1 form-control" >
                              <!-- <input type="hidden"  name="quantity_value[]" id="quality_value_1" class="quality_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="tax[]" id="tax_1" class="tax_1 form-control" >
                              <!-- <input type="hidden"  name="tax_value[]" id=tax_value_1" class=tax_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="discount[]" id="discount_1" class="discount_1 form-control" >
                              <!-- <input type="hidden"  name="discount_value[]" id=discount_value_1" class=discount_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="total[]" id="total_1" class="total_1 form-control" >
                              <!-- <input type="hidden"  name="total_value[]" id=total_value_1" class=total_value_1 form-control "> -->
                            </td>
                            <td>
                              <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                              </a>
                            </td>
                          </tr>

                          <tr d="row_2">
                            <td>
                              <input type="hidden" name="product_id[]" data-row-id="row_1" class="product_1 form-control autocomplete_txt" autocomplete="off">              
                              
                              <input list="product2"  class="form-control getProductData" placeholder="Type product name" data-row-id="rowpname_1" id="pname_2 product_2" name="productName[]" >
                              
                              <datalist id="product2">
                                <?php foreach($allData as $rows): ?>
                                  <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                <?php endforeach; ?>
                              </datalist>
                            </td>
                            <td>
                              <input type="text"  name="size[]" id="size_2" class="size_2 form-control ">
                              <!-- <input type="hidden"  name="size_value[]" id="size_value_2" class="size_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="hsn[]" id="hsn_2" class="hsn_2 form-control ">
                              <!-- <input type="hidden"  name="hsn_value[]" id="hsn_value_2" class="hsn_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="gst[]" id="gst_2" class="gst_2 form-control">
                              <!-- <input type="hidden"  name="gst_value[]" id="gst_value_2" class="gst_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="purchasePrice[]" id="pprice_2" class="pprice_2 form-control">
                              <!-- <input type="hidden"  name="purchasePrice_value[]" id="pprice_value_2" class="pprice_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="quantity[]" id="quantity_2" class="quantity_2 form-control" >
                              <!-- <input type="hidden"  name="quantity_value[]" id="quantity_2" class="quality_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="tax[]" id="tax_2" class="tax_2 form-control" >
                              <!-- <input type="hidden"  name="tax_value[]" id="tax_2" class=tax_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="discount[]" id="discount_2" class="discount_2 form-control" >
                              <!-- <input type="hidden"  name="discount_value[]" id=discount_value_2" class=discount_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="total[]" id="total_2" class="total_2 form-control" >
                              <!-- <input type="hidden"  name="total_value[]" id="total_2" class=total_value_2 form-control "> -->
                            </td>
                            <td>
                              <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                              </a>
                            </td>
                          </tr>

                          <tr d="row_3">
                            <td>
                              <input type="hidden" name="product_id[]" data-row-id="row_1" class="product_1 form-control autocomplete_txt" autocomplete="off">              
                              
                              <input list="product3"  class="form-control getProductData" placeholder="Type product name" data-row-id="rowpname_1" id="pname_3 product_3" name="productName[]">
                              
                              <datalist id="product3">
                                <?php foreach($allData as $rows): ?>
                                  <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                <?php endforeach; ?>
                              </datalist>
                            </td>
                            <td>
                              <input type="text"  name="size[]" id="size_3" class="size_3 form-control ">
                              <!-- <input type="hidden"  name="size_value[]" id="size_value_3" class="size_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="hsn[]" id="hsn_3" class="hsn_3 form-control ">
                              <!-- <input type="hidden"  name="hsn_value[]" id="hsn_value_3" class="hsn_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="gst[]" id="gst_3" class="gst_3 form-control">
                              <!-- <input type="hidden"  name="gst_value[]" id="gst_value_3" class="gst_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="purchasePrice[]" id="pprice_3" class="pprice_3 form-control">
                              <!-- <input type="hidden"  name="purchasePrice_value[]" id="pprice_value_3" class="pprice_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="quantity[]" id="quantity_3" class="quantity_3 form-control" >
                              <!-- <input type="hidden"  name="quantity_value[]" id="quality_value_3" class="quality_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="tax[]" id="tax_3" class="tax_3 form-control" >
                              <!-- <input type="hidden"  name="tax_value[]" id=tax_value_3" class=tax_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="discount[]" id="discount_3" class="discount_3 form-control" >
                              <!-- <input type="hidden"  name="discount_value[]" id=discount_value_3" class=discount_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="total[]" id="total_3" class="total_3 form-control" >
                              <!-- <input type="hidden"  name="total_value[]" id=total_value_3" class=total_value_3 form-control "> -->
                            </td>
                            <td>
                              <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                              </a>
                            </td>
                          </tr>

                          <tr d="row_4">
                            <td>
                              <input type="hidden" name="product_id[]" data-row-id="row_1" class="product_1 form-control autocomplete_txt" autocomplete="off">              
                              
                              <input list="product4"  class="form-control getProductData" placeholder="Type product name" data-row-id="rowpname_1" id="pname_4 product_4" name="productName[]">
                              
                              <datalist id="product4">
                                <?php foreach($allData as $rows): ?>
                                  <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                <?php endforeach; ?>
                              </datalist>
                            </td>
                            <td>
                              <input type="text"  name="size[]" id="size_4" class="size_4 form-control ">
                              <!-- <input type="hidden"  name="size_value[]" id="size_value_4" class="size_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="hsn[]" id="hsn_4" class="hsn_4 form-control ">
                              <!-- <input type="hidden"  name="hsn_value[]" id="hsn_value_4" class="hsn_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="gst[]" id="gst_4" class="gst_4 form-control" >
                              <!-- <input type="hidden"  name="gst_value[]" id="gst_value_4" class="gst_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="purchasePrice[]" id="pprice_4" class="pprice_4 form-control">
                              <!-- <input type="hidden"  name="purchasePrice_value[]" id="pprice_value_4" class="pprice_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="quantity[]" id="quantity_4" class="quantity_4 form-control" >
                              <!-- <input type="hidden"  name="quantity_value[]" id="quality_value_4" class="quality_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="tax[]" id="tax_4" class="tax_4 form-control" >
                              <!-- <input type="hidden"  name="tax_value[]" id=tax_value_4" class=tax_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="discount[]" id="discount_4" class="discount_4 form-control" >
                              <!-- <input type="hidden"  name="discount_value[]" id=discount_value_4" class=discount_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="total[]" id="total_4" class="total_4 form-control" >
                              <!-- <input type="hidden"  name="total_value[]" id=total_value_4" class=total_value_4 form-control "> -->
                            </td>
                            <td>
                              <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                              </a>
                            </td>
                          </tr>
                    </tbody>
                  </table>
              </div>
              </div>
             <div class="row">
          <div class="col-xs-12 col-lg-12 col-md-12 pull-left" >
            <!-- <div class="pull-left">
            <button class="btn btn-danger delete " type="button" title="Delete field" ><i class="fa fa-trash"></i></button>&nbsp;
            <button class="btn btn-success addmore " type="button" title="Add field"><i class="fa fa-plus" aria-hidden="true"></i>
           </button>
            </div><br><br><br> -->
          <div style="float:right; line-height:22px;" class="col-sm-4">
                    <div class="form-inline" style="margin-bottom:10px;">
          <div class="form-group" style="margin-bottom:10px;">
            <label>Subtotal: &nbsp;</label>
                   <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> <input type="text" class="form-control" name="subtotal" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
            </div>
          </div>
                    <div class="form-group" style="margin-bottom:10px;">
            
            <label>Tax: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="input-group ">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>              <input type="text" class="form-control" id="gsttaxamount" placeholder="Tax" onkeypress="return IsNumeric(event);" name="totaltax_amount" ondrop="return false;" onpaste="return false;">
            </div>
          </div>
            <div class="form-group" style="margin-bottom:10px;">
            <label>Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" name="gross_total" onpaste="return false;">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:10px;">
            <label style="margin-left:-25px;">Amount Paid: &nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" name="paid_amount" onpaste="return false;">
            </div>
          </div>
           <!--new  -->
               <div class="form-group" style="margin-bottom:10px;">
            <label style="margin-left:-25px;">Due Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control" id="amountPaid" placeholder="Due Date" onkeypress="return IsNumeric(event);" ondrop="return false;" name="paid_amount" onpaste="return false;">
            </div>
          </div>
          <!--end new  -->

          <div class="form-group">
            <label style="margin-left:-25px;">Amount Due: &nbsp;&nbsp;</label>
            <div class="input-group">
            <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control amountDue" id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" name="due_amount" onpaste="return false;">
            </div>
          </div>
                    </div>
                    </div>
                      <div class="form-group col-sm-7">
            <label><strong>Remark:</strong> &nbsp;</label><br><br>
             <textarea name="remark" placeholder="Remark" class="form-control "></textarea>
           </div>
    
        
      </div>
        </div>
     <hr>
          <div class="tile-footer" style="float:right;margin-right: 70px"">
              <button type="button" class="btn btn-danger" onclick="window.location.href='purchase-list'">Cancel</button>
                  <input type="hidden" value="insert" name="action">
         <button type="submit" name="submit" id="demoNotify" class="btn btn-success" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
        </div>
        </form>
      
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
  <div class="control-sidebar-bg"></div>

</div>

<!-- FOR SHIPPING MODAL OPEN -->

<!-- < ?php
  $this->load->view('admin_view/includes/modals/shippingType');
  $this->load->view('admin_view/includes/modals/createLedger');
?> -->



<script type="text/javascript">
  $(document).ready(function(){

    var base_url = "<?php echo base_url(); ?>";

      $(".addCF").click(function(){

          var table = $("#customFields");
          var count_table_tbody_tr = $("#customFields tbody tr").length;
          var row_id = count_table_tbody_tr + 1;

          $.ajax({
              url: base_url + '/products/fecthAllProductsData/',
              type: 'post',
              dataType: 'json',
              success:function(response) {

                // console.log(response);
                var html = '<tr id="row_'+row_id+'">'+
                                '<td>'+
                                  '<input list="product'+row_id+'"  class="form-control getProductData" placeholder="Type product name" data-row-id="rowpname_'+row_id+'" id="pname_'+row_id+' product_'+row_id+'" name="productName[]">'+

                                  '<datalist id="product'+row_id+'">'
                                      '<option value=""></option>';
                                      $.each(response, function(index, value) {
                                        // console.log(value.pname);
                                        html += '<option value="'+value.products_id+'">'+value.pname+'</option>';             
                                      });
                                      
                                    html +='</datalist>'+
                                '</td>'+

                                '<td>'+
                                    '<input type="text"  name="size[]" id="size_'+row_id+'" class="size_'+row_id+' form-control ">'+
                                    // '<input type="hidden"  name="size_value[]" id="size_value_'+row_id+'" class="size_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                    '<input type="text"  name="hsn[]" id="hsn_'+row_id+'" class="hsn_'+row_id+' form-control ">'+
                                    // '<input type="hidden"  name="hsn_value[]" id="hsn_value_'+row_id+'" class="hsn_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text"  name="gst[]" id="gst_'+row_id+'" class="gst_'+row_id+' form-control" >'+
                                      // '<input type="hidden"  name="gst_value[]" id="gst_value_'+row_id+'" class="gst_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="purchasePrice[]" id="pprice_'+row_id+'" class="pprice_'+row_id+' form-control">'+
                                      // '<input type="hidden"  name="purchasePrice_value[]" id="pprice_value_'+row_id+'" class="pprice_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="quantity[]" id="quantity_'+row_id+'" class="quantity_'+row_id+' form-control" >'+
                                      // '<input type="hidden"  name="quantity_value[]" id="quality_value_'+row_id+'" class="quality_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="tax[]" id="tax_'+row_id+'" class="tax_'+row_id+' form-control" >'+
                                      // '<input type="hidden"  name="tax_value[]" id=tax_value_'+row_id+'" class=tax_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="discount[]" id="discount_'+row_id+'" class="discount_'+row_id+' form-control" >'+
                                      // '<input type="hidden"  name="discount_value[]" id=discount_value_'+row_id+'" class=discount_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="total[]" id="total_'+row_id+'" class="total_'+row_id+' form-control" >'+
                                      // '<input type="hidden"  name="total_value[]" id=total_value_'+row_id+'" class=total_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button></a>'+
                                '</td>'+
                          '</tr>';

                          if(count_table_tbody_tr >= 1) {
                            $("#customFields tbody tr:last").after(html); 
                          }
                          else
                          {
                              $("#customFields tbody").html(html);
                          }

                      }
            });

      return false;

      });
        
      $("#customFields").on('click','.remCF',function(){
          $(this).parent().parent().remove();
      });
});

</script>
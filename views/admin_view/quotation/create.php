<style>
    .error {
        border: solid 2px #FF0000;  
    }
</style>
<!--< ?php echo $quotationCode; exit; ?>-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i>  Create Quotation 

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Quotation</li>
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

<!-- popup -->

            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Create new customer</h4>
        </div>
        <div class="modal-body">
           <form role="form">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1"> Name</label>
                  <input type="text" class="form-control"  placeholder="Enter full Name">
                </div>

                
                
                <div class="form-group">
                  <label >Email</label>
                  <input type="text" class="form-control"  placeholder="Enter Email Address">
                </div>

                <div class="form-group">
                  <label >Contact Number</label>
                  <input type="text" class="form-control"  placeholder="Enter Bank Name">
                </div>

                <div class="form-group">
                  <label class="control-label">DOB</label>
                    <input type="date" value="" class="form-control" name="dob" id="demoDate" placeholder="Enter  date of birth">
                </div>

                <div class="form-group">
                  <label class="control-label">GSTIN Number</label>
                
                   <input type="text" name="gstin_number" id="gstin_number" class="form-control" value="" placeholder="Enter your GSTIN Number">
                  
                </div>

                <div class="form-group">
                  <label class="control-label">PAN Number</label> 
                
                   <input type="text" name="pan_number" id="pan_number" class="form-control" value="" placeholder="Enter your PAN Number">
                  
                </div>

                <div class="form-group">
                  <label class="control-label">Address </label> <span style="color:red;">∗</span>
                  <textarea name="address" class="form-control" placeholder="Enter your address" required=""></textarea>
                </div>

                <div class="form-group">
                  <label class="control-label">State</label> 
                
                   <select class="form-control" name="state" id="state" data-filter-theme="b" data-filter-placeholder="Select your state">
                <option value="">Select your state</option>
                <option value="1">Andaman and Nicobar Islands</option><option value="2">Andhra Pradesh</option><option value="3">Arunachal Pradesh</option><option value="4">Assam</option><option value="5">Bihar</option><option value="6">Chandigarh</option><option value="7">Chhattisgarh</option><option value="8">Dadra and Nagar Haveli</option><option value="9">Daman and Diu</option><option value="10">Delhi</option><option value="11">Goa</option><option value="12">Gujarat</option><option value="13">Haryana</option><option value="14">Himachal Pradesh</option><option value="15">Jammu and Kashmir</option><option value="16">Jharkhand</option><option value="17">Karnataka</option><option value="18">Kenmore</option><option value="19">Kerala</option><option value="20">Lakshadweep</option><option value="21">Madhya Pradesh</option><option value="22">Maharashtra</option><option value="23">Manipur</option><option value="24">Meghalaya</option><option value="25">Mizoram</option><option value="26">Nagaland</option><option value="27">Narora</option><option value="28">Natwar</option><option value="29">Odisha</option><option value="30">Paschim Medinipur</option><option value="31">Pondicherry</option><option value="32">Punjab</option><option value="33">Rajasthan</option><option value="34">Sikkim</option><option value="35">Tamil Nadu</option><option value="36">Telangana</option><option value="37">Tripura</option><option value="38">Uttar Pradesh</option><option value="39">Uttarakhand</option><option value="40">Vaishali</option><option value="41">West Bengal</option>                </select>
                </div>


                <div class="form-group">
                  <label class="control-label">City</label> 
                
                <select class="form-control" name="city" id="city" data-filter-theme="b" data-filter-placeholder="Select your state">
                <option value="">Select your state first</option>
                
                
                </select>
                </div>

                <div class="form-group">
                  <label class="control-label">Postal code</label> 
                
                 <input type="tel" name="postal_code" class="form-control" placeholder="Enter your postal code" maxlength="6" min="6"> 
                </div>

                 
                 <div class="form-group">
                  <label class="control-label">Status</label> 
                
                 <select class="form-control">
                   <option>Active</option>
                   <option>InActive</option>
                 </select> 
                </div>
              
               
              </div> 
                   </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
      
    </div>
  </div>

  <form role="form" action="<?php echo base_url('quotation/createQuotation') ?>" method="post">

          <div class="tile">
            <div class="row">
             
             <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Customer</label> <span style="color:red;">∗</span>
             <!--  -->
             <div class="input-group">
                <div class="input-group-addon" ><a href="<?php echo base_url('customer/createCustomerFromQuotation') ?>"><i class="fa fa-plus-square" data-toggle="modal" data-target="#myModal1"></i></a></div>
                <select name="customer" class="form-control">
                    <?php foreach($customer as $rows): ?>
                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
             <!--  -->

              </div>
              </div>

              
              <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
                    <label class="control-label">Quotation date</label> <span style="color:red;">∗</span>
                     <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                        <input class="form-control" name="quotation_date" autocomplete="off" id="demoDate" type="date" placeholder="Select date" required="">
                        <!--<div class="input-group-append"><span class="input-group-text">.00</span></div>-->
                      </div>
                   
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
               <label class="control-label">Quotation No.</label> <span style="color:red;">∗</span>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text">PO</span></div>
                <input class="form-control" id="quotation_no" name="quotation_no" value="<?php echo $quotationCode; ?>" readonly type="text" placeholder="Enter Quotation Number" required="">
                        </div>
               </div>
             </div>
               
              </div>
              
              
              <h5 >Quotation</h5>
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
                                <input type="hidden" name="product_id[]" data-row-id="row_1" id="pid_1" class="product_1 form-control autocomplete_txt" autocomplete="off">           
                                
                                <input list="product1"  class="form-control" onchange="getProductData(1)" placeholder="Type product name" data-row-id="row_1" id="pname_1" name="productName[]" required>
                                
                                <datalist id="product1">
                                  <?php foreach($allData as $rows): ?>
                                    <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                  <?php endforeach; ?>
                                </datalist>
                              </td>
                              <td>
                                <input type="text"  name="size[]" id="size_1" class="size_1 form-control" readonly>
                                <input type="hidden" name="size_value[]" id="size_value_1" class="size_value_1 form-control ">
                              </td>
                              <td>
                                <input type="text"  name="hsn[]" id="hsn_1" class="hsn_1 form-control" readonly>
                                <input type="hidden"  name="hsn_value[]" id="hsn_value_1" class="hsn_value_1 form-control ">
                              </td>
                              <td>
                                <input type="text"  name="gst[]" id="gst_1" class="gst_1 form-control" readonly>
                                <input type="hidden"  name="gst_value[]" id="gst_value_1" class="gst_value_1 form-control ">
                              </td> 
                              <td>
                                <input type="text" name="purchasePrice[]" id="pprice_1" class="pprice_1 form-control" readonly>
                                <input type="hidden" name="purchasePrice_value[]" id="pprice_value_1" class="pprice_value_1 form-control ">
                              </td>
                              <td>
                                <input type="number" name="quantity[]" min="1" id="quantity_1" class="quantity_1 form-control" onkeyup="getTotal(1)">
                                <input type="hidden" name="quantity_value[]" id="quality_value_1" class="quality_value_1 form-control " onkeyup="amountCal()">
                              </td>
                              <td>
                                <input type="text" name="tax[]" id="tax_1" class="tax_1 form-control" readonly="">
                                <input type="hidden" name="tax_value[]" id="tax_value_1" class="tax_value_1 form-control ">
                              </td>
                              <td>
                                <input type="number" name="discount[]" min="0" id="discount_1" class="discount_1 form-control" onkeyup="getTotal(1)" value="0">
                                <input type="hidden" name="discount_value[]" id="discount_value_1" onkeyup="amountCal()" class="discount_value_1 form-control ">
                              </td>
                              <td>
                                <input type="text" name="total[]" id="total_1" class="total_1 form-control" readonly>
                                <input type="hidden"  name="total_value[]" id="total_value_1" class="total_value_1 form-control ">
                              </td>
                              <td>
                                <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                                </a>
                              </td>
                            </tr>

                            <tr id="row_2">
                              <td>
                                <input type="hidden" name="product_id[]" data-row-id="row_2" id="pid_2" class="product_2 form-control autocomplete_txt" autocomplete="off">            
                                
                                <input list="product2"  class="form-control" onchange="getProductData(2)"  placeholder="Type product name" data-row-id="rowpname_1" id="pname_2" name="productName[]" >
                                
                                <datalist id="product2">
                                  <?php foreach($allData as $rows): ?>
                                    <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                  <?php endforeach; ?>
                                </datalist>
                              </td>
                              <td>
                                <input type="text"  name="size[]" id="size_2" class="size_2 form-control " readonly="">
                                <input type="hidden"  name="size_value[]" id="size_value_2" class="size_value_2 form-control ">
                              </td>
                              <td>
                                <input type="text" name="hsn[]" id="hsn_2" class="hsn_2 form-control " readonly="">
                                <input type="hidden"  name="hsn_value[]" id="hsn_value_2" class="hsn_value_2 form-control ">
                              </td>
                              <td>
                                <input type="text" name="gst[]" id="gst_2" class="gst_2 form-control" readonly="">
                                <input type="hidden" name="gst_value[]" id="gst_value_2" class="gst_value_2 form-control ">
                              </td>
                              <td>
                                <input type="text" name="purchasePrice[]" id="pprice_2" class="pprice_2 form-control" readonly>
                                <input type="hidden" name="purchasePrice_value[]" id="pprice_value_2" class="pprice_value_2 form-control ">
                              </td>
                              <td>
                                <input type="number" name="quantity[]" min="1" id="quantity_2" class="quantity_2 form-control" onkeyup="getTotal(2)">
                                <input type="hidden" name="quantity_value[]" id="quantity_2" class="quality_value_2 form-control " onkeyup="amountCal()">
                              </td>
                              <td>
                                <input type="text" name="tax[]" id="tax_2" class="tax_2 form-control" readonly="">
                                <input type="hidden" name="tax_value[]" id="tax_value_2" class="tax_value_2 form-control ">
                              </td>
                              <td>
                                <input type="number" name="discount[]" min="0" id="discount_2" class="discount_2 form-control" onkeyup="getTotal(2)" value="0">
                                <input type="hidden" name="discount_value[]" id="discount_value_2" class="discount_value_2 form-control " onkeyup="amountCal()">
                              </td>
                              <td>
                                <input type="text" name="total[]" id="total_2" class="total_2 form-control" readonly="">
                                <input type="hidden" name="total_value[]" id="total_value_2" class="total_value_2 form-control ">
                              </td>
                              <td>
                                <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                                </a>
                              </td>
                            </tr>

                            <tr id="row_3">
                              <td>
                                <input type="hidden" name="product_id[]" data-row-id="row_2" id="pid_2" class="product_2 form-control autocomplete_txt" autocomplete="off">          
                                
                                <input list="product3"  class="form-control"  onchange="getProductData(3)" placeholder="Type product name" data-row-id="rowpname_3" id="pname_3" name="productName[]">
                                
                                <datalist id="product3">
                                  <?php foreach($allData as $rows): ?>
                                    <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                  <?php endforeach; ?>
                                </datalist>
                              </td>
                              <td>
                                <input type="text" name="size[]" id="size_3" class="size_3 form-control " readonly>
                                <input type="hidden" name="size_value[]" id="size_value_3" class="size_value_3 form-control ">
                              </td>
                              <td>
                                <input type="text" name="hsn[]" id="hsn_3" class="hsn_3 form-control " readonly>
                                <input type="hidden"  name="hsn_value[]" id="hsn_value_3" class="hsn_value_3 form-control ">
                              </td>
                              <td>
                                <input type="text" name="gst[]" id="gst_3" class="gst_3 form-control" readonly="">
                                <input type="hidden" name="gst_value[]" id="gst_value_3" class="gst_value_3 form-control ">
                              </td>
                              <td>
                                <input type="text" name="purchasePrice[]" id="pprice_3" class="pprice_3 form-control" readonly>
                                <input type="hidden" name="purchasePrice_value[]" id="pprice_value_3" class="pprice_value_3 form-control ">
                              </td>
                              <td>
                                <input type="number" name="quantity[]" min="1" id="quantity_3" class="quantity_3 form-control" onkeyup="getTotal(3)">
                                <input type="hidden" name="quantity_value[]" id="quality_value_3" class="quality_value_3 form-control " onkeyup="amountCal()">
                              </td>
                              <td>
                                <input type="text" name="tax[]" id="tax_3" class="tax_3 form-control" readonly>
                                <input type="hidden" name="tax_value[]" id="tax_value_3" class="tax_value_3 form-control ">
                              </td>
                              <td>
                                <input type="number" name="discount[]" min="0" id="discount_3" class="discount_3 form-control" onkeyup="getTotal(3)" value="0">
                                <input type="hidden" name="discount_value[]" id="discount_value_3" class="discount_value_3 form-control " onkeyup="amountCal()">
                              </td>
                              <td>
                                <input type="text" name="total[]" id="total_3" class="total_3 form-control" readonly="">
                                <input type="hidden" name="total_value[]" id="total_value_3" class="total_value_3 form-control ">
                              </td>
                              <td>
                                <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                                </a>
                              </td>
                            </tr>

                            <tr id="row_4">
                              <td>
                                <input type="hidden" name="product_id[]" data-row-id="row_4" id="pid_4" class="product_4 form-control autocomplete_txt" autocomplete="off">                 
                                
                                <input list="product4"  class="form-control"  onchange="getProductData(4)" placeholder="Type product name" data-row-id="rowpname_1" id="pname_4" name="productName[]">
                                
                                <datalist id="product4">
                                  <?php foreach($allData as $rows): ?>
                                    <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                  <?php endforeach; ?>
                                </datalist>
                              </td>
                              <td>
                                <input type="text"  name="size[]" id="size_4" class="size_4 form-control " readonly>
                                <input type="hidden" name="size_value[]" id="size_value_4" class="size_value_4 form-control ">
                              </td>
                              <td>
                                <input type="text"  name="hsn[]" id="hsn_4" class="hsn_4 form-control " readonly>
                                <input type="hidden" name="hsn_value[]" id="hsn_value_4" class="hsn_value_4 form-control ">
                              </td>
                              <td>
                                <input type="text"  name="gst[]" id="gst_4" class="gst_4 form-control" readonly>
                                <input type="hidden" name="gst_value[]" id="gst_value_4" class="gst_value_4 form-control ">
                              </td>
                              <td>
                                <input type="text" name="purchasePrice[]" id="pprice_4" class="pprice_4 form-control" readonly>
                                <input type="hidden" name="purchasePrice_value[]" id="pprice_value_4" class="pprice_value_4 form-control ">
                              </td>
                              <td>
                                <input type="number" name="quantity[]" min="1" id="quantity_4" class="quantity_4 form-control" onkeyup="getTotal(4)">
                                <input type="hidden" name="quantity_value[]" id="quality_value_4" class="quality_value_4 form-control " onkeyup="amountCal()">
                              </td>
                              <td>
                                <input type="text" name="tax[]" id="tax_4" class="tax_4 form-control" readonly="">
                                <input type="hidden" name="tax_value[]" id="tax_value_4" class="tax_value_4 form-control ">
                              </td>
                              <td>
                                <input type="number" name="discount[]" min="0" id="discount_4" class="discount_4 form-control" onkeyup="getTotal(4)" value="0">
                                <input type="hidden" name="discount_value[]" id="discount_value_4" class="discount_value_4 form-control " onkeyup="amountCal()">
                              </td>
                              <td>
                                <input type="text" name="total[]" id="total_4" class="total_4 form-control" readonly="">
                                <input type="hidden" name="total_value[]" id="total_value_4" class="total_value_4 form-control ">
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
            
          <div style="float:right; line-height:22px;" class="col-sm-4">
                    <div class="form-inline" style="margin-bottom:10px;">
          <div class="form-group" style="margin-bottom:10px;">
            <label>Subtotal: &nbsp;</label>
                   <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> <input type="text" class="form-control" name="subtotal" id="subTotal" placeholder="Subtotal" readonly>
            </div>
          </div>
                    <div class="form-group" style="margin-bottom:10px;">
            
            <label>Tax: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="input-group ">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>              <input type="text" class="form-control" id="gsttaxamount" placeholder="Tax" name="totaltax_amount" readonly>
            </div>
          </div>
            <div class="form-group" style="margin-bottom:10px;">
            <label>Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control" id="totalAftertax" placeholder="Total" name="gross_total" onpaste="return false;" readonly="">
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
          <div class="tile-footer" style="float:right;margin-right: 70px">
            <a href="<?php echo base_url() ?>quotation" class="btn btn-danger">Cancel</a>
              
                  <input type="hidden" value="insert" name="action">
         <button type="submit" name="submit" id="demoNotify" class="btn btn-success" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save changes</button>
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
                                  '<input type="hidden" name="product_id[]" data-row-id="row_'+row_id+'" id="pid_'+row_id+'" class="product_'+row_id+' form-control autocomplete_txt" autocomplete="off">'+

                                  '<input list="product'+row_id+'"  class="form-control"  onchange="getProductData('+row_id+')" placeholder="Type product name" data-row-id="rowpname_'+row_id+'" id="pname_'+row_id+'" name="productName[]">'+

                                  '<datalist id="product'+row_id+'">'
                                      '<option value=""></option>';
                                      $.each(response, function(index, value) {
                                        // console.log(value.pname);
                                        html += '<option value="'+value.products_id+'">'+value.pname+'</option>';             
                                      });
                                      
                                    html +='</datalist>'+
                                '</td>'+

                                '<td>'+
                                    '<input type="text"  name="size[]" id="size_'+row_id+'" class="size_'+row_id+' form-control " readonly>'+
                                    '<input type="hidden" name="size_value[]" id="size_value_'+row_id+'" class="size_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                    '<input type="text"  name="hsn[]" id="hsn_'+row_id+'" class="hsn_'+row_id+' form-control " readonly>'+
                                    '<input type="hidden" name="hsn_value[]" id="hsn_value_'+row_id+'" class="hsn_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text"  name="gst[]" id="gst_'+row_id+'" class="gst_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden" name="gst_value[]" id="gst_value_'+row_id+'" class="gst_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="purchasePrice[]" id="pprice_'+row_id+'" class="pprice_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden" name="purchasePrice_value[]" id="pprice_value_'+row_id+'" class="pprice_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="number" name="quantity[]" min="1" id="quantity_'+row_id+'" class="quantity_'+row_id+' form-control" onkeyup="getTotal('+row_id+')">'+
                                      '<input type="hidden" name="quantity_value[]" id="quality_value_'+row_id+'" class="quality_value_'+row_id+' form-control " onkeyup="amountCal()">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="tax[]" id="tax_'+row_id+'" class="tax_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden" name="tax_value[]" id=tax_value_'+row_id+'" class=tax_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="number" name="discount[]" min="0" id="discount_'+row_id+'" class="discount_'+row_id+' form-control" onkeyup="getTotal('+row_id+')" value="0">'+
                                      '<input type="hidden" name="discount_value[]" id=discount_value_'+row_id+'" class=discount_value_'+row_id+' form-control " onkeyup="amountCal()">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="total[]" id="total_'+row_id+'" class="total_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden" name="total_value[]" id=total_value_'+row_id+'" class=total_value_'+row_id+' form-control ">'+
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


<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";

  function getProductData(row_id)
   {
      var product_id = $("#pname_"+row_id).val();    
      // console.log(product_id);//alert(row_id);
      if(product_id == "")
      {
        $("#size_"+row_id).val("");
        $("#hsn_"+row_id).val("");
        $("#gst_"+row_id).val("");
        $("#pprice_"+row_id).val("");
        $("#quantity_"+row_id).val("");
        $("#tax_"+row_id).val("");
        $("#total_"+row_id).val("");
        $("#totalgst_value_"+row_id).val("");
      }
      else
      {
         $.ajax({
                  url: base_url + 'products/getProductsDataByID',
                  type: 'post',
                  data: {id : product_id},
                  dataType:'json',
                  success:function(response) {
                    // setting the rate value into the rate input field
                    // console.log(response);
                    $("#pid_"+row_id).val(response.products_id);

                    $("#size_"+row_id).val(response.size);
                    $("#size_value_"+row_id).val(response.size);

                    $("#hsn_"+row_id).val(response.hsn);
                    $("#hsn_value_"+row_id).val(response.hsn);

                    $("#gst_"+row_id).val(response.gst);
                    $("#gst_value_"+row_id).val(response.gst);

                    $("#pprice_"+row_id).val(response.sales_price);
                    $("#pprice_value_"+row_id).val(response.sales_price);

                    $("#quantity_"+row_id).val(1);
                    $("#quality_value_"+row_id).val(1);

                    var total = Number(response.sales_price) * 1;
                    total = total.toFixed(2);

                    var gst_value = $('#gst_value_'+row_id).val();

                    var gstTotal_value = ((total * gst_value)/100);

                    $("#totalgst_value_"+row_id).val(gstTotal_value);

                    $("#tax_"+row_id).val(gstTotal_value);
                    $("#tax_value_"+row_id).val(gstTotal_value);

                    var total = Number(response.sales_price) * 1;
                    total = total.toFixed(2);
                    // console.log(total);
                    var quantity = $('#quantity_'+row_id).val();

                    var total_value = ((total * quantity));

                    $("#total_"+row_id).val(total_value);
                    $("#total_value_"+row_id).val(total_value);

                    amountCal();
                  }
            });
      }
   }

  //  for quantity 
  function getTotal(row = null) {
    if(row) {
      
      var mytotal = Number($("#pprice_"+row).val()) * Number($("#quantity_"+row).val());
      
      // console.log(mytotal);
      var discount = Number($("#discount_"+row).val());
      // console.log(discount);

      var total = mytotal - discount;
      // console.log(total);

      
      $("#total_"+row).val(total);
      $("#total_value_"+row).val(total);

      var gst_value = $('#gst_value_'+row).val();
      var gsttot=((total * gst_value)/100);
      total = total.toFixed(2);
      $("#tax_"+row).val(gsttot);
      $("#tax_value_"+row).val(gsttot);
      $("#totalgst_value_"+row).val(gsttot);
     
      amountCal();

      findQuantity(row);
      // findDiscount(row);

    } else {
      alert('no row !! please refresh the page');
    }
  }


  // Calculate the Invoice
 function amountCal()
  {
      // find length of table

      var tableProductLength = $("#customFields tbody tr").length;
      var prosubTotal = 0;
      var totaltaxAmount=0;
      // console.log(tableProductLength);
//alert(tableProductLength);
      var totalamt=0;
      for(x = 0; x < tableProductLength; x++){

        var tr = $("#customFields tbody tr")[x];
        var count = $(tr).attr('id');
//alert(count);
        count = count.substring(4);

      //   prosubTotal = Number(prosubTotal) + Number($("#total_value_"+count).val());
      //      //alert(prosubTotal);
        // //console.log(subTotal);

      
      //  totaltaxAmount=Number(totaltaxAmount) + Number($("#tax_value_"+count).val());

       prosubTotal = prosubTotal + Number($("#total_"+count).val());
           // alert(prosubTotal);
        // console.log(subTotal);

      
       totaltaxAmount=totaltaxAmount + Number($("#tax_"+count).val());
      } // /for
    
   //alert(prosubTotal);
   $("#subTotal").val(prosubTotal);
     $("#gsttaxamount").val(totaltaxAmount);
     totalamt=prosubTotal+totaltaxAmount;
   $("#totalAftertax").val(totalamt);
     var paid = $("#amt_paid").val();
   if(paid) {
      var grandTotal = Number(totalamt) - Number(paid);
      grandTotal = grandTotal.toFixed(2);
      $("#amountDue").val(grandTotal);
      
    } else {
      $("#amountDue").val(totalamt);
      
    } 
  }

  function findQuantity(row = '')
  {
      var qty = Number($("#quantity_"+row).val());
      // console.log(qty);
      
      if(parseInt(qty) <= 0 || isNaN(qty))
      {
        //   alert("Please Enter Valid Quantity");
            $("#quantity_"+row).val('0');
            $("#quantity_"+row).addClass('error');
            $("#quantity_"+row).focus();
      }
      else
      {
          $("#quantity_"+row).removeClass('error');
      }
  }
</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i>  Create Sales Return

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Sales Return</li>
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



              <!-- /.box-body -->

              
                   </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </form> 
        </div>
      </div>
      
    </div>
  </div>
  
            <!-- /popup -->



       
  <form method="post" name="insert" enctype="multipart/form-data" action="purchase-process.php">
          <div class="tile">
            <div class="row">
             
             <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Customer</label> <span style="color:red;">∗</span>
             <!--  -->
             <div class="input-group">

                <input list="customer" name="browser" class="form-control " placeholder="Type Customer Name">
  <datalist id="customer">
    <option value="CHANDIRAM JI">
    <option value="DEEPAK DESIGNER">
    <option value="NEELUFER CREATIONS">
    <option value="SUNWAY">
    <option value="JAIPUR FAB">
  </datalist>
  <div class="input-group-addon" ><i class="fa fa-plus-square" data-toggle="modal" data-target="#myModal"></i></div>
                </div>
             <!--  -->

              </div>
              </div>

              
              <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
                    <label class="control-label">Billing date</label> <span style="color:red;">∗</span>
                     <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                        <input class="form-control" name="billing_date" autocomplete="off" id="demoDate" type="text" placeholder="Select date" required="">
                        <!--<div class="input-group-append"><span class="input-group-text">.00</span></div>-->
                      </div>
                   
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
               <label class="control-label">Invoice No.</label> <span style="color:red;">∗</span>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text">PO</span></div>
                <input class="form-control" id="po_invoice_number" name="po_invoice_number" value="" type="text" placeholder="Enter Purchase No." required="">
                        </div>
               </div>
             </div>

<!--  -->
                 <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Payment Method</label> <span style="color:red;">∗</span>
           <select name="supplier_id" class="form-control">
           <option value="">Select one</option>
           <option value="5">CHANDIRAM JI</option><option value="3">DEEPAK DESIGNER</option><option value="1">JAIPUR FAB</option><option value="2">NEELUFER CREATIONS</option><option value="4">SUNWAY</option>           </select>
              </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Payment term</label> <span style="color:red;">∗</span>
           <select name="supplier_id" class="form-control">
           <option value="">Select one</option>
           <option value="5">CHANDIRAM JI</option><option value="3">DEEPAK DESIGNER</option><option value="1">JAIPUR FAB</option><option value="2">NEELUFER CREATIONS</option><option value="4">SUNWAY</option>           </select>
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
<!--  -->
               
               
              </div>
              
              
              <h5 >Purchase Invoice Products</h5>
              <div class="table-responsive">
              <table class="table table-responsive-sm  table-bordered ">
          <thead>
            <tr>
              
              
              <th width="20%">Product Name</th>
                             <th width="7%">Size</th>
                            <th width="10%">HSN/SAC</th>
                            <th width="7%">GST(%)</th>
              <th width="5%">Price</th>
              <th width="8%">Quantity</th>
                            <th width="10%">Tax (<i class="fa fa-inr"></i>)</th>
               <th width="3%">Discount(%)</th>             
              <th width="15%">Total (<i class="fa fa-inr"></i>)</th>
            </tr>
          </thead>
                  
          <tbody>
            <tr>
              
                      <input type="hidden" data-type="product_code" name="product_code[]" id="product_code_1" class="form-control autocomplete_txt" autocomplete="off">
                        <input type="hidden" data-type="product_id" name="product_id[]" id="product_id_1" class="form-control autocomplete_txt" autocomplete="off">
                        <input type="hidden" data-type="unit" name="unit[]" id="unit_1" class="form-control autocomplete_txt" autocomplete="off">
                            </td>
              
              <td><input list="supplier" name="browser" class="form-control " placeholder="Type product name">
  <datalist id="supplier">
    <option value="CHANDIRAM JI">
    <option value="DEEPAK DESIGNER">
    <option value="NEELUFER CREATIONS">
    <option value="SUNWAY">
    <option value="JAIPUR FAB">
  </datalist></td>
                            <td><input type="text" data-type="itemsize" name="itemsize[]" id="itemsize_1" class="form-control " autocomplete="off"></td>
                             <td>
                            <input type="text" data-type="hsn_sac" name="hsn_sac[]" id="hsn_sac_1" class="form-control" autocomplete="off" style="width:100%;">
                            </td>
                            <td>
                            <input type="text" data-type="gst_tax" name="gst_tax[]" id="gst_tax_1" class="form-control" autocomplete="off" style="width:100%;" readonly="">
                            </td>
                            <td width="15%"><input type="text" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
              <td><input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                            <td><input type="text" name="taxtotal[]" id="taxtotal_1" class="form-control totalTaxprice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                            <td><input type="text" name="amount[]" id="amount_1" class=" form-control amount" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
              <td><input type="text" name="total[]" id="total_1" class=" form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
            </tr>
          </tbody>
        </table>
              </div>
              </div>
             <div class="row">
          <div class="col-xs-12 col-lg-12 col-md-12 pull-left" >
            <div class="pull-left">
            <button class="btn btn-danger delete " type="button" title="Delete field" ><i class="fa fa-trash"></i></button>&nbsp;
            <button class="btn btn-success addmore " type="button" title="Add field"><i class="fa fa-plus" aria-hidden="true"></i>
           </button>
            </div><br><br><br>
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
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>              <input type="tel" class="form-control" id="gsttaxamount" placeholder="Tax" onkeypress="return IsNumeric(event);" name="totaltax_amount" ondrop="return false;" onpaste="return false;">
            </div>
          </div>
            <div class="form-group" style="margin-bottom:10px;">
            <label>Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
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
          <div class="form-group">
            <label style="margin-left:-25px;">Amount Due: &nbsp;</label>
            <div class="input-group">
            <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control amountDue" id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" name="due_amount" onpaste="return false;">
            </div>
          </div>
                    </div>
                    </div>
                      <div class="form-group col-sm-7">
            <label><strong>Remark:</strong> &nbsp;</label>
             <textarea name="remark" placeholder="Remark" class="form-control "></textarea>
           </div>
    
        
      </div>
        </div>
     <hr>
          <div class="tile-footer">
              <button type="button" class="btn btn-danger" onclick="window.location.href='purchase-list'">Cancel</button>
                  <input type="hidden" value="insert" name="action">
         <button type="submit" name="submit" id="demoNotify" class="btn btn-success" style="float:right;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save changes</button>
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
<!--< ?php echo "<pre>"; print_r($data); echo "</pre>"; exit; ?>-->

<style>
    .error {
        border: solid 2px #FF0000;  
    }
</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i>  Edit Sales Invoice

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Sales Order</li>
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

<form role="form" action="<?php echo base_url('sales_invoice/UpdateInvoice') ?>" method="post">
          <div class="tile">
            <div class="row">
             
             <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Customer</label> <span style="color:red;">∗</span>
             <!--  -->
             <div class="input-group">

                  <div class="input-group-addon" ><i class="fa fa-user" data-toggle="modal" data-target="#myModal1"></i></div>

                  <input type="text" name="customer" class="form-control" value="<?php echo $data['name_id'] ?>" readonly="">
                  <input type="hidden" name="cid" value="<?php echo $data['name_id']; ?>">
                  <!-- <select name="customer" class="form-control">
                    < ?php foreach($customer as $rows): ?>
                      <option value="< ?php echo $rows->id; ?>">< ?php echo $rows->name; ?></option>
                    < ?php endforeach; ?>
                </select> -->
                </div>
             <!--  -->

              </div>
              </div>

              
              <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
                    <label class="control-label">Billing date</label> <span style="color:red;">∗</span>
                     <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                        <input class="form-control" name="billing_date" autocomplete="off" id="demoDate" type="date" placeholder="Select date" value="<?php echo $data['billing_date'] ?>" required="" readonly>
                        <!--<div class="input-group-append"><span class="input-group-text">.00</span></div>-->
                      </div>
                  </div>  
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
               <label class="control-label">Invoice No.</label> <span style="color:red;">∗</span>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text">PO</span></div>
                <input class="form-control" id="po_invoice_number" name="po_invoice_number" type="text" placeholder="Enter Purchase No." required="" readonly value="<?php echo $data['invoice_no'] ?>">
                        </div>
               </div>
             </div>

                 <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Payment Method</label> <span style="color:red;">∗</span>
                <!--<input type="text" name="pmethod" class="form-control" readonly value="< ?php echo $data['pmethod'] ?>">-->
                <input type="hidden" name="pmid" value="<?php echo $data['pmid'] ?>">
                    <select name="pmethod" class="form-control">
                        <?php foreach($paymentmethod as $rows): ?>
                          <option value="<?php echo $rows->id; ?>" <?php echo $data['pmid'] ==  $rows->id ? "selected" : ""; ?> ><?php echo $rows->name; ?></option>
                        <?php endforeach; ?>
                    </select>
               <!--  <select name="customer" class="form-control">
                    < ?php foreach($paymentmethod as $rows): ?>
                      <option value="< ?php echo $rows->id; ?>">< ?php echo $rows->name; ?></option>
                    < ?php endforeach; ?>
                </select> -->
              </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Transaction Type</label> <span style="color:red;">∗</span>
                <!--<input type="text" name="pterm" class="form-control" readonly="" value="< ?php echo $data['pterm'] ?>">-->
                <input type="hidden" name="pid" value="<?php echo $data['ipterm'] ?>">
                
                <select name="pterm" class="form-control">
                  <?php foreach($paymentterm as $rows): ?>
                    <option value="<?php echo $rows->id ?>" <?php echo $data['ipterm'] ==  $rows->id ? "selected" : ""; ?> ><?php echo $rows->name ?></option>
                  <?php endforeach; ?>

                </select>
                <!-- <select name="transactionterm" class="form-control">
                  < ?php foreach($paymentterm as $rows): ?>
                    <option value="< ?php echo $rows->id ?>">< ?php echo $rows->name ?></option>
                  < ?php endforeach; ?>
                </select> -->
              </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Sales Type</label> <span style="color:red;">∗</span>
            
                <!-- <input list="customer" name="browser" class="form-control " placeholder="Type Salesman Name">
                  <datalist id="customer">
                    <option value="CHANDIRAM JI">
                    <option value="DEEPAK DESIGNER">
                    <option value="NEELUFER CREATIONS">
                    <option value="SUNWAY">
                    <option value="JAIPUR FAB">
                  </datalist> -->
                <!--<input type="text" name="salesman" class="form-control" value="< ?php echo $data['salesmanname'] ?>" readonly="">-->
                <input type="hidden" name="salesman_id" class="form-control" value="<?php echo $data['sid'] ?>" readonly="">
                
                <select name="salesman" class="form-control">
                        <?php foreach($salesman as $rows): ?>
                            <option value="<?php echo $rows->id ?>" <?php echo $data['sid'] ==  $rows->id ? "selected" : ""; ?> ><?php echo $rows->name; ?></option>
                        <?php endforeach; ?>
                    </select>

              </div>
              </div>
               
              </div>
              
              
              <h5 >Sales Invoice Products</h5>
              <div class="table-responsive">
                  <table class="table table-responsive-sm  table-bordered " id="customFields">
                          <thead>
                            <tr>
                              <th width="20%">Product Name</th>
                              <!--<th width="7%">Size</th>-->
                              <th width="7%">HSN/SAC</th>
                              <th width="7%">GST(%)</th>
                              <th width="10%">Price</th>
                              <th width="8%">Quantity</th>
                              <th width="8%">TAX</th>
                              <th width="8%">Discount</th>
                              <th width="8%">Total</th>
                              <th width="2%">
                                <a href="javascript:void(0);" class="addCF">
                                  <button class="btn btn-success addmore " type="button" id="btnAddCF" title="Add field">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                  </button> 
                                </a>
                              </th>
                            </tr>
                          </thead>
                        <tbody>

                          <?php $no=1; foreach($invoicData as $irows): ?>
                            <tr id="row_<?php echo $no; ?>">
                              <td>
                                <input type="hidden" name="product_id[]" data-row-id="row_<?php echo $no; ?>" id="pid_<?php echo $no; ?>" class="product_<?php echo $no; ?> form-control autocomplete_txt" autocomplete="off" value="<?php echo $irows->pid ?>">    
                                
                                <input list="product<?php echo $no; ?>"  class="form-control" onchange="getProductData(<?php echo $no; ?>)" placeholder="Type product name" data-row-id="row_<?php echo $no; ?>" id="pname_<?php echo $no; ?>" name="productName[]" required value="<?php echo $irows->pname; ?>">
                                
                                <datalist id="product<?php echo $no; ?>">
                                  <?php foreach($allData as $rows): ?>
                                    <option value="<?php echo $rows->pname; ?>"><?php echo $rows->pname; ?></option>
                                  <?php endforeach; ?>
                                </datalist>
                              </td>
                              <!--<td>-->
                              <!--  <input type="text"  name="size[]" id="size_< ?php echo $no; ?>" class="size_< ?php echo $no; ?> form-control" value="< ?php echo $irows->sname; ?>" readonly >-->
                              <!--  <input type="hidden" name="size_value[]" id="size_value_< ?php echo $no; ?>" class="size_value_< ?php echo $no; ?> form-control ">-->
                              <!--</td>-->
                              <td>
                                <input type="text"  name="hsn[]" value="<?php echo $irows->hsn; ?>" id="hsn_<?php echo $no; ?>" class="hsn_<?php echo $no; ?> form-control" readonly>
                                <input type="hidden"  name="hsn_value[]" id="hsn_value_<?php echo $no; ?>" class="hsn_value_<?php echo $no; ?> form-control ">
                              </td>
                              <td>
                                <input type="text"  name="gst[]" value="<?php echo $irows->gst; ?>" id="gst_<?php echo $no; ?>" class="gst_<?php echo $no; ?> form-control" readonly>
                                <input type="hidden"  name="gst_value[]" id="gst_value_<?php echo $no; ?>" class="gst_value_<?php echo $no; ?> form-control ">
                              </td> 
                              <td>
                                <input type="text" name="purchasePrice[]" value="<?php echo $irows->sprice; ?>" id="pprice_<?php echo $no; ?>" class="pprice_<?php echo $no; ?> form-control" readonly>
                                <input type="hidden" name="purchasePrice_value[]" id="pprice_value_<?php echo $no; ?>" class="pprice_value_<?php echo $no; ?> form-control ">
                              </td>
                              <td>
                                <input type="hidden" name="dbquantity[]" id="dbquantity_<?php echo $no; ?>" class="dbquantity_<?php echo $no; ?> form-control" value="<?php echo $irows->quantity; ?>" onkeyup="amountCal()" >

                                <input type="text" name="quantity[]" min="1" value="<?php echo $irows->qty; ?>" id="quantity_<?php echo $no; ?>" class="quantity_<?php echo $no; ?> form-control" onkeyup="getTotal(<?php echo $no; ?>)">

                                <input type="hidden" name="quantity_value[]" id="quality_value_<?php echo $no; ?>" class="quality_value_<?php echo $no; ?> form-control" onkeyup="amountCal()">

                                <input type="hidden" name="oldquantity[]" id="oldquantity_<?php echo $no; ?>" class="oldquantity_<?php echo $no; ?> form-control" value="<?php echo $irows->qty ?>">
                              </td>
                              <td>
                                <input type="text" name="tax[]" value="<?php echo $irows->tax; ?>" id="tax_<?php echo $no; ?>" class="tax_<?php echo $no; ?> form-control" readonly="">
                                <input type="hidden" name="tax_value[]" id="tax_value_<?php echo $no; ?>" class="tax_value_<?php echo $no; ?> form-control " value="<?php echo $irows->tax; ?>">
                              </td>
                              <td>
                                <input type="number" name="discount[]" min="0" id="discount_<?php echo $no; ?>" class="discount_<?php echo $no; ?> form-control" onkeyup="getTotal(<?php echo $no;?>)" value="<?php echo $irows->discount; ?>">

                                <input type="hidden" name="discount_value[]" id="discount_value_<?php echo $no; ?>" onkeyup="amountCal()" class="discount_value_<?php echo $no; ?> form-control">
                              </td>
                              <td>
                                <input type="text" name="total[]" id="total_<?php echo $no; ?>" class="total_<?php echo $no; ?> form-control" value="<?php echo $irows->total; ?>" readonly>
                                <input type="hidden"  name="total_value[]" id="total_value_<?php echo $no; ?>" class="total_value_<?php echo $no; ?> form-control " value="<?php echo $irows->total; ?>">
                              </td>
                              <td>
                                <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                                </a>
                              </td>
                            </tr>
                          <?php $no++; endforeach; ?>

                    </tbody>
                  </table>
              </div>
              </div>
              <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 pull-left">
                      <div style="float:right; line-height:22px;" class="col-sm-4">
                                <div class="form-inline" style="margin-bottom:10px;">
                      <div class="form-group" style="margin-bottom:10px;">
                        <label>Subtotal: &nbsp;</label>
                               <div class="input-group">
                                    <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                                    <input type="text" class="form-control" name="subtotal" id="subTotal" placeholder="Subtotal" value="<?php echo $data['total'] ?>" readonly>
                        </div>
                      </div>
                                <div class="form-group" style="margin-bottom:10px;">
                        
                        <label>Tax: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="input-group ">
                          <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                          <input type="text" class="form-control" id="gsttaxamount" placeholder="Tax" name="tax" value="<?php echo $data['tax'] ?>" readonly>
                        </div>
                      </div>
                        <div class="form-group" style="margin-bottom:10px;">
                        <label>Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="input-group">
                          <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
                          <input type="text" class="form-control" id="totalAftertax" placeholder="Total" name="gross_total" value="<?php echo $data['gross_total'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:10px;">
                        <label style="margin-left:-25px;">Amount Paid: &nbsp;</label>
                        <div class="input-group">
                          <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
                          <input type="text" class="form-control" id="amt_paid" placeholder="Amount Paid" onkeyup="amountCal()" name="paid_amount" value="<?php echo $data['paidamount'] ?>">
                        </div>
                      </div>
                       <!--new  -->
                           <div class="form-group" style="margin-bottom:10px;">
                        <label style="margin-left:-25px;">Due Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="input-group">
                          <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
                          <input type="date" class="form-control" id="duedate" placeholder="Due Date" name="duedate" value="<?php echo $data['due_date'] ?>">
                        </div>
                      </div>
                      <!--end new  -->

                      <div class="form-group">
                        <label style="margin-left:-25px;">Amount Due: &nbsp;&nbsp;</label>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
                          <input type="text" class="form-control amountDue" id="amountDue" placeholder="Amount Due" name="due_amount" value="<?php echo $data['dueamount'] ?>" readonly>
                        </div>
                      </div>
                                </div>
                                </div>
                                  <div class="form-group col-sm-7">
                        <label><strong>Remark:</strong> &nbsp;</label><br><br>
                              <textarea name="remark" placeholder="Remark" class="form-control"><?php echo $data['remark'] ?></textarea>
                       </div>
                
                    
                  </div>
              </div>
     <hr>
          <div class="tile-footer" style="float:right;margin-right: 70px">
            <a href="<?php echo base_url() ?>sales_invoice" class="btn btn-danger">Cancel</a>
              
                  <input type="hidden" value="insert" name="action">
         <button type="submit" name="submit" id="demoNotify" class="btn btn-success" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save changes</button>
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
          
          
          $('#btnAddCF').prop('disabled', true);
            var href = $('.addCF').attr('href');
            $('.addCF').removeAttr('href');

          var table = $("#customFields");
          var count_table_tbody_tr = $("#customFields tbody tr").length;
          var row_id = count_table_tbody_tr + 1;
          // alert(row_id);
          $.ajax({
              url: base_url + '/products/fecthAllProductsData/',
              type: 'post',
              dataType: 'json',
              success:function(response) {

                // console.log(response);
                var html = '<tr id="row_'+row_id+'">'+
                                '<td>'+
                                  '<input type="hidden" name="product_id[]" data-row-id="row_'+row_id+'" id="pid_'+row_id+'" class="product_'+row_id+' form-control autocomplete_txt" autocomplete="off">'+

                                  '<input list="product'+row_id+'" class="form-control"  onchange="getProductData('+row_id+')" placeholder="Type product name" data-row-id="rowpname_'+row_id+'" id="pname_'+row_id+'" name="productName[]">'+

                                  '<datalist id="product'+row_id+'">'
                                      '<option value=""></option>';
                                      $.each(response, function(index, value) {
                                        // console.log(value.pname);
                                        html += '<option value="'+value.pname+'">'+value.pname+'</option>';             
                                      });
                                      
                                    html +='</datalist>'+
                                '</td>'+

                                // '<td>'+
                                //     '<input type="text"  name="size[]" id="size_'+row_id+'" class="size_'+row_id+' form-control " readonly>'+
                                //     '<input type="hidden" name="size_value[]" id="size_value_'+row_id+'" class="size_value_'+row_id+' form-control ">'+
                                // '</td>'+

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
                                      '<input type="hidden" name="dbquantity[]" id="dbquantity_'+row_id+'" class="dbquantity_'+row_id+' form-control">'+

                                      '<input type="text" name="quantity[]" min="1" id="quantity_'+row_id+'" class="quantity_'+row_id+' form-control" onkeyup="getTotal('+row_id+')">'+
                                      '<input type="hidden" name="quantity_value[]" id="quality_value_'+row_id+'" class="quality_value_'+row_id+' form-control " onkeyup="amountCal()">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="tax[]" id="tax_'+row_id+'" class="tax_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden" name="tax_value[]" id="tax_value_'+row_id+'" class="tax_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="number" name="discount[]" min="0" id="discount_'+row_id+'" class="discount_'+row_id+' form-control" onkeyup="getTotal('+row_id+')" value="0">'+
                                      '<input type="hidden" name="discount_value[]" id="discount_value_'+row_id+'" class="discount_value_'+row_id+' form-control " onkeyup="amountCal()">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="total[]" id="total_'+row_id+'" class="total_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden" name="total_value[]" id="total_value_'+row_id+'" class="total_value_'+row_id+' form-control ">'+
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
                          
                            $('.addCF').attr('href', href);
                          $('#btnAddCF').prop('disabled', false);

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
      // alert(row_id);
      var product_name = $("#pname_"+row_id).val();    
      // console.log(product_id);//alert(row_id);
      if(product_name == "")
      {
        // $("#size_"+row_id).val("");
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
                  data: {product_name : product_name},
                  dataType:'json',
                  success:function(response) {
                    // setting the rate value into the rate input field
                    // console.log(response);
                    $("#pid_"+row_id).val(response.products_id);

                    // $("#size_"+row_id).val(response.size);
                    // $("#size_value_"+row_id).val(response.size);

                    $("#hsn_"+row_id).val(response.hsn);
                    $("#hsn_value_"+row_id).val(response.hsn);

                    $("#gst_"+row_id).val(response.gst);
                    $("#gst_value_"+row_id).val(response.gst);

                    $("#pprice_"+row_id).val(response.sales_price);
                    $("#pprice_value_"+row_id).val(response.sales_price);

                    $("#dbquantity_"+row_id).val(response.quantity);

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

      var gst_value = $('#gst_'+row).val();
      // alert(gst_value );
      var gsttot=((total * gst_value)/100);
      total = total.toFixed(2);
      $("#tax_"+row).val(gsttot);
      $("#tax_value_"+row).val(gsttot);
      $("#totalgst_value_"+row).val(gsttot);
     
      amountCal();

      findQuantity(row);

      findNegativeQuantity(row);
      
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

       //  prosubTotal = Number(prosubTotal) + Number($("#total_value_"+count).val());
       //      //alert(prosubTotal);
       //  // console.log(subTotal);

      
       // totaltaxAmount=Number(totaltaxAmount) + Number($("#tax_value_"+count).val());

       prosubTotal = prosubTotal + Number($("#total_"+count).val());
           // alert(prosubTotal);
        // console.log(subTotal);

      
       totaltaxAmount=totaltaxAmount + Number($("#tax_"+count).val());
      } // /for
    
   // console.log(prosubTotal);
   $("#subTotal").val(prosubTotal);
     $("#gsttaxamount").val(totaltaxAmount);
     totalamt=prosubTotal+totaltaxAmount;
     // console.log(totalamt);
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

//   function findQuantity(row = '')
//   {
//       var qty = Number($("#quantity_"+row).val());
//       var dbqty = Number($("#dbquantity_"+row).val());
//       // console.log(qty);
//       // console.log(dbqty);

//       if(dbqty < qty)
//       {
//          alert('Available Quantity '+ dbqty +' Enter Quantity '+ qty +'\n Enter Quantity More than Available Quantity');

//         $("#quantity_"+row).val(1);
//       }
//   }

  function findNegativeQuantity(row = '')
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
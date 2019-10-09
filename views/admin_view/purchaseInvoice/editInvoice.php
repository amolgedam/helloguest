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
        Edit Purchase Invoice
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Purchase Invoice</li>
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


<form role="form" action="<?php echo base_url('purchase_invoice/editInvoiceData') ?>" method="post">
          <div class="tile">
            <div class="row">
             <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Supplier</label> <span style="color:red;">∗</span>
             <!--  -->
                 <select class="form-control" name="supplier">
                  <?php foreach($supplier as $rows): ?>
                    <option value="<?php echo $rows->id; ?>" <?php echo ($viewData['sname'] == $rows->name ) ? "selected" : "" ?> ><?php echo $rows->name; ?></option>
                  <?php endforeach; ?>
                </select>
             <!--  -->
                <!--<input type="text" name="supplier" value="< ?php echo $viewData['sname']; ?>" class="form-control" readonly="">-->
                <!--<input type="hidden" name="supplier_id" value="< ?php echo $viewData['sid']; ?>" class="form-control" readonly="">-->

              </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
                    <label class="control-label">Billing date</label> <span style="color:red;">∗</span>
                     <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                        <input class="form-control" name="billing_date" autocomplete="off" id="demoDate" type="text" placeholder="Select date" value="<?php echo $viewData['created'] ?>" readonly="">
                        <!--<div class="input-group-append"><span class="input-group-text">.00</span></div>-->
                      </div>
                   
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="form-group">
               <label class="control-label">Invoice No.</label> <span style="color:red;">∗</span>
                        <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text">PO</span></div>
                <input class="form-control" id="invoice_number" value="<?php echo $viewData['invoice_no'] ?>" name="invoice_number" value="" type="text" placeholder="Enter Purchase No." required="" readonly>
                        </div>
               </div>
             </div>

                 <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Payment Method</label> <span style="color:red;">∗</span>
                  <!-- <select name="paymentmethod" class="form-control">
                    < ?php foreach($paymentmethod as $rows): ?>
                      <option value="< ?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    < ?php endforeach; ?>
                  </select> -->
                  <input type="text" name="paymentmethod" class="form-control" value="<?php echo $viewData['pmethod'] ?>" readonly>
                  <input type="hidden" name="paymentmethod_id" class="form-control" value="<?php echo $viewData['pmid'] ?>" readonly>
              </div>  
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="form-group">
             <label for="exampleInputEmail1">Transaction Type</label> <span style="color:red;">∗</span>
                <!-- <select name="paymentmethod" class="form-control">
                  < ?php foreach($paymentterm as $rows): ?>
                    <option value="< ?php echo $rows->id; ?>">< ?php echo $rows->name; ?></option>
                  < ?php endforeach; ?>
                </select> -->
                <input type="text" name="paymentterm" class="form-control" value="<?php echo $viewData['pterm'] ?>" readonly>
                <input type="hidden" name="paymentterm_id" id="paymentterm_id" class="form-control" value="<?php echo $viewData['ptid'] ?>" readonly>
              </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12" id="dueDate" style="display: none;">
             <div class="form-group">
             <label for="exampleInputEmail1">Due Date</label> <span style="color:red;">∗</span>
            
                <div class="input-group">
                  <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  <input class="form-control" name="due_date" value="<?php echo $viewData['due_date'] ?>"  autocomplete="off" id="demoDate" type="date" placeholder="Select date" required="">
                  <!--<div class="input-group-append"><span class="input-group-text">.00</span></div>-->
                </div>


              </div>
              </div>
               
              </div>
              
              
              <h5 >Purchase Invoice Products</h5>
              <div class="table-responsive">
                  <table class="table table-responsive-sm  table-bordered " id="customFields">
                          <thead>
                            <tr>
                              <th width="20%">Product Name</th>
                              <!--<th width="7%">Size</th>-->
                              <th width="7%">HSN/SAC</th>
                              <th width="7%">GST(%)</th>
                              <th width="10%">Purch. Price</th>
                              <th width="8%">Quantity</th>
                              <th width="8%">TAX</th>
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

                          <?php $no=1; foreach($invoiceData as $irows): ?>
                            <tr id="row_<?php echo $no; ?>">
                              <td>
                                <input type="hidden" name="product_id[]" data-row-id="row_<?php echo $no; ?>" id="pid_<?php echo $no; ?>" class="product_<?php echo $no; ?> form-control autocomplete_txt" autocomplete="off" value="<?php echo $irows->pid ?>">              
                                
                                <input list="product<?php echo $no; ?>" value="<?php echo $irows->pname ?>" class="form-control" onchange="getProductData(<?php echo $no; ?>)" placeholder="Type product name" data-row-id="row_<?php echo $no; ?>" id="pname_<?php echo $no; ?>" name="productName[]" required>
                                
                                <datalist id="product<?php echo $no; ?>">
                                  <?php foreach($allData as $rows): ?>
                                    <option value="<?php echo $rows->pname; ?>"><?php echo $rows->pname; ?></option>
                                  <?php endforeach; ?>
                                </datalist>
                              </td>
                              <!--<td>-->
                              <!--  <input type="text"  name="size[]" id="size_< ?php echo $no; ?>" class="size_< ?php echo $no; ?> form-control " readonly="" value="< ?php echo $irows->sname ?>" >-->
                              <!--  <input type="hidden" name="size_value[]" id="size_value_< ?php echo $no; ?>" class="size_value_< ?php echo $no; ?> form-control ">-->
                              <!--</td>-->
                              <td>
                                <input type="text"  name="hsn[]" id="hsn_<?php echo $no; ?>" class="hsn_<?php echo $no; ?> form-control " readonly="" value="<?php echo $irows->hsn ?>">
                                <input type="hidden" name="hsn_value[]" id="hsn_value_<?php echo $no; ?>" class="hsn_value_<?php echo $no; ?> form-control ">
                              </td>
                              <td>
                                <input type="text"  name="gst[]" id="gst_<?php echo $no; ?>" class="gst_<?php echo $no; ?> form-control" readonly="" value="<?php echo $irows->gst ?>">
                                <input type="hidden" name="gst_value[]" id="gst_value_<?php echo $no; ?>" class="gst_value_<?php echo $no; ?> form-control ">

                                <input type="hidden" name="totalgst_value[]" id="totalgst_value_<?php echo $no; ?>" class="gst_value_<?php echo $no; ?> form-control ">
                              </td> 
                              <td>
                                <input type="text" name="purchasePrice[]" id="pprice_<?php echo $no; ?>" class="pprice_<?php echo $no; ?> form-control" readonly="" value="<?php echo $irows->pprice ?>">
                                <input type="hidden" name="purchasePrice_value[]" id="pprice_value_<?php echo $no; ?>" class="pprice_value_<?php echo $no; ?> form-control ">
                              </td>
                              <td>
                                <input type="text" name="quantity[]" min="1" id="quantity_<?php echo $no; ?>" class="quantity_<?php echo $no; ?> form-control" onkeyup="getTotal(<?php echo $no; ?>)" value="<?php echo $irows->qty ?>">

                                <input type="hidden" name="oldquantity[]" id="oldquantity_<?php echo $no; ?>" class="oldquantity_<?php echo $no; ?> form-control" value="<?php echo $irows->qty ?>" onkeyup="amountCal()">

                                <input type="hidden" name="quantity_value[]" id="quality_value_<?php echo $no; ?>" class="quality_value_<?php echo $no; ?> form-control " onkeyup="amountCal()">
                              </td>
                              <td>
                                <input type="text" name="tax[]" id="tax_<?php echo $no; ?>" class="tax_<?php echo $no; ?> form-control" readonly="" value="<?php echo $irows->tax ?>">
                                <input type="hidden" name="tax_value[]" id="tax_value_<?php echo $no; ?>" class="tax_value_<?php echo $no; ?> form-control " value="<?php echo $irows->tax ?>">
                              </td>
                              <td>
                                <input type="text" name="total[]" id="total_<?php echo $no; ?>" class="total_<?php echo $no; ?> form-control" readonly="" value="<?php echo $irows->total ?>">
                                <input type="hidden" name="total_value[]" id="total_value_<?php echo $no; ?>" class="total_value_<?php echo $no; ?> form-control " value="<?php echo $irows->total ?>">
                              </td>
                              <td>
                                <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                                </a>
                              </td>
                            </tr>
                          <?php endforeach; ?>

                    </tbody>
                  </table>
              </div>
              </div>
             <div class="row">
          <div class="col-xs-12 col-lg-12 col-md-12 pull-left" >
           
          <div style="float:right; line-height:22px;" class="col-sm-4">
                    <div class="form-inline" style="margin-bottom:10px;">
          <div class="form-group" style="margin-bottom:10px;">
            <label style="text-align: left">Subtotal: &nbsp;</label>
                   <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> <input type="text" class="form-control" name="subtotal" id="subTotal" placeholder="Subtotal" value="<?php echo $viewData['total']; ?>" readonly="">
                    </div>
          </div>
                    <div class="form-group" style="margin-bottom:10px;">
            
            <label style="text-align: left">Tax: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="input-group ">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>              <input type="text" name="tax" class="form-control" id="gsttaxamount" placeholder="Tax" readonly="" value="<?php echo $viewData['tax']; ?>">
            </div>
          </div>
            <div class="form-group" style="margin-bottom:10px;">
            <label style="text-align: left">Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control" placeholder="Total" id="gross_total" name="gross_total" onpaste="return false;" readonly="" value="<?php echo $viewData['gross_total']; ?>">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:10px;">
            <label style="margin-left:-25px;">Amount Paid: &nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control" placeholder="Amount Paid"  onkeyup="amountCal()" name="amt_paid" id="amt_paid" value="<?php echo $viewData['paidamount']; ?>">
            </div>
          </div>

          <!--new  -->
               <!-- <div class="form-group" style="margin-bottom:10px;">
            <label style="margin-left:-25px;">Due Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control" id="amountPaid" placeholder="Due Date" onkeypress="return IsNumeric(event);" ondrop="return false;" name="paid_amount" onpaste="return false;">
            </div>
          </div> -->
          <!--end new  -->

          
          <div class="form-group">
            <label style="margin-left:-25px;">Amount Due: &nbsp;&nbsp;</label>
            <div class="input-group">
            <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-inr"></i></span></div> 
              <input type="text" class="form-control amountDue" id="amountDue" placeholder="Amount Due" name="due_amount" value="<?php echo $viewData['dueamount']; ?>" readonly>
            </div>
            </div> 

         </div>

                    </div>
                      <div class="form-group col-sm-7">
            <label><strong>Remark:</strong> &nbsp;</label>
            <br><br>
             <textarea name="remark" placeholder="Remark" class="form-control "><?php echo $viewData['remark']; ?></textarea>
           </div>
    
        
      </div>
        </div>
     <hr>
          <div class="tile-footer" style="float:right;margin-right: 70px" >
            <a href="<?php echo base_url() ?>purchase_invoice" class="btn btn-danger">Cancel</a>
            
            <button type="submit" name="submit" id="demoNotify" class="btn btn-success" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save changes</button>
          </div>
        </form>
        </div>
      
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
<!-- 
< ?php
  $this->load->view('admin_view/includes/modals/shippingType');
  $this->load->view('admin_view/includes/modals/createLedger');
?> -->



<script type="text/javascript">
  $(document).ready(function(){

    var base_url = "<?php echo base_url(); ?>";

    var paymentterm_id = $('#paymentterm_id').val();
    // alert(paymentterm_id);
    if(paymentterm_id == 1)
    {
      $('#dueDate').hide();
    }
    else
    {
      $('#dueDate').show();

    }


      $(".addCF").click(function(){
          
          $('#btnAddCF').prop('disabled', true);
            var href = $('.addCF').attr('href');
            $('.addCF').removeAttr('href');

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

                                  '<input list="product'+row_id+'" class="form-control" onchange="getProductData('+row_id+')" placeholder="Type product name" data-row-id="rowpname_'+row_id+'" id="pname_'+row_id+'" name="productName[]">'+

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
                                //     '<input type="hidden"  name="size_value[]" id="size_value_'+row_id+'" class="size_value_'+row_id+' form-control ">'+
                                // '</td>'+

                                '<td>'+
                                    '<input type="text"  name="hsn[]" id="hsn_'+row_id+'" class="hsn_'+row_id+' form-control " readonly>'+
                                    '<input type="hidden"  name="hsn_value[]" id="hsn_value_'+row_id+'" class="hsn_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text"  name="gst[]" id="gst_'+row_id+'" class="gst_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden"  name="gst_value[]" id="gst_value_'+row_id+'" class="gst_value_'+row_id+' form-control ">'+

                                      '<input type="hidden"  name="totalgst_value[]" id="totalgst_value_'+row_id+'" class="gst_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="purchasePrice[]" id="pprice_'+row_id+'" class="pprice_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden" name="purchasePrice_value[]" id="pprice_value_'+row_id+'" class="pprice_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="quantity[]" min="1" id="quantity_'+row_id+'" class="quantity_'+row_id+' form-control" onkeyup="getTotal('+row_id+')">'+
                                      '<input type="hidden"  name="quantity_value[]" id="quality_value_'+row_id+'" class="quality_value_'+row_id+' form-control " onkeyup="amountCal()">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="tax[]" id="tax_'+row_id+'" class="tax_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden" name="tax_value[]" id="tax_value_'+row_id+'" class="tax_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="total[]" id="total_'+row_id+'" class="total_'+row_id+' form-control" readonly>'+
                                      '<input type="hidden"  name="total_value[]" id="total_value_'+row_id+'" class="total_value_'+row_id+' form-control ">'+
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
          
          amountCal();
      });
});

</script>


<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";

  function getProductData(row_id)
   {
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

                    $("#pprice_"+row_id).val(response.purchase_price);
                    $("#pprice_value_"+row_id).val(response.purchase_price);

                    $("#quantity_"+row_id).val(1);
                    $("#quality_value_"+row_id).val(1);

                    var total = Number(response.purchase_price) * 1;
                    total = total.toFixed(2);

                    var gst_value = $('#gst_value_'+row_id).val();

                    var gstTotal_value = ((total * gst_value)/100);

                    $("#totalgst_value_"+row_id).val(gstTotal_value);

                    $("#tax_"+row_id).val(gstTotal_value);
                    $("#tax_value_"+row_id).val(gstTotal_value);

                    var total = Number(response.purchase_price) * 1;
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
      
      var total = Number($("#pprice_"+row).val()) * Number($("#quantity_"+row).val());
      // console.log(total);
      
      $("#total_"+row).val(total);
      $("#total_value_"+row).val(total);

      var gst_value = $('#gst_'+row).val();
      var gsttot=((total * gst_value)/100);
      total = total.toFixed(2);
      $("#tax_"+row).val(gsttot);
      $("#tax_value_"+row).val(gsttot);
      $("#totalgst_value_"+row).val(gsttot);
     
      amountCal();

      findQuantity(row);

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

        prosubTotal = Number(prosubTotal) + Number($("#total_value_"+count).val());
            //alert(prosubTotal);
    //console.log(subTotal);

      
       totaltaxAmount=Number(totaltaxAmount) + Number($("#tax_value_"+count).val());
      } // /for
    
   //alert(prosubTotal);
   $("#subTotal").val(prosubTotal);
     $("#gsttaxamount").val(totaltaxAmount);
     totalamt=prosubTotal+totaltaxAmount;
   $("#gross_total").val(totalamt);
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
      console.log(qty);
      
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
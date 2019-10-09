<!-- < ?php print_r($allData); exit(); ?> -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-plus-square"></i>  New Entry Of Stock

        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Opening Stock</li>
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
                  <form role="form" action="<?php echo base_url('stock/createStock') ?>" method="post">
                    <div class="tile">
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Date</label> <span style="color:red;">∗</span>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <span class="input-group-text"><i class="fa fa-calendar"></i>
                                </span>
                              </div>
                              <input class="form-control" name="billing_date" autocomplete="off" id="demoDate" type="date" placeholder="Select date" required="">
                              <!--<div class="input-group-append"><span class="input-group-text">.00</span></div>-->
                            </div>
                          </div>
                        </div>
                      </div>
                      <h5 >Opening Stock List</h5>
                      <div class="table-responsive">
                        <table class="table table-responsive-sm  table-bordered " id="customFields">
                          <thead>
                            <tr>
                              <th width="20%">Product Name</th>
                              <th width="7%">Size</th>
                              <th width="7%">GST(%)</th>
                              <th width="10%">P. Category</th>
                              <th width="10%">Product Unit</th>
                              <th width="10%">Purch. Price</th>             
                              <th width="10%">Sales Price</th>
                              <th width="8%">Quantity</th>
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
                              <input type="hidden" name="product_id[]" data-row-id="row_1" id="id_1" class="product_1 form-control autocomplete_txt" autocomplete="off">              
                              
                              <input list="product1"  class="form-control" onchange="getProductData(1)" placeholder="Type product name" data-row-id="row_1" id="pname_1" name="productName[]" required>
                              
                              <datalist id="product1">
                                <?php foreach($allData as $rows): ?>
                                  <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                <?php endforeach; ?>
                              </datalist>
                            </td>
                            <td>
                              <input type="text"  name="size[]" id="size_1" class="size_1 form-control" readonly>
                              <!-- <input type="hidden"  name="size_value[]" id="size_value_1" class="size_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="gst[]" id="gst_1" class="gst_1 form-control" readonly>
                              <!-- <input type="hidden"  name="gst_value[]" id="gst_value_1" class="gst_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="productCategory[]" id="cat_1" class="cat_1 form-control" readonly>
                              <!-- <input type="hidden"  name="productCategory_value[]" id="cat_value_1" class="cat_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="productUnit[]" id="unit_1" class="unit_1 form-control" readonly>
                              <!-- <input type="hidden"  name="productCategory_value[]" id="unit_value_1" class="unit_value_1 form-control "> -->
                            </td> 
                            <td>
                              <input type="text" name="purchasePrice[]" id="pprice_1" class="pprice_1 form-control" readonly>
                              <!-- <input type="hidden"  name="purchasePrice_value[]" id="pprice_value_1" class="pprice_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="salesPrice[]" id="sprice_1" class="sprice_1 form-control" readonly>
                              <!-- <input type="hidden"  name="salesPrice_value[]" id="sprice_value_1" class="sprice_value_1 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="quantity[]" id="quantity_1" class="quantity_1 form-control">
                              <!-- <input type="hidden"  name="quantity_value[]" id="quality_value_1" class="quality_value_1 form-control "> -->
                            </td>
                            <td>
                              <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                              </a>
                            </td>
                          </tr>

                          <tr d="row_2">
                            <td>
                              <input type="hidden" name="product_id[]" data-row-id="row_2" id="id_2" class="product_1 form-control autocomplete_txt" autocomplete="off">              
                              
                              <input list="product2"  class="form-control" onchange="getProductData(2)"  placeholder="Type product name" data-row-id="rowpname_2" id="pname_2" name="productName[]" >
                              
                              <datalist id="product2">
                                <?php foreach($allData as $rows): ?>
                                  <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                <?php endforeach; ?>
                              </datalist>
                            </td>
                            <td>
                              <input type="text"  name="size[]" id="size_2" class="size_2 form-control " readonly>
                              <!-- <input type="hidden"  name="size_value[]" id="size_value_2" class="size_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="gst[]" id="gst_2" class="gst_2 form-control" readonly>
                              <!-- <input type="hidden"  name="gst_value[]" id="gst_value_2" class="gst_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="productCategory[]" id="cat_2" class="cat_2 form-control" readonly>
                              <!-- <input type="hidden"  name="productCategory_value[]" id="cat_value_2" class="cat_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="productUnit[]" id="unit_2" class="unit_2 form-control" readonly>
                              <!-- <input type="hidden"  name="productCategory_value[]" id="unit_value_2" class="unit_value_2 form-control "> -->
                            </td> 
                            <td>
                              <input type="text" name="purchasePrice[]" id="pprice_2" class="pprice_2 form-control" readonly>
                              <!-- <input type="hidden"  name="purchasePrice_value[]" id="pprice_value_2" class="pprice_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="salesPrice[]" id="sprice_2" class="sprice_2 form-control" readonly>
                              <!-- <input type="hidden"  name="salesPrice_value[]" id="sprice_value_2" class="sprice_value_2 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="quantity[]" id="quantity_2" class="quantity_2 form-control" >
                              <!-- <input type="hidden"  name="quantity_value[]" id="quantity_2" class="quality_value_2 form-control "> -->
                            </td>
                            <td>
                              <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                              </a>
                            </td>
                          </tr>

                          <tr d="row_3">
                            <td>
                              <input type="hidden" name="product_id[]" data-row-id="row_3" id="id_3" class="product_1 form-control autocomplete_txt" autocomplete="off">              
                              
                              <input list="product3"  class="form-control" onchange="getProductData(3)" placeholder="Type product name" data-row-id="rowpname_3" id="pname_3" name="productName[]">
                              
                              <datalist id="product3">
                                <?php foreach($allData as $rows): ?>
                                  <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                <?php endforeach; ?>
                              </datalist>
                            </td>
                            <td>
                              <input type="text"  name="size[]" id="size_3" class="size_3 form-control " readonly>
                              <!-- <input type="hidden"  name="size_value[]" id="size_value_3" class="size_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="gst[]" id="gst_3" class="gst_3 form-control" readonly>
                              <!-- <input type="hidden"  name="gst_value[]" id="gst_value_3" class="gst_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="productCategory[]" id="cat_3" class="cat_3 form-control" readonly>
                              <!-- <input type="hidden"  name="productCategory_value[]" id="cat_value_3" class="cat_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="productUnit[]" id="unit_3" class="unit_3 form-control" readonly>
                              <!-- <input type="hidden"  name="productCategory_value[]" id="unit_value_3" class="unit_value_3 form-control "> -->
                            </td> 
                            <td>
                              <input type="text" name="purchasePrice[]" id="pprice_3" class="pprice_3 form-control" readonly>
                              <!-- <input type="hidden"  name="purchasePrice_value[]" id="pprice_value_3" class="pprice_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="salesPrice[]" id="sprice_3" class="sprice_3 form-control" readonly>
                              <!-- <input type="hidden"  name="salesPrice_value[]" id="sprice_value_3" class="sprice_value_3 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="quantity[]" id="quantity_3" class="quantity_3 form-control" >
                              <!-- <input type="hidden"  name="quantity_value[]" id="quality_value_3" class="quality_value_3 form-control "> -->
                            </td>
                            <td>
                              <a href="javascript:void(0);" class="remCF"><button class="btn btn-danger delete " type="button" title="Delete field"><i class="fa fa-trash"></i></button>
                              </a>
                            </td>
                          </tr>

                          <tr d="row_4">
                            <td>
                              <input type="hidden" name="product_id[]" data-row-id="row_4" id="id_4" class="product_1 form-control autocomplete_txt" autocomplete="off">              
                              
                              <input list="product4"  class="form-control" onchange="getProductData(4)" placeholder="Type product name" data-row-id="rowpname_4" id="pname_4" name="productName[]">
                              
                              <datalist id="product4">
                                <?php foreach($allData as $rows): ?>
                                  <option value="<?php echo $rows->products_id; ?>"><?php echo $rows->pname; ?></option>
                                <?php endforeach; ?>
                              </datalist>
                            </td>
                            <td>
                              <input type="text"  name="size[]" id="size_4" class="size_4 form-control " readonly>
                              <!-- <input type="hidden"  name="size_value[]" id="size_value_4" class="size_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text"  name="gst[]" id="gst_4" class="gst_4 form-control" readonly>
                              <!-- <input type="hidden"  name="gst_value[]" id="gst_value_4" class="gst_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="productCategory[]" id="cat_4" class="cat_4 form-control" readonly>
                              <!-- <input type="hidden"  name="productCategory_value[]" id="cat_value_4" class="cat_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="productUnit[]" id="unit_4" class="unit_4 form-control" readonly>
                              <!-- <input type="hidden"  name="productCategory_value[]" id="unit_value_4" class="unit_value_4 form-control "> -->
                            </td> 
                            <td>
                              <input type="text" name="purchasePrice[]" id="pprice_4" class="pprice_4 form-control" readonly>
                              <!-- <input type="hidden"  name="purchasePrice_value[]" id="pprice_value_4" class="pprice_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="salesPrice[]" id="sprice_4" class="sprice_4 form-control" readonly>
                              <!-- <input type="hidden"  name="salesPrice_value[]" id="sprice_value_4" class="sprice_value_4 form-control "> -->
                            </td>
                            <td>
                              <input type="text" name="quantity[]" id="quantity_4" class="quantity_4 form-control" >
                              <!-- <input type="hidden"  name="quantity_value[]" id="quality_value_4" class="quality_value_4 form-control "> -->
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
                <hr>
                <div style="float: right;">
                  <a href="<?php echo base_url() ?>stock" class="btn btn-danger">Cancel</a>
                  <button type="submit" name="submit" id="demoNotify" class="btn btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                </div>
              </div>
            </div>
          </form>
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
                                  '<input type="hidden" name="product_id[]" data-row-id="row_'+row_id+'" id="id_'+row_id+'" class="product_'+row_id+' form-control autocomplete_txt" autocomplete="off">'+

                                  '<input list="product'+row_id+'" onchange="getProductData('+row_id+')"  class="form-control" placeholder="Type product name" data-row-id="rowpname_'+row_id+'" id="pname_'+row_id+'" name="productName[]">'+

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
                                    // '<input type="hidden"  name="size_value[]" id="size_value_'+row_id+'" class="size_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text"  name="gst[]" id="gst_'+row_id+'" class="gst_'+row_id+' form-control" readonly>'+
                                      // '<input type="hidden"  name="gst_value[]" id="gst_value_'+row_id+'" class="gst_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="productCategory[]" id="cat_'+row_id+'" class="cat_'+row_id+' form-control" readonly>'+
                                      // '<input type="hidden"  name="productCategory_value[]" id="cat_value_'+row_id+'" class="cat_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="productUnit[]" id="unit_'+row_id+'" class="unit_'+row_id+' form-control" readonly>'+
                                      // '<input type="hidden"  name="productCategory_value[]" id="unit_value_'+row_id+'" class="unit_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="purchasePrice[]" id="pprice_'+row_id+'" class="pprice_'+row_id+' form-control" readonly>'+
                                      // '<input type="hidden"  name="purchasePrice_value[]" id="pprice_value_'+row_id+'" class="pprice_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="salesPrice[]" id="sprice_'+row_id+'" class="sprice_'+row_id+' form-control" readonly>'+
                                      // '<input type="hidden"  name="salesPrice_value[]" id="sprice_value_'+row_id+'" class="sprice_value_'+row_id+' form-control ">'+
                                '</td>'+

                                '<td>'+
                                      '<input type="text" name="quantity[]" id="quantity_'+row_id+'" class="quantity_'+row_id+' form-control" >'+
                                      // '<input type="hidden"  name="quantity_value[]" id="quality_value_'+row_id+'" class="quality_value_'+row_id+' form-control ">'+
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
        $("#gst_"+row_id).val("");
        $("#cat_"+row_id).val("");
        $("#unit_"+row_id).val("");
        $("#pprice_"+row_id).val("");
        $("#sprice_"+row_id).val("");
        $("#quantity_"+row_id).val("");
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
                    $("#id_"+row_id).val(response.products_id);
                    $("#size_"+row_id).val(response.size);
                    $("#gst_"+row_id).val(response.gst);
                    $("#cat_"+row_id).val(response.category);
                    $("#unit_"+row_id).val(response.unit);
                    $("#pprice_"+row_id).val(response.purchase_price);
                    $("#sprice_"+row_id).val(response.sales_price);
                  }
            });
      }
   }
</script>
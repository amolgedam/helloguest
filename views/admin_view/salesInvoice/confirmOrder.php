 <!--< ?php echo "<pre>"; print_r($data); echo "</pre>";echo "<pre>"; print_r($invoiceData); echo "</pre>"; exit(); ?> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Orders
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Orders</li>
    </ol>
  </section>

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
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <section class="invoice">
            
            <div class="row invoice-info">
                <div class="col-md-3">
    				<div>
                    	<center>
                            <img src="<?php echo base_url(); ?>assets/images/companyimg/<?php echo $this->session->userdata['companyImg'] ?>" alt="<?php echo $company_info['company_name'] ?>" style="width:200px; height:100px;" />
                            <!--<br>-->
                            <!--<span>< ?php echo $company_info['company_name'] ?></span>-->
                            
                        </center>  
                    </div>
                    
                    <style>
                            .borderTop
                            {
                                border-top: 1px dotted #000;
                            }
                    </style>
                    <div>
			           <center><?php echo ucwords($company_info['address']) ?>,<?php echo ucwords($company_info['city']) ?></center>
			           <!--<hr style="border: 1px dotted #000">-->
			           <table>
			               <tr>
			                   <td class="borderTop" colspan="2">
			                       <center><?php echo ucwords($company_info['phone']) ?></center>
			                   </td>
			                   
			               </tr>
			               <tr>
			                   <td class="borderTop">
			                       <b>Invoice No: </b><?php echo $data['invoice_no']; ?></span><br>
			                   </td>
			                   <td class="borderTop">
			                       <b>Invoice Date: </b><?php echo $data['created']; ?></span><br>
			                   </td>
			               </tr>
			               <tr>
			                   <td class="borderTop" colspan="2">
			                       
			                       <b>Invoice Item: </b><?php echo count($invoiceData); ?></span><br>
			                   </td>
			               </tr>
			           </table>
			            
			            <!--<center>Dine In</center>-->
			            <!--<hr style="border: 1px dotted #000">-->
			        </div>
           <!--     	<div style="padding-left:15px">-->

			        <!--</div>-->
			        <table class="borderTop" id="orderTable" width="100%" cellpadding="0px" cellspacing="0px" border="0">
			          <thead>
			          <tr>
			            <th>Items</th>
			            <th>Price</th>
			            <th>Qty</th>
			            <th>Amount</th>
			          </tr>
			          </thead>
			          <tbody>
				        <?php foreach($invoiceData as $rows): ?>
				        	<tr>
								<td><?php echo ucwords($rows->pname); ?></td>
	        					<td><?php echo $rows->sprice; ?></td>
				        		<td><?php echo $rows->qty ?></td>
				    			<td><?php echo $rows->total; ?></td>
		    				</tr>
				        <?php endforeach; ?>	
				        </tbody>
		          	</table>
	          		<table width="100%" class="borderTop">
						<tr>
							<td style="width:50%">Gross Total :</td>
							<td><?php echo $data['gross_total'] ?></td>
						<tr>
					</table>
		            <div class="topBorder bottomBorder">
			            <center><p style="font-size: 10px;">**THANK YOU FOR VISITING BOMBAY DESI **</p></center>
			        </div>
		            
		            <a href="<?php echo base_url() ?>sales_invoice/printInvoice/<?php echo $data['invoice_no']; ?>" target="_blank" class="btn btn-sm btn-info">
                      <i style="color: white" class="fa fa-trash"></i> Print
                    </a>
                    <a href="<?php echo base_url() ?>sales_invoice"class="btn btn-sm btn-danger">
                      <i style="color: white" class="fa fa-trash"></i> Cancel
                    </a>
			    </div>
			    	
            </div>
        </section>
            
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo error_reporting(0); // error_reporting(E_ERROR | E_PARSE); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('groups/') ?>">Groups</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Group</h3>
            </div>
            <form role="form" action="<?php base_url('groups/update') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $group_data['group_name']; ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="permission">Permission</label>

                  <?php $serialize_permission = unserialize($group_data['permission']); ?>
                  
                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Product -->
                      <tr>
                        <td>Product Category</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createCategory" <?php if($serialize_permission) {
                            if(in_array('createCategory', $serialize_permission)) { echo "checked"; } 
                          } ?> >
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateCategory" <?php if($serialize_permission) {
                            if(in_array('updateCategory', $serialize_permission)) { echo "checked"; } 
                          } ?> >
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewCategory" <?php if($serialize_permission) {
                            if(in_array('viewCategory', $serialize_permission)) { echo "checked"; } 
                          } ?> >
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteCategory" <?php if($serialize_permission) {
                            if(in_array('deleteCategory', $serialize_permission)) { echo "checked"; } 
                          } ?> >
                        </td>
                      </tr>
                      <tr>
                        <td>Manage Product</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createProduct" <?php if($serialize_permission) {
                            if(in_array('createProduct', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateProduct" <?php if($serialize_permission) {
                            if(in_array('updateProduct', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewProduct" <?php if($serialize_permission) {
                            if(in_array('viewProduct', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteProduct" <?php if($serialize_permission) {
                            if(in_array('deleteProduct', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Purchase Master -->
                      <tr>
                        <td>Supplier</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createSupplier" <?php if($serialize_permission) {
                            if(in_array('createSupplier', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateSupplier" <?php if($serialize_permission) {
                            if(in_array('updateSupplier', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewSupplier" <?php if($serialize_permission) {
                            if(in_array('viewSupplier', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteSupplier" <?php if($serialize_permission) {
                            if(in_array('deleteSupplier', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Purchase Invoice</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createPurchaseInvoice" <?php if($serialize_permission) {
                            if(in_array('createPurchaseInvoice', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updatePurchaseInvoice" <?php if($serialize_permission) {
                            if(in_array('updatePurchaseInvoice', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewPurchaseInvoice" <?php if($serialize_permission) {
                            if(in_array('viewPurchaseInvoice', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deletePurchaseInvoice" <?php if($serialize_permission) {
                            if(in_array('deletePurchaseInvoice', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Purchase Return</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createPurchaseReturn" <?php if($serialize_permission) {
                            if(in_array('createPurchaseReturn', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updatePurchaseReturn" <?php if($serialize_permission) {
                            if(in_array('updatePurchaseReturn', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewPurchaseReturn" <?php if($serialize_permission) {
                            if(in_array('viewPurchaseReturn', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deletePurchaseReturn" <?php if($serialize_permission) {
                            if(in_array('deletePurchaseReturn', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Quatation -->
                      <tr>
                        <td>Quatation</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createQuotation" <?php if($serialize_permission) {
                            if(in_array('createQuotation', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateQuotation" <?php if($serialize_permission) {
                            if(in_array('updateQuotation', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewQuotation" <?php if($serialize_permission) {
                            if(in_array('viewQuotation', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteQuotation" <?php if($serialize_permission) {
                            if(in_array('deleteQuotation', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Sales Master -->
                      <tr>
                        <td>Customer</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createCustomer" <?php if($serialize_permission) {
                            if(in_array('createCustomer', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateCustomer" <?php if($serialize_permission) {
                            if(in_array('updateCustomer', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewCustomer" <?php if($serialize_permission) {
                            if(in_array('viewCustomer', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteCustomer" <?php if($serialize_permission) {
                            if(in_array('deleteCustomer', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Sales Invoice</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createSalesInvoice" <?php if($serialize_permission) {
                            if(in_array('createSalesInvoice', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateSalesInvoice" <?php if($serialize_permission) {
                            if(in_array('updateSalesInvoice', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewSalesInvoice" <?php if($serialize_permission) {
                            if(in_array('viewSalesInvoice', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteSalesInvoice" <?php if($serialize_permission) {
                            if(in_array('deleteSalesInvoice', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Sales Return</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createSalesReturn" <?php if($serialize_permission) {
                            if(in_array('createSalesReturn', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateSalesReturn" <?php if($serialize_permission) {
                            if(in_array('updateSalesReturn', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewSalesReturn" <?php if($serialize_permission) {
                            if(in_array('viewSalesReturn', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteSalesReturn" <?php if($serialize_permission) {
                            if(in_array('deleteSalesReturn', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Sales Exchange</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createSalesExchange" <?php if($serialize_permission) {
                            if(in_array('createSalesExchange', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateSalesExchange" <?php if($serialize_permission) {
                            if(in_array('updateSalesExchange', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewSalesExchange" <?php if($serialize_permission) {
                            if(in_array('viewSalesExchange', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteSalesExchange" <?php if($serialize_permission) {
                            if(in_array('deleteSalesExchange', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Inventory -->
                      <tr>
                        <td>Opening Stock</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createOpeningStock" <?php if($serialize_permission) {
                            if(in_array('createOpeningStock', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateOpeningStock" <?php if($serialize_permission) {
                            if(in_array('updateOpeningStock', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewOpeningStock" <?php if($serialize_permission) {
                            if(in_array('viewOpeningStock', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteOpeningStock" <?php if($serialize_permission) {
                            if(in_array('deleteOpeningStock', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Internal Consumption</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createInternalConsumption" <?php if($serialize_permission) {
                            if(in_array('createInternalConsumption', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateInternalConsumption" <?php if($serialize_permission) {
                            if(in_array('updateInternalConsumption', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewInternalConsumption" <?php if($serialize_permission) {
                            if(in_array('viewInternalConsumption', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteInternalConsumption" <?php if($serialize_permission) {
                            if(in_array('deleteInternalConsumption', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Damage Stock</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createDamageStock" <?php if($serialize_permission) {
                            if(in_array('createDamageStock', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateDamageStock" <?php if($serialize_permission) {
                            if(in_array('updateDamageStock', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewDamageStock" <?php if($serialize_permission) {
                            if(in_array('viewDamageStock', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteDamageStock" <?php if($serialize_permission) {
                            if(in_array('deleteDamageStock', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Inventory Report</td>
                        <td> - </td>
                        <td> - </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewInventoryReport" <?php if($serialize_permission) {
                            if(in_array('viewInventoryReport', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td> - </td>
                      </tr>

                      <!-- Expences -->
                      <tr>
                        <td>Expences Category</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createExpencesCategory" <?php if($serialize_permission) {
                            if(in_array('createExpencesCategory', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateExpencesCategory" <?php if($serialize_permission) {
                            if(in_array('updateExpencesCategory', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewExpencesCategory" <?php if($serialize_permission) {
                            if(in_array('viewExpencesCategory', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteExpencesCategory" <?php if($serialize_permission) {
                            if(in_array('deleteExpencesCategory', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Manage Expences</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createManageExpences" <?php if($serialize_permission) {
                            if(in_array('createManageExpences', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateManageExpences" <?php if($serialize_permission) {
                            if(in_array('updateManageExpences', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewManageExpences" <?php if($serialize_permission) {
                            if(in_array('viewManageExpences', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteManageExpences" <?php if($serialize_permission) {
                            if(in_array('deleteManageExpences', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Banking and Transaction -->
                      <tr>
                        <td>Bank Account</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createBankAccount" <?php if($serialize_permission) {
                            if(in_array('createBankAccount', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateBankAccount" <?php if($serialize_permission) {
                            if(in_array('updateBankAccount', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewBankAccount" <?php if($serialize_permission) {
                            if(in_array('viewBankAccount', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteBankAccount" <?php if($serialize_permission) {
                            if(in_array('deleteBankAccount', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Bank Account Deposits</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createBankDeposit" <?php if($serialize_permission) {
                            if(in_array('createBankDeposit', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateBankDeposit" <?php if($serialize_permission) {
                            if(in_array('updateBankDeposit', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewBankDeposit" <?php if($serialize_permission) {
                            if(in_array('viewBankDeposit', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteBankDeposit" <?php if($serialize_permission) {
                            if(in_array('deleteBankDeposit', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Bank Account Transfer</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createTransfer" <?php if($serialize_permission) {
                            if(in_array('createTransfer', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateTransfer" <?php if($serialize_permission) {
                            if(in_array('updateTransfer', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewTransfer" <?php if($serialize_permission) {
                            if(in_array('viewTransfer', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteTransfer" <?php if($serialize_permission) {
                            if(in_array('deleteTransfer', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Transactions</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createTransaction" <?php if($serialize_permission) {
                            if(in_array('createTransaction', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateTransaction" <?php if($serialize_permission) {
                            if(in_array('updateTransaction', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewTransaction" <?php if($serialize_permission) {
                            if(in_array('viewTransaction', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteTransaction" <?php if($serialize_permission) {
                            if(in_array('deleteTransaction', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Barcode -->
                      <tr>
                        <td>Barcode</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createBarcode" <?php if($serialize_permission) {
                            if(in_array('createBarcode', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateBarcode" <?php if($serialize_permission) {
                            if(in_array('updateBarcode', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewBarcode" <?php if($serialize_permission) {
                            if(in_array('viewBarcode', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteBarcode" <?php if($serialize_permission) {
                            if(in_array('deleteBarcode', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Email and SMS -->
                      <tr>
                        <td>Send SMS</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createSms" <?php if($serialize_permission) {
                            if(in_array('createSms', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateSms" <?php if($serialize_permission) {
                            if(in_array('updateSms', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewSms" <?php if($serialize_permission) {
                            if(in_array('viewSms', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteSms" <?php if($serialize_permission) {
                            if(in_array('deleteSms', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Config Email</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createConfigEmail" <?php if($serialize_permission) {
                            if(in_array('createConfigEmail', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateConfigEmail" <?php if($serialize_permission) {
                            if(in_array('updateConfigEmail', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewConfigEmail" <?php if($serialize_permission) {
                            if(in_array('viewConfigEmail', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteConfigEmail" <?php if($serialize_permission) {
                            if(in_array('deleteConfigEmail', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Compose Email</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createComposeEmail" <?php if($serialize_permission) {
                            if(in_array('createComposeEmail', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateComposeEmail" <?php if($serialize_permission) {
                            if(in_array('updateComposeEmail', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewComposeEmail" <?php if($serialize_permission) {
                            if(in_array('viewComposeEmail', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteComposeEmail" <?php if($serialize_permission) {
                            if(in_array('deleteComposeEmail', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- coupons -->
                      <tr>
                        <td>Coupon</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createCoupon" <?php if($serialize_permission) {
                            if(in_array('createCoupon', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateCoupon" <?php if($serialize_permission) {
                            if(in_array('updateCoupon', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewCoupon" <?php if($serialize_permission) {
                            if(in_array('viewCoupon', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteCoupon" <?php if($serialize_permission) {
                            if(in_array('deleteCoupon', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- GST -->
                      <tr>
                        <td>GST</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createGst" <?php if($serialize_permission) {
                            if(in_array('createGst', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateGst" <?php if($serialize_permission) {
                            if(in_array('updateGst', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewGst" <?php if($serialize_permission) {
                            if(in_array('viewGst', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteGst" <?php if($serialize_permission) {
                            if(in_array('deleteGst', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Reports -->
                      <tr>
                        <td>Purchase Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewPurchaseReport" <?php if($serialize_permission) {
                            if(in_array('viewPurchaseReport', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Sales Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewSalesReport" <?php if($serialize_permission) {
                            if(in_array('viewSalesReport', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Expences Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewExpencesReport" <?php if($serialize_permission) {
                            if(in_array('viewExpencesReport', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Income Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewIncomeReport" <?php if($serialize_permission) {
                            if(in_array('viewIncomeReport', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td> - </td>
                      </tr>

                      <!-- Administration -->
                      <tr>
                        <td>Users</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createUser" <?php if($serialize_permission) {
                            if(in_array('createUser', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateUser" <?php if($serialize_permission) {
                            if(in_array('updateUser', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewUser" <?php if($serialize_permission) {
                            if(in_array('viewUser', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteUser" <?php if($serialize_permission) {
                            if(in_array('deleteUser', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createGroup" <?php if($serialize_permission) {
                            if(in_array('createGroup', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateGroup" <?php if($serialize_permission) {
                            if(in_array('updateGroup', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewGroup" <?php if($serialize_permission) {
                            if(in_array('viewGroup', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteGroup" <?php if($serialize_permission) {
                            if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- Company Settings -->
                      <tr>
                        <td>Company Setting</td>
                        <td> - </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateSetting" <?php if($serialize_permission) {
                            if(in_array('updateSetting', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>

                      <!-- General Settings -->
                      <tr>
                        <td>transaction type</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createTransactionType" <?php if($serialize_permission) {
                            if(in_array('createTransactionType', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateTransactionType" <?php if($serialize_permission) {
                            if(in_array('updateTransactionType', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewTransactionType" <?php if($serialize_permission) {
                            if(in_array('viewTransactionType', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteTransactionType" <?php if($serialize_permission) {
                            if(in_array('deleteTransactionType', $serialize_permission)) { echo "checked"; }
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Payment Methods</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createPaymentMethod" <?php if($serialize_permission) {
                            if(in_array('createPaymentMethod', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updatePaymentMethod" <?php if($serialize_permission) {
                            if(in_array('updatePaymentMethod', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewPaymentMethod" <?php if($serialize_permission) {
                            if(in_array('viewPaymentMethod', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deletePaymentMethod" <?php if($serialize_permission) {
                            if(in_array('deletePaymentMethod', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Products Units</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createProductUnit" <?php if($serialize_permission) {
                            if(in_array('createProductUnit', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateProductUnit" <?php if($serialize_permission) {
                            if(in_array('deleteCategory', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewProductUnit" <?php if($serialize_permission) {
                            if(in_array('viewProductUnit', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteProductUnit" <?php if($serialize_permission) {
                            if(in_array('deleteProductUnit', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Products Sizes</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createProductSize" <?php if($serialize_permission) {
                            if(in_array('createProductSize', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateProductSize" <?php if($serialize_permission) {
                            if(in_array('updateProductSize', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewProductSize" <?php if($serialize_permission) {
                            if(in_array('viewProductSize', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteProductSize" <?php if($serialize_permission) {
                            if(in_array('deleteProductSize', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>
                      <tr>
                        <td>Salesman</td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="createSalesman" <?php if($serialize_permission) {
                            if(in_array('createSalesman', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateSalesman" <?php if($serialize_permission) {
                            if(in_array('updateSalesman', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewSalesman" <?php if($serialize_permission) {
                            if(in_array('viewSalesman', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="deleteSalesman" <?php if($serialize_permission) {
                            if(in_array('deleteSalesman', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                      </tr>

                      <!-- company profile -->
                      <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="updateCompany" <?php if($serialize_permission) {
                            if(in_array('updateCompany', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>

                      <!-- Profile -->
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td>
                          <input type="checkbox" name="permission[]" id="permission" value="viewProfile" <?php if($serialize_permission) {
                            if(in_array('viewProfile', $serialize_permission)) { echo "checked"; } 
                          } ?>>
                        </td>
                        <td> - </td>
                      </tr>

                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Update Changes</button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-danger">Back</a>
              </div>
            </form>
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

  <script type="text/javascript">
    $(document).ready(function() {
      $('#groupMainNav').addClass('active');
      $('#manageGroupSubMenu').addClass('active');
    });
  </script>  


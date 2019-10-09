

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
        <li class="active">groups</li>
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
              <h3 class="box-title">Add Group</h3>
            </div>
            <form role="form" action="<?php base_url('groups/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="permission">Permission</label>

                  <table class="table table-bordered table-striped">
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
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCategory"></td>
                      </tr>
                      <tr>
                        <td>Manage Product</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createProduct"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateProduct"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProduct"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteProduct"></td>
                      </tr>

                      <!-- Purchase Master -->
                      <tr>
                        <td>Supplier</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createSupplier"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSupplier"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewSupplier"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteSupplier"></td>
                      </tr>
                      <tr>
                        <td>Purchase Invoice</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createPurchaseInvoice"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updatePurchaseInvoice"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPurchaseInvoice"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deletePurchaseInvoice"></td>
                      </tr>
                      <tr>
                        <td>Purchase Return</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createPurchaseReturn"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updatePurchaseReturn"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPurchaseReturn"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deletePurchaseReturn"></td>
                      </tr>

                      <!-- Quatation -->
                      <tr>
                        <td>Quatation</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createQuotation"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateQuotation"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewQuotation"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteQuotation"></td>
                      </tr>

                      <!-- Sales Master -->
                      <tr>
                        <td>Customer</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCustomer"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCustomer"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCustomer"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCustomer"></td>
                      </tr>
                      <tr>
                        <td>Sales Invoice</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createSalesInvoice"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSalesInvoice"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewSalesInvoice"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteSalesInvoice"></td>
                      </tr>
                      <tr>
                        <td>Sales Return</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createSalesReturn"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSalesReturn"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewSalesReturn"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteSalesReturn"></td>
                      </tr>
                      <tr>
                        <td>Sales Exchange</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createSalesExchange"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSalesExchange"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewSalesExchange"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteSalesExchange"></td>
                      </tr>

                      <!-- Inventory -->
                      <tr>
                        <td>Opening Stock</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createOpeningStock"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateOpeningStock"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewOpeningStock"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteOpeningStock"></td>
                      </tr>
                      <tr>
                        <td>Internal Consumption</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createInternalConsumption"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateInternalConsumption"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewInternalConsumption"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteInternalConsumption"></td>
                      </tr>
                      <tr>
                        <td>Damage Stock</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createDamageStock"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateDamageStock"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewDamageStock"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteDamageStock"></td>
                      </tr>
                      <tr>
                        <td>Inventory Report</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewInventoryReport"></td>
                        <td> - </td>
                      </tr>

                      <!-- Expences -->
                      <tr>
                        <td>Expences Category</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createExpencesCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateExpencesCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewExpencesCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteExpencesCategory"></td>
                      </tr>
                      <tr>
                        <td>Manage Expences</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createManageExpences"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateManageExpences"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewManageExpences"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteManageExpences"></td>
                      </tr>

                      <!-- Banking and Transaction -->
                      <tr>
                        <td>Bank Account</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBankAccount"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBankAccount"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBankAccount"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBankAccount"></td>
                      </tr>
                      <tr>
                        <td>Bank Account Deposits</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBankDeposit"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBankDeposit"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBankDeposit"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBankDeposit"></td>
                      </tr>
                      <tr>
                        <td>Bank Account Transfer</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createTransfer"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateTransfer"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewTransfer"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteTransfer"></td>
                      </tr>
                      <tr>
                        <td>Transactions</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createTransaction"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateTransaction"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewTransaction"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteTransaction"></td>
                      </tr>

                      <!-- Barcode -->
                      <tr>
                        <td>Barcode</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBarcode"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBarcode"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBarcode"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBarcode"></td>
                      </tr>

                      <!-- Email and SMS -->
                      <tr>
                        <td>Send SMS</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createSms"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSms"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewSms"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteSms"></td>
                      </tr>
                      <tr>
                        <td>Config Email</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createConfigEmail"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateConfigEmail"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewConfigEmail"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteConfigEmail"></td>
                      </tr>
                      <tr>
                        <td>Compose Email</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createComposeEmail"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateComposeEmail"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewComposeEmail"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteComposeEmail"></td>
                      </tr>

                      <!-- coupons -->
                      <tr>
                        <td>Coupon</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCoupon"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCoupon"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCoupon"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCoupon"></td>
                      </tr>

                      <!-- GST -->
                      <tr>
                        <td>GST</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGst"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGst"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGst"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGst"></td>
                      </tr>

                      <!-- Reports -->
                      <tr>
                        <td>Purchase Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPurchaseReport"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Sales Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewSalesReport"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Expences Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewExpencesReport"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Income Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewIncomeReport"></td>
                        <td> - </td>
                      </tr>

                      <!-- Administration -->
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"></td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup"></td>
                      </tr>

                      <!-- Company Settings -->
                      <tr>
                        <td>Company Setting</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>

                      <!-- General Settings -->
                      <tr>
                        <td>transaction type</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createTransactionType"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateTransactionType"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewTransactionType"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteTransactionType"></td>
                      </tr>
                      <tr>
                        <td>Payment Methods</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createPaymentMethod"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updatePaymentMethod"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPaymentMethod"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deletePaymentMethod"></td>
                      </tr>
                      <tr>
                        <td>Products Units</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createProductUnit"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateProductUnit"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProductUnit"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteProductUnit"></td>
                      </tr>
                      <tr>
                        <td>Products Sizes</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createProductSize"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateProductSize"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProductSize"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteProductSize"></td>
                      </tr>
                      <tr>
                        <td>Salesman</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createSalesman"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSalesman"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewSalesman"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteSalesman"></td>
                      </tr>

                      <!-- company profile -->
                      <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>

                      <!-- Profile -->
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile"></td>
                        <td> - </td>
                      </tr>

                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Save Changes</button>
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
      $('#createGroupSubMenu').addClass('active');
    });
  </script>


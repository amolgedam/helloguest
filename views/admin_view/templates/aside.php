
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <!--<li class="header">MAIN NAVIGATION</li>-->
        <li>
          <a href="<?php echo base_url() ?>dashboard">
            <i class="fa fa-th"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <?php if(in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission) || in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-product-hunt"></i>
              <span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission)): ?>
                <li>
                <a href="<?php echo base_url() ?>category"><i class="fa fa-circle-o"></i> Manage Category</a>
                </li>
              <?php endif; ?>

              <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                <li>
                <a href="<?php echo base_url() ?>products"><i class="fa fa-circle-o"></i> Manage Product</a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?> 
        
        
        <!--< ?php if(in_array('createOpeningStock', $user_permission) || in_array('updateOpeningStock', $user_permission) || in_array('viewOpeningStock', $user_permission) || in_array('deleteOpeningStock', $user_permission) || in_array('createInternalConsumption', $user_permission) || in_array('updateInternalConsumption', $user_permission) || in_array('viewInternalConsumption', $user_permission) || in_array('deleteInternalConsumption', $user_permission) || in_array('createDamageStock', $user_permission) || in_array('updateDamageStock', $user_permission) || in_array('viewDamageStock', $user_permission) || in_array('deleteDamageStock', $user_permission) || in_array('viewInventoryReport', $user_permission)): ?>-->
        <!--  <li class="treeview">-->
        <!--    <a href="#">-->
        <!--      <i class="fa fa-product-hunt"></i>-->
        <!--      <span>Inventory</span>-->
        <!--      <span class="pull-right-container">-->
        <!--        <i class="fa fa-angle-left pull-right"></i>-->
        <!--      </span>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->

        <!--      < ?php if(in_array('createOpeningStock', $user_permission) || in_array('updateOpeningStock', $user_permission) || in_array('viewOpeningStock', $user_permission) || in_array('deleteOpeningStock', $user_permission)): ?>-->
        <!--        <li><a href="< ?php echo base_url() ?>stock"><i class="fa fa-circle-o"></i>Opening Stock</a></li>-->
        <!--      < ?php endif; ?>-->

        <!--      < ?php if(in_array('createInternalConsumption', $user_permission) || in_array('updateInternalConsumption', $user_permission) || in_array('viewInternalConsumption', $user_permission) || in_array('deleteInternalConsumption', $user_permission)): ?>-->
        <!--        <li><a href="< ?php echo base_url() ?>consumption"><i class="fa fa-circle-o"></i>Internal Consumption</a></li>-->
        <!--      < ?php endif; ?>-->

        <!--      < ?php if(in_array('createDamageStock', $user_permission) || in_array('updateDamageStock', $user_permission) || in_array('viewDamageStock', $user_permission) || in_array('deleteDamageStock', $user_permission)): ?>-->
        <!--        <li><a href="< ?php echo base_url() ?>damage_stock"><i class="fa fa-circle-o"></i>Damage Stock</a></li>-->
        <!--      < ?php endif; ?>-->


              <!-- <li><a href="< ?php echo base_url() ?>product-shortage"><i class="fa fa-circle-o"></i>Shortage Stock</a></li>
        <!--      <li><a href="< ?php echo base_url() ?>excesses"><i class="fa fa-circle-o"></i>Excesses Stock</a></li> -->
              <!-- <li><a href="< ?php echo base_url() ?>internal-transfer"><i class="fa fa-circle-o"></i>Internal Transfer</a></li> -->

        <!--      < ?php if(in_array('viewInventoryReport', $user_permission)): ?>-->
        <!--        <li><a href="< ?php echo base_url() ?>reports/inventoryReport"><i class="fa fa-circle-o"></i>Inventory Report</a></li>-->
        <!--      < ?php endif; ?>-->

        <!--    </ul>-->
        <!--  </li>-->
        <!--< ?php endif; ?>-->


        <?php if(in_array('createSupplier', $user_permission) || in_array('updateSupplier', $user_permission) || in_array('viewSupplier', $user_permission) || in_array('deleteSupplier', $user_permission) || in_array('createPurchaseInvoice', $user_permission) || in_array('updatePurchaseInvoice', $user_permission) || in_array('viewPurchaseInvoice', $user_permission) || in_array('deletePurchaseInvoice', $user_permission) || in_array('createPurchaseReturn', $user_permission) || in_array('updatePurchaseReturn', $user_permission) || in_array('viewPurchaseReturn', $user_permission) || in_array('deletePurchaseReturn', $user_permission)): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-product-hunt"></i>
              <span>Purchase Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <?php if(in_array('createSupplier', $user_permission) || in_array('updateSupplier', $user_permission) || in_array('viewSupplier', $user_permission) || in_array('deleteSupplier', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>supplier"><i class="icon fa fa-users"></i>Supplier</a></li>
              <?php endif; ?>

                <!-- <li><a href="< ?php echo base_url() ?>purchase-order-list"><i class="fa fa-circle-o"></i>Purchase Order</a></li> -->

              <?php if(in_array('createPurchaseInvoice', $user_permission) || in_array('updatePurchaseInvoice', $user_permission) || in_array('viewPurchaseInvoice', $user_permission) || in_array('deletePurchaseInvoice', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>purchase_invoice"><i class="fa fa-circle-o"></i>Purchase Invoice</a></li>
              <?php endif; ?>

              <!-- <li><a href="< ?php echo base_url() ?>purchase_return"><i class="fa fa-circle-o"></i> Purchase Return</a></li> -->
            </ul>
          </li>
        <?php endif; ?>

        <!--< ?php if(in_array('createQuotation', $user_permission) || in_array('updateQuotation', $user_permission) || in_array('viewQuotation', $user_permission) || in_array('deleteQuotation', $user_permission)): ?>-->
        <!--  <li>-->
        <!--    <a href="< ?php echo base_url() ?>quotation">-->
        <!--      <i class="fa fa-product-hunt"></i> <span>Quotation</span>-->
        <!--    </a>-->
        <!--  </li>-->
        <!--< ?php endif; ?>-->

        <?php if(in_array('createCustomer', $user_permission) || in_array('updateCustomer', $user_permission) || in_array('viewCustomer', $user_permission) || in_array('deleteCustomer', $user_permission) || in_array('createSalesInvoice', $user_permission) || in_array('updateSalesInvoice', $user_permission) || in_array('viewSalesInvoice', $user_permission) || in_array('deleteSalesInvoice', $user_permission) || in_array('createSalesReturn', $user_permission) || in_array('updateSalesReturn', $user_permission) || in_array('viewSalesReturn', $user_permission) || in_array('deleteSalesReturn', $user_permission) || in_array('createSalesExchange', $user_permission) || in_array('updateSalesExchange', $user_permission) || in_array('viewSalesExchange', $user_permission) || in_array('deleteSalesExchange', $user_permission)): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-product-hunt"></i>
              <span>Sales Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <?php if(in_array('createCustomer', $user_permission) || in_array('updateCustomer', $user_permission) || in_array('viewCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>customer"><i class="icon fa fa-users"></i>Customer</a></li>
              <?php endif; ?>

              <?php if(in_array('createSalesInvoice', $user_permission) || in_array('updateSalesInvoice', $user_permission) || in_array('viewSalesInvoice', $user_permission) || in_array('deleteSalesInvoice', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>sales_invoice"><i class="fa fa-circle-o"></i>Sales Invoice</a></li>
              <?php endif; ?>

              <!-- <li><a href="< ?php echo base_url() ?>sales_return"><i class="fa fa-circle-o"></i> Sales Return</a></li> -->

              <!-- <li><a href="< ?php echo base_url() ?>sales_exchange"><i class="fa fa-circle-o"></i> Sales Exchange</a></li> -->
            </ul>
          </li>
        <?php endif; ?>

        <?php if(in_array('createExpencesCategory', $user_permission) || in_array('updateExpencesCategory', $user_permission) || in_array('viewExpencesCategory', $user_permission) || in_array('deleteExpencesCategory', $user_permission) || in_array('createManageExpences', $user_permission) || in_array('updateManageExpences', $user_permission) || in_array('viewManageExpences', $user_permission) || in_array('deleteManageExpences', $user_permission)): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-product-hunt"></i>
              <span>Expenses</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <?php if(in_array('createExpencesCategory', $user_permission) || in_array('updateExpencesCategory', $user_permission) || in_array('viewExpencesCategory', $user_permission) || in_array('deleteExpencesCategory', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>expences/category"><i class="fa fa-circle-o"></i>Expense Category</a></li>
              <?php endif; ?>

              <?php if(in_array('createManageExpences', $user_permission) || in_array('updateManageExpences', $user_permission) || in_array('viewManageExpences', $user_permission) || in_array('deleteManageExpences', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>expences/"><i class="fa fa-circle-o"></i>Manage Expenses</a></li>
              <?php endif; ?>
              
            </ul>
          </li>
        <?php endif; ?>


        <?php if(in_array('createBankAccount', $user_permission) || in_array('updateBankAccount', $user_permission) || in_array('viewBankAccount', $user_permission) || in_array('deleteBankAccount', $user_permission) || in_array('createBankDeposit', $user_permission) || in_array('updateBankDeposit', $user_permission) || in_array('viewBankDeposit', $user_permission) || in_array('deleteBankDeposit', $user_permission) || in_array('createTransfer', $user_permission) || in_array('updateTransfer', $user_permission) || in_array('viewTransfer', $user_permission) || in_array('deleteTransfer', $user_permission) || in_array('createTransaction', $user_permission) || in_array('updateTransaction', $user_permission) || in_array('viewTransaction', $user_permission) || in_array('deleteTransaction', $user_permission)): ?>
          <li class="treeview">
            <a href="#">
              <i class="app-menu__icon  fa  fa-credit-card-alt"></i>
              <span>Banking & Transactions</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <?php if(in_array('createBankAccount', $user_permission) || in_array('updateBankAccount', $user_permission) || in_array('viewBankAccount', $user_permission) || in_array('deleteBankAccount', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>banking/bankAccount"><i class="fa fa-circle-o"></i>Bank Account</a></li>
              <?php endif; ?>

              <?php if(in_array('createBankDeposit', $user_permission) || in_array('updateBankDeposit', $user_permission) || in_array('viewBankDeposit', $user_permission) || in_array('deleteBankDeposit', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>deposits"><i class="fa fa-circle-o"></i>Bank Account Deposits</a></li>
              <?php endif; ?>

              <?php if(in_array('createTransfer', $user_permission) || in_array('updateTransfer', $user_permission) || in_array('viewTransfer', $user_permission) || in_array('deleteTransfer', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>transfer"><i class="fa fa-circle-o"></i>Bank Account Transfer</a></li>
              <?php endif; ?>

              <?php if(in_array('createTransfer', $user_permission) || in_array('updateTransfer', $user_permission) || in_array('viewTransfer', $user_permission) || in_array('deleteTransfer', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>withdraw"><i class="fa fa-circle-o"></i>Bank Account Withdraw</a></li>
              <?php endif; ?>

              <?php if(in_array('createTransaction', $user_permission) || in_array('updateTransaction', $user_permission) || in_array('viewTransaction', $user_permission) || in_array('deleteTransaction', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>banking"><i class="fa fa-circle-o"></i>Transactions</a></li>
              <?php endif; ?>

            </ul>
          </li>
        <?php endif; ?>

        <!-- < ?php if(in_array('createBarcode', $user_permission) || in_array('updateBarcode', $user_permission) || in_array('viewBarcode', $user_permission) || in_array('deleteBarcode', $user_permission)): ?>
          <li>
            <a href="#">
              <i class="fa fa-product-hunt"></i> <span>Barcode / Label</span>
            </a>
          </li>
        < ?php endif; ?> -->


         <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i>
            <span>Email/SMS Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>messanger"><i class="fa fa-circle-o"></i>Send Email and SMS</a></li>
            <!--<li><a href="< ?php echo base_url() ?>messanger/emailConfig"><i class="fa fa-circle-o"></i>Email Config</a></li>-->
            <!--<li><a href="< ?php echo base_url() ?>messanger/composeEmail"><i class="fa fa-circle-o"></i>Send Email</a></li>-->
          </ul>
        </li>

        <?php if(in_array('createCoupon', $user_permission) || in_array('updateCoupon', $user_permission) || in_array('viewCoupon', $user_permission) || in_array('deleteCoupon', $user_permission)): ?>
          <li>
            <a href="<?php echo base_url() ?>coupons">
              <i class="fa fa-product-hunt"></i> <span>Coupons</span>
            </a>
          </li>
        <?php endif; ?>

        
       <!--  <li>
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>GST</span>
          </a>
        </li> -->

        <?php if(in_array('viewPurchaseReport', $user_permission) || in_array('viewSalesReport', $user_permission) || in_array('viewExpencesReport', $user_permission) || in_array('viewIncomeReport', $user_permission)): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-product-hunt"></i>
              <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <li><a href="< ?php echo base_url() ?>config-email"><i class="fa fa-circle-o"></i>GST Report</a></li> -->

              <?php if(in_array('viewPurchaseReport', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>reports/purchase"><i class="fa fa-circle-o"></i>Purchase Report</a></li>
              <?php endif; ?>


              <?php if(in_array('viewSalesReport', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>reports/sales"><i class="fa fa-circle-o"></i>Sales Report</a></li>
              <?php endif; ?>

              <?php if(in_array('viewExpencesReport', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>reports/expences"><i class="fa fa-circle-o"></i>Expenses Report</a></li>
              <?php endif; ?>

              <?php if(in_array('viewSalesReport', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>reports/productReport"><i class="fa fa-circle-o"></i>Product Wise Report</a></li>
              <?php endif; ?>


              <!-- <li><a href="< ?php echo base_url() ?>reports/income"><i class="fa fa-circle-o"></i>Income Report</a></li> -->
              <!-- <li><a href="< ?php echo base_url() ?>reports/orderReturn"><i class="fa fa-circle-o"></i>Return Order Report</a></li>
              <li><a href="< ?php echo base_url() ?>config-email"><i class="fa fa-circle-o"></i>Exchange Report</a></li> -->

            </ul>
          </li>
        <?php endif; ?>

        <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission) ||    in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-product-hunt"></i>
              <span>Administration</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <!-- <li><a href="< ?php echo base_url() ?>config-email"><i class="fa fa-circle-o"></i>GST Report</a></li> -->

                <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <li><a href="<?php echo base_url() ?>group"><i class="fa fa-circle-o"></i>Manage Groups</a></li>
                <?php endif; ?>

                <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                  <li><a href="<?php echo base_url() ?>users"><i class="fa fa-circle-o"></i>Manage Users</a></li>
                <?php endif; ?>

            </ul>
          </li>
        <?php endif; ?>

        
        <?php if(in_array('updateSetting', $user_permission) || in_array('createTransactionType', $user_permission) || in_array('updateTransactionType', $user_permission) || in_array('viewTransactionType', $user_permission) || in_array('deleteTransactionType', $user_permission) || in_array('createPaymentMethod', $user_permission) || in_array('updatePaymentMethod', $user_permission) || in_array('viewPaymentMethod', $user_permission) || in_array('deletePaymentMethod', $user_permission) || in_array('createProductUnit', $user_permission) || in_array('updateProductUnit', $user_permission) || in_array('viewProductUnit', $user_permission) || in_array('deleteProductUnit', $user_permission) || in_array('createProductSize', $user_permission) || in_array('updateProductSize', $user_permission) || in_array('viewProductSize', $user_permission) || in_array('deleteProductSize', $user_permission) || in_array('createSalesman', $user_permission) || in_array('updateSalesman', $user_permission) || in_array('viewSalesman', $user_permission) || in_array('deleteSalesman', $user_permission)): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-product-hunt"></i>
              <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">


              <?php if(in_array('updateSetting', $user_permission)): ?>
                <li><a href="<?php echo base_url() ?>users/setting"><i class="fa fa-circle-o"></i>Company Settings</a></li>
              <?php endif; ?>


              <!--< ?php if(in_array('createTransactionType', $user_permission) || in_array('updateTransactionType', $user_permission) || in_array('viewTransactionType', $user_permission) || in_array('deleteTransactionType', $user_permission) || in_array('createPaymentMethod', $user_permission) || in_array('updatePaymentMethod', $user_permission) || in_array('viewPaymentMethod', $user_permission) || in_array('deletePaymentMethod', $user_permission) || in_array('createProductUnit', $user_permission) || in_array('updateProductUnit', $user_permission) || in_array('viewProductUnit', $user_permission) || in_array('deleteProductUnit', $user_permission) || in_array('createProductSize', $user_permission) || in_array('updateProductSize', $user_permission) || in_array('viewProductSize', $user_permission) || in_array('deleteProductSize', $user_permission) || in_array('createSalesman', $user_permission) || in_array('updateSalesman', $user_permission) || in_array('viewSalesman', $user_permission) || in_array('deleteSalesman', $user_permission)): ?>-->
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>General Setting
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li>

                      <?php if(in_array('createTransactionType', $user_permission) || in_array('updateTransactionType', $user_permission) || in_array('viewTransactionType', $user_permission) || in_array('deleteTransactionType', $user_permission)): ?>
                        <!-- payment term change to transcation type -->
                        <a href="<?php echo base_url(); ?>payment_term"><i class="fa fa-circle-o"></i>Transaction Type
                        </a>
                      <?php endif; ?>

                      <?php if(in_array('createPaymentMethod', $user_permission) || in_array('updatePaymentMethod', $user_permission) || in_array('viewPaymentMethod', $user_permission) || in_array('deletePaymentMethod', $user_permission)): ?>
                        <a href="<?php echo base_url(); ?>payment_method"><i class="fa fa-circle-o"></i>Payment Method</a>
                      <?php endif; ?>

                      <?php if(in_array('createProductUnit', $user_permission) || in_array('updateProductUnit', $user_permission) || in_array('viewProductUnit', $user_permission) || in_array('deleteProductUnit', $user_permission)): ?>
                        <a href="<?php echo base_url(); ?>unit"><i class="fa fa-circle-o"></i>Product Units</a>
                      <?php endif; ?>

                      <!--< ?php if(in_array('createProductSize', $user_permission) || in_array('updateProductSize', $user_permission) || in_array('viewProductSize', $user_permission) || in_array('deleteProductSize', $user_permission)): ?>-->
                      <!--  <a href="< ?php echo base_url(); ?>size"><i class="fa fa-circle-o"></i>Product sizes</a>-->
                      <!--< ?php endif; ?>-->

                      <?php if(in_array('createSalesman', $user_permission) || in_array('updateSalesman', $user_permission) || in_array('viewSalesman', $user_permission) || in_array('deleteSalesman', $user_permission)): ?>
                        <a href="<?php echo base_url(); ?>salesman"><i class="fa fa-circle-o"></i>Sales Type</a>
                      <?php endif; ?>

                    </li>
                  </ul>
                </li>
              <!--< ?php endif; ?>-->
          </li>
        <?php endif; ?>

      </ul>
    </section>

  </aside>
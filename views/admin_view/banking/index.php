
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        <i class="fa fa-bank" aria-hidden="true"></i> Bank Accounts Transfer
        < !-- <small>Control panel</small> - ->
      </h1>
      <ol class="breadcrumb">
        <li><a href="< ?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bank Accounts Transfer </li>
      </ol>
    </section>
 -->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>

            <div class="box-header">
              <!--  -->
               <form method="post" name="filter" autocomplete="off" action="<?php echo base_url('banking/') ?>">
               <div class="table-responsive">
           <table class="table table-responsive-sm" style="border:none;">
           <tbody><tr>
           <td width="10%">
              <div class="form-group ">
                    <label class="control-label">From</label> 
                     <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                        <input class="form-control" name="from" id="demoDate" type="date" placeholder="Select date" required="" autocomplete="off" size=20 >
                        
                      </div>
                   
                  </div>
            </td>
            <td width="10%">
                   <div class="form-group ">
                    <label class="control-label">To</label> 
                     <div class="input-group">
                        <div class="input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                        <input class="form-control" name="to" id="ToDate" type="date" placeholder="Select date" autocomplete="off">
                        <!--<div class="input-group-append"><span class="input-group-text">.00</span></div>-->
                      </div>
                   
                  </div>
              </td>
             <td width="10%">
                   <div class="form-group ">
                    <label class="control-label">Type</label> 
                     <div class="input-group">
                 <select name="type" class="form-control select2-hidden-accessible" id="demoSelect" tabindex="-1" aria-hidden="true">
                 <!-- <option value="all">All</option> -->
                 <option value="deposit"> Deposit</option>
                  <option value="transfer">Transfer</option>
                 </select>
                      </div>
                   
                  </div>
              </td>
              <!-- <td width="10%">
                   <div class="form-group ">
                   <label class="control-label">Category</label> 
                    <div class="input-group">
                 <select name="category_id" class="form-control select2-hidden-accessible" id="demoSelect2" tabindex="-1" aria-hidden="true">
                       < ?php foreach($category as $rows): ?>
                                    <option value="< ?php echo $rows->id; ?>">< ?php echo ucwords($rows->name); ?></option>
                                  < ?php endforeach; ?>
                  </select>
                </div>
                  </div>
                  </td> -->
              <td width="20%">
                   <div class="form-group ">
                    <label class="control-label">Account Name</label> 
                     <div class="input-group">
                 <select name="account_id" class="form-control select2-hidden-accessible" id="demoSelect1" tabindex="-1" aria-hidden="true">
                      <?php foreach($allData as $rows): ?>
                        <option value="<?php echo $rows->id; ?>"><?php echo ucwords($rows->name); ?></option>
                      <?php endforeach; ?>
                  </select>
                      </div>
                   
                  </div>
                  </td>
              <td width="10%">
                   <div class="form-group ">
                    <label class="control-label">&nbsp;</label> 
                     <div class="input-group">
                      <button name="submit" class="btn btn-outline-info btn-group-toggle btn-primary">Filter</button>
                    </div>
                   
                  </div>
              </td>
                  </tr>
                 </tbody></table>
           </div>
               </form>
              <!--  -->
              
              
            </div>
            
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mydatatable">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Date</th>
                      <th>Account Name</th>
                      <th>Account Number</th>
                      <th>Type</th>
                      <!-- <th>Category</th> -->
                      <!-- <th>Description</th> -->
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=1; foreach($transactionData as $rows): ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows->created; ?></td>
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->ac_number; ?></td>
                        <td><?php echo $rows->type; ?></td>
                        <!-- <td>< ?php echo $rows->type; ?></td> -->
                        <td><?php echo $rows->amount; ?></td>
                       <!--  <td>
                          1223
                        </td> -->
                      </tr>
                    <?php $no++; endforeach; ?>

                  </tbody>
                </table>
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
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
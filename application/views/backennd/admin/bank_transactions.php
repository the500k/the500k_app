  <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs-alt">
                       <?php 
                                    foreach ($bread_crums as $bread_crum ) {
                                    ?>
                                    <li><a href="<?php echo $bread_crum['link']; ?>" class="<?php echo $bread_crum['class']; ?>"><?php echo $bread_crum['name']; ?></a></li>
                                    <?php
                                    }

                       ?>
                    </ul>
                </div>
        </div>
        <!-- form start-->
         <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading purple-bg">
                            <?php echo $form_heading; ?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">

           <?php
                      echo form_open_multipart(base_url() . 'Import_export/import_weatherReport/' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                    ?>

                        <input type="hidden" name="test" value="sample">
                            
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Upload File</label>
                                        <div class="col-lg-6">
                                           <input type="file" class="form-control" id="name" name="transaction_file" required >
                                           <br>
                                            <p class="purple-bg">Please upload xls file with correct header and data</p>
                                        </div>
                                        
                                    </div>
                                 

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- form end-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                      <?php echo $table_heading; ?>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                     <div class="table-responsive">   
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                      <th>Transaction ID</th>
                      <th> Name</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>source</th>
                      <th>Audit Incoming</th>
                      <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($transaction_lists))
                                    {

        foreach($transaction_lists as $transaction){ ?>

        <tr>
         <td><?php echo $transaction['transid'];  ?></td>
         <td><?php echo $transaction['tdate'];  ?></td>
         <td><?php echo $transaction['name'];  ?></td>
         <td><?php echo $transaction['camount'];  ?></td>
         <td><?php echo $transaction['source_type'];  ?></td>
         <td><?php echo $transaction['audit_income'];  ?></td>

          <td>
                <a href="#"  data-toggle="tooltip" data-original-title="bank_transaction panel"><button class="btn btn-icon-anim btn-circle btn-warning"><i class="fa fa-th-large"></i></button></a>
             </td>
             </tr>
              <?php 
                   }
                 }
         ?>
                  
                </tbody>
                   
                    </table>
                    </div>
                    </div>
                    </div>
                </section>
            </div>
        </div>
       
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->

         <script type="text/javascript">


    function delete_bank_transaction(bank_transaction_id)
    {
      
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this bank_transaction!")== true)
       {
         
         var base_url='<?php echo base_url(); ?>';
       
       // window.location.href =base_url+"student/delete_student/"+student_id;
       }
       else
       {
          return false;
       }
    }
    </script>   
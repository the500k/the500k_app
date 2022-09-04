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
                      echo form_open_multipart(base_url() . 'Admin3/donar_report/' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                    ?>

                     
                            
                                  

                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Status</label>
                                        <div class="col-lg-6">

                                            <?php 
                                 $class_status="id='status' class='form-control' style='#000000;'";

            echo form_dropdown('status',$option_status,"regular",$class_status);
                     ?>              </div>       
                                    </div>

                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Payment Status</label>
                                        <div class="col-lg-6">

                                            <?php 
                                 $class_pstatus="id='pstatus' class='form-control' style='#000000;'";

            echo form_dropdown('pstatus',$option_pstatus,"all",$class_pstatus);
                     ?>              </div>       
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
                    <table  class="display table table-bordered table-striped" id="example1">
                    <thead>
                    <tr>
                      <th>Donar ID</th>
                      <th>Name</th>
                      <th>Recent 4 Transaction</th>
                      <th>Status</th>
                      <th>Payment Status</th>

                      <th>Date Last Given</th>
                      <th>Since Last Given</th>
                      <th>Age</th>
                      <th>Email ID</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                     //   print_r($ddetails);exit;
                            if(!empty($ddetails))
                                    {

        

               // print_r($mreports);exit;

                foreach ($ddetails as $id => $ddetail) {

              

                    $last_trans=$ddetail['last_trans'];
                    $donar_detail=$ddetail['donar_detail'];

                //   print_r($donar_detail);exit;


                    $btn_style=$last_trans['btn_style'];

              
               
            ?>

        <tr style="background-color: <?php echo $row_style; ?>">
        <td><?php echo $id;  ?></td>
         <td><?php echo $donar_detail['name'];  ?></td>
         <td><?php echo "£".$last_trans['trans_credict1']."(".$last_trans['trans_date1']."),£".$last_trans['trans_credict2']."(".$last_trans['trans_date2']."),£".$last_trans['trans_credict3']."(".$last_trans['trans_date3']."),£".$last_trans['trans_credict4']."(".$last_trans['trans_date4'].")";  ?></td>
         <td><button type="button" class="<?php echo $btn_style; ?>"><?php echo $last_trans['status'];  ?></button></td>
         <td><?php echo $ddetail['payment_status'];  ?></td>
         <td><?php echo $last_trans['trans_credict1'];  ?></td>
         <td><?php echo $last_trans['ago'];  ?></td>
         <td><?php echo $donar_detail['age'];  ?></td>
         <td><?php echo $donar_detail['email'];  ?></td>

          
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


    function delete_donar(donar_id)
    {
      
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this donar!")== true)
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
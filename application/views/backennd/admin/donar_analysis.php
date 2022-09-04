
  <!--main content start-->
    <section id="">
        <section class="">
        <!-- page start-->
         <div class="row">
                <div class="col-lg-12">
                    <h3></h3>
                    <br><br>
                </div>
         </div>
        <!-- form start-->
        

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                      <?php echo "Donar Report"; ?>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                     <div class="">   
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

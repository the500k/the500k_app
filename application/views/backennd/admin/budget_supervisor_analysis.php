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
                      <th>Year</th>
                      <th>Month</th>
                      <th colspan="2">GSECT</th>
                      <th colspan="2">JLM</th>
                      <th colspan="2">BCT</th>
                      <th colspan="2">NJM</th>
                      <th>Total Supervisor</th>
                      <th>Supervisor receive FW salary</th>
                      <th>%</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                      for($yr=2019;$yr<=2021;$yr++) {
                        for($month=1;$month<=12;$month++)
                        {
                            if($yr==2021 && $month==9){
                              break;
                            }
              
               
            ?>

        <tr>
        <td><?php echo $yr;  ?></td>
        <td><?php echo $month;  ?></td>
      <td><?php echo (!empty($GSECT_result[$yr][$month]['sup_count'])?$GSECT_result[$yr][$month]['sup_count']:0);  ?></td>
      <td><?php echo (!empty($GSECT_result[$yr][$month]['sup_fw_count'])?$GSECT_result[$yr][$month]['sup_fw_count']:0);  ?></td> 
      <td><?php echo (!empty($JLM_result[$yr][$month]['sup_count'])?$JLM_result[$yr][$month]['sup_count']:0);  ?></td>
<td><?php echo (!empty($JLM_result[$yr][$month]['sup_fw_count'])?$JLM_result[$yr][$month]['sup_fw_count']:0);  ?></td>
<td><?php echo (!empty($BCT_result[$yr][$month]['sup_count'])?$BCT_result[$yr][$month]['sup_count']:0);  ?></td>
<td><?php echo (!empty($BCT_result[$yr][$month]['sup_fw_count'])?$BCT_result[$yr][$month]['sup_fw_count']:0);  ?></td>
<td><?php echo (!empty($NJM_result[$yr][$month]['sup_count'])?$NJM_result[$yr][$month]['sup_count']:0);  ?></td>
<td><?php echo (!empty($NJM_result[$yr][$month]['sup_fw_count'])?$NJM_result[$yr][$month]['sup_fw_count']:0);  ?></td>
      <td><?php 

        $total_sup[$yr][$month]=$GSECT_result[$yr][$month]['sup_count']+$JLM_result[$yr][$month]['sup_count']+$BCT_result[$yr][$month]['sup_count']+$NJM_result[$yr][$month]['sup_count'];

      echo $total_sup[$yr][$month];  ?></td>
      <td><?php 
      $total_sup_fw[$yr][$month]=$GSECT_result[$yr][$month]['sup_fw_count']+$JLM_result[$yr][$month]['sup_fw_count']+$BCT_result[$yr][$month]['sup_fw_count']+$NJM_result[$yr][$month]['sup_fw_count'];
      echo $total_sup_fw[$yr][$month];  ?></td>

      <td><?php echo round($total_sup_fw[$yr][$month]*100/$total_sup[$yr][$month],2);  ?></td>

          
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

        
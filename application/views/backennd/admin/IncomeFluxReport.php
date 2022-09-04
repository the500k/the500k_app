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
                    <hr>
                      <button class="btn btn-primary" onclick="printDiv('printableArea')">Print Report</button> 
                      <hr>
                </div>
        </div>
<div id="printableArea">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                        <?php  echo $page_title;?>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                         <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                              var data = google.visualization.arrayToDataTable(<?php echo $month_total_income; ?>);

                              var options = {
                                chart: {
                                  title: 'Monthly Income',
                                  subtitle: 'total income in each month',
                                       },
                                colors: ['#bf4aa8']
                              };

                              var chart = new google.charts.Bar(document.getElementById('donutchart'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                    
                     
                                  <div id="donutchart" style="width: 100%; height: 500px;"></div> 

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <tr>
                            <td  class="purple-bg">Month - Year</td>
                            <?php 
                            if(!empty($month_total_income_array))
                            {
                                 foreach ($month_total_income_array as $mt) {
                                     ?>
                                     <td class="purple-bg"><?php echo date('F', mktime(0, 0, 0, $mt['month'], 10))."-".$mt['year']; ?></td>
                                     <?php
                                 }

                            }
                                ?>
                        </tr>
                         <tr>
                            <td>Amount</td>
                            <?php
                         if(!empty($month_total_income_array))
                            {
                              $k=1;
                               foreach ($month_total_income_array as $mtincome) {
                               ?>                        
                                          <td><?php echo "£.".$mtincome['total_sum']; ?></td>


                                    <?php }
                                    }

                                    ?>
                                      


                                  </tr>
                                  
                    </table>    
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        <!----  Start Chart 2 ---->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                        Field Workers Income Comparision
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                         
                         <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                              var data = google.visualization.arrayToDataTable(<?php echo $month_fw_income; ?>);

                              var options = {
                                chart: {
                                  title: 'FW Income',
                                  
                                       },
                                colors: ['#76448A']
                              };

                              var chart = new google.charts.Bar(document.getElementById('month_fw_income'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                    
                     
                                  <div id="month_fw_income" style="width: 100%; height: 500px;"></div> 

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <tr>
                            <td  class="purple-bg">Month - Year</td>
                            <?php 
                            if(!empty($month_total_income_array))
                            {
                                 foreach ($month_total_income_array as $mt) {
                                     ?>
                                     <td class="purple-bg"><?php echo date('F', mktime(0, 0, 0, $mt['month'], 10))."-".$mt['year']; ?></td>
                                     <?php
                                 }

                            }
                                ?>
                        </tr>
                         <tr>
                            <td>Amount</td>
                            <?php
                         if(!empty($month_total_income_array))
                            {
                              $k=1;
                               foreach ($month_total_income_array as $mtincome) {
                               ?>                        
                                          <td><?php echo "£.".$mtincome['fw_sum']; ?></td>


                                    <?php }
                                    }

                                    ?>
                                      


                                  </tr>
                                  
                    </table>  
                          </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        <!----  Start Chart 2 ---->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                        Field Workers Income Comparision
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">

                    <button type="button" class="btn btn-success btn-lg btn-block">FW Regular Income Summary</button>
                

                    <?php
                    // print_r($namewise_details['Neil Fernandez'][2020]); 
                      //  print_r($months); id="example"
                    ?>

                    <table  class="display table table-bordered table-striped">
                    <thead class="purple-bg">
                    <tr>
                      <th>S.no</th>
                      <th> Name</th>
                      <?php 

                            for($i=0;$i<count($months);$i++)
                          {
                               $sum_irregular[$months[$i]]=0;
                               $sum_regular[$months[$i]]=0;
                          }

                          for($i=0;$i<count($months);$i++)
                          {
                            ?>
                            <th> <?php echo date("F", mktime(0, 0, 0, $months[$i], 10)); ?></th>
                            <?php
                          }

                        ?>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 

                        if(!empty($regular_payment))
                        {
                          $j=0;
                           
                            foreach ($regular_payment as $name) {
                             
                            ?>
                            <tr>
                      <td><?php echo $j++ + 1; ?></td>
                      <td> <?php echo $name; ?></td>
                      <?php 

                          for($i=0;$i<count($months);$i++)
                          {
                            ?>
                            <td> £.<?php echo $namewise_details[$name][$years[$i]][$months[$i]]['camount'];

                                  $sum_regular[$months[$i]]+=$namewise_details[$name][$years[$i]][$months[$i]]['camount'];

                             ?></td>
                            <?php
                          }

                        ?>
                    </tr>

                            <?php

                           }
                        }

                       ?>
                        
                  
                </tbody>
                <tfoot>
                    <tr class="purple-bg">
                      <th>Monthwise</th>
                      <th>Total</th>
                      <?php 

                          for($i=0;$i<count($months);$i++)
                          {
                            ?>
                            <th> <?php echo "£.".$sum_regular[$months[$i]]; ?></th>
                            <?php
                          }

                        ?>
                    </tr>
                    </tfoot>
                   
                    </table>
                    <button type="button" class="btn btn-success btn-lg btn-block">FW Irregular Income Summary</button>
                
                    <br><br>
                    <?php
                    // print_r($namewise_details['Neil Fernandez'][2020]); 
                      //  print_r($months); id="example"
                    ?>

                    <table  class="display table table-bordered table-striped">

                    <thead class="purple-bg">
                    <tr>
                      <th>S.no</th>
                      <th> Name</th>
                      <?php 

                          for($i=0;$i<count($months);$i++)
                          {
                            ?>
                            <th> <?php echo date("F", mktime(0, 0, 0, $months[$i], 10)); ?></th>
                            <?php
                          }

                        ?>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                       

                        if(!empty($irregular_payment))
                        {
                          $j=0;
                           
                            foreach ($irregular_payment as $name) {
                             
                            ?>
                            <tr>
                      <td><?php echo $j++ + 1; ?></td>
                      <td> <?php echo $name; ?></td>
                      <?php 

                          for($i=0;$i<count($months);$i++)
                          {
                            ?>
                            <td> 


                              <?php 
                                if($namewise_details[$name][$years[$i]][$months[$i]]['camount']>0){
                              echo "£.".$namewise_details[$name][$years[$i]][$months[$i]]['camount']; 
                              $sum_irregular[$months[$i]]+=$namewise_details[$name][$years[$i]][$months[$i]]['camount'];
                            }
                            else
                            {
                               echo "Not Paid";
                            }

                              ?></td>
                            <?php
                          }

                        ?>
                    </tr>

                            <?php

                           }
                        }

                       ?>
                        
                  
                </tbody>
                <tfoot>
                    <tr class="purple-bg">
                      <th>Monthwise</th>
                      <th>Total</th>
                      <?php 

                          for($i=0;$i<count($months);$i++)
                          {
                            ?>
                            <th> <?php echo "£.".$sum_irregular[$months[$i]]; ?></th>
                            <?php
                          }

                        ?>
                    </tr>
                    </tfoot>
                   
                    </table>


                    </div>

                    <div class="row">

                      <?php 
                            $total=0;
                          //    print_r($namewise_details['GoDaddy']);

                            for($k=0;$k<count($months);$k++) {
                              if($k%2==0)
                              {
                                $bg_color="background-color: #ABEBC6;color:#000000;";
                                $hd_color="background-color: #0B5345;color:#ffffff;";
                              }
                              else
                              {
                                $bg_color="background-color: #F39C12;color:#000000;";
                                $hd_color="background-color: #D35400;color:#ffffff;";
                              }
                              $paid_only_list=$month_total_income_array[$months[$k]]['paid_only'];
                              ?>
                               <div class="col-sm-6">
                    <section class="panel" style="<?php echo $bg_color; ?>">
                        <header class="panel-heading" style="<?php echo $hd_color; ?>">
                            Paid Only on <?php echo date("F", mktime(0, 0, 0, $months[$k], 10)); ?> 
                          
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php

                                      $l=1;

                                       if(!empty($paid_only_list))
                                {
                        foreach ($paid_only_list as $pname ) {

                                  ?>
                                <tr>
                                    <td><?php echo $l++; ?></td>
                                    <td><?php echo $pname; ?></td>
                                    <td><?php echo "£.".$namewise_details[$pname][$years[$k]][$months[$k]]['camount'];
                                      $total+=$namewise_details[$pname][$years[$k]][$months[$k]]['camount'];

                                     ?></td>
                                    
                                </tr>
                                <?php 

                                    }
                                  }
                                  else
                                  {
                                    echo "No record found";
                                  }

                                ?>
                                
                                </tbody>
                                  <tfoot>
                                <tr>
                                    <th colspan="2">Total Amount</th>
                                    <th><?php
                                      if($total>0)
                                      {
                                         echo "£.".$total; 
                                        $total=0;
                                      }
                                    
                                    ?></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </section>
                </div>

                              <?php
                              //print_r($paid_only_list);
                             
                               
                              unset($paid_only_list);
                            }

                      ?>

               
                
            </div>


                </section>
            </div>
        </div>

        <!---- End Chart 2  ----->

        <!----  Start Chart 3 ---->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                        Children Home Income Comparision
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                         
                         <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                              var data = google.visualization.arrayToDataTable(<?php echo $month_children_home_income; ?>);

                              var options = {
                                chart: {
                                  title: 'Chidren Home Income',
                                  
                                       },
                                colors: ['#3498DB']
                              };

                              var chart = new google.charts.Bar(document.getElementById('month_children_home_income'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                    
                     
                                  <div id="month_children_home_income" style="width: 100%; height: 500px;"></div> 

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <tr>
                            <td  class="purple-bg">Month - Year</td>
                            <?php 
                            if(!empty($month_total_income_array))
                            {
                                 foreach ($month_total_income_array as $mt) {
                                     ?>
                                     <td class="purple-bg"><?php echo date('F', mktime(0, 0, 0, $mt['month'], 10))."-".$mt['year']; ?></td>
                                     <?php
                                 }

                            }
                                ?>
                        </tr>
                         <tr>
                            <td>Amount</td>
                            <?php
                         if(!empty($month_total_income_array))
                            {
                              $k=1;
                               foreach ($month_total_income_array as $mtincome) {
                               ?>                        
                                          <td><?php echo "£.".$mtincome['children_home']; ?></td>


                                    <?php }
                                    }

                                    ?>
                                      


                                  </tr>
                                  
                    </table>    
                    </div>
                </section>
            </div>
        </div>

        <!---- End Chart 3 ----->
        <!----  Start Chart 4 ---->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                        Social Project Income
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                         
                         <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                              var data = google.visualization.arrayToDataTable(<?php echo $month_sp_income; ?>);

                              var options = {
                                chart: {
                                  title: 'SP Income',
                                  subtitle: 'Social Project',
                                       },
                                colors: ['#F39C12']
                              };

                              var chart = new google.charts.Bar(document.getElementById('month_sp_income'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                    
                     
                                  <div id="month_sp_income" style="width: 100%; height: 500px;"></div> 

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <tr>
                            <td  class="purple-bg">Month - Year</td>
                            <?php 
                            if(!empty($month_total_income_array))
                            {
                                 foreach ($month_total_income_array as $mt) {
                                     ?>
                                     <td class="purple-bg"><?php echo date('F', mktime(0, 0, 0, $mt['month'], 10))."-".$mt['year']; ?></td>
                                     <?php
                                 }

                            }
                                ?>
                        </tr>
                         <tr>
                            <td>Amount</td>
                            <?php
                         if(!empty($month_total_income_array))
                            {
                              $k=1;
                               foreach ($month_total_income_array as $mtincome) {
                               ?>                        
                                          <td><?php echo "£.".$mtincome['sp_sum']; ?></td>


                                    <?php }
                                    }

                                    ?>
                                      


                                  </tr>
                                  
                    </table>    
                    </div>
                </section>
            </div>
        </div>

        <!---- End Chart 4  ----->
        <!----  Start Chart 5 ---->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                        The 500k Indiana Income Comparision
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                         
                         <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                              var data = google.visualization.arrayToDataTable(<?php echo $month_indiana_income; ?>);

                              var options = {
                                chart: {
                                  title: '500k Indiana',
                                  subtitle: 'Income in each month',
                                       },
                                colors: ['#D35400']
                              };

                              var chart = new google.charts.Bar(document.getElementById('month_indiana_income'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                    
                     
                                  <div id="month_indiana_income" style="width: 100%; height: 500px;"></div> 

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <tr>
                            <td  class="purple-bg">Month - Year</td>
                            <?php 
                            if(!empty($month_total_income_array))
                            {
                                 foreach ($month_total_income_array as $mt) {
                                     ?>
                                     <td class="purple-bg"><?php echo date('F', mktime(0, 0, 0, $mt['month'], 10))."-".$mt['year']; ?></td>
                                     <?php
                                 }

                            }
                                ?>
                        </tr>
                         <tr>
                            <td>Amount</td>
                            <?php
                         if(!empty($month_total_income_array))
                            {
                              $k=1;
                               foreach ($month_total_income_array as $mtincome) {
                               ?>                        
                                          <td><?php echo "£.".$mtincome['indiana_sum']; ?></td>


                                    <?php }
                                    }

                                    ?>
                                      


                                  </tr>
                                  
                    </table>    
                    </div>
                </section>
            </div>
        </div>

        <!---- End Chart 5  ----->

        <!----  Start Chart 6 ---->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                       The 500K Arizona
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                         
                         <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                              var data = google.visualization.arrayToDataTable(<?php echo $month_Arizona_income; ?>);

                              var options = {
                                chart: {
                                  title: 'The 500k Arizona Income',
                                  subtitle: 'total income in each month',
                                       },
                                colors: ['#34495E']
                              };

                              var chart = new google.charts.Bar(document.getElementById('month_Arizona_income'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                    
                     
                                  <div id="month_Arizona_income" style="width: 100%; height: 500px;"></div> 

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <tr>
                            <td  class="purple-bg">Month - Year</td>
                            <?php 
                            if(!empty($month_total_income_array))
                            {
                                 foreach ($month_total_income_array as $mt) {
                                     ?>
                                     <td class="purple-bg"><?php echo date('F', mktime(0, 0, 0, $mt['month'], 10))."-".$mt['year']; ?></td>
                                     <?php
                                 }

                            }
                                ?>
                        </tr>
                         <tr>
                            <td>Amount</td>
                            <?php
                         if(!empty($month_total_income_array))
                            {
                              $k=1;
                               foreach ($month_total_income_array as $mtincome) {
                               ?>                        
                                          <td><?php echo "£.".$mtincome['Arizona_sum']; ?></td>


                                    <?php }
                                    }

                                    ?>
                                      


                                  </tr>
                                  
                    </table>    
                    </div>
                </section>
            </div>
        </div>

        <!---- End Chart 6  ----->
       </div>
        </section>
    </section>

    <script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
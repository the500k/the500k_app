
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
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading purple-bg">
                            <?php echo $table_heading; ?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                    <table  class="display table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Year</th>
                      <th>Field Workers(Past & Present)</th>
                      <th>New FW</th>
                      <th>Attending worship</th>
                      <th>Committed members</th>
                      <th>Villages with worship groups</th>
                      <th>Established communities</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($year_result))
                                    {


        foreach($year_result as $yr => $yresult){ 
         // print_r($yresult);exit;
            if($yr!=2021){

              

          ?>

        <tr>
          <td><?php echo $yr;  ?></td>
         <td><?php 

            if($yr==2020){
             // echo  "hi";
              echo $yresult['fw_support_currently']+21;
            }
            else{
         echo $yresult['fw_support_currently'];
         }  


         ?></td>
        <td><?php 

            if($yr==2020){
             // echo  "hi";
              echo $yresult['fw_new']+21;
            }
            else{
         echo $yresult['fw_new'];
         }  


         ?></td>

         <td><?php echo $yresult['total_attending'];  ?></td>
         <td><?php echo $yresult['total_baptised'];  ?></td>
         <td><?php echo $yresult['total_village'];  ?></td>
         <td><?php echo $yresult['total_church'];  ?></td>
         

          
             </tr>
              <?php 

                   }
                  }
                 }
         ?>
                  <tr>
          <td><?php echo 2021;  ?></td>
         <td><?php echo $total_fw+$jlm['total_fw']+$njm['total_fw']+$bct['total_fw'];  ?></td>

         <td><?php echo $new_fw+$jlm['total_fw']+$njm['total_fw']+$bct['total_fw'];  ?></td>
        

         <td><?php echo $lsum_attending;  ?></td>
         <td><?php echo $lsum_baptised;  ?></td>
         <td><?php echo $lno_village;  ?></td>
         <td><?php echo $lno_church;  ?></td>
        
         

          
             </tr>
             <tr>
          <td colspan="3"><b>Averages per worker</b></td>
         <td><?php echo round($lsum_attending/$total_fw,2);  ?></td>
         <td><?php echo round($lsum_baptised/$total_fw,2);  ?></td>
         <td><?php echo round($lno_village/$total_fw,2);  ?></td>
         <td><?php echo round($lno_church/$total_fw,2);  ?></td>
        
         

          
             </tr>
                </tbody>
                   
                    </table>
                    </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- form end-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading purple-bg">
                            <?php echo $table_heading; ?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                    <table  class="display table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Year</th>
                      <th>Field Workers Currently Supported</th>
                      <th>New FW</th>
                      <th>Graduated Field Workers</th>
                      <th>Total Attending worship</th>
                      <th>Total Committed Members</th>
                      <th>Villages with worship groups</th>
                      <th>Established churches</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($yrslts))
                                    {


        foreach($yrslts as $yr => $yrslt){ 

            if($yr!=2021){

          ?>

        <tr>
          <td><?php echo $yr;  ?></td>
         <td><?php 

         if($yr==2020){
             // echo  "hi";
              echo $yrslt['fw_support_currently']+18;
            }
            else{
         echo $yrslt['fw_support_currently'];
         }  

         //echo $yrslt['fw_support_currently'];  ?></td>
         
         <td><?php 
          if($yr==2020){
         echo $yrslt['fw_retired_total']+3; 
       }
       else
       {
        echo $yrslt['fw_retired_total']; 
       }


          ?></td>
         
        

         <td><?php echo $yrslt['total_attending'];  ?></td>
         <td><?php echo $yrslt['total_baptised'];  ?></td>
         <td><?php echo $yrslt['total_village'];  ?></td>
         <td><?php echo $yrslt['total_church'];  ?></td>
         

          
             </tr>
              <?php 
                   }
                  }
                 }
         ?>
                  <tr>
          <td><?php echo 2021;  ?></td>
         <td><?php 
            $total_fw=$latest['total_fw']+$jlm['total_live']+$njm['total_live']+$bct['total_live'];

         echo $latest['total_fw']+$jlm['total_live']+$njm['total_live']+$bct['total_live'];  ?></td>
         <td><?php echo $latest['latest_retired']+$jlm['total_retired']+$njm['total_retired']+$bct['total_retired'];    ?></td>
         
        

         <td><?php echo $latest['lsum_attending'];  ?></td>
         <td><?php echo $latest['lsum_baptised'];  ?></td>
         <td><?php echo $latest['lno_village'];  ?></td>
         <td><?php echo $latest['lno_church'];  ?></td>
             </tr>
              <tr>
          <td colspan="2"><b>Averages per worker</b></td>
          <td><?php echo round($latest['latest_retired']/$total_fw,2);  ?></td>
         <td><?php echo round($latest['lsum_attending']/$total_fw,2);  ?></td>
         <td><?php echo round($latest['lsum_baptised']/$total_fw,2);  ?></td>
         <td><?php echo round($latest['lno_village']/$total_fw,2);  ?></td>
         <td><?php echo round($latest['lno_church']/$total_fw,2);  ?></td>
             </tr>
                </tbody>
                   
                    </table>
                    </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- form end-->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                      <?php echo "Gsect Msupport Extract"; ?>
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
                              var data = google.visualization.arrayToDataTable(<?php echo $chart_data; ?>);

                              var options = {
                                chart: {
                                  title: 'Missionary Stats History',
                                  subtitle: 'Missionary Stats History 2017 to 2021',
                                       }
                              };

                              var chart = new google.charts.Bar(document.getElementById('chart_div'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                                  <div id="chart_div" style="width: 100%; height: 500px;"></div>
                    
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                      <?php echo "Report Catcher Extract"; ?>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                     <div class="">   
                    <div class="adv-table">
                        
                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                              var data = google.visualization.arrayToDataTable(<?php echo $chart_div_report; ?>);

                              var options = {
                                chart: {
                                  title: 'Missionary Stats History',
                                  subtitle: 'Missionary Stats History 2017 to 2021',
                                       }
                              };

                              var chart = new google.charts.Bar(document.getElementById('chart_div_report'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                                  <div id="chart_div_report" style="width: 100%; height: 500px;"></div>

                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                              var data = google.visualization.arrayToDataTable(<?php echo $chart_div_report1; ?>);

                              var options = {
                                chart: {
                                  title: 'Missionary Stats History',
                                  subtitle: 'Missionary Stats History 2017 to 2021',
                                       }
                              };

                              var chart = new google.charts.Bar(document.getElementById('chart_div_report1'));

                              chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                         </script>
                                  <div id="chart_div_report1" style="width: 100%; height: 500px;"></div>
                    </div>
                    </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading purple-bg">
                      <?php echo "Report Catcher Extract"; ?>
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
                      <th>Year</th>
                      <th>Period</th>
                      <th>MID</th>
                      <th>Name</th>
                      <th>Attending</th>
                      <th>Baptised</th>
                      <th>Villages</th>
                      <th>churches</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($latest_result))
                                    {

        

               // print_r($mreports);exit;

                foreach ($latest_result as $id => $mrp) {
                    
              //print_r($mrp);exit;
               if(!empty($mrp) && $mrp['sum_attanding']>0){
            ?>

        <tr>
         <td><?php echo $mrp['year'];  ?></td>
         <td><?php echo $mrp['period'];  ?></td>
         <td><?php echo $id;  ?></td>
         <td><?php echo $missionary_by_id[$id]['name'];  ?></td>
         <td><?php echo $mrp['sum_attanding'];  ?></td>
         <td><?php echo $mrp['sum_baptised'];  ?></td>
         <td><?php echo $mrp['no_village'];  ?></td>
         <td><?php echo $mrp['no_church'];  ?></td>

          
             </tr>
              <?php
                 } 
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

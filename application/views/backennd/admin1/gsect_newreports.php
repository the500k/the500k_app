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
                       
                    <div class="adv-table">
                    <table  class="table table-bordered table-striped" id="example1">
                    <thead>
                    <tr>
                      
                      <th>Missionary ID</th>
                      <th>Report Date</th>
                      <th>Name</th>
                      <th>SName</th>
                      <th>Year & Rtype</th>
                      
                      <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($missionaries_lists))
                                    {

        foreach($missionaries_lists as $missionary){ ?>

        <tr>
         
         <td><?php echo $missionary['id']; ?></td>
         <td><?php echo date('d-m-Y',strtotime($missionary['report_date']));  ?></td>
         <td><?php
         
            if($missionary['name']!="Not Applicable")
                echo $missionary['name']."";
            
            if($missionary['middlename']!="Not Applicable")
                echo $missionary['middlename']." ";
            
            if($missionary['surename']!="Not Applicable")
                echo $missionary['surename'];
         ?></td>
         <td><?php echo $state_by_id[$missionary['state_id']]['name'];?></td>
         <td><?php echo $missionary['report_year']." - R".$missionary['report_period'];  ?></td>
        <td>
                         <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button" aria-expanded="false">Options <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>Admin2/missionary_report_preview/<?php echo $missionary['report_id']; ?>/1" target="_blank">Report Preview</a></li>
                                <li><a href="<?php echo base_url(); ?>Admin2/gsect_generate_fw_report/<?php echo $missionary['report_id']; ?>/1" target="_blank">Report Pdf</a></li>
                                <li><a href="<?php echo base_url(); ?>Admin2/edit_gsect_missionary_report/<?php echo $missionary['report_id']; ?>/1">Edit</a></li>
                                <li><a href="<?php echo base_url(); ?>Admin2/delete_gsect_missionary_report/<?php echo $missionary['report_id']; ?>/1">Delete</a></li>
                              </ul>
                        </div>
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
                </section>
            </div>
        </div>
       
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->

           
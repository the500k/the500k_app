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
        <div class="row" style="<?php echo $tiny_msg; ?>">
                                  <div class="alert alert-block alert-success fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Successfully deleted the report.</strong>
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
                     <div class="">   
                    <div class="adv-table">
                    <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                      <th>supervisor ID</th>
                      <th>Report Date</th>
                      <th>Name</th>
                      <th>State</th>
                      <th>Year & Rtype</th>
                      
                      <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($missionaries_lists))
                                    {

        foreach($missionaries_lists as $supervisor){ ?>

        <tr>
         <td><?php echo $supervisor['mrid']; ?></td>
         <td><?php echo date('d-m-Y',strtotime($supervisor['report_date']));  ?></td>
         <td><?php
         
            if($supervisor['fname']!="Not Applicable")
                echo $supervisor['fname']."";
            
            if($supervisor['middlename']!="Not Applicable")
                echo $supervisor['middlename']." ";
            
            if($supervisor['surename']!="Not Applicable")
                echo $supervisor['surename'];
         ?></td>
         <td><?php echo $state_by_id[$supervisor['state_id']]['name'];  ?></td>
         <td><?php echo $supervisor['report_year']." - R".$supervisor['report_period'];  ?></td>
        <td>
                         <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button" aria-expanded="false">Options <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>MP_Panel/supervisor_report_preview/<?php echo $supervisor['report_id']; ?>" target="_blank">Report Preview</a></li>
                                <li><a href="<?php echo base_url(); ?>MP_Panel/generate_fw_termreport/<?php echo $supervisor['report_id']; ?>" target="_blank">Report Pdf</a></li>
                                <li><a href="<?php echo base_url(); ?>MP_Panel/edit_supervisor_report/<?php echo $supervisor['report_id']; ?>">Edit</a></li>
                                <li><a href="<?php echo base_url(); ?>MP_Panel/delete_supervisor_report/<?php echo $supervisor['report_id']; ?>">Delete</a></li>
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
                    </div>
                </section>
            </div>
        </div>
       
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->

         <script type="text/javascript">


    function delete_supervisor(supervisor_id)
    {
      alert("hi");/*
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this supervisor!")== true)
       {
         
         var base_url='<?php echo base_url(); ?>';
       
       // window.location.href =base_url+"student/delete_student/"+student_id;
       }
       else
       {
          return false;
       }*/
    }
    </script>   
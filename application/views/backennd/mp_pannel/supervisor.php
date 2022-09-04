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
                      <th>Supervisor ID</th>
                      <th>Name</th>
                      <th>NoofMissionary</th>
                      <th>Missionary Name</th>
                      <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($supervisor_lists))
                                    {

        foreach($supervisor_lists as $supervisor){ 

            $supervisor_id=$supervisor["supervisor_id"];

          ?>

        <tr>
         <td><?php echo $supervisor['supervisor_id']; ?></td>
         <td><?php echo $supervisor['name'];  ?></td>
         <td><?php
         
                       echo $supervisor_missionary_data[$supervisor_id]['no_of_missionary'];
         ?></td>
         <td><?php 

             // print_r($supervisor_missionary_data[$supervisor_id]["missionary_names"]);
              $missionary_names=implode(",", $supervisor_missionary_data[$supervisor_id]["missionary_names"]);

            

         echo $missionary_names;  ?></td>
         <td>
         
                         <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button" aria-expanded="false">Options <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>MP_Panel/missionary_report_preview/<?php echo $missionary['report_id']; ?>" target="_blank">Report Preview</a></li>
                                <li><a href="<?php echo base_url(); ?>MP_Panel/generate_fw_termreport/<?php echo $missionary['report_id']; ?>" target="_blank">Report Pdf</a></li>
                                <li><a href="<?php echo base_url(); ?>MP_Panel/edit_missionary_report/<?php echo $missionary['report_id']; ?>">Edit</a></li>
                                <li><a href="<?php echo base_url(); ?>MP_Panel/delete_missionary_report/<?php echo $missionary['report_id']; ?>">Delete</a></li>
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


    function delete_missionary(missionary_id)
    {
      alert("hi");/*
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this missionary!")== true)
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
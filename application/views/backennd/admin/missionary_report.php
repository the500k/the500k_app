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
                      echo form_open_multipart(base_url() . 'Admin/missionary_report/generate_report' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                    ?>
                     <div class="form-group">
        <label class="control-label col-md-2">Missionaries</label>
        <div class="col-md-10">

             <?php            

                   // print_r($missionaries_lists);exit;
                 $option_misssionary[0]="click here to clear";
                            if(!empty($missionaries_lists))
                            {
                               foreach ($missionaries_lists as $missionary) {

                                  $option_misssionary[$missionary['missionary_id']]=$missionary['name'];
                                 
                               }
                            }
                            
                            
                                 $class_dept=" class='form-control' 
                                 ";

                                echo form_dropdown('missionary_id',$option_misssionary,0,$class_dept);
                     ?> 
      
        </div>

        </div>

                     <div class="form-group">
                                <label class="control-label col-md-2">Report</label>
                                <div class="col-md-10">
                                    <textarea class="wysihtml5 form-control" name="report" rows="9"></textarea>
                                </div>
                     </div>
                     <div class="form-group">
                                <label class="control-label col-md-2">Prayer Points</label>
                                <div class="col-md-10">
                                    <textarea class="wysihtml5 form-control" name="prayer_points" rows="9"></textarea>
                                </div>
                     </div>
                            
                                  
                                 

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Submit</button>
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
                     <div class="">   
                    <div class="adv-table">
                    <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                      <th>M ID</th>
                      <th>Name</th>
                      <th>State</th>
                      <th>Month</th>
                      <th>Send</th>
                      <th>Options</th>
                      
                      
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($report_list))
                                    {

        foreach($report_list as $report){ ?>

        <tr>
         <td><?php echo $missionary_by_id[$report['missionary_id']]['id'];  ?></td>
         <td><?php echo $missionary_by_id[$report['missionary_id']]['name'];  ?></td>
         <td><?php echo $state_by_id[$missionary_by_id[$report['missionary_id']]['state_id']]['name'];  ?></td>
         <td><?php echo date('M',strtotime($report['report_date'])).",".date('Y',strtotime($report['report_date']));  ?></td>
         <td>
           
            <?php 

            if($report['is_send']>0)
            {
                    $msg="Sent";
                    $class="btn btn-success btn-xs";
            }
            else
            {
                $msg="Not Yet send";
                $class="btn btn-danger btn-xs";
            }
       ?>
        <button type="button" class="<?php echo $class; ?>"><?php echo $msg; ?></button>

   </td>
        <td>
                         <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button" aria-expanded="false">Options <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>Admin/generate_fw_report/<?php echo $report['report_id'] ?>">download</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
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
      
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this missionary!")== true)
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
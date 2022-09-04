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
                      echo form_open_multipart(base_url() . 'Admin/send_donar_mail/' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                    ?>
    <div class="form-group">
        <label class="control-label col-md-2">Donars</label>
        <div class="col-md-10">

             <?php            

                   // print_r($missionaries_lists);exit;
                 $option_misssionary[0]="Select the donar";
                            if(!empty($donar_lists))
                            {
                               foreach ($donar_lists as $donar) {

                                  $option_misssionary[$donar['donar_id']]=$donar['name'];
                                 
                               }
                            }
                            
                            
                                 $class_dept=" class='form-control' 
                                 ";

                                echo form_dropdown('donar_id',$option_misssionary,0,$class_dept);
                     ?> 
      
        </div>

        </div>
        <div class="form-group">
                                <label class="control-label col-md-2">Report Month</label>
                                <div class="col-md-4 col-xs-10">
                                    <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
                                        <input type="text" readonly="" value="10/2019" size="16" class="form-control" name="mail_date" required>
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                </div>

             </div>
      </div>

       <div class="form-group">
                        <label class="col-md-2 control-label">Subject</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="subject" required="required">
                        </div>
                    </div>

                     <div class="form-group">
                                <label class="control-label col-md-2">Mail Body</label>
                                <div class="col-md-10">
                                    <textarea class="wysihtml5 form-control" name="report" rows="9" required="required"></textarea>
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
                      <th>Mail Month</th>
                      <th>Name</th>
                      <th>Send Status</th>
                      <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($mail_lists))
                                    {

        foreach($mail_lists as $mail){ ?>

        <tr>
         <td><?php echo date('M',strtotime($mail['mail_date'])).",".date('Y',strtotime($mail['mail_date']));  ?></td>
         <td><?php 

         echo $donar_by_id[$mail['donar_id']]['name'];  ?></td>
     
         
         <td>
           
            <?php 

            $mail_id=$mail['mail_id'];

            if($mail['send_status']>0)
            {
                    $msg="Sent";
                    $class="btn btn-success btn-xs";
            }
            else
            {
                $msg="Draft";
                $class="btn btn-danger btn-xs";
            }
       ?>
        <button type="button" class="<?php echo $class; ?>"><?php echo $msg; ?></button>

   </td>
       <td>
        
        <button data-toggle="button" class="btn btn-warning View active" aria-pressed="true" data-toggle="tooltip" data-placement="top" title="View" onclick="location.href='<?php echo base_url(); ?>Admin/preview_mail/<?php echo $mail_id; ?>';">
          <i class="fa fa-eye"></i>
         </button>

         <button data-toggle="button" class="btn btn-primary View active" aria-pressed="true" data-toggle="tooltip" data-placement="top" title="send" onclick="location.href='<?php echo base_url(); ?>Admin/sendMail/<?php echo $mail_id; ?>';">
          <i class="fa fa-location-arrow"></i>
         </button>
          <button data-toggle="button" class="btn btn-info View active" aria-pressed="true" data-toggle="tooltip" data-placement="top" title="Edit">
          <i class="fa fa-edit (alias)"></i>
         </button>
          <button data-toggle="button" class="btn btn-danger View active" aria-pressed="true" data-toggle="tooltip" data-placement="top" title="trash">
          <i class="fa fa-trash-o"></i>
         </button>

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
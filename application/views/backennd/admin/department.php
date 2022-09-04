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

                      if($department_id=='')
                      echo form_open_multipart(base_url() . 'Admin/departments/create' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      else
                        echo form_open_multipart(base_url() . 'Admin/departments/do_update' ,array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));


                    ?>


                            
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Name</label>
                                        <div class="col-lg-6">
                                           <input type="text" class="form-control" id="name" name="name" placeholder="Computer Science and Engineering" data-error="Fill Name of the Department" required value="<?php  echo $name;?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Short Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="short_name" name="short_name" placeholder="CSE" data-error="Fill Short Name of the Department" required value="<?php echo $short_name; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Establish Year</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="estb_year" name="estb_year" type="text" placeholder="1999" required="required" value="<?php echo $estb_year; ?>" />
                                            <input type="hidden" name="department_id" value="<?php echo $department_id; ?>">
                                        </div>
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
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                                                        <th>Name</th>
                                                        <th>Short Name</th>
                                                        <th>Establish Year</th>
                                                        <th>HOD</th>
                                                        <th>Option</th>
                                                    </tr>
                    </thead>
                    <tbody>
                        <?php
                                                      if(!empty($department_lists))
                                                      {

                                                    foreach($department_lists as $department){ ?>

                                                    <tr>
                                                        <td><?php echo $department['name'];  ?></td>
                                                        <td><?php echo $department['short_name'];  ?></td>
                                                        <td><?php echo $department['estb_year'];  ?></td>
                                                        <td><?php  
                                                                if($department['hod_id']==NULL)
                                                                    echo "Not Assigned";
                                                                else
                                                                    echo "Assigned";
                                                         ?></td>
                                                        <td>
                                                           <a href="<?php echo base_url();?>Admin/departments/edit/<?php echo $department['department_id'];?>"  data-toggle="tooltip" data-original-title="View"><button class="btn btn-icon-anim btn-circle btn-success"><i class="fa fa-pencil"></i></button></a>

                                                            <a class="delete" data-title="Delete Department?" href="<?php echo base_url();?>Admin/departments/delete/<?php echo $department['department_id'];?>"><button class="btn btn-icon-anim btn-circle btn-danger" data-toggle="tooltip" data-original-title="delete"><i class="fa fa-trash-o"></i></button></a>

                                                            <a href="<?php echo base_url();?>Department/index/<?php echo $department['department_id'];?>"  data-toggle="tooltip" data-original-title="department panel"><button class="btn btn-icon-anim btn-circle btn-warning"><i class="fa fa-th-large"></i></button></a>
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


    function delete_department(department_id)
    {
      
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this department!")== true)
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
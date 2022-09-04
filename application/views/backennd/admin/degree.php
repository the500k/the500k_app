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

                      if($degree_id=='')
                      echo form_open_multipart(base_url() . 'Admin/degrees/create' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      else
                        echo form_open_multipart(base_url() . 'Admin/degrees/do_update' ,array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));


                    ?>


                            
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Degree Name</label>
                                        <div class="col-lg-6">
                                           <input type="text" class="form-control" id="name" name="name" placeholder="B.E CSE" data-error="Fill Name of the degree" required value="<?php  echo $name;?>">
                                             <input type="hidden" class="form-control" id="degree_id" name="degree_id" required value="<?php  echo $degree_id;?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Department</label>
                                        <div class="col-lg-6">
                                           
                    <?php               

                            if(!empty($department_lists))
                            {
                               foreach ($department_lists as $department) {

                                  $option_dept[$department['department_id']]=$department['short_name'];
                                 
                               }
                            }
                            
                            
                                 $class_dept="id='department_id' class='form-control'";

                                echo form_dropdown('department_id',$option_dept,$department_id,$class_dept);
                     ?> 


                                        </div>
                                    </div>
                                     
                                    
                                     
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Degree Group</label>
                                        <div class="col-lg-6">
                                           
                    <?php               

                            if(!empty($degree_group_lists))
                            {
                               foreach ($degree_group_lists as $degree_group) {

                                  $option_group[$degree_group['degree_group_id']]=$degree_group['short_name'];
                                 
                               }
                            }
                            
                            
                                 $class_degree_group="id='degree_group_id' class='form-control' col-sm-5'";

                                echo form_dropdown('degree_group_id',$option_group,$degree_group_id,$class_degree_group);
                         ?> 


                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Duration</label>
                                        <div class="col-lg-6">
                                         <?php               

                                $option_duration=array(1=>1,2=>2,3=>3,4=>4,5=>5);
                            
                                 $class_duration="id='degree_group_id' class='form-control' col-sm-5'";

                                echo form_dropdown('duration',$option_duration,$duration,$class_duration);
                         ?> <span>(in Years)</span>
                                        </div>
                                    </div>
                                   
                                     <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Affiliation Code</label>
                                        <div class="col-lg-6">
                                           <input type="text" class="form-control" id="aff_code" name="aff_code" placeholder="22cs22" data-error="Fill Name of the affiliation code" required value="<?php  echo $aff_code;?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Affiliation Year</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="aff_year" name="aff_year" placeholder="2010" data-error="Fill Name of the affiliation year" value="<?php echo $aff_year; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                           <textarea class="form-control" rows="5" name="description"><?php echo $description; ?></textarea>
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
                                                        <th>Degree Group</th>
                                                        <th>Duration</th>
                                                        <th>Aff Code</th>
                                                        <th>Aff Year</th>
                                                        <th>Option</th>
                                                    </tr>
                    </thead>
                    <tbody>
                      <?php
                                                      if(!empty($degree_lists))
                                                      {

                                                    foreach($degree_lists as $degree){ ?>

                                                    <tr>
                                                        <td><?php echo $degree['name'];  ?></td>
                                                        <td>
                                                            <?php 

                                                                $dg=$degree_groups[$degree['degree_group_id']];
                                                                echo $dg['name'];  
                                                            ?>
                                                        
                                                        </td>
                                                        <td><?php echo $degree['duration']; ?>&nbsp; years</td>
                                                        <td><?php echo $degree['aff_code']; ?></td>
                                                        <td><?php echo $degree['aff_year']; ?></td>
                                                        
                                                        <td>



                                                            <a href="<?php echo base_url();?>Admin/degrees/edit/<?php echo $degree['degree_id'];?>"  data-toggle="tooltip" data-original-title="View"><button class="btn btn-icon-anim btn-circle btn-success"><i class="fa fa-pencil"></i></button></a>

                                                            <a class="delete" data-title="Delete degree?" href="<?php echo base_url();?>Admin/degrees/delete/<?php echo $degree['degree_id'];?>"><button class="btn btn-icon-anim btn-circle btn-danger" data-toggle="tooltip" data-original-title="delete"><i class="fa fa-trash-o"></i></button></a>

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


    function delete_degree(degree_id)
    {
      
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this degree!")== true)
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
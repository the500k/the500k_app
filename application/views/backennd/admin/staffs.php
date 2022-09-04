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



              <h3>&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url(); ?>Admin/staffs/add_staff'"> <i class="fa fa-user"></i>&nbsp; New</button>
                    <button type="button" class="btn btn-success purple-bg" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i>&nbsp; Add Bulk</button>

                      
                    
                    
                  
                </h3>
            </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading red-bg">
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
                   <tr class="purple-bg">
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                       
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php 

                      if(!empty($staff_lists))
                      {
                        foreach($staff_lists as $staff)
                        {
                          
                         

                        if($staff['photo']!=null)
                        {
                          $image=$staff['photo'];
                        }
                        else
                        {
                          $image="staff.jpg";
                        }


                   


                    ?>


                      <tr>
                        <td><img src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" width="50px"></td>
                        <td><?php echo $staff['name']; ?></td>
                        
                      

                        <td><?php 

                            $dept=$department[$staff['department_id']];

                        echo  $dept['name'];     ?></td>
                      
                         <td><?php

                          echo $designation[$staff['designation_id']]['name'];     ?></td>
                     
                        <td> <div class="btn-group">
                                    <button type="button" class="btn purple-bg btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!-- teacher EDITING LINK -->
                                        
                                        <li class="bg-yellow">
                                            <a href="<?php echo base_url();?>Admin/staff_profile/<?php echo $staff['staff_id']; ?>" style="color:black;">
                                                <i class="fa fa-edit"></i>
                                                    Profile                                                </a>
                                        </li>
                                         <li class="divider bg-green"></li>
                                         <li class="bg-purple">
                                            <a href="<?php echo base_url();?>Admin/staffs/edit/<?php echo $staff['staff_id']; ?>" style="color:black;">
                                                <i class="fa fa-edit"></i>
                                                    Edit Profile                           </a>
                                        </li>
                                        <li class="divider bg-green"></li>
                                        
                                        <!-- teacher DELETION LINK -->
                                        <li class="bg-red">
                                            <a href="#" onclick="return delete_staff(<?php echo $staff['staff_id']; ?>);" style="color:black;">
                                                <i class="fa fa-trash-o"></i>
                                                    delete                                                  </a>
                                                        </li>
                                                        
                                                         <li class="divider bg-green"></li>
                                                         <li class="bg-blue">
                                            <a href="#" onclick="return relieve_staff(<?php echo $staff['staff_id']; ?>);" style="color:black;">
                                                <i class="fa fa-eraser"></i>
                                                   Relieve                                                  </a>
                                                        </li>
                                    </ul>
                                </div></td>
                      </tr>

        <?php 


                    }

                  }

                  else
                  {
                    echo "No Records found";
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

    <!-- Small modal -->


<div class="modal fade poc" id="myModal2" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">

         <?php echo form_open_multipart('staff/import_staff') ?>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title bl" id="myModalLabel">Client Import</h4>
         </div>
         <div class="modal-body">

<div class="padd">
<h4><b>Support File Formats</b></h4>
<p class=" left"> XSL (or) XLSX</p>
<ul><li>A - Client Name</li>
<li>B - Phone Number</li>
<li>C - E-mail Address</li>
<li>D - Gender</li>
<li>E - Birthday</li></ul>
<h4><b>Upload Your File</b></h4>
<input type="file" name="import_client" required>

</div>

  </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
         </div>
      </div></form>
   </div>

         <script type="text/javascript">


    function delete_staff(staff_id)
    {
      
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this staff!")== true)
       {
         
         var base_url='<?php echo base_url(); ?>';
       
       // window.location.href =base_url+"staff/delete_staff/"+staff_id;
       }
       else
       {
          return false;
       }
    }
    </script>   
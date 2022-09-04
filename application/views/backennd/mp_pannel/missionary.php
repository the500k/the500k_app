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
                     <div class="">   
                    <div class="adv-table">
                    <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                      <th>Missionary ID</th>
                      <th>Submission Date</th>
                      <th>Name</th>
                      <th>State</th>
                      <th>District</th>
                      
                      <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($missionaries_lists))
                                    {

        foreach($missionaries_lists as $missionary){ ?>

        <tr>
         <td><?php echo $missionary['missionary_id']; ?></td>
         <td><?php echo date('d-m-Y',strtotime($missionary['submission_date']));  ?></td>
         <td><?php
         
            if($missionary['fname']!="Not Applicable")
                echo $missionary['fname']."";
            
            if($missionary['middlename']!="Not Applicable")
                echo $missionary['middlename']." ";
            
            if($missionary['surename']!="Not Applicable")
                echo $missionary['surename'];
         ?></td>
         <td><?php echo $state_by_id[$missionary['state_id']]['name'];  ?></td>
         <td><?php echo $district_by_id[$missionary['district_id']]['name'];  ?></td>
        <td>
                         <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button" aria-expanded="false">Options <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>MP_Panel/missionary_profile/<?php echo $missionary['missionary_id']; ?>">Profile</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="<?php echo base_url(); ?>MP_Panel/delete_missionary/<?php echo $missionary['missionary_id']; ?>">Delete</a></li>
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
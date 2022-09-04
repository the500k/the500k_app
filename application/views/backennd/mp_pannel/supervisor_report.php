    <link rel="stylesheet" type="text/css" href="<?php echo  base_url(); ?>/bk_style/plugins/datepicker/jquery.datetimepicker.css"/ >
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
                            <div class="position-center">
                              <?php

                      echo form_open_multipart(base_url() . 'MP_Panel/sreport_submission' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));


                    
                      

                    ?>
                          
                                <div class="form-group">
                                  <label for="name">Supervisor Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="name" id="name" value="<?php echo $supervisor['name'];  ?>" type="text">
                                </div>
                               
                            <br>
                            <h4><strong>Missionary Details</strong></h4>
                            <hr>

                            <?php  
                                  $row_id=0;
                                  foreach ($missionary_details as $mdetails) {
                                    $row_id++;
                       
                                         

                     // print_r($missionary_details);exit;


                            ?>
                            
                            <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Missionary Name<span class="required">*</span></label>
                        <input   style="color: #000000;" class="form-control" name="mname[<?php echo $row_id?>]" id="mname[<?php echo $row_id?>]" value="<?php echo $mdetails['fname']; ?>" type="text">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer<span class="required">*</span></label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v1_cfprayer[<?php echo $row_id?>]" id="v1_cfprayer[<?php echo $row_id?>]" placeholder="10" required="required" type="number">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised<span class="required">*</span></label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v1_baptisms[<?php echo $row_id?>]" id="v1_baptisms[<?php echo $row_id?>]" placeholder="500" required="required" type="number">
                                
                    </div>
                </div>
                                 
                                </div>
                        <?php  }  ?>

                            

                               
                               

                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

 <script>
function get_dst(){

  var state_id = $('#state_id').val();

//alert(state_id);

  if(state_id != '')
  {
  $.ajax({
     type: "POST",
     data:{state_id:state_id},
      url:"http://localhost/the500k/MP_Panel/fetch_district/"+state_id,
    success: function(data){
        //  alert(data);
          $('#district_id').html(data);

      }
    });
}
else
{
  $('#district_id').html('<option value="">Select QB</option>');
}
  
}

</script>
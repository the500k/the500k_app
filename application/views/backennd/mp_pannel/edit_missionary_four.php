    <link rel="stylesheet" type="text/css" href="<?php echo  base_url(); ?>/bk_style/plugins/datepicker/jquery.datetimepicker.css"/ >
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
           
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
                            <div class="position-left">
                              <div class="col-lg-10">
                              <?php

                      echo form_open_multipart(base_url() . 'MP_Panel/update_missionary/four' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                          ?>
                              
                                <div class="form-group">
                                  <label for="name">What is the name of the FW's assigned Supervisor?<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="supervisor_name" id="supervisor_name" placeholder="Jonh Raj" required="required" type="text" value="<?php echo $edit_data["supervisor_name"];?>">
                                </div>

                                <div class="form-group">
                                  <label for="name">What is the Supervisor's ID?<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="supervisor_id" id="supervisor_id" placeholder="TNX1020" required="required" type="text" value="<?php echo $edit_data["supervisor_id"];?>">
                                </div>

                                 <div class="form-group">
                                  <label for="name">Has the Supervisor been inducted as a 500k Supervisor?<span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_supervisor_inducted' class='form-control' style='#000000;' required='required'";

                                 echo form_dropdown('is_supervisor_inducted',$op_yes_no,$edit_data['is_supervisor_inducted'],$class_state);
                                  ?>  
                                </div>
                                <div class="form-group">
                                  <label for="name">Has the Supervisor agreed to supervise this FW? <span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_supervisor_inducted' class='form-control' style='#000000;' required='required'";

                                 echo form_dropdown('is_supervisor_agree',$op_yes_no,$edit_data['is_supervisor_agree'],$class_state);
                                  ?>  
                                </div>
                                <div class="form-group">
                                  <label for="name">How many 500k FW's is the Supervisor supervising already ?<span class="required">(optional)</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="nof_supervisor" id="nof_supervisor" placeholder="10" type="number" value="<?php echo $edit_data["nof_supervisor"];?>">
                                </div>
                                <div class="form-group">
                                  <label for="name">What is the distance in KM from the Supervisor's address to the FW's primary church planting village or location?<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="distance_supervisor_fw" id="distance_supervisor_fw" placeholder="10" required="required" type="number" value="<?php echo $edit_data["distance_supervisor_fw"];?>">
                                </div>
                                <div class="form-group">
                                  <label for="name">Does the FW also belong to any other organisations except for the Ministry Partner?<span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_FW_other_org' class='form-control' style='#000000;' required='required'";

                                 echo form_dropdown('is_FW_other_org',$op_yes_no,$edit_data['is_FW_other_org'],$class_state);
                                  ?>  
                                </div>
                                <div class="form-group">
                                  <label for="name">if the FW will also be paid by other organisations whilst receiving financial support from 500k, how much pay will the FW receive from these other organisations each month? If none, put 0<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="FW_other_payment" id="FW_other_payment" placeholder="10" required="required" type="number" value="<?php echo $edit_data["FW_other_payment"];?>">
                                </div>
                                <input name="missionary_id" id="missionary_id" type="hidden" value="<?php echo $missionary_id; ?>">

                               


                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
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


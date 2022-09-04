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

                      echo form_open_multipart(base_url() . 'MP_Panel/submit_missionary/second' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>
                                <div class="form-group">
                                  <label for="name">What is the name of the primary village or place where the FW intends to minister and plant a church?<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="primary_village" id="primary_village" placeholder="nagamalai" required="required" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="name">What is the PIN (post code) of the primary village or place where FW intends to minister and plant a church<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="pincode" id="pincode" placeholder="625019" required="required" type="number">
                                </div>
                                <div class="form-group">
                                  <label for="name">Is the FW's primary ministry and church planting location a village, town or city?<span class="required">*</span></label>
                                  
                                  <?php     
                            
                                 $class_state="id='mf_type' class='form-control' style='#000000;'";

                                 echo form_dropdown('mf_type',$op_mf_type,1,$class_state);
                     ?>  

                                </div>
                                <div class="form-group">
                                  <label for="name">What is the population of the FW's primary ministry and church planting location (village, town or city)<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="mf_population" id="mf_population" placeholder="2000" required="required" type="number">
                                </div>
                                <div class="form-group">
                                  <label for="name">Is the FW already active in their primary church planting location?<span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_fw_active_in_mf' class='form-control' style='#000000;'";

                                 echo form_dropdown('is_fw_active_in_mf',$op_yes_no,1,$class_state);
                     ?>  
                                </div>
                                <div class="form-group">
                                  <label for="name">When did the FW begin their ministry in this place? Please share the date. If they have not yet started, please write N/A<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="mf_starting_date" id="mf_starting_date" placeholder="19-12-2006" required="required" type="date">
                                </div>
                                <div class="form-group">
                                  <label for="name">If the FW has already begun their ministry, how many people are already attending prayer or worship meetings?<span class="required">*</span></label>
                                  <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="desc_mf" id="desc_mf" placeholder="1000" required="required" type="number">
                                </div>
                                <div class="form-group">
                                  <label for="name">How does the FW currently get his income and pay his bills? Is it from secular work, or from ministry donations, or from family and friends, or from another organisation? Please provide approximate percentages from these different sources<span class="required">*</span></label>
                                  <textarea class="form-control" rows="6" name="desc_fw_income"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="name">If the FW has already begun their ministry, how many baptized church members are there?<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="tbaptized" id="tbaptized" placeholder="10" required="required" type="number">
                                </div>
                                <div class="form-group">
                                  <label for="name">How will 500k's funding/sponsorship help the FW and make him more effective in his church planting work?<span class="required">*</span></label>
                                  <textarea class="form-control" rows="6" name="hw_fund_help_fw"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="name">Which of the below reasons best describes how the financial support will help the FW?<span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_fw_active_in_mf' class='form-control' style='#000000;'";

                                 echo form_dropdown('hw_fund_help_fw_op',$op_hw_fund_help_fw,1,$class_state);
                     ?>  
                                </div>
                                <div class="form-group">
                                  <label for="name">How many Christians were in the primary church planting location before the FW begun their ministry? If the answer is none, please write 0.<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="tchristians" id="tchristians" placeholder="10" required="required" type="number">
                                </div>
                                <div class="form-group">
                                  <label for="name">Does the FW intend to live in the primary village/place where he will minister? <span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_fw_active_in_mf' class='form-control' style='#000000;'";

                                 echo form_dropdown('is_fw_live_in_mf',$op_yes_no,1,$class_state);
                     ?>  
                                </div>
                                <div class="form-group">
                                  <label for="name">Provide the full address of the place where the FW intends to live whilst doing his church planting ministry. <span class="required">*</span></label>
                                  <textarea class="form-control" rows="4" name="fw_address"></textarea>
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


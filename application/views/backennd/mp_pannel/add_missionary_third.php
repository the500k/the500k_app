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

                      echo form_open_multipart(base_url() . 'MP_Panel/submit_missionary/third' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                          ?>
                               <div class="form-group">
                                  <label for="name">Has the FW completed a Bible College or Training Center course? If yes, also complete the next 4 questions<span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_fw_active_in_mf' class='form-control' style='#000000;' required='required'";
                                 
                                

                                 echo form_dropdown('is_fw_trained_in_bc',$op_yes_no,"",$class_state);
                                  ?>  
                                </div>


                                 <div class="form-group">
                                  <label for="name">Name of the Bible College/Training Center attended<span class="required">*</span></label>
                                  <p>If the training centre is not on this list,please choose "other" and please email jeeva@the500k.com to have the training centre added...</p>
                                    <?php     
                            
                                 $class_state="id='is_fw_active_in_mf' class='form-control' style='#000000;' required='required'";
                                 
                                

                                 echo form_dropdown('BC_main',$op_BC_main,"",$class_state);
                                  ?>  
                                </div>


                                <div class="form-group">
                                  <label for="name">Qualification obtained from the Bible College/Training Center. <span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="qualification" id="qualification" placeholder="BA" required="required" type="text">
                                </div>

                                <div class="form-group">
                                  <label for="name">Number of years of training provided at Bible College/ Training Center<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="noyear_training" id="noyear_training" placeholder="3" required="required" type="number">
                                </div>

                                <div class="form-group">
                                  <label for="name">Year of Graduation from Bible College<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="graduation_year" id="graduation_year" placeholder="2003" required="required" type="number">
                                </div>

                                <div class="form-group">
                                  <label for="name">Other training courses completed and year completed</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="other_course_year" id="other_course_year" placeholder="MA in 2003" type="text">
                                </div>

                                <div class="form-group">
                                  <label for="name">Does the FW speak good English? Only select yes if he can read and write AND have a conversation in English<span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_fw_spk_english' class='form-control' style='#000000;' required='required'";

                                 echo form_dropdown('is_fw_spk_english',$op_yes_no,"",$class_state);
                                  ?>  
                                </div>

                                <div class="form-group">
                                  <label for="name">Is the FW affiliated to a denomination or church planting network or are they independent?<span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_affiliated' class='form-control' style='#000000;' required='required'";

                                 echo form_dropdown('is_affiliated',$op_affiliated,"",$class_state);
                                  ?>  
                                </div>

                                <div class="form-group">
                                  <label for="name">What is the name of the Affiliated denomination or church network? <span class="required">*</span></label>
                                  <p>If the denomination or network is not on this list,please choose "NOT Applicable" and email jeeva@the500k.com to have the denomination added....</p>
                        
                                    <?php     
                            
                                 $class_state="id='affiliated_denomination' class='form-control' style='#000000;' required='required'";

                                 echo form_dropdown('affiliated_denomination',$op_DBC,"",$class_state);
                                  ?>
                                </div>

                                <div class="form-group">
                                  <label for="name">Does the FW feel his theology aligns with an existing grouping? E.g., Evangelical, Baptist, Pentecostal, Charismatic, Anglican etc. If none, put "none" or "ecumenical".<span class="required">*</span></label>
                                  <textarea class="form-control" rows="6" name="desc_fw_aligns"></textarea>
                                </div>

                                <div class="form-group">
                                  <label for="name">Does the FW speak good Hindi? Only select yes if he can read and write AND have a conversation in Hindi<span class="required">*</span></label>
                                    <?php     
                            
                                 $class_state="id='is_fw_spk_hindi' class='form-control' style='#000000;' required='required'";

                                 echo form_dropdown('is_fw_spk_hindi',$op_yes_no,"",$class_state);
                                  ?>  
                                </div>

                                <div class="form-group">
                                  <label for="name">What other languages does the FW know?<span class="required">*</span></label>
                                  <p>Please hold control key to select multiple languages</p>
                                    <?php     
                            
                                 $class_state="id='other_spk_language' class='form-control' style='#000000;' required='required' multiple";

                                 echo form_dropdown('other_spk_language[]',$op_language,"",$class_state);
                                  ?>  
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


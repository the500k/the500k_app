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
                            <div class="form">
                             

                              <?php

                      echo form_open_multipart(base_url() . 'MP_Panel/submit_missionary' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>

                    <!------------------------------ extracted form start ------->

                         <h4>Missionary Personal Detail</h4>
                         <hr>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Missionary ID<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="adm_no" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="missionary_code" id="missionary_code" placeholder="APNCKY10" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date of application<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="appdate" name="appdate" required="required" class="form-control col-md-7 col-xs-12 ed" placeholder="19-12-2019">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="adm_no" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="fname" id="fname" placeholder="Jonh" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sure Name<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="adm_no" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="surename" id="surename" placeholder="Singh" required="required" type="text">
                      </div>
                    </div>
                 <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">State <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                       if(!empty($states))
                            {
                               foreach ($states as $state) {

                                  $option_state[$state['state_id']]=$state['name'];
                                 
                               }
                            }
                            
                            
                                 $class_state="id='state_id' class='form-control' style='#000000;'";

            echo form_dropdown('state_id',$option_state,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date joined waiting list <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="waitdate" name="waitdate" required="required" class="form-control col-md-7 col-xs-12" placeholder="19-12-2019">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Month added to budget
 <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="month_abr" name="month_abr" required="required" class="form-control col-md-7 col-xs-12" placeholder="12">
                      </div>
                    </div>
                    <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Fact File Received?</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-primary">
                                <input   style="color: #000000;"  type="radio" name="factfile_received" value="1"> &nbsp; Yes &nbsp;

                              </label>
                              
                            </div>
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Photocopy of theological training recieved?</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-danger" data-toggle-class="btn-danger" data-toggle-passive-class="btn-danger">
                                <input   style="color: #000000;"  type="radio" name="ttraining_received" value="1"> &nbsp; Yes &nbsp;

                              </label>
                              
                            </div>
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">R4R quality acceptable?</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-info" data-toggle-class="btn-info" data-toggle-passive-class="btn-info">
                                <input   style="color: #000000;"  type="radio" name="R4RQAcceptable" value="1"> &nbsp; Yes &nbsp;

                              </label>
                              
                            </div>
                          </div>
                        </div>
                        <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Why the recruiter decided to give this missionary funding?<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="why_funding" class="form-control col-md-7 col-xs-12" name="why_funding"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Main Bible college training<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                       
                            
                            
                                 $class_state="id='BC_main' class='form-control' style='#000000;'";

            echo form_dropdown('BC_main',$op_BC_main,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Years of training at BC 1<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" id="CB1_Y_T" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="CB1_Y_T"  placeholder="1" required="required" type="number">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">BC1 Graduation date<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" id="CB1_GD" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="CB1_GD"  placeholder="1" required="required" type="date">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">2nd Bible college<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                       
                            
                                 $class_state="id='BC2' class='form-control' style='#000000;'";

            echo form_dropdown('BC2',$op_BC_main,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Years of training at BC 2<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" id="CB2_Y_T" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="CB2_Y_T"  placeholder="1" required="required" type="number">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">BC2 Graduation date<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" id="CB2_Y_T" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="CB2_GD"  placeholder="1" required="required" type="date">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denomination of BC
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                         <?php     

                                 $class_state="id='DBC' class='form-control' style='#000000;'";

            echo form_dropdown('DBC',$op_DBC,1,$class_state);
                     ?> 
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Justification for recruitment</label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="Justification" class="form-control col-md-7 col-xs-12" name="Justification"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">organisation or independent<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
      $class_state="id='og_ind' class='form-control' style='#000000;'";

            echo form_dropdown('og_ind',$op_DBC,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Name of organisation or doctrinal grouping <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                      
                            
                                 $class_state="id='name_org' class='form-control' style='#000000;'";

            echo form_dropdown('name_org',$op_DBC,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">which board will they put outside church?<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                                 $class_state="id='board' class='form-control' style='#000000;'";

            echo form_dropdown('board',$op_board,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Number of dependents<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;"  class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="depent" id="depent" placeholder="2" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Family status<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
           $class_state="id='fstatus' class='form-control' style='#000000;'";

            echo form_dropdown('fstatus',$op_fstatus,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <hr>                    
                   <h4>Mission Field Details Before his ministry</h4>
                    <hr>                  
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Field Name <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="field" id="field" placeholder="Madurai" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Is it village, town or city?<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                            
                            
                                 $class_state="id='mf_type' class='form-control' style='#000000;'";

          echo form_dropdown('mf_type',$op_mf_type,1,$class_state);
                     ?>
               </div>
                </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Number of Christians in main village before the his ministry <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="noc_bm" name="noc_bm" required="required" class="form-control col-md-7 col-xs-12 ed">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Total number of people in main village/town/city<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="nop" name="nop" required="required" class="form-control col-md-7 col-xs-12 ed">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Pre-existing or NewStarter missionary?<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                                 $class_state="id='pre_news' class='form-control' style='#000000;'";

          echo form_dropdown('pre_news',$op_pre_news,1,$class_state);
                     ?>
               </div>
                </div>

                 <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">If newstarter, months of prior ministry experience<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="nom_ex" name="nom_ex" required="required" class="form-control col-md-7 col-xs-12 ed">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Is he pioneer or inheriting a church-plant?<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

      $class_state="id='pio_inherits' class='form-control' style='#000000;'";

          echo form_dropdown('pio_inherits',$op_pio_inherits,1,$class_state);
                     ?>
               </div>
                </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Date they began ministry in their current mission field 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="dobmcmf" name="dobmcmf"  class="form-control col-md-7 col-xs-12" placeholder="Madurai">
                      </div>
                    </div>

                    <h4>Mission Field Details by date of application</h4>
                    <hr>                  
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total attendances in all mission fields<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="tattendances" id="tattendances" placeholder="10" required="required" type="number">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Total baptisms in all mission fields by date of application
                        <span class="required">*</span></label>
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="tbaptisms" id="tbaptisms" placeholder="10" required="required" type="number">
                      </div>
                     
                </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Number of Christians in main village before the his ministry <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="number" id="noc_bm" name="noc_bm" required="required" class="form-control col-md-7 col-xs-12 ed">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">When he started internship? 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="dointernship" name="dointernship"  class="form-control col-md-7 col-xs-12" placeholder="Madurai">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Prefund attendance progress/month <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="prefund_attendance" name="prefund_attendance" required="required" class="form-control col-md-7 col-xs-12 ed">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Prefund baptism progress/month
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="prefund_baptism" name="prefund_baptism"  placeholder="100..." class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Where he is living?
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                       $class_state="id='living' class='form-control' style='#000000;'";

          echo form_dropdown('living',$op_living,1,$class_state);
                     ?>
               </div>
                </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Distance from parent's home to base mission field<span class="required">(in km)*</span> 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="distance_base_MF" type="number" name="distance_base_MF" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" placeholder="137">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Number of FULL days doing ministry in their mission field per week <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="no_FWD_PW" type="number" name="no_FWD_PW"  class="form-control col-md-7 col-xs-12" placeholder="7...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Number of days doing secular work per week on average <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="no_SWD_PW" type="number" name="no_SWD_PW"  class="form-control col-md-7 col-xs-12" placeholder="7...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">If receiving support from labour, how much per week on average?<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="support_frm_labour" type="number" name="support_frm_labour"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">If wife/husband is going for work, how much does she 'bring home' on average? <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="support_frm_spouse" type="number" name="support_frm_spouse"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">If wife/husband is going for work, how much does she 'bring home' on average? <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="support_frm_spouse" type="number" name="support_frm_spouse"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">If receiving support from another pastor/church/mission organisation/friends, how much per week on average?<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="support_frm_org" type="number" name="support_frm_org"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">If receiving support from believers, how much per week on average?<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="support_frm_believer" type="number" name="support_frm_believer"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Monthly rent cost<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="monthly_rent_cost" type="number" name="monthly_rent_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Monthly food cost<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="monthly_food_cost" type="number" name="monthly_food_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Monthly utility bills cost (gas, electricity etc.)<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="monthly_bill_cost" type="number" name="monthly_bill_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Monthly school fees cost<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="monthly_schoolfee_cost" type="number" name="monthly_schoolfee_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Monthly travel expenses<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="monthly_travel_cost" type="number" name="monthly_travel_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Monthly commitments to parents & sisters cost<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="monthly_parent_cost" type="number" name="monthly_parent_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Proportion of monthlhy needs currently coming from believers<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="monthly_believers_cost" type="number" name="monthly_believers_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Criteria for receiving Funding
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                      
                            
                            
                                 $class_state="id='cr_rec_fund' class='form-control' style='#000000;'";

          echo form_dropdown('cr_rec_fund',$op_rec_fund,1,$class_state);
                     ?>
               </div>
                </div>
                <div class="item form-group">
                      <label for="password" class="control-label col-md-3">How is missionary currently funding himself?<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea rows="5" cols="67" name="how_funding_himself" class="control-label col-md-3 col-sm-3 col-xs-12"></textarea>
                      </div>
                </div>
                <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Proposed amount of one off installation costs<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="installation_cost" type="number" name="installation_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Explanation for installation cost asked for<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="Expl_installation_cost" type="text" name="Expl_installation_cost"  class="form-control col-md-7 col-xs-12" placeholder="Advance for rent...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Proposed amount of one off installation costs<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="installation_cost" type="number" name="installation_cost"  class="form-control col-md-7 col-xs-12" placeholder="700...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Amount of support asked for by missionary<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="amount_support" type="number" name="amount_support"  class="form-control col-md-7 col-xs-12" placeholder="5000...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">MTC office reccommended amount of support<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="MTC_reccommend_amount_support" type="number" name="MTC_reccommend_amount_support"  class="form-control col-md-7 col-xs-12" placeholder="5000...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">PredICT, SEVABHARATed Influence factor
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                            
                            
                                 $class_state="id='influence_factor' class='form-control' style='#000000;'";

          echo form_dropdown('influence_factor',$op_influence_factor,1,$class_state);
                     ?>
               </div>
                </div>
                <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Explanation for monthly support cost asked for<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="Expl_monthly_support" type="text" name="Expl_monthly_support"  class="form-control col-md-12 col-xs-12" placeholder="For daily need...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Target date for financial independence<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="target_date_FI" type="date" name="target_date_FI"  class="form-control col-md-12 col-xs-12" placeholder="For daily need...">
                      </div>
                    </div>
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">How will our support help improve his ministry?<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="how_our_support_help" class="form-control col-md-7 col-xs-12" name="how_our_support_help"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">VSLA?<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="vsla" type="text" name="vsla"  class="form-control col-md-12 col-xs-12" placeholder="For daily need...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Who sent this factfile to the MTC office?<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="who_sent_FF_MTC" type="text" name="who_sent_FF_MTC"  class="form-control col-md-12 col-xs-12" placeholder="James...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">MTC Office Recruiter name<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="MTC_Recruiter_name" type="text" name="MTC_Recruiter_name"  class="form-control col-md-12 col-xs-12" placeholder="James...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Coordinator
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                            
                                 $class_state="id='coordinator' class='form-control' style='#000000;'";

          echo form_dropdown('coordinator',$op_coordinator,1,$class_state);
                     ?>
               </div>
                </div>
                <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Supervisor
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                                 $class_state="id='supervisor' class='form-control' style='#000000;'";

          echo form_dropdown('supervisor',$op_supervisor,1,$class_state);
                     ?>
               </div>
                </div>
                <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Distance from missionary base to supervisor base<span class="required">(in km)*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="dis_frm_supervisorbase" type="number" name="dis_frm_supervisorbase"  class="form-control col-md-12 col-xs-12" placeholder="10...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Report Collector
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                                 $class_state="id='report_collector' class='form-control' style='#000000;'";

          echo form_dropdown('report_collector',$op_supervisor,1,$class_state);
                     ?>
               </div>
                </div>
                 <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Account Cluster 
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                            
        $class_state="id='account_cluster' class='form-control' style='#000000;'";

          echo form_dropdown('account_cluster',$op_account_cluster,1,$class_state);
                     ?>
               </div>
                </div>
                <div class="item form-group">
                      <label for="password" class="control-label col-md-3">DistrICT, SEVABHARAT, state, PIN code<span class="required">(in km)*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="dis_frm_supervisorbase" type="text" name="dis_frm_supervisorbase"  class="form-control col-md-12 col-xs-12" placeholder="33,rose garden,ptc colony-TN-625531...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">India Cost Type
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                            
                              $class_state="id='cost_type' class='form-control' style='#000000;'";

          echo form_dropdown('cost_type',$op_cost_type,1,$class_state);
                     ?>
               </div>
                </div>
                <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Support country
                        <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                                 $class_state="id='support_country' class='form-control' style='#000000;'";

          echo form_dropdown('support_country',$op_support_country,1,$class_state);
                     ?>
               </div>
                </div>
                <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Supervisor address<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="supervisor_address" type="text" name="supervisor_address"  class="form-control col-md-12 col-xs-12" placeholder="33,rose garden,ptc colony-TN-625531...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Full address<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="full_address" type="text" name="full_address"  class="form-control col-md-12 col-xs-12" placeholder="33,rose garden,ptc colony-TN-625531...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Google Maps KM between supervsior and missioanry (select car)<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="google_distance" type="text" name="google_distance"  class="form-control col-md-12 col-xs-12" placeholder="150...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">English (can read and write?) <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <?php     

                                 $class_state="id='english' class='form-control' style='#000000;'";

          echo form_dropdown('english',$op_lang,1,$class_state);
                     ?>

                      </div>
                    </div>

                     <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Hindi (can read and write?) <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                                 $class_state="id='hindi' class='form-control' style='#000000;'";

          echo form_dropdown('hindi',$op_lang,1,$class_state);
                     ?>

                      </div>
                    </div>
                     <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Other language<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="other_language" type="text" name="other_language"  class="form-control col-md-12 col-xs-12" placeholder="Tamil...">
                      </div>
                    </div>

                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Phone Number<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="phone_num" name="phone_num"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Aadhar Number<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="aadhar_number" name="aadhar_number"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Have you had discussion witih supervisor and have they agreed to take on this missionary?</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-primary">
                                <input   style="color: #000000;"  type="radio" name="factfile_received" value="1"> &nbsp; Yes &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                          <div class="item form-group">
                      <label for="password" class="control-label col-md-3">What was the date of the face-to-face/phone interview?<span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="doftfinterview" type="date" name="doftfinterview"  class="form-control col-md-12 col-xs-12" placeholder="Tamil...">
                      </div>
                    </div>
                      <h4>Approval Details</h4>
                     <hr>
                     <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Recruitment criteria (top)</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-danger" data-toggle-class="btn-danger" data-toggle-passive-class="btn-danger">
                                <input   style="color: #000000;"  type="radio" name="recruitment_creteria" value="1"> &nbsp; Accepted &nbsp;
                                 <input   style="color: #000000;"  type="radio" name="recruitment_creteria" value="2"> &nbsp; Rejected &nbsp;
                                  <input   style="color: #000000;"  type="radio" name="recruitment_creteria" value="3"> &nbsp; Under Consideration &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Pass ministry length</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-success" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                <input   style="color: #000000;"  type="radio" name="pass_ministry_length" value="1"> &nbsp; Accepted &nbsp;
                                 <input   style="color: #000000;"  type="radio" name="pass_ministry_length" value="2"> &nbsp; Rejected &nbsp;
                                  <input   style="color: #000000;"  type="radio" name="pass_ministry_length" value="3"> &nbsp; Under Consideration &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Pass supervisor distance</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-danger" data-toggle-class="btn-danger" data-toggle-passive-class="btn-danger">
                                <input   style="color: #000000;"  type="radio" name="pass_supervisor_distance" value="1"> &nbsp; Accepted &nbsp;
                                 <input   style="color: #000000;"  type="radio" name="pass_supervisor_distance" value="2"> &nbsp; Rejected &nbsp;
                                  <input   style="color: #000000;"  type="radio" name="pass_supervisor_distance" value="3"> &nbsp; Under Consideration &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Pass supervisor number</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-success" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                <input   style="color: #000000;"  type="radio" name="pass_supervisor_number" value="1"> &nbsp; Accepted &nbsp;
                                 <input   style="color: #000000;"  type="radio" name="pass_supervisor_number" value="2"> &nbsp; Rejected &nbsp;
                                  <input   style="color: #000000;"  type="radio" name="pass_supervisor_number" value="3"> &nbsp; Under Consideration &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Factfile</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-danger" data-toggle-class="btn-danger" data-toggle-passive-class="btn-danger">
                                <input   style="color: #000000;"  type="radio" name="factfile_received " value="1"> &nbsp; Accepted &nbsp;
                                 <input   style="color: #000000;"  type="radio" name="factfile_received" value="2"> &nbsp; Rejected &nbsp;
                                  <input   style="color: #000000;"  type="radio" name="factfile_received" value="3"> &nbsp; Under Consideration &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Decelaration</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-success" data-toggle-class="btn-success" data-toggle-passive-class="btn-success">
                                <input   style="color: #000000;"  type="radio" name="decelaration" value="1"> &nbsp; Accepted &nbsp;
                                 <input   style="color: #000000;"  type="radio" name="decelaration" value="2"> &nbsp; Rejected &nbsp;
                                  <input   style="color: #000000;"  type="radio" name="decelaration" value="3"> &nbsp; Under Consideration &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                        <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uk_reviewer">UK reviewer<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="uk_reviewer" name="uk_reviewer"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Did UK reviewer call the FW?</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-danger" data-toggle-class="btn-danger" data-toggle-passive-class="btn-danger">
                                <input   style="color: #000000;"  type="radio" name="UKteam_review_result" value="1"> &nbsp; YES &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                         <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uk_reviewer">Comment on India-UK discussion  result<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="comment_UK_result" name="comment_UK_result"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uk_reviewer">Date of Immanuel interview<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="doImmanuelInterview" name="doImmanuelInterview"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uk_reviewer">Confirmation by the FW on sending reports on regular basis<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="confirmation_report" name="confirmation_report"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Salvation story<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="salvation_story" class="form-control col-md-7 col-xs-12" name="salvation_story"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Score <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                                 $class_state="id='ss_score' class='form-control' style='#000000;'";

            echo form_dropdown('ss_score',$op_score,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">What he studied, it's impact on him<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="his_impact" class="form-control col-md-7 col-xs-12" name="his_impact"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Score <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     

                       
                            
                                 $class_state="id='impact_score' class='form-control' style='#000000;'";

            echo form_dropdown('impact_score',$op_score,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Essential beliefs/doctrines<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="beliefs" class="form-control col-md-7 col-xs-12" name="beliefs"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Score <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
    
                        $class_state="id='beliefs_score' class='form-control' style='#000000;'";

            echo form_dropdown('beliefs_score',$op_score,1,$class_state);
                     ?>           

                      </div>
                    </div>
                      <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">His calling/vision<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="vision" class="form-control col-md-7 col-xs-12" name="vision"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Score <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                             $class_state="id='vision_score' class='form-control' style='#000000;'";

            echo form_dropdown('vision_score',$op_score,1,$class_state);
                     ?>           

                      </div>
                    </div>
                      <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Goals for life and ministry<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="goal" class="form-control col-md-7 col-xs-12" name="goal"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Score <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                            $class_state="id='goal_score' class='form-control' style='#000000;'";

            echo form_dropdown('goal_score',$op_score,1,$class_state);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Resolution of reasons that led to rejection<span class="required">*</span>
                      </label>
                      
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="reasons_reject" name="reasons_reject"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Special review date<span class="required">*</span>
                      </label>
                      
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="spl_review_date" name="spl_review_date"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Special review comment<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea style="color: #000000;" id="spl_review_comment" class="form-control col-md-7 col-xs-12" name="spl_review_comment"  rows="7" cols="67"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">date given funding<span class="required">*</span>
                      </label>
                      
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="funding_date" name="funding_date"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     
                    <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Support Strated</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-danger" data-toggle-class="btn-danger" data-toggle-passive-class="btn-danger">
                                <input   style="color: #000000;"  type="radio" name="support_start" value="1"> &nbsp; YES &nbsp;
                                 <input   style="color: #000000;"  type="radio" name="support_start" value="2"> &nbsp; NO &nbsp;
                                  <input   style="color: #000000;"  type="radio" name="support_start" value="3"> &nbsp; Rejected &nbsp;
                                  <input   style="color: #000000;"  type="radio" name="support_start" value="3"> &nbsp; To be descided &nbsp;

                              </label>
                              
                            </div>
                          </div>

                        </div>
                     



                    <!------------------------------ extracted form end------->

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
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->


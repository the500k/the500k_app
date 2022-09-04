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

                      echo form_open_multipart(base_url() . 'Admin2/submit_budget' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>

                    <!------------------------------ extracted form start ------->

                         <h4>Missionary Partners Detail</h4>
                         <hr>

                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Missionary Partners <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                      // print_r($mps);
                       if(!empty($mps))
                            {
                               foreach ($mps as $mp) {
                               //   print_r($mp);exit;
                                  $option_mp[$mp['mp_id']]=$mp['name'];
                                 
                               }
                            }
                            
                            
                                 $class_mp="id='mp_id' class='form-control' style='#000000;'";

            echo form_dropdown('mp_id',$option_mp,$option_mp[1],$class_mp);
                     ?>           

                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="date" id="appdate" name="appdate" required="required" class="form-control col-md-7 col-xs-12 ed" placeholder="19-12-2019">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Include Supervisor TA<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php     
                      
                        $class_mp="id='include_supervisorTA' class='form-control' style='#000000;'";

                    echo form_dropdown('include_supervisorTA',$op_yes_no,1,$class_mp);
                     ?>           

                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Include Irregular<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php                       
                        $class_mp="id='include_irregular' class='form-control' style='#000000;'";

                    echo form_dropdown('include_irregular',$op_yes_no,1,$class_mp);
                     ?>           

                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Include Other regular<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php                       
                        $class_mp="id='include_other_regular' class='form-control' style='#000000;'";

                    echo form_dropdown('include_other_regular',$op_yes_no,1,$class_mp);
                     ?>           

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


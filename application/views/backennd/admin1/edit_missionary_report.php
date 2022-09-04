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

                      echo form_open_multipart(base_url() . 'Admin2/report_update' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>
                          
                                <div class="form-group">
                                  <label for="name">Reporter Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="name" id="name" placeholder="Jonh" required="required" type="text" value="<?php echo $reporter['name']; ?>">
                                    <input type="hidden" name="report_id" value="<?php echo $edit_data['report_id'];?>">
                                </div>
                                <div class="form-group">
                                  <label for="name">Reporter Email ID<span class="required">(optional)</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="email" id="email" placeholder="Jonh@gmail.com" type="email" value="<?php echo $reporter['email']; ?>">
                                    <input type="hidden" name="mp_id" value="<?php echo $edit_data['mp_id'];  ?>">
                                </div>
                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-6">
                       <label for="name">Year<span class="required">*</span></label>
                        
                                      <?php     
                                    
                                             for ($y=2022;$y>=2016;$y--) {

                                                $option_year[$y]=$y;
                                               
                                             }
                                          
                            
                            
                                   $class_year="id='year' class='form-control' style='#000000;' required='required' ";

                                    echo form_dropdown('year',$option_year,$edit_data['report_year'],$class_year);
                                   ?>
                               
                                
                    </div>
                        <div class="col-sm-6">
                           <label for="name">Period<span class="required">*</span></label>
                               <?php     
                                    
                                             $option_period[1]="R1 - Jan Feb Mar Apr May Jun";
                                                $option_period[2]="R2 - Jul Aug Sep Oct Nov Dec";
                                          
                            
                            
                                   $class_year="id='period' class='form-control' style='#000000;' required='required' ";

                                    echo form_dropdown('period',$option_period,$edit_data['report_period'],$class_year);
                                   ?>

                              
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                <label class="">Missionary ID <span class="required">*</span></label><br>
                                <?php     
                                   

                                     if(!empty($missisonaries))
                                          {
                                             foreach ($missisonaries as $missisonary) {

                                                $option_missionary[$missisonary['missionary_id']]=$missisonary['mrid']." --- ".$missisonary['fname'];
                                               
                                             }
                                          }
                          
                            
                                   $class_missionary="id='e2' style='#000000;width:100%;' 
                                    tabindex='-1' 
                                     required='required' ";

                                    echo form_dropdown('missionary_id',$option_missionary,$edit_data['missionary_id'],$class_missionary);
                                   ?>
                               
                                
                            </div>
                            <br>
                            <h4><strong>Village Details</strong></h4>
                            <hr>

                            
                            <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #1 Name<span class="required">*</span></label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v1_name" id="v1_name" placeholder="Nagamalai..." required="required" type="text" value="<?php echo $village_details[0][1]; ?>">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer<span class="required">*</span></label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v1_cfprayer" id="v1_cfprayer" placeholder="10" required="required" type="number" value="<?php echo $village_details[0][2]; ?>">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised<span class="required">*</span></label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v1_baptisms" id="v1_baptisms" placeholder="500" required="required" type="number" value="<?php echo $village_details[0][3]; ?>">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #2 Name</label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v2_name" id="v2_name" placeholder="Nagamalai..." type="text" value="<?php echo $village_details[1][1]; ?>">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer</label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v2_cfprayer" id="v2_cfprayer" placeholder="10" type="number" value="<?php echo $village_details[1][2]; ?>">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised</label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v2_baptisms" id="v2_baptisms" placeholder="500" type="number" value="<?php echo $village_details[1][3]; ?>">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #3 Name</label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v3_name" id="v3_name" placeholder="Nagamalai..."  type="text" value="<?php echo $village_details[2][1]; ?>">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer</label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v3_cfprayer" id="v3_cfprayer" placeholder="10" type="number" value="<?php echo $village_details[2][2]; ?>">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised</label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v3_baptisms" id="v3_baptisms" placeholder="500"  type="number" value="<?php echo $village_details[2][3]; ?>">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #4 Name</label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v4_name" id="v4_name" placeholder="Nagamalai..." type="text" value="<?php echo $village_details[3][1]; ?>">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer</label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v4_cfprayer" id="v4_cfprayer" placeholder="10" type="number" value="<?php echo $village_details[3][2]; ?>">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised</label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v4_baptisms" id="v4_baptisms" placeholder="500" type="number" value="<?php echo $village_details[3][3]; ?>">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #5 Name</label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v5_name" id="v5_name" placeholder="Nagamalai..." type="text" value="<?php echo $village_details[4][1]; ?>">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer</label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v5_cfprayer" id="v5_cfprayer" placeholder="10" type="number" value="<?php echo $village_details[4][2]; ?>">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised</label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v5_baptisms" id="v5_baptisms" placeholder="500" type="number" value="<?php echo $village_details[4][3]; ?>">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <label for="name"><h4>Main Report / Story</h4>
<p>Please make sure there are no " • " bullet points in this text.</p>
<br></label>
                                    <textarea class="wysihtml5 form-control" rows="12" name="report"><?php echo $edit_data['report']; ?></textarea>
                              </div>
                              <h4>Prayer Requests (if they have them)</h4>
                        <p>You can have any number (up to 5) prayer requests</p>
                        
                        <div class="form-group">
                                  <label for="name">Prayer Request #1</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr1" id="pr1" placeholder="prayer request here..." type="text" value="<?php echo $prayer_points[0]; ?>">
                        </div>
                        <div class="form-group">
                                  <label for="name">Prayer Request #2</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr2" id="pr2" placeholder="prayer request here..." type="text" value="<?php echo $prayer_points[1]; ?>">
                        </div>
                        <div class="form-group">
                                  <label for="name">Prayer Request #3</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr3" id="pr3" placeholder="prayer request here..." type="text" value="<?php echo $prayer_points[2]; ?>">
                        </div>
                        <div class="form-group">
                                  <label for="name">Prayer Request #4</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr4" id="pr4" placeholder="prayer request here..." type="text" value="<?php echo $prayer_points[3]; ?>">
                        </div>
                        <div class="form-group">
                                  <label for="name">Prayer Request #5</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr5" id="pr5" placeholder="prayer request here..." type="text" value="<?php echo $prayer_points[4]; ?>">
                        </div>
                        <?php 
                              if($edit_data['doc_link']!=NULL)
                              {
                        ?>
                        <a href="<?php echo $edit_data['doc_link']; ?>" download="<?php echo substr($edit_data['doc_link'], strpos($edit_data['doc_link'],'_report')+8); ?>"><h4 style="color: #000066">Download <span>&#9755;</span> 
                          <?php echo substr($edit_data['doc_link'], strpos($edit_data['doc_link'],'_report')+8);  ?>
                         
  </h4>
</a>
<?php 
      }

       if($edit_data['photo_link']!=NULL)
                                    {
?>
<center><img src="<?php echo base_url(); ?>/uploads/report_photo/<?php echo $edit_data['photo_link']; ?>" style=" max-width: 100%; and height: auto;"></center>
<?php 
                                  }
                                ?>
                        
                        <h4> Update word Document</h4>
                        <h5>Upload their Report Word Doc here</h5>
                        <p>This is so we can double check info if anything ever goes wrong in the future.</p>
                        <div class="form-group">
                                  
                                    <input   style="color: #000000;" class="form-control" name="reprt_doc" id="reprt_doc" placeholder="Upload file here..." type="file">
                        </div>


                        <h4>Update Photo</h4>
                        <h5>Upload their other Photos here</h5>
                        <p>Please upload more photos of the missionary</p>
                        <p>+ photos of their family</p>
                        <p>+ photos of their congregation if possible.</p>
                        
                        <div class="form-group">
                                  
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="photo" id="photo" placeholder="Upload photo here..." type="file">
                        </div>

                               
                               

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

 
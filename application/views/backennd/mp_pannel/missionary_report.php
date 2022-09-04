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

                      echo form_open_multipart(base_url() . 'MP_Panel/report_submission' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>
                          
                                <div class="form-group">
                                  <label for="name">Reporter Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="name" id="name" placeholder="Jonh" required="required" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="name">Reporter Email ID<span class="required">(optional)</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="email" id="email" placeholder="Jonh@gmail.com" type="email">
                                </div>
                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-6">
                       <label for="name">Year<span class="required">*</span></label>
                        
                                <select name="year" class="form-control">
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option valus="2017">2017</option>
                                </select>
                                
                    </div>
                        <div class="col-sm-6">
                           <label for="name">Period<span class="required">*</span></label>
                        
                                <select name="period" class="form-control">
                                    
                                    <option value="1" selected="selected">R1 - Jan Feb Mar Apr May Jun</option>
                                    <option value="2">R2 - Jul Aug Sep Oct Nov Dec</option>
                                    </select>
                                
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

                                    echo form_dropdown('missionary_id',$option_missionary,1,$class_missionary);
                                   ?>
                               
                                
                            </div>
                            <br>
                            <h4><strong>Village Details</strong></h4>
                            <hr>

                            
                            <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #1 Name<span class="required">*</span></label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v1_name" id="v1_name" placeholder="Nagamalai..." required="required" type="text">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer<span class="required">*</span></label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v1_cfprayer" id="v1_cfprayer" placeholder="10" required="required" type="number">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised<span class="required">*</span></label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v1_baptisms" id="v1_baptisms" placeholder="500" required="required" type="number">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #2 Name</label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v2_name" id="v2_name" placeholder="Nagamalai..." type="text">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer</label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v2_cfprayer" id="v2_cfprayer" placeholder="10" type="number">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised</label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v2_baptisms" id="v2_baptisms" placeholder="500" type="number">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #3 Name</label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v3_name" id="v3_name" placeholder="Nagamalai..."  type="text">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer</label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v3_cfprayer" id="v3_cfprayer" placeholder="10" type="number">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised</label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v3_baptisms" id="v3_baptisms" placeholder="500"  type="number">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #4 Name</label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v4_name" id="v4_name" placeholder="Nagamalai..." type="text">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer</label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v4_cfprayer" id="v4_cfprayer" placeholder="10" type="number">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised</label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v4_baptisms" id="v4_baptisms" placeholder="500" type="number">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <div class="row">
                    <div class="col-sm-4">
                       <label for="name">Village #5 Name</label>
                        <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v5_name" id="v5_name" placeholder="Nagamalai..." type="text">
                                
                    </div>
                    <div class="col-sm-4">
                       <label for="name">Coming for prayer</label>
                        
                                <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v5_cfprayer" id="v5_cfprayer" placeholder="10" type="number">
                                
                    </div>
                        <div class="col-sm-4">
                           <label for="name">Baptised</label>
                        
                               <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="v5_baptisms" id="v5_baptisms" placeholder="500" type="number">
                                
                    </div>
                </div>
                                 
                                </div>

                                <div class="form-group">
                                  <label for="name"><h4>Main Report / Story</h4>
<p>Please make sure there are no " • " bullet points in this text.</p>
<br></label>
                                    <textarea class="wysihtml5 form-control" rows="12" name="report"></textarea>
                              </div>
                              <h4>Prayer Requests (if they have them)</h4>
                        <p>You can have any number (up to 5) prayer requests</p>
                        
                        <div class="form-group">
                                  <label for="name">Prayer Request #1</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr1" id="pr1" placeholder="prayer request here..." type="text">
                        </div>
                        <div class="form-group">
                                  <label for="name">Prayer Request #2</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr2" id="pr2" placeholder="prayer request here..." type="text">
                        </div>
                        <div class="form-group">
                                  <label for="name">Prayer Request #3</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr3" id="pr3" placeholder="prayer request here..." type="text">
                        </div>
                        <div class="form-group">
                                  <label for="name">Prayer Request #4</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr4" id="pr4" placeholder="prayer request here..." type="text">
                        </div>
                        <div class="form-group">
                                  <label for="name">Prayer Request #5</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="pr5" id="pr5" placeholder="prayer request here..." type="text">
                        </div>
                        
                        <h4> Uploads</h4>
                        <h5>Upload their Report Word Doc here</h5>
                        <p>This is so we can double check info if anything ever goes wrong in the future.</p>
                        <div class="form-group">
                                  
                                    <input   style="color: #000000;" class="form-control" name="reprt_doc" id="reprt_doc" placeholder="Upload file here..." type="file">
                        </div>

                        <h4> Uploads</h4>
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
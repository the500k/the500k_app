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
                            <div class="position-center">
                              <?php

                      echo form_open_multipart(base_url() . 'MP_Panel/submit_missionary/first1' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>
                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="missionary_id" id="missionary_id" type="hidden" value="<?php echo $missionary_id; ?>">

                              

                                <div class="form-group">
                                  <label for="name">First Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="fname" id="fname" placeholder="Jonh" required="required" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="name">Middle Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="middlename" id="middlename" placeholder="amal" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="name">Sure Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="surename" id="surename" placeholder="raj" required="required" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="name">Date of Birth<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="dob" id="dob" placeholder="19-12-1985" required="required" type="date">
                                </div>
                                <div class="form-group">
                                        <label>Is the FW married?</label><br>
                                        
                                        <input value=1 name="fstatus" id="fstatus" required="required" type="radio"><label>Married</label>    &nbsp;&nbsp;&nbsp;
                                        <input value=0 name="fstatus" id="fstatus" required="required" type="radio"> <label>Unmarried</label>                      
                                </div>
                                <div class="form-group">
                                  <label for="name">How many children does the FW have? (if none, put 0)<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" name="depent" id="depent" placeholder="1" required="required" type="number">
                                </div>
                                <div class="form-group">
                                  <label for="name">FW main phone number<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="10" name="phone_num" id="phone_num" placeholder="9994985999" required="required" type="number">
                                </div>
                                <div class="form-group">
                                  <label for="name">FW's second phone number (if applicable)<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="10" name="alt_phone_num" id="alt_phone_num" placeholder="9994985999" required="required" type="number">
                                </div>
                                
                                <div class="form-group">
                                        <label>Does the FW have a smart phone that can work WhatsApp?</label><br>
                                        <input value=1 name="fstatus" id="is_whatsapp_available"  type="radio"><label>Yes</label> &nbsp;&nbsp;&nbsp;   
                                        <input value=0 name="fstatus" id="is_whatsapp_available"  type="radio"> <label>No</label>
                                                                 
                                </div>

                                <div class="form-group">
                                  <label for="name">Aadhar Number<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="aadhar_number" id="aadhar_number" placeholder="425698785699" required="required" type="number">
                                </div>
                                <div class="form-group">
                                  <label for="name">State<span class="required">*</span></label>
                                    <?php     

                                     if(!empty($states))
                                          {
                                             foreach ($states as $state) {

                                                $option_state[$state['state_id']]=$state['name'];
                                               
                                             }
                                          }
                            
                            
                                   $class_state="id='state_id' class='form-control' style='#000000;' onchange='get_dst()'";

                                    echo form_dropdown('state_id',$option_state,1,$class_state);
                                   ?>   
                                </div>
                                <div class="form-group">
                                  <label for="name">District<span class="required">*</span></label>
                                    <?php     

                                                $option_dist[0]="select";
                            
                                   $class_dist="id='district_id' class='form-control' style='#000000;'";

                                    echo form_dropdown('district_id',$option_dist,0,$class_dist);
                                   ?>   
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
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

                      echo form_open_multipart(base_url() . 'MP_Panel/update_missionary/first1' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                                      ?>
                    <input name="missionary_id" id="missionary_id" type="hidden" value="<?php echo $edit_data["missionary_id"]; ?>">
                                <div class="form-group">
                                  <label for="name">First Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="fname" id="fname" placeholder="Jonh" required="required" type="text" value="<?php echo $edit_data["fname"];?>">
                                </div>
                               
                                    
                               
                                <div class="form-group">
                                  <label for="name">Sure Name<span class="required">(optional)</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="surename" id="surename" placeholder="raj"  type="text" value="<?php echo $edit_data["surename"];?>">
                                </div>
                                <div class="form-group">
                                  <label for="name">Date of Birth<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="dob" id="dob" placeholder="19-12-1985" required="required" type="date" value="<?php echo $edit_data['dob']; ?>">
                                </div>
                                <?php                           
                                    if($edit_data['fstatus']==1)
                                    {
                                      $chky="checked";
                                      $chkn="";
                                    }
                                    else
                                    {
                                      $chkn="checked";
                                      $chky="";
                                    }
                                ?>
                                <div class="form-group">
                                        <label>Is the FW married?</label><br>
                                        
                                        <input value=1 name="fstatus" id="fstatus" required="required" type="radio" <?php echo $chky;?> ><label>Married</label>    &nbsp;&nbsp;&nbsp;
                                        <input value=0 name="fstatus" id="fstatus" required="required" type="radio"  <?php echo $chkn;?> >  <label>Unmarried</label>                      
                                </div>
                                <div class="form-group">
                                  <label for="name">Spouse Name</label>
                                    <input   style="color: #000000;" class="form-control" name="spouse_name" id="spouse_name" placeholder="Jebby" type="text" value="<?php echo $edit_data['spouse_name'];?>">
                                </div>

                                <div class="form-group">
                                  <label for="name">How many children does the FW have? (if none, put 0)<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" name="depent" id="depent" placeholder="1" required="required" type="number" value="<?php echo $edit_data['depent'];?>">
                                </div>

                                <div class="form-group">
                                  <label for="name">Childern Name</label>
                                    <input   style="color: #000000;" class="form-control" name="children_name" id="children" placeholder="Imman,Imaya"  type="text" value="<?php echo $edit_data['children_name'];?>">
                                </div>
                                
                                <div class="form-group">
                                  <label for="name">FW main phone number<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="10" name="phone_num" id="phone_num" placeholder="9994985999" required="required" type="number" value="<?php echo $edit_data['phone_num'];?>">
                                </div>
                                <div class="form-group">
                                  <label for="name">FW's second phone number (if applicable)</label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="10" name="alt_phone_num" id="alt_phone_num" placeholder="9994985999"  type="number" value="<?php echo $edit_data['alt_phone_num'];?>">
                                </div>
                                <?php                           
                                    if($edit_data['is_whatsapp_available']==1)
                                    {
                                      $chky="checked";
                                      $chkn="";
                                    }
                                    else
                                    {
                                      $chkn="checked";
                                      $chky="";
                                    }
                                ?>
                                
                                <div class="form-group">
                                        <label>Does the FW have a smart phone that can work WhatsApp?</label><br>
                                        <input value=1 name="is_whatsapp_available" id="is_whatsapp_available"  type="radio" <?php echo $chky; ?>><label>Yes</label> &nbsp;&nbsp;&nbsp;   
                                        <input value=0 name="is_whatsapp_available" id="is_whatsapp_available" type="radio" <?php echo $chkn; ?> > <label>No</label>
                                                                 
                                </div>

                                <div class="form-group">
                                  <label for="name">Aadhar Number<span class="required">(optional)</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="aadhar_number" id="aadhar_number" placeholder="425698785699" type="number" value="<?php echo $edit_data['aadhar_number'];?>">
                                </div>
                                <div class="form-group">
                                  <label for="name">State<span class="required">*</span></label>
                                    <?php     
                                    $option_state[""]="";

                                     if(!empty($states))
                                          {
                                             foreach ($states as $state) {

                                                $option_state[$state['state_id']]=$state['name'];
                                               
                                             }
                                          }
                            
                            
                                   $class_state="id='state_id' class='form-control' style='#000000;' onchange='get_dst()' required='required' ";

                                    echo form_dropdown('state_id',$option_state,$edit_data['state_id'],$class_state);
                                   ?>   
                                </div>
                                <div class="form-group">
                                  <label for="name">District<span class="required">*</span></label>
                                    <?php     

                                               
                            
                                   $class_dist="id='district_id' class='form-control' style='#000000;' required='required' ";
                                   $op_dis1[""]="";

                                   if(!empty($districts))
                                          {
                                             foreach ($districts as $district) {

                                                $op_dis1[$district['district_id']]=$district['name'];
                                               
                                             }
                                          }

                                    echo form_dropdown('district_id',$op_dis1,$edit_data['district_id'],$class_dist);
                                   ?>   
                                </div>
                                <div class="form-group">
                                  <label for="name">Upload Photo</label>
                                    <input   style="color: #000000;" class="form-control" name="mp_photo" id="mp_photo" type="file">
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
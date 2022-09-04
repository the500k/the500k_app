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

                      echo form_open_multipart(base_url() . 'MP_Panel/submit_missionary/first' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>
                          
                                <div class="form-group">
                                  <label for="name">Missionary Parter's Staff First Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="mp_staff_name" id="mp_staff_name" placeholder="Jonh" required="required" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="name">Missionary Parter's Staff Sure Name<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="mp_staff_sname" id="mp_staff_sname" placeholder="Jonh" required="required" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="name">Missionary Parter's Staff ID<span class="required">*</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="6" name="mp_staff_id" id="mp_staff_id" placeholder="Jonh" required="required" type="text">
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
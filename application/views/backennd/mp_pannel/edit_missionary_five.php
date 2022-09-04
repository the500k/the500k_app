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

                      echo form_open_multipart(base_url() . 'MP_Panel/update_missionary/five' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                          ?>
                          <p><b>Note - The reference should come from the staff member who has a personal relationship with the FW and knows the FW well and has recommended he apply to 500k. This is the person who is responsible for saying the FW is a good fit for 500k, and who will take responsibility if the FW drops out of the program or is a failure.</b></p>
                              
                                <div class="form-group">
                                  <label for="name">Name of person giving reference and position within organisation</label>
                                  
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="ref_name" id="ref_name" placeholder="Jonh Raj" required="required" type="text" value="<?php echo $edit_data['ref_name']; ?>">
                                </div>

                                <div class="form-group">
                                  <label for="name">Reference Details...:</label> 
                                  <p>Here please write a short answer for the following questions</p>
                                  <ul>
                                      <li>1) your relationship with the FW and the time spent you have spent with him;</li>
                                      <li>2) your opinion on the character of the FW;</li>
                                      <li>3) what is his church planting potential and why you think this;</li>
                                      <li>4) how strong is his theological competency and why;</li>
                                      <li>5) why he is a good fit for the 500k FW sponsorship program.</li>
                                      
                                  </ul>   
                                    <p><b>The reference should be given by a leader within the organisation. Please copy the reference details from email/reference document then paste it here</b></p>
                                    <textarea class="form-control" rows="10" name="desc_reference"><?php echo $edit_data['desc_reference']; ?></textarea>
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


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
                           <p>This should include:</p><p>

1) How the FW came to faith
2) His calling to ministry/church planting work
3) Something about his training and the most significant thing he learned there
4) The needs of the community he is going to reach
5) What is his vision for his community and his ministry. 
6) How will he address the needs of the community </p>
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

                      echo form_open_multipart(base_url() . 'MP_Panel/submit_missionary/six' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                          ?>
                             <div class="form-group">
                                  <label for="name">Please share the FW's testimony below.  </label>
                                    <textarea class="form-control" rows="10" name="FW_testimony"></textarea>
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


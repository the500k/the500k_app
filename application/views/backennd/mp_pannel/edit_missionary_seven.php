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

                      echo form_open_multipart(base_url() . 'MP_Panel/update_missionary/seven' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                          ?>
                            <div class="form-group">
                                  <label for="name">Installation Cost<span class="required">(in rupees)</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="installation_cost" placeholder="3000"  type="number" value="<?php echo $edit_data['installation_cost']; ?>">
                                </div>

                                 <div class="form-group">
                                  <label for="name">Explanation for the Installation   </label>
                                    <textarea class="form-control" rows="10" name="explaination_cost"><?php echo $edit_data['explaination_cost']; ?></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="name">Salary recommandation<span class="required">(in rupees)</span></label>
                                    <input   style="color: #000000;" class="form-control" data-validate-length-range="12" name="salary_recommandation" placeholder="3000"  type="number" value="<?php echo $edit_data['salary_recommandation']; ?>">
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


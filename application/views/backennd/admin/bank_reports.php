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
        <!-- form start-->
         <div class="row">


            <div class="col-md-12">

                <div class="alert alert-block alert-danger fade in" style="<?php echo $disp_err; ?>">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong><?php echo $err_msg; ?></strong> 
                            </div>


                        <section class="panel weather-box">
                            <div class="symbol purple-bg">
                                 <h3 style="color:#000000">IncomeFlux Report</h3>
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value">
                               
                        <?php
                      echo form_open(base_url() . 'Reports/incomeFlux/' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'form-horizontal'));
                    ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Starting Month</label>
                                <div class="col-md-4 col-xs-11">
                                    <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
                                        <input type="text" readonly="" value="10/2019" size="16" class="form-control" name="starting_month" required>
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                         </div>

                                      </div>
                                  </div>

                                  <div class="form-group">
                                <label class="control-label col-md-3">End Month</label>
                                <div class="col-md-4 col-xs-11">
                                    <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
                                        <input type="text" readonly="" value="04/2020" size="16" class="form-control" name="end_month" required>
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                         </div>

                                      </div>
                                  </div>

                                <button type="submit" class="btn btn-primary btn-lg">Generation</button>
                                </form>
                                <br>
                                
                                
                            </div>
                        </section>
                    </div>
                    <div class="col-md-12">
                        <section class="panel weather-box">
                            <div class="symbol red-bg">
                                 <h3 style="color:#000000">Expenditure Report</h3>
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="value">
                               <form class="form-horizontal">

                                 <div class="form-group">
                                <label class="control-label col-md-3">Start Month</label>
                                <div class="col-md-4 col-xs-11">
                                    <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
                                        <input type="text" readonly="" value="02/2012" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                         </div>

                                      </div>
                                  </div>

                                <div class="form-group">
                                <label class="control-label col-md-3">Start Month</label>
                                <div class="col-md-4 col-xs-11">
                                    <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
                                        <input type="text" readonly="" value="02/2012" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                         </div>

                                      </div>
                                  </div>
                                  
                               
                                <button type="button" class="btn btn-primary btn-lg">in progress</button>
                            </form>
                                <br>
                            </div>
                        </section>
                    </div>
            </div>
        <!-- page end-->



        </section>
    </section>
    <!--main content end-->

      
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="the500k">
    <meta name="author" content="the500k">
    <meta name="keywords" content="the500k">

    <!-- Title Page-->
    <title>Missionary Report</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url();?>onepageformasset/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>onepageformasset/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url();?>onepageformasset/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>onepageformasset/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>onepageformasset/css/main.css" rel="stylesheet" media="all">
</head>
<body>
    <div class="page-wrapper bg-blue p-t-75 p-b-75 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
               
                    <h2 class="title">Reporter Deatails</h2>   
                    
                    <?php 
                   $att="novalidate='novalidate' class='validate studentForm'";
               echo form_open_multipart(base_url().'Report/report_submission',$att); ?>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="name">
                        </div>

                        <div class="input-group">
                            <div class="input--style-1">
                            <input  type="email" placeholder="Email ID" name="email">
                        </div>
                        </div>
                <div class="row row-space">
                    <div class="col-2">
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="year">
                                    <option disabled="disabled" selected="selected" value="0">Year</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option valus="2020">2020</option>
                                    <option valus="2021">2021</option>
                                    <option valus="2022">2022</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                    </div>
                        <div class="col-2">
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <option disabled="disabled" selected="selected" value="0">Period</option>
                                    <option value="1">Jan Feb Mar Apr</option>
                                    <option value="2">May Jun Jul Aug</option>
                                    <option value="3">Sep Oct Nov Dec</option>
                                    </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  style="<?php $disp_err; ?>" >
  <h4 style="color: red;"><?php echo $err_msg; ?></h4><br>
</div>
                        <h3>Report Details</h3>
                        <br>
                        <h4>What is the missionaries name?</h4><br>
<p>Please do not include extra tags.<br>
E.g., Write "Philip" 👍  <br>
do not write "KL ACH 160203 Philip" 👎</p>
<br>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="First Name" name="fname" id="fname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" placeholder="Surename" name="surename">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
  <?php               

                            if(!empty($states))
                            {
                               foreach ($states as $state) {

                                  $option_state[$state['state_id']]=$state['name'];
                                 
                               }
                            }
                            
                            
                                 $class_dept="id='state_id'";

                                echo form_dropdown('state_id',$option_state,1,$class_dept);
                     ?> 


                                    
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <h3>ID</h3>
                        <p>
                          You can find a lookup table of IDs Here: BE VERY CAREFUL TO GET THIS CORRECT, the whole report will not attach if it is not correct.
                        </p>
                        <a href="https://docs.google.com/spreadsheets/d/1Ayeb4BZB1PpZkPndF0uwWF9ai59BRvllRWoCUQ8L2L8/edit?usp=sharing" target="_blank">Click here to check the ID</a>
                        <br>
                        <br>
                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Enterh the ID" name="missionary_id">
                        </div>
                        <h3>Village Details</h3>
                        <br><br>
                         <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #1 Name" name="v1_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v1_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v1_baptisms">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #2 Name" name="v2_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v2_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v2_baptisms">
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #3 Name" name="v3_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v3_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v3_baptisms">
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #4 Name" name="v4_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v4_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v4_baptisms">
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #5 Name" name="v5_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v5_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v5_baptisms">
                                    </div>
                                </div>
                            </div>
                 </div>
                 <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #6 Name" name="v6_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v6_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v6_baptisms">
                                    </div>
                                </div>
                            </div>
                 </div>

                 <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #7 Name" name="v7_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v7_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v7_baptisms">
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #8 Name" name="v8_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v8_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v8_baptisms">
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #9 Name" name="v9_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v9_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v9_baptisms">
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="row row-space">
                            <div class="col-1">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Village #10 Name" name="v10_name">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Coming for prayer" name="v10_cfprayer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="number" placeholder="#Baptisms" name="v10_baptisms">
                                    </div>
                                </div>
                            </div>
                </div>
          
                <h3>Main Report / Story</h3>
<p>Please make sure there are no " • " bullet points in this text.</p>
<br>
<br>
                        <div class="input-group">
                            <textarea class="input--style-1" type="text" placeholder="Please enter the missionaries story / reort here.Please use formatting to make it look nice and use good English grammar" name="report" rows="20" cols="68"></textarea>
                        </div>
                        <h3>Prayer Requests (if they have them)</h3>
                        <p>You can have any number (up to 8) prayer requests</p><br>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #1 e.g., Please pray for my daughter,Laima,who is very sick." name="pr1">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #2" name="pr2">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #3" name="pr3">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #4" name="pr4">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #5" name="pr5">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #6" name="pr6">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #7" name="pr7">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #8" name="pr8">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #9" name="pr9">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prayer Request #10" name="pr10">
                        </div>
                        <!--
                        <h2> Uploads</h2><br>
                        <h3>Upload their Report Word Doc here</h3><br>
                        <p>This is so we can double check info if anything ever goes wrong in the future.</p><br>



                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="Report.doc" name="reprt_doc">
                        </div>

                    -->

                        <h3>Upload their other Photos here</h3><br>
                        <p>Please upload more photos of the missionary</p><br>
                        <p>+ photos of their family</p>
                        <p>+ photos of their congregation if possible.</p>
                        <p>Note: to upload multiple photos, select multiple photos holding the SHIFT key. If you click the file name after doing an upload, you can redo the selection.</p>

                        <br>

                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="photo.jpg" name="photo">
                        </div>

                        <h4>Please enter more missionary details</h4>
                        <p>Please ignore if you enter already</p>
                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="DOB:28/12/88" name="mission_dob">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Spouse Name" name="missionary_spouse_name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="upload missionary photo" name="misssionary_photo">
                        </div>
                        
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url();?>onepageformasset/vendor/jquery/jquery.min.js"></script>

    <!-- Vendor JS-->
    <script src="<?php echo base_url();?>onepageformasset/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url();?>onepageformasset/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url();?>onepageformasset/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url();?>onepageformasset/js/global.js"></script>
    <script src="<?php echo  base_url(); ?>onepageformasset/js/jquery.validate.js" type="text/javascript"></script>

 <style>
    
   
    .studentForm label.error {
        margin-left: 10px;
        width: auto;
        display: inline;
    }
    
    </style>
    <style>
    form.cmxform label.error, label.error {
        /* remove the next line when you have trouble in IE6 with labels in list */
        color: red;
        font-style: italic
    }
    div.error { display: none; }
    
    input.checkbox { border: none }
    input:focus { border: 1px dotted black; }
    input.error { border: 1px dotted red; }
    form.cmxform .gray * { color: gray; }
    </style>
<script>
  

  $().ready(function() {
    
    

    // validate signup form on keyup and submit
    $(".studentForm").validate({
      rules: {

        name: "required",
        v1_name:"required",
        v1_cfprayer:{
      required: true,
      number: true
    },
      
        fname:"required",
        missionary_id:"required",
        pr1:"required",
        pr2:"required",
        pr3:"required",
        
             
      },
      messages: {
          name: "Please enter name",
          v1_name: "Please Village name",
          v1_cfprayer:{
      required: "Please enter no of baptisms",
      number: "Please enter no of baptisms"
    },
         
          fname: "Please enter Missionary's First Name",
          missionary_id: "Please enter Missionary ID",
          pr1: "Please enter prayer point 1",
          pr2: "Please enter prayer point 2",
          pr3: "Please enter prayer point 3",
          
         
      }
    });

    
    //code to hide topic selection, disable for demo
    
    // show when newsletter is checked
    
  });
  </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

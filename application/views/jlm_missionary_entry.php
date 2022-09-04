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
    <title>Missionary Entry</title>

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
               
                    <h2 class="title">Missionary Deatails</h2>   
                    
                    <?php 
                   $att="novalidate='novalidate' class='validate studentForm'";
               echo form_open_multipart(base_url().'Report/retire_report_submission',$att); ?>
                       
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
                       
                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Enterh the ID" name="missionary_id">
                        </div>

                        <h5>Date application made (i.e., date factfile written) </h5><br>
                        <p><b>Please Use correct date format like...04-05-2020</b></p><br>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="19-12-2019" name="appdate">
                        </div>
                        <h5>Date joined waiting list (date added to R4R) </h5><br>
                        <p><b>Please Use correct date format like...04-05-2020</b></p><br>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="19-12-2019" name="waitdate">
                        </div>
                        <h5>Month added to budget</h5><br>
                        <p><b>Please Use number like...5-May,10-oct</b></p><br>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="12" name="m_budget">
                        </div>

                        <h5>Fact File Received?</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="factfile_received">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div> 
                        <h5>Photocopy of theological training recieved</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="ttraining_received">           
            <option value="Yes">Yes</option>
            <option value="No">No</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <h5>R4R quality acceptable</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="R4RQAcceptable">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div> 
                        <h5>Why the recruiter decided to give this missionary funding?</h5><br>
                         <div class="input-group">
                            <textarea class="input--style-1" type="text" placeholder="He becomes financially independent, and continues serving..." name="comment" rows="7" cols="67"></textarea>
                        </div>
                        <h5>Why the recruiter decided to give this missionary funding?</h5><br>

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
                        <h5>Date of birth</h5><br>
                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="19-12-2019" name="waitdate">
                        </div>  
                        <h5>Why the recruiter decided to give this missionary funding?</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="winning_status">
            <option value="Winner">Winner</option>
            <option value="Runner">Runner</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div> 
                        <h5>Reason for retirement</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="reason_for_retirement">
            <option value="Not sending report">Not sending report</option>
            <option value="Financially independent">Financially independent</option>
            <option value="Transferred to new mission field">Transferred to new mission field</option>
            <option value="Went for Bible Training">Went for Bible Training</option>
            <option value="Concerns over personal/spiritual conduct of missionary">Concerns over personal/spiritual conduct of missionary</option>
            <option value="DNA group learning - no reason gave">DNA group learning - no reason gave</option>
            <option value="Not allowing supervisor visits/supervisor system">Not allowing supervisor visits/supervisor system</option>
            <option value="Floater - Double Check ID">Floater - Double Check ID</option>
            <option value="He died">He died</option>
            <option value="Duplicate (error) entry">Duplicate (error) entry</option>
            <option value="Freeloader - not actually doing ministry">Freeloader - not actually doing ministry</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <h5>What is FW doing now?</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="now_fw_doing">
            <option value="Still ministering in same mission field">Still ministering in same mission field</option>
            <option value="Backslidden (given up on his Christian faith)">Backslidden (given up on his Christian faith)</option>
            <option value="Gone for secular work">Gone for secular work</option>
            <option value="Other ">Other </option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <h5>How FW now supporting himself?</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="now_fw_supporting">
            <option value="Part-time secular work">Part-time secular work</option>
            <option value="Support from another organisation/friends/family">Support from another organisation/friends/family</option>
            <option value="Supported by his chuch plant">Supported by his chuch plant</option>
            <option value="N/A (no longer in ministry)">N/A (no longer in ministry)</option>
            <option value="Other">Other </option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>
                         <h5>Why not submitting reports?</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                               <select name="reason_not_submitting_report">
            <option value="Reporting process not properly explained when he joined">Reporting process not properly explained when he joined</option>
            <option value="Theologically he does not believe should send report
Financial support too small">Theologically he does not believe should send report
Financial support too small</option>
            <option value="He is a freeloader">He is a "freeloader"</option>
            <option value="Other">Other</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>
                         <h5>What's happened to his mission fields now?</h5><br>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="mission_field_status">
                                    <option>Another pastor has come to take over the church/believers</option>
            <option value="The believers/church are leading themselves">The believers/church are leading themselves</option>
            <option value="The mission work has stopped/collapsed">The mission work has stopped/collapsed</option>
            <option value="The pastor is still in the mission field continuing his work">The pastor is still in the mission field continuing his work</option>
            <option value="No progress has been made because the FW was not successful/was the wrong candidate">No progress has been made because the FW was not successful/was the wrong candidate </option>
            <option value="No progress was made because the FW was a freeloader/fraudster">No progress was made because the FW was a freeloader/fraudster</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <h5>Comment</h5><br>
                        <div class="input-group">
                            <textarea class="input--style-1" type="text" placeholder="He becomes financially independent, and continues serving..." name="comment" rows="7" cols="67"></textarea>
                        </div>
                        <h5>Detailed commentory</h5><br>
                        <div class="input-group">
                            <textarea class="input--style-1" type="text" placeholder="He becomes financially independent, and continues serving..." name="detailed_commentory" rows="7" cols="67"></textarea>
                        </div>

                        <h5>MS Score</h5>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="ms_score">           
            <option value="1">Strong failure</option>
            <option value="2">Partial failure</option>
            <option value="3">Neutral</option>
            <option value="4">Partial success</option>
            <option valus="5">Strong success</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <h5>Reason for MS Score</h5>
                        <div class="input-group">
                            <textarea class="input--style-1" type="text" placeholder="He becomes financially independent, and continues serving..." name="reason_msscore" rows="7" cols="67"></textarea>
                        </div>
                        <h5>CP Score</h5>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="cp_score">           
            <option value="1"> Church never gets established/takes root</option>
            <option value="2">Church collapses after support</option>
            <option value="3">The church stops, but all the believers join another church</option>
            <option value="4">Church is planted which continues to survive, but it is not thriving, or is financially dependent</option>
            <option valus="5">Church is planted which continues to survive and thrive after 500k support is stopped</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <h5>Reason for CP Score</h5>
                        <div class="input-group">
                            <textarea class="input--style-1" type="text" placeholder="He becomes financially independent, and continues serving..." name="reason_cpscore" rows="7" cols="67"></textarea>
                        </div>
                        <h5>RU Score</h5>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="ru_score">           
            <option value=1>The gospel is never preached</option>
            <option value=2>Gospel is preached but no-one comes to faith</option>
            <option value=3>People have come to faith, but trials and tribulations have come most have fallen away</option>
            <option value=4>Many have come to faith</option>
            <option value=5>Mature disciples have been produced</option>
                                </select>
                               <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <h5>Reason for RU Score</h5>
                        <div class="input-group">
                            <textarea class="input--style-1" type="text" placeholder="He becomes financially independent, and continues serving..." name="reason_ruscore" rows="7" cols="67"></textarea>
                        </div>

                        
                <h3>Main Report / Story</h3>
<br>
<br>
                        <div class="input-group">
                            <textarea class="input--style-1" type="text" placeholder="Please enter the missionaries story / reort here.Please use formatting to make it look nice and use good English grammar" name="report" rows="20" cols="68"></textarea>
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

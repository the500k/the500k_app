<div class="search-area">
    <div class="container">
        <div class="row fitscreen flex flex-middle relative">
            <form action="#" class="search-form">
                <input id="focus" placeholder="Search your query and press “Enter”" type="text">
            </form>
        </div>
    </div>
</div><main>
<!-- Static Banner Area Start -->
<section id="slider">
    <div class="static-banner relative">
        <div class="overlay blue-overlay-5"></div>
        <div class="page-head">
            
            <ul class="page-title-btn">
                <li><a href="http://www.codepixar.com/educare/php/01-home-university.php" target="_blank">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                <li><a href="#" class="active">Teacher Details</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- Static Banner Area End -->
<!-- Web Design Course Area Start -->
<section class="section-full teacher-details">
    <div class="container">
        <div class="row">
            <div class="web-course">
                <div class="col-md-8 col-xs-12">
                    <div class="left-web-course">
                        <div class="teacher-top flex">
                            <div class="teacher-img">
                                <img src="<?php echo  base_url(); ?>uploads/teacher_image/<?php echo $teacher['teacher_id'] ?>.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="teacher-top-content">
                                <h2><?php echo $teacher['name']; ?></h2>
                                 <a href="#" class="btn">Tutor,  Faculty of <?php 
                                  $query = $this->db->get_where('subject', array('subject_id' => $teacher['subject_id']));
        $subject=$query->row_array();

                echo $subject['name']; ?>                               </a>
                                
                            </div>
                        </div>
                        <div class="tab-menu mt-20">
                            <ul id="tabs-swipe-demo" class="tabs course-tab">
                                <li class="tab"><a href="#about">About Me</a></li>
                                <li class="tab"><a href="#course">My Courses</a></li>
                                <li class="tab"><a class="active" href="#reviews">My Reviews</a></li>
                                 <li class="tab"><a class="active" href="#get_details">Get Teacher Details</a></li>
                            </ul>
                        </div>
                        <div id="about" class="about mt-30">
                            <div class="row">
                                <div class="col-sm-10">
<?php echo $teacher['description']; ?>
                                </div>
                               
                            </div>
                           
                        </div>
                        <div id="course" class="course mt-30 course-outline text-center">

                            <?php 

                                foreach ($mapping_details as $mapping_detail) {
                                    
                                    //print_r($mapping_detail);
                               ?>

                            <ul class="flex space-between no-flex-xs">
                                <li><img src="<?php echo  base_url(); ?>uploads/course_image/<?php echo $mapping_detail['course_id']; ?>.jpg" width="145px" height="80px"></li>
                                <li class="head"><?php echo $mapping_detail['name']; ?></li>
                                <li class="dollar">Rs.<?php echo $mapping_detail['fees']; ?>/Hr</li>
                                <li><a href="<?php echo base_url(); ?>home/coursedetails/<?php echo $mapping_detail['course_id']; ?>" target="_blank">View Course Details</a></li>
                            </ul>
<?php 
 }


                        

?>


                            
                        </div>
                        <div id="reviews" class="reviews mt-30">
                            <div class="teacher-rating-top flex no-flex-xs">
                                <div class="rating flex no-flex-xs">
                                    <div class="rating-box">
                                        <ul>
                                            <li>Average</li>
                                            <li class="av-rating">4.9</li>
                                            <li>(2 Ratings)</li>
                                        </ul>
                                    </div>
                                    <div class="rating-body">
                                        <h4>Provide Your Rating</h4>
                                        <ul>
                                            <li>Quality <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </span>  Outstanding</li>
                                        </ul>
                                        <ul>
                                            <li>Quality <span class="normal"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </span>  Outstanding</li>
                                        </ul>
                                        
                                    </div>
                                </div>

                            </div>
                           
                        </div>

                        <div id="get_details" class="reviews mt-30">
                           
                                
                                    
                                    <div class="leave-comment send-msg">
                       
                        <form action="#">
                            <p><input placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" type="text"></p>
                            
                            <p><input placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="email"></p>
                            
                            <p><textarea placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"></textarea></p>
                            <p><button class="btn submit-btn">Get Tutor's Details</button></p>
                        </form>
                    </div>


                              

                          
                           
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="right-web-course">
                        <div class="single-info flex space-between">
                             <div class="single-stat">
                             </div>
                            <div class="single-stat">
                                <h3><?php echo count($mapping_details); ?></h3>
                                <p>Running Course</p>
                            </div>
                           
                            <div class="single-stat">
                                <h3>4.9</h3>
                                <p>Average Rating</p>
                            </div>
                        </div>
                        <div class="single-info flex space-between">
                            <h4><span class="et-line icon-envelope"></span>Email</h4>
                            <h4>
                                    <?php $email=$teacher['email'];echo preg_replace("/(^.|.$)(*SKIP)(*F)|(.)/","*",$email);?>
                            </h4>
                        </div>
                        <div class="single-info flex space-between">
                            <h4><span class="et-line icon-megaphone"></span>Phone</h4>
                            <h4>+91 <?php $phone=$teacher['phone'];echo preg_replace("/(^.|.$)(*SKIP)(*F)|(.)/","*",$phone);?></h4>
                        </div>
                        <div class="single-info flex space-between">
                            <h4><span class="et-line  icon-puzzle"></span>Coahing Type</h4>
                            <h4> <?php

                                 $option_course_type=array(1 =>'Tuition centre' ,
                                       2 =>'Home Tuition' ,
                                       3 =>'Home Tuition & Tuition centre');    


            echo $option_course_type[$teacher['coaching_type']];  ?></h4>
                        </div>
                        <div class="single-info flex space-between">
                            <h4><span class="et-line   icon-hourglass"></span>Schedules</h4>
                            <h4 style="color:#f85b31">|
                            <?php
                                 $schedules=explode(",",$teacher['schedules']);

                                // print_r($schedules);

                                $schedule_option[1]="6pm to 8pm";
                                    $schedule_option[2]="7pm to 9pm";
                                    $schedule_option[3]="5pm to 7pm";
                                    $schedule_option[4]="4pm to 6pm";
                                     $schedule_option[5]="5:30pm to 7:30pm";
                                     $schedule_option[6]="6:30pm to 8:30pm"; 

                                      foreach ($schedules as $key) {
                                       
                                        ?>

                                       
                       
                                            

<?php

                                       echo $schedule_option[$key]." | ";
                                    
?>



                             
<?php

}
                             ?> 

                            </h4>
                        </div>
                        <div class="single-info flex space-between">
                            <h4><span class="et-line icon-map-pin"></span>Location</h4>
                            <h4><?php echo $teacher['location']; ?></h4>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / #Web Design Course End -->
</main>

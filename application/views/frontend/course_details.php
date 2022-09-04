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
            <h2 class="page-title"><?php echo $course['name']; ?></h2>
            <ul class="page-title-btn">
                <li><a href="http://www.codepixar.com/educare/php/01-home-university.php" target="_blank">Home <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                <li><a href="10-course-grid-01.html" target="_blank">Course <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                <li><a href="#" class="active">Course Details</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- Static Banner Area End -->
<!-- Web Design Course Area Start -->
<section class="section-full">
    <div class="container">
        <div class="row">
            <div class="web-course">
                <div class="col-md-8 col-xs-12">
                    <div class="left-web-course">
                        <img src="<?php echo  base_url(); ?>uploads/course_image/<?php echo $course['course_id']; ?>.jpg" alt="" width="360px" height="250px" class="<?php echo  base_url(); ?>frontend/img-responsive">
                        <div class="tab-menu mt-20">
                            <ul id="tabs-swipe-demo" class="tabs course-tab">
                                <li class="tab"><a href="#objectives">Objectives</a></li>
                                <li class="tab"><a class="active" href="#comments">Comments</a></li>
                            </ul>
                        </div>
                        <div id="objectives" class="objectives mt-30">
                            <p><?php 

                            echo $course['description'];

                            ?></p>
                            </div>
                       
                      
                        <div id="comments" class="comments mt-30">
                            <div class="total-comment">
                                <div class="single-comment">
                                    <div class="comment-head">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Dorethy Kallyas</h4>
                                                <p>12th Feb, 2017 at 05:56 pm</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="comment-body">
                                        <p class="mt-15">Sample Feedback</p>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="leave-comment">
                                <h4>Leave a Commnt</h4>
                                <form action="#">
                                    <div class="col-sm-7 pn1">
                                        <p><input placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" type="text"></p>
                                        <p><textarea placeholder="Comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comment'"></textarea></p>
                                    </div>
                                    <div class="col-sm-5 pn2">
                                        <p><input placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="email"></p>
                                        <p><input placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" type="text"></p>
                                        <p><button class="btn submit-btn">Submit Comment</button></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="right-web-course">
                        <div class="single-info flex space-between">
                            <h4><span class="et-line icon-profile-male"></span>Available Trainers</h4>

                            <?php 


                                    $teacher_details=explode(",",$mapping['teacher_ids']);

                                    foreach ($teacher_details as $rst) {
                               //       echo $rst;

                                           $query=$this->db->get_where('teacher', array('teacher_id' => $rst));
                                          $res=$query->row_array();
                                         // print_r($res);
                                          ?>
<h4><a href="#"><?php echo $res['name'];  ?></a>&nbsp; |</h4>

                                          <?php 


                                          // $res['name'];
                                                      }
                                   // print_r($teacher_details);






                             ?>

                            
                        </div>
                        <div class="single-info flex space-between">
                            <h4><span class="et-line icon-pricetags"></span>Course Fee</h4>
                            <h4>Rs.<?php echo $course['fees']; ?>/Hr</h4>
                        </div>
                      
                        <div class="single-info flex space-between">
                            <h4><span class="et-line  icon-alarmclock"></span>Schedule</h4>

                             </div>
                               <div class="single-info flex space-between" style="color:#f85b31 ">
                           <b>|
                                <?php
                                 $schedules=explode(",",$course['schedules']);

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
                         </b>
</div>


                      

                            
                        
                        
                        <div class="single-info flex space-between">
                            <h4><span class="et-line icon-flag"></span>Coaching Type</h4>
                            <h4>
                                <?php

                                 $option_course_type=array(1 =>'Tuition centre' ,
                                       2 =>'Home Tuition' ,
                                       3 =>'Home Tuition & Tuition centre');    


            echo $option_course_type[$course['coaching_type']];  ?>

                        </h4>
                        </div>
                        
                        <div class="single-info click-review flex space-between">
                            <h4><span class="et-line icon-ribbon"></span>Reviews</h4>
                            <h4 class="review-star">
                            <span><i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i></span>
                           
                            </h4>
                        </div>
                       
                        <div class="text-center"><button class="btn enroll">Enroll the Course</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / #Web Design Course End -->
<!-- Col To Action Start -->
<section class="cta-1 cta2 cta3">
    <div class="cta-bg2 relative"  data-velocity=".2">
        <div class="overlay cta-overlay-bg-blue"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="cta-content">
                        <h2>Thousands of students are graduated. Why not you?</h2>
                        <form action="#" class="cta-register">
                            <div class="row">
                                <h3 class="text-center mb-40 primary-color fz-24">Register Now</h3>
                                <div class="col-sm-offset-1 col-sm-5 col-xs-12">
                                    <p><input type="text"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" placeholder="Enter your Full Name"></p>
                                    <p><input type="email"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" placeholder="Enter your Full Name"></p>
                                </div>
                                <div class="col-sm-5 col-xs-12">
                                    <p><input type="text"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone Number'" placeholder="Enter your Full Name"></p>
                                    <div class="select-ct">
                                        <select>
                                            <option value="1">Choose course</option>
                                            <option value="2">Saab</option>
                                            <option value="3">Opel</option>
                                            <option value="4">Audi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="text-center"><button class="submit-btn">Submit</button></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Col To Action End -->
<!-- Popular Course Area Start -->
<section class="section-full">
    <div class="container">
        <div class="popular-course">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <div class="section-head text-center pb-100">
                        <h2 class="first-title">Popular Course</h2>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="popular-course-body">


                <?php foreach ($courses as $course) {

                    ///echo $course['course_id'];


                    ?>

                     <div class="col-sm-4">
                    <div class="single-popular">
                        <img src="<?php echo  base_url(); ?>uploads/course_image/<?php echo $course['course_id']?>.jpg" class="<?php echo  base_url(); ?>frontend/img-responsive" alt="" width="360px" height="280px">
                        <div class="popular-course-content p-40">
                            <h3 class=""><a href="<?php echo base_url(); ?>Home/coursedetails/<?php echo $course['course_id']; ?>" target="_blank"><?php echo $course['name']; ?></a></h3>
                            <p class="reviews pt-20">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                              
                            </p>
                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporincididunt ut labore et dolore aliqua. </p> -->
                            <ul>
                                
                                 <li><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Rs.<?php echo $course['fees']; ?>/Hr </li>
                                <li><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Subject :<?php 

                                $query = $this->db->get_where('subject', array('subject_id' => $course['subject_id']));
        $subject=$query->row_array();

                echo $subject['name'];

                               //int_r($subject);

                                  ?> </li>
                                <li><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Coaching Type :<?php 

                                $coaching_type=array(1=>'Home Tuition',
                                                     2=>'Tuition Centre',
                                                     3=>'Home Tuition & Tuition Centre');

                                echo $coaching_type[$course['coaching_type']];  ?></li>
                                <li><span class="glyphicon glyphicon-play" aria-hidden="true"></span>



                                Schedule : 
                                <?php 

                                     $schedule_option[1]="6pm to 8pm";
                                    $schedule_option[2]="7pm to 9pm";
                                    $schedule_option[3]="5pm to 7pm";
                                    $schedule_option[4]="4pm to 6pm";
                                     $schedule_option[5]="5:30pm to 7:30pm";
                                     $schedule_option[6]="6:30pm to 8:30pm";

                                     $schedules=explode(",",$course['schedules']);
                                      foreach ($schedules as $key) 
                                     {
                                        if($key<3)
                                        {
                                        echo $schedule_option[$key].",";
                                    }
                                    else
                                    {
                                        echo $schedule_option[$key];
                                    }
                                 }


                                 ?>

                            </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>




                    <?php                


                } 



                ?>




               
              
            </div>
        </div>
    </div>
</section>
<!-- / #Popular Course End -->
</main>


<div class="search-area">
    <div class="container">
        <div class="row fitscreen flex flex-middle relative">
            <form action="#" class="search-form">
                <input id="focus" placeholder="Search your query and press “Enter”" type="text">
            </form>
        </div>
    </div>
</div><main>
<section id="slider" class="slider-section">
    <div class="slider1 deafult-slider slider3">
        <div class="item fullscreen flex flex-middle" style="background-image: url(<?php echo  base_url(); ?>frontend/img/slider/18.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 col-xs-12">
                        <div class="slide-content text-center">
                            <h1 class="light h1">Learn with us <br> anytime from anywhere</h1>
                            
                            <a href="10-course-grid-01.html" target="_blank" class="btn mt-10 mr-10">Start Now</a>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay-slider"></div>
        </div>
        <div class="item fullscreen flex flex-middle" style="background-image: url(<?php echo  base_url(); ?>frontend/img/slider/9.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 col-xs-12">
                       
                    </div>
                </div>
            </div>
            <div class="overlay-slider"></div>
        </div>
    </div>
</section>

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
<!-- Chairman Msg Start -->
<section id="chair-msg" class="relative chair-msg">
    <div class="chairman-bg">
        <div class="overlay test-overlay-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="chairman-text">
                        <h2 class="mb-25">Words from Chancellor</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adip pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore  magna aliqua. Ut enim ad minim veniam, quis nostrud exercitationullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute iru lor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <img src="<?php echo  base_url(); ?>frontend/img/chairman/signature.png" alt="" class="sign img-responsive">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Chairman Msg End -->

<!-- Notice Board End -->
<!-- Cta Start -->
<section class="cta-1 cta2">
    <div class="cta-bg2 relative"  data-velocity=".2">
        <div class="overlay cta-overlay-bg-blue"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="cta-content">
                        <h2>Thousands of students are benefited. Why not you?</h2>
                        <a href="12-course-list-01.html" target="_blank" class="btn">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cta End -->
<!-- Testimonial Area Start -->
<section class="testimonial-1">
    <div class="container">
        <div class="row no-margin">
            <div class="col-sm-offset-1 col-sm-offset-11">
                <div class="testimonial-border">
                    <div class="test-img hidden-xs hidden-sm">
                        <img src="<?php echo  base_url(); ?>frontend/img/testimonial/t1.png" class="img-responsive" alt="" width="300px" height="400px">
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6 col-sm-12">
                            <div class="testimonial-content">
                                <div class="item">
                                    <i class="fa fa-quote-left"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <h6>Lara Croft Johnson</h6>
                                    <span>Adobe Indesign</span>
                                </div>
                                <div class="item">
                                    <i class="fa fa-quote-left"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <h6>Lara Croft Johnson</h6>
                                    <span>Adobe Indesign</span>
                                </div>
                                <div class="item">
                                    <i class="fa fa-quote-left"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <h6>Lara Croft Johnson</h6>
                                    <span>Adobe Indesign</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

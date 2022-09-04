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
<section id="slider" class="">
    <div class="static-banner relative">
        <div class="overlay blue-overlay-5"></div>
        <div class="page-head">
            <h2 class="page-title">Courses</h2>
            <ul class="page-title-btn">
                <li><a href="#" >Home <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                <li><a href="#" class="active">Courses</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- Static Banner Area End -->
<!-- Regular Course Area Start -->
<section class="section-full course-grid1">
    <div class="container">
        <div class="popular-course">
            <div class="row">
                <div class="section-head text-center pb-50">
                 <h2 class="first-title">Popular Courses</h2></div>
                
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










            <div class="load-content">

                   <?php foreach ($courses1 as $course1) {

                    ///echo $course['course_id'];


                    ?>

                <div class="col-sm-4">
                    <div class="single-popular">
                        <img src="<?php echo  base_url(); ?>uploads/course_image/<?php echo $course1['course_id']?>.jpg" class="<?php echo  base_url(); ?>frontend/img-responsive" alt="" width="360px" height="280px">
                        <div class="popular-course-content p-40">
                            <h3 class=""><a href="<?php echo base_url(); ?>Home/coursedetails/<?php echo $course1['course_id']; ?>" target="_blank"><?php echo $course1['name']; ?></a></h3>
                            <p class="reviews pt-20">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                              
                            </p>
                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporincididunt ut labore et dolore aliqua. </p> -->
                            <ul>
                                
                                 <li><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Rs.<?php echo $course1['fees']; ?>/Hr </li>
                                <li><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Subject :<?php 

                                $query = $this->db->get_where('subject', array('subject_id' => $course1['subject_id']));
        $subject=$query->row_array();

                echo $subject['name'];

                               //int_r($subject);

                                  ?> </li>
                                <li><span class="glyphicon glyphicon-play" aria-hidden="true"></span>Coaching Type :<?php 

                                $coaching_type=array(1=>'Home Tuition',
                                                     2=>'Tuition Centre',
                                                     3=>'Home Tuition & Tuition Centre');

                                echo $coaching_type[$course1['coaching_type']];  ?></li>
                                <li><span class="glyphicon glyphicon-play" aria-hidden="true"></span>



                                Schedule : 
                                <?php 

                                     $schedule_option[1]="6pm to 8pm";
                                    $schedule_option[2]="7pm to 9pm";
                                    $schedule_option[3]="5pm to 7pm";
                                    $schedule_option[4]="4pm to 6pm";
                                     $schedule_option[5]="5:30pm to 7:30pm";
                                     $schedule_option[6]="6:30pm to 8:30pm";

                                     $schedules=explode(",",$course1['schedules']);
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
        <div class="row">
            <div class="col-xs-12 mt-60 text-center">
                <a href="#" class="btn load-course">View All Courses</a>
            </div>
        </div>
    </div>
</section>
<!-- / #Regular Course End -->
<!-- Col To Action Start -->
<section class="cta-1 cta2 ct3">
    <div class="cta-bg2 relative">
        <div class="overlay cta-overlay-bg-blue"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="cta-content">
                        <h2>Thousands of students are Benefited. Why not you?</h2>
                        
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
<!-- / #Core Features End -->
</main>

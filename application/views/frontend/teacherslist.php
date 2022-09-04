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
            <h2 class="page-title">Teachers List</h2>
            <ul class="page-title-btn">
                <li><a href="http://www.codepixar.com/educare/php/01-home-university.php" target="_blank">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                <li><a href="#" class="active">Teachers List</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- Static Banner Area End -->
<section class="section-full teacher">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="event-filter flex">
                    <div class="single-filter ft-360">

                            <?php echo form_open_multipart(base_url() . 'home/teachers/1');?>
                        <div class="select-ct">

                            <?php 

                             $qry = $this->db->get_where('subject');
        $subjects=$qry->result_array();
        $option[0]="Select the teacher by Subject";

        foreach ($subjects as $sub) {

            $option[$sub['subject_id']]=$sub['name'];
        }

                               $class_communitity="id='subject' class='form-control' ";

                                echo form_dropdown('subject_id', $option,0,$class_communitity);
                          
                            ?>
                            
                        </div>
                    </div>

                    <div class="single-filter ft-165">
                        <button type="submit" class="btn">Find Teacher</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="course-category-widget edu-widget">
                    <h3>New Course</h3>
                    <div class="widget-body">
                        <div class="teacher-list-content">
                    
                            <?php foreach ($courses as $course) {

                    ///echo $course['course_id'];


                    ?>
                            <h3><a href="<?php echo  base_url(); ?>home/coursedetails/<?php echo $course['course_id']; ?>"><?php echo $course['name']; ?> </a></h3>


                    <?php                


                } 



                ?>
            </div>
               
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 course-grid1">

                 <?php 


                    if(!empty($teachers))
                    {


                 foreach ($teachers as $teacher) {

                 


                    ?>


                <div class="single-teacher-list row no-margin mt-30">
                    <div class="pl-n col-md-4 col-sm-5 col-xs-12">
                        <div class="teacher-img" style="background-image: url(<?php echo  base_url(); ?>uploads/teacher_image/<?php echo $teacher['teacher_id']; ?>.jpg); width:200px;height:200px;">
                            <div class="teacher-profile">
                                <div class="social-link">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-xs-12">
                        <div class="teacher-list-content">
                            <h3><a href="<?php echo base_url(); ?>home/teacherdetails/<?php echo $teacher['teacher_id'];



                             ?>" target="_blank"><?php echo $teacher['name']; ?></a></h3>
                            <span>Faculty of 

                                <?php 
                                  $query = $this->db->get_where('subject', array('subject_id' => $teacher['subject_id']));
        $subject=$query->row_array();

                echo $subject['name']; ?></span>
                            <p><?php echo $teacher['description']; ?></p>
                            <a href="<?php echo  base_url(); ?>home/teacherdetails/<?php echo $teacher['teacher_id']; ?>">Read More <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>


                    <?php                


                } 
            }
            else
            {
                echo "No record Found";
            }



                ?>


                
                
              
                
            </div>
        </div>
    </div>
</section>
</main>

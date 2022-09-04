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
                            <div class="form">

           <?php
                      echo form_open_multipart(base_url() . 'Import_export/import_factfile_details/' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                    ?>

                     
                            
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Upload File</label>
                                        <div class="col-lg-6">
                                           <input type="file" class="form-control" id="name" name="transaction_file" required >
                                           <br>
                                            <p class="purple-bg">Please upload xls file with correct header and data</p>
                                        </div>
                                        
                                    </div>
                                 

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- form end-->

        
       
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<script type="text/javascript">


    function delete_donar(donar_id)
    {
      
      //sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
        if(confirm("You want to delete this donar!")== true)
       {
         
         var base_url='<?php echo base_url(); ?>';
       
       // window.location.href =base_url+"student/delete_student/"+student_id;
       }
       else
       {
          return false;
       }
    }
</script>   
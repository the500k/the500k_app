<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="<?php echo base_url();?>/bk_style/js/jquery.js"></script>
<script src="<?php echo base_url();?>/bk_style/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo base_url();?>/bk_style/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url();?>/bk_style/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>/bk_style/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo base_url();?>/bk_style/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo base_url();?>/bk_style/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo base_url();?>/bk_style/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo base_url();?>/bk_style/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo base_url();?>/bk_style/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url();?>/bk_style/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo base_url();?>/bk_style/js/flot-chart/jquery.flot.pie.resize.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>/bk_style/js/jquery.validate.min.js"></script>

<!--dynamic table-->
<!--
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>/bk_style/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/bk_style/js/data-tables/DT_bootstrap.js"></script>
-->
<!--common script init for all pages-->
<script src="<?php echo base_url();?>/bk_style/js/scripts.js"></script>
<!--this page script-->
<script src="<?php echo base_url();?>/bk_style/js/validation-init.js"></script>
<!--dynamic table initialization -->
<!--<script src="<?php echo base_url();?>/bk_style/js/dynamic_table_init.js"></script>-->

 <script src="<?php echo base_url();?>/bk_style/plugins/datepicker/jquery.datetimepicker.js"></script>
<script src="<?php echo base_url();?>/bk_style/js/advanced-form.js"></script>
   <script type="text/javascript">
                                                
                                              jQuery('.ed').datetimepicker({
                                                 timepicker:false,
                                                  format:'d-m-Y',
                                               //  mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
                                                });
                                                
                                                
                                            </script>

                   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

$(document).ready(function () {
    $('#example1').DataTable();
});
</script>         



</body>

<!-- Mirrored from bucketadmin.themebucket.net/form_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Nov 2018 08:47:20 GMT -->
</html>

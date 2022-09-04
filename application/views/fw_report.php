<img src="./uploads/bghead.jpg" width="100%">
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style='font-size:34px;line-height:115%;font-family:"Agency FB","sans-serif";'><?php echo $title; ?></span></strong></p>
<table style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;'>
                    <tbody>
                        <tr>
                            <td width="50%" valign="middle">
                              <h2>Village details</h2>
                            
                             <table style='background-color: rgb(236, 202, 202); font-family: "Palatino Linotype", "Book Antiqua";'>
  
        <tr>
            <td style="border: 1px solid rgb(253, 23, 23);">S.no</td>
            <td style="border: 1px solid rgb(253, 23, 23);">Village Name</td>
            <td style="border: 1px solid rgb(253, 23, 23);">Coming for the prayer</td>
            <td style="border: 1px solid rgb(253, 23, 23);">No of baptism</td>
        </tr>
        <?php 

          if(!empty($village_details))
          {
              
              $sno=1;
              foreach ($village_details as $vd) {
                
                  $cell_style="background-color: rgb(209, 213, 216); border: 1px solid rgb(253, 23, 23);";
                
                ?>
                <tr>
            <td style="<?php echo $cell_style; ?>"><?php echo $sno++;?></td>
            <td style="<?php echo $cell_style; ?>"><?php echo $vd[1]; ?></td>
            <td style="<?php echo $cell_style; ?>"><?php echo $vd[2]; ?></td>
            <td style="<?php echo $cell_style; ?>"><?php echo $vd[3]; ?></td>
        </tr>

                <?php
              }

          }


        ?>

        
    
</table>
                            </td><td>
                               &nbsp;&nbsp;
                            </td>
                            <td valign="top" width="50%">
                              <br>
                           <?php   
                             if($photo!="")
                             {
                              $plink=$photo;
                             }
                             else
                             {
                              $plink=base_url()."uploads/user.jpg";
                             }

                            ?>

                               <img src="<?php echo $plink;?>" width="200" height="200">
                         <h4><?php echo $missionary_name; ?> - <?php echo $state; ?></h4>
                                <h4>Spouse : <?php echo $spouse; ?></h4>
                               <h4><?php echo date('d-m-Y',strtotime($dob)); ?></h4>
                              
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h2>Prayer Points</span></h2>

<ul>
  <?php 

      if(!empty($prayer_points))
      {
        for($i=0;$i<count($prayer_points);$i++)
        {
          ?>
          <li><strong><span style="font-family: Verdana, Geneva, sans-serif; font-size: 18px;"><?php echo $prayer_points[$i];?></span></strong></li>
        <?php
        }
      }


  ?>
    
    
</ul>

<p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:32px;line-height:115%;color:black;">Report</span></p>
<?php 

echo $report; 

//echo $photo_link;exit;
?>
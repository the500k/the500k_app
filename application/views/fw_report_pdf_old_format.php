<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<img src="./uploads/bghead1234.jpg" width="100%">
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style='font-size:34px;line-height:115%;font-family:"Agency FB","sans-serif";'><?php echo $title; ?></span></strong></p>
<table style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;font-size:18px;line-height:115%;font-family:"Agency FB","sans-serif";border: 2px;background-color: #ffffff;'>
                    <tbody>
                      <tr>
                      <th style="font-size:24px;"><centre>
                        Missionary Fact File
                        <hr>
                        <img src="./uploads/missionary/missionary.jpg" width="150" height="150" style="vertical-align:bottom"><br>

                        <hr>
                        <table style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;font-size:14px;line-height:115%;font-family:"Agency FB","sans-serif";border: 2px;'>
                            <tbody>

                          <tr>
                         <td>Name</td>
                         <td><?php echo $missionary_details1['fname'];  ?> <?php echo $missionary_details1['surename'];  ?></td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                         <td>State</td>
                         <td><?php echo $state_by_id[$missionary_details1['state_id']]['name'];  ?></td>
                        </tr>
                                        <tr>
                         <td>Date of Birth</td>
                         <td><?php echo date('d-m-Y',strtotime($missionary_details1['dob']));  ?></td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                         <td>Spouse Name</td>
                         <td><?php echo "need to get";  ?></td>
                        </tr>
                        <tr>
                         <td>Children Name</td>
                         <td><?php echo "need to get";  ?></td>
                        </tr>
                            </tbody>
                          </table>
                       
                      </centre></th><th width="250"><center><img src="./uploads/missionary/map1.jpg" style="vertical-align:middle" width="300" height="300"></center></th>
                      
                    </tr>
                      
                        
                        
                       
                        <tr>
                          <th colspan="2" style="background-color: #c75c04;text-align:center;"><centre>MISSION PROGRESS</centre></th>
                        </tr>
                        <tr>
                         <td><center><img src="./uploads/missionary/mission_field_photo.jpeg" style="vertical-align:top;margin:0px 0px" width="250"></center></td>
                         <td>
                           <table style='margin-top:0cm;margin-right:0cm;margin-bottom:7.0pt;margin-left:0cm;font-size:14px;line-height:115%;font-family:"Agency FB","sans-serif";'>
                            <tbody>
                              <tr>
                         <td>Village </td>
                         <td>1</td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                         <td>Coming for Prayer</td>
                         <td><?php echo $missionary_details2['desc_mf'];  ?></td>
                        </tr>
                        <tr>
                         <td>Church Member</td>
                         <td><?php echo $missionary_details2['desc_mf'];  ?></td>
                        </tr>
                            </tbody>
                          </table>
                         </td>
                        </tr>
                        <tr><td colspan="2" style="background-color: #ffffff;text-align:center;color: #ffffff;"><br></td></tr>
                        <tr>
                          <th colspan="2" style="background-color: #c75c04;text-align:center;color: #ffffff;font-size:14px;"><centre>One Nation - <span style="color: #000000;font-size:12px;">Half a Million Unreached Villages</span> - One God
</centre></th>
                        </tr>
                        <tr>
                          <th colspan="2" style="text-align:center;background-color: #ffffff;"><centre>
</centre></th>
                        </tr>
                        <tr>
                          <th colspan="2" style="background-color: #c75c04;text-align:center;"><centre><?php echo $missionary_details1['fname'];  ?>’s testimony

</centre></th>
                        </tr>
                        <tr style="background-color: #FFFFFF;">
                         <td  colspan="2"><p>Praise the Lord, Greetings to you in the matchless name of our Lord and Savior Jesus Christ. My name is Dhani Ram and I am from Chhattisgarh. I was born and brought up in a Hindu family. Since my childhood to my youth I strictly followed all the rituals and regulations of Hinduism. I was worshipping several gods and goddesses. As I was born and brought up in a Hindu family, I do not have any knowledge about Christ. I led my life according to the worldly pattern. I was addicted to drugs and had many bad friends. Eventually the bad company of my friends lead me to do notorious things.</p><p>
          One day I fell down from a roof and I was seriously injured. My whole body became swollen. I was affected with piles also. I was taken to various hospitals but couldn’t get healed. I was in bed for a long time. During this time, one of my cousin sister told me about church and Christ. I went to the church and the pastor over there prayed for me. Gradually I got healed by the healing power of God.</p><p>
 Then after I began to attend church and various prayer meeting, as the days passed on, I also began to grow in my spiritual life and in Christ. when I came to know fully about the love of Jesus Christ, I decided to do the ministry of God and I understood the need and necessity of the gospel. Since I was very new to Christianity, I had a eagerness to preach about Christ.
Therefore, I went to bible college to know about Christ and to prepare my life for the service of God, by the grace of God successfully I could complete my CPT program. After completion of my training I came to my home town and stayed for few months. Being at home I was constantly praying to start a new pioneer work in a new place to establish a church. I want to start my ministry in a place called Masaniya Kala where hundreds of people do not know about Christ. I want to reach everyone there with the gospel of Jesus Christ I want to win them for the kingdom of God. I thank you for your support and prayers for helping to start a new pioneer work for the glory of God. Thank you so much.
</p></td>
                        
                        </tr>
                      
                        <tr>
                          <th colspan="2" style="background-color: #c75c04;text-align:center;color: #ffffff;font-size:14px;"><centre>One Nation - <span style="color: #000000;font-size:12px;">Half a Million Unreached Villages</span> - One God
</centre></th>
                        </tr>
                        


                    </tbody>
                </table>

             
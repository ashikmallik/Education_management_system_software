<?php
$sid=$_GET['sid'];
include('db_contection.php');
$cheksl ="SELECT * FROM `admition_form` WHERE `student_id`='$sid'";
$qcheksl=$mysqli->query($cheksl);
$shqcheksl=$qcheksl->fetch_assoc();


?>


<html>
    <title>AGGSC</title>
    <head>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Libre Barcode 128 Text' rel='stylesheet'>
<style>
.barcode {
font-family: 'Libre Barcode 128 Text';font-size: 52px;
}
body{
    font-size: 16px;
}
</style>
    </head>
    <body>
                 <script>
			function myFunction() {
			var printButton = document.getElementById("printpagebutton");
			printButton.style.visibility = 'hidden';    
			window.print();
			}
        </script>
        

   
        <table class="table table-bordered" style="border: #000;width: 850px;margin-left: 15%;">
            <tbody>
        <tr>
                  <td  align="center" style="height: 228px;"><img src="aggsc logo.png" width="75" height="75" /><p  style="font-size:16px" ><b>Azimpur Goverment Girls' School And College</b><br>49/E, Azimpur,Dhaka-1205<br> Website: www.aggsc.edu.bd, EIIN:108163</p>
            </td>
            <td>
                     <table class="table table-bordered" style="border: #a5a5a5;">
            <tbody>
              <tr>
                    <td style="width: 33%;font-size:16px:">Roll No.</td>
                    <td><?php echo $shqcheksl['roll']; ?></td>
            
            </tr>
                          <tr>
                    <td style="width: 33%;font-size:16px:">Name</td>
                    <td><?php echo $shqcheksl['std_name']; ?></td>
            
            </tr>
                          <tr>
                    <td style="width: 33%;font-size:16px:">Name(বাংলা)</td>
                    <td><?php echo $shqcheksl['std_name_b']; ?></td>
            
            </tr>
                          <tr>
                    <td style="width: 33%font-size:16px:;">Group</td>
                    <td><?php echo $shqcheksl['group']; ?></td>
            
            </tr>
                          <tr>
                    <td style="width: 33%;font-size:16px:">Blood Group</td>
                    <td><?php echo $shqcheksl['blood_group']; ?></td>
            
            </tr>
                          <tr>
                    <td style="width: 33%;font-size:16px:">DATE OF BIRTH</td>
                    <td><?php echo $shqcheksl['birth_date']; ?></td>
            
            </tr>
              </tbody>
</table>
            </td>
            <td><img src="studentphoto/<?php echo $shqcheksl['imagePath']; ?>" width="120" height="177" /></td>
            </tr>
              </tbody>
</table>
  
   


 

      
      <table class="table" style="border: white;width: 1100px;margin-left: 15%;">
          <tbody>
              <tr>
                  <td>ID No. :<?php echo $shqcheksl['student_id']; ?> </td>
                  <td> ভর্তির আবেদন ফরম<br>
                  একাদশ: ২০২৩-২৪
                  </td>
                  <td><p class="barcode" style="margin-left: -20%;"><?php echo $shqcheksl['student_id']; ?></p></td>
              </tr>
            </tbody>
</table>


      <table class="table table-bordered" style="border: #000000;width: 845px;margin-top: -26px; border-color: black;margin-left: 15%;">
        
                <thead>
    <tr>
      <th colspan="2">Father's Profile</th>
      <th colspan="2">Mother's Profile</th>
    </tr>
  </thead>
    <tbody>
              <tr>
               <td style="width: 20%;">Name</td>
                    <td><?php echo $shqcheksl['fname']; ?></td>
                <td style="width: 20%;">Name</td>
                    <td><?php echo $shqcheksl['mother_name']; ?></td>    
              </tr>
                            <tr>
               <td style="width: 20%;">Mobile</td>
                    <td><?php echo $shqcheksl['fmobile']; ?></td>
                <td style="width: 20%;">Mobile</td>
                    <td><?php echo $shqcheksl['mother_mobile']; ?></td>    
              </tr>
                            <tr>
               <td style="width: 20%;">NID</td>
                    <td><?php echo $shqcheksl['fnid']; ?></td>
                <td style="width: 20%;">NID</td>
                    <td><?php echo $shqcheksl['mother_nid']; ?></td>    
              </tr>
                            <tr>
               <td style="width: 20%;">Occupation</td>
                    <td><?php echo $shqcheksl['foccupation']; ?></td>
                <td style="width: 20%;">Occupation</td>
                    <td><?php echo $shqcheksl['mother_occupation']; ?></td>    
              </tr>
                            <tr>
               <td style="width: 20%;">Annual Income</td>
                    <td><?php echo $shqcheksl['annual_income']; ?></td>
                <td></td>
                    <td></td>    
              </tr>
                                          <tr>
               <td style="width: 20%;">SSC Group</td>
                    <td><?php echo $shqcheksl['ssc_group']; ?></td>
                <td style="width: 20%;">SSC GPA [with 4th Sub]</td>
                    <td><?php echo $shqcheksl['ssc_gpa']; ?></td>    
              </tr>
                                          <tr>
               <td style="width: 20%;">SSC Board</td>
                    <td><?php echo $shqcheksl['ssc_board']; ?></td>
                <td style="width: 20%;">SSC Roll</td>
                    <td><?php echo $shqcheksl['ssc_roll']; ?></td>    
              </tr>                            <tr>
               <td style="width: 20%;">SSC Year</td>
                    <td><?php echo $shqcheksl['ssc_year']; ?></td>
                <td style="width: 20%;">Vaccine</td>
                    <td><?php echo $shqcheksl['vaccine']; ?></td>    
              </tr>                            
              <tr>
               <td style="width: 20%;">SSC Reg.</td>
                    <td><?php echo $shqcheksl['ssc_rg_no']; ?></td>
                <td style="width: 20%;">Religion</td>
                    <td><?php echo $shqcheksl['religion']; ?></td>    
              </tr>                            
              <tr>
               <td style="width: 20%;">Student's Phone</td>
                    <td><?php echo $shqcheksl['std_phone']; ?></td>
                <td style="width: 20%;">Birth Reg.</td>
                    <td><?php echo $shqcheksl['bath_reg_no']; ?></td>    
              </tr>                           
              <tr>
               <td style="width: 20%;">Home District</td>
                    <td><?php echo $shqcheksl['district']; ?></td>
                <td style="width: 20%;">Merit Position</td>
                    <td><?php echo $shqcheksl['merit_position']; ?></td>    
              </tr>
                            <tr>
               <td style="width: 20%;">Present Address </td>
                    <td colspan="3"><?php echo $shqcheksl['present_address']; ?></td>
 
              </tr>
            <tr>
               <td style="width: 20%;">Permanent Address </td>
                    <td colspan="3"><?php echo $shqcheksl['permanent_address']; ?></td>
 
              </tr>
            <tr>
               <td style="width: 20%;">Main Subjects </td>
                    <td colspan="3"><?php echo $shqcheksl['sub_bangla'].",".$shqcheksl['sub_eng'].",".$shqcheksl['sub_ict']; ?></td>
 
              </tr> 
                    <tr>
               <td style="width: 20%;">Elective Subjects </td>
                    <td colspan="3"><?php echo $shqcheksl['elective_subject1'].",".$shqcheksl['elective_subject2'].",".$shqcheksl['elective_subject3'].",".$shqcheksl['elective_subject4']; ?></td>
 
              </tr> 
                    <tr>
               <td style="width: 20%;">4th Subject </td>
                    <td colspan="3"><?php echo $shqcheksl['fourth_subject']; ?></td>
 
              </tr> 
            <tr>
               <td style="width: 20%;">Legal Guardian </td>
                    <td colspan="3"><?php echo $shqcheksl['guardian']; ?></td>
 
              </tr>
                    <tr>
               <td style="width: 20%;">Quota </td>
                    <td colspan="3"><?php echo $shqcheksl['quota']; ?></td>
 
              </tr> 
                                  <tr>
          
                    <td colspan="4"> আমি অঙ্গীকার করছি যে, উপরে বর্ণিত তথ্যসমূহ সত্য ও সঠিক । কলেজে নূন্যতম ৭৫% ক্লাসে উপস্থিত থাকতে এবং নিয়মিত ইউনিফরম পরে আসতে বাধ্য থাকবো । আমি কলেজের বিধি-বিধান যথাযথভাবে মেনে চলবো এবং কলেজের শান্তি-শৃঙ্খলা ও নিয়ম পরিপন্থী কাজে জড়িত থাকলে বা ভুল তথ্য প্রদান করলে কর্তৃপক্ষ প্রদত্ত যে কোনো শাস্তি গ্রহনে বাধ্য থাকিবো । </td>
 
              </tr> 
            </tbody>
</table>

     <table class="table" style="border: white;width: 850px;margin-left: 15%; margin-top: 2%;">
         <tbody>
          <tr>
              <td align="center">শিক্ষার্থীর স্বাক্ষর</td>
              
              <td align="center">অভিভাবকের স্বাক্ষর</td>
          </tr>
          </tbody>
          </table>
          <table class="table" style="border: white;width: 850px;margin-left: 13%; margin-top: 4%;">
         <tbody>
          <tr>
              <td align="center" colspan="1"><p>প্রতিস্বাক্ষর</p></td>
              
              <td align="center" colspan="1"><p style="color: #ffffff00;">প্রতিস্বাক্ষর</p></td>
          </tr>
          </tbody>
          </table>
               
          
         <table class="table" style="border: white;width: 850px;margin-left:18%; margin-top: -2%;">
         <tbody>
           <tr>
              <td align="center"> <img src="principal.jpg" width="115" height="50"/></td>
              
              <td align="center"><img src="converner.png" width="115" height="50"/></td>
          </tr>
          <tr>
              <td align="center">অধ্যক্ষ</td>
              
              <td align="center">আহ্বায়ক</td>
          </tr>
        <tr>
              <td align="center"><p>আজিমপুর গভর্নমেন্ট গার্লস স্কুল এন্ড কলেজ, ঢাকা</p></td>
              
              <td align="center"><p>২০২৩-২০২৪ শিক্ষাবার্ষের একাদশ শ্রেণির ভর্তি কমিটি আজিমপুর গভর্নমেন্ট গার্লস স্কুল এন্ড কলেজ, ঢাকা</p></td>
          </tr>
          </tbody>
          </table>     
          
         <table class="table" style="border: white;width: 850px;margin-left:18%; margin-top: 2%;">
         <tbody>
           <tr>
              <td align="center"> 
              <input id="printpagebutton" type="button" value="print" 
    onclick="myFunction()"/></td>
              
          </tbody>
          </table>  
        
    </body>
</html>
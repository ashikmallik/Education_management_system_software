<?php
 require_once('../result_settings/result_sett_top.php');
 
 require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
    $purifier = new HTMLPurifier();
    //$clean_html = $purifier->purify($dirty_html);
	
	if (!function_exists('clean_html')) {
		function clean_html($dirty_html = ''){
			if(empty($dirty_html))
			return $dirty_html;		
				
			global $purifier;
			$clean_html = $purifier->purify($dirty_html);
			return $clean_html;
		}
		
	}
	
		$branchId = clean_html($_POST['branchId']);
		$branchId1 = strip_tags($_POST['branchId']);	
							
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		$group = clean_html($_POST['group']);
		$group1 = strip_tags($_POST['group']);
		
//  $gtterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
				
// 				$qgterm=$mysqli->query($gtterm);
// 				$shsterm=$qgterm->fetch_assoc();	
// 				$selTerm=$shsterm['borno_result_term_id'];	

//---------------- Grading  ---------------------------------------------------

		$getgrdpoint="select * from borno_grading_chart where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
		$qgetgrdpoint=$mysqli->query($getgrdpoint);
		$shgetgrdpoint=$qgetgrdpoint->fetch_assoc();
		
		$gtmarksfrom1=$shgetgrdpoint['marks_from1'];
		$gtmarksfrom2=$shgetgrdpoint['marks_from2'];
		$gtmarksfrom3=$shgetgrdpoint['marks_from3'];
		$gtmarksfrom4=$shgetgrdpoint['marks_from4'];
		$gtmarksfrom5=$shgetgrdpoint['marks_from5'];
		$gtmarksfrom6=$shgetgrdpoint['marks_from6'];
		$gtmarksfrom7=$shgetgrdpoint['marks_from7'];
		
		$gtlettergrd1=$shgetgrdpoint['letter_grade1'];
		$gtlettergrd2=$shgetgrdpoint['letter_grade2'];
		$gtlettergrd3=$shgetgrdpoint['letter_grade3'];
		$gtlettergrd4=$shgetgrdpoint['letter_grade4'];
		$gtlettergrd5=$shgetgrdpoint['letter_grade5'];
		$gtlettergrd6=$shgetgrdpoint['letter_grade6'];
		$gtlettergrd7=$shgetgrdpoint['letter_grade7'];
		
		
		$gtgrtpoint1=$shgetgrdpoint['grade_point1'];
		$gtgrtpoint2=$shgetgrdpoint['grade_point2'];
		$gtgrtpoint3=$shgetgrdpoint['grade_point3'];
		$gtgrtpoint4=$shgetgrdpoint['grade_point4'];
		$gtgrtpoint5=$shgetgrdpoint['grade_point5'];
		$gtgrtpoint6=$shgetgrdpoint['grade_point6'];
		$gtgrtpoint7=$shgetgrdpoint['grade_point7'];

//------------------- End Grading ----------------------------------------------

	
//---------------------------Nine To Ten GrandTotal GPA Set-------------------
if($studClass1==1 OR $studClass1==2)
{

	
//========================Delete Average Table========================
$delbtbornores1="DELETE from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_school_stud_group='$group1'";
$mysqli->query($delbtbornores1);	

//=========================Delete Average Temp1==========================
//$delbtbornores1="DELETE from borno_class9_10_average_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_school_stud_group='$group1'";
//$mysqli->query($delbtbornores1);	

//=========================Delete Average Merit==========================	
$delbtbornores="DELETE from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_school_stud_group='$group1'";
$mysqli->query($delbtbornores);	

	$getsubject="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1'  AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section' AND borno_school_session='$stsess1' GROUP BY `borno_subject_nine_ten_id`";
  
    $qgetsubject=$mysqli->query($getsubject);
	while($shqgetsubject=$qgetsubject->fetch_assoc()){
	    
		  
		$stusubjId =  $shqgetsubject['borno_subject_nine_ten_id'];
		
//echo $stusubjId;
        $gtterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type IN (1,2) ORDER BY `term_type` DESC";
				$qgterm=$mysqli->query($gtterm);
				while($shsterm=$qgterm->fetch_assoc()){	
				$selTerm=$shsterm['borno_result_term_id'];
				$termType = $shsterm['term_type'];
				
				if($termType == 2){
				$gettarmmark="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_subject_nine_ten_id='$stusubjId'";
                $qgettarmmark=$mysqli->query($gettarmmark);
	            while($shgettarmmark=$qgettarmmark->fetch_assoc()){
	                
	                $studinfoId = $shgettarmmark['borno_student_info_id'];
	                $studRoll = $shgettarmmark['borno_school_roll'];
	                $studName = $shgettarmmark['borno_school_student_name']; 
	                $numbty1 = $shgettarmmark['temp_res_number_type1'];
	                $numbty2 = $shgettarmmark['temp_res_number_type2'];
	                $numbty3 = $shgettarmmark['temp_res_number_type3'];
	                $numbty4 = $shgettarmmark['temp_res_number_type4'];
	                $numbty5 = $shgettarmmark['temp_res_number_type5'];
	                $numbty6 = $shgettarmmark['temp_res_number_type6'];
	                $gttotalmrk = $shgettarmmark['total_marks'];
	                $totaleightypercent = round(($gttotalmrk*80)/100);
	                $pare = $shgettarmmark['subject_pare'];
	                $group = $shgettarmmark['borno_school_stud_group'];
	                $uncountable = $shgettarmmark['uncountable'];
	                $forth_subject = $shgettarmmark['stu4thsub'];
	                

	       
	       	$insfmark1="INSERT INTO `borno_class_avg_result`(`borno_school_id`, 
	       	`borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_school_stud_group`, 
	       	`subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `final_res_number_type1`, `final_res_number_type2`,
	       	`final_res_number_type3`, `final_res_number_type4`, `final_res_number_type5`, `final_res_number_type6`, `final_res_total_mark`, `final_res_total_conv`,
	       	`final_res_total_mark_80_percent`, `halfearly_res_total_mark`, `halfearly_res_total_mark_20_percent`, `grand_total`, `mark_in_present`, `res_gpa`,
	       	`res_lg`, `pare`, `4th_subject`, `uncountable`)
		                      
		                       VALUES ('$schId', 
		                       '$branchId1', 
		                       '$studClass1', 
		                       '$shiftId1', 
		                       '$section1', 
		                       '$stsess1',
		                       '$group',
		                       '$stusubjId', 
		                       '0', 
		                       '$studinfoId', 
		                       '$studRoll', 
		                       '$studName', 
		                       '$numbty1', 
		                       '$numbty2', 
		                       '$numbty3', 
		                       '$numbty4', 
		                       '$numbty5', 
		                       '$numbty6', 
		                       '$gttotalmrk',
		                       '$gttotalmrk',
		                       '$totaleightypercent',
		                       '0',
		                       '0',
		                       '0',
		                       '0',
		                       '0',
		                       '0',
		                       '$pare',
		                       '$forth_subject',
		                       '$uncountable')";
		                      $quygeneralsubmark1=$mysqli->query($insfmark1);        
	               
	            }
	             
				    
				}
				else{
				$gettarmmark="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_subject_nine_ten_id='$stusubjId'";
                $qgettarmmark=$mysqli->query($gettarmmark);
	            while($shgettarmmark=$qgettarmmark->fetch_assoc()){
	                
	                $studinfoId1 = $shgettarmmark['borno_student_info_id'];
	                $studRoll1 = $shgettarmmark['borno_school_roll'];
	                $gttotalmrk1 = $shgettarmmark['total_marks'];
	                $totalpercent1 = round(($gttotalmrk1*20)/100);
	           $getperce = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='$stusubjId'";
	           $qgetperce=$mysqli->query($getperce);
	           $shqgetperce=$qgetperce->fetch_assoc();
	           $total8percen = $shqgetperce['final_res_total_mark_80_percent'];
	           $res_gpa = $shqgetperce['res_gpa'];
	           $grandTotal = $total8percen + $totalpercent1;
	           if($stusubjId == 8 ){
	               $grandtotalpercentage = round(($grandTotal*100)/50);
	           }
	           else{
	               $grandtotalpercentage = round(($grandTotal*100)/100);
	           }
	           
	           
	           if($stusubjId == 1 OR $stusubjId == 2 OR $stusubjId == 3 OR$stusubjId == 4){
	               
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='$stusubjId' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll1'";
	           $quupdate=$mysqli->query($update);
	               
	               
	               if($stusubjId == 2){
	           $getpare = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='1'";
	           $qgetpare=$mysqli->query($getpare);
	           $shqgetpare=$qgetpare->fetch_assoc();
	            $nubtype1sub1 = $shqgetpare['final_res_number_type1'];
	            $nubtype2sub1 = $shqgetpare['final_res_number_type2'];
	            $total8percen1 = $shqgetpare['final_res_total_mark_80_percent'];
	            $total2percen1 = $shqgetpare['halfearly_res_total_mark_20_percent'];
	            $grandTotalsub1 = $total8percen1 + $total2percen1;
	            
	          	$getpare2 = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='2'";
	            $qgetpare2=$mysqli->query($getpare2);
	            $shqgetpare2=$qgetpare2->fetch_assoc();
	            $nubtype1sub2 = $shqgetpare2['final_res_number_type1'];
	            $nubtype2sub2 = $shqgetpare2['final_res_number_type2'];
	            $total8percen2 = $shqgetpare2['final_res_total_mark_80_percent'];
	            $total2percen2 = $shqgetpare2['halfearly_res_total_mark_20_percent'];
	            $grandTotalsub2 = $total8percen2 + $total2percen2;
	            
	            $grandTotalpear = $grandTotalsub1 + $grandTotalsub2;
	            $grandTotalpearpercen = round(($grandTotalpear*100)/200);
	            
	            $cqtotal = $nubtype1sub1 + $nubtype1sub2; 
	            $mcqtotal = $nubtype2sub1 + $nubtype2sub2;
	            
	            //echo $cqtotal." " ; echo $mcqtotal." " ;
	            
	           if($cqtotal < 46 OR $mcqtotal < 20  ){
	                 $gpa = 0.00;
	                 $lg = "F";
	           }
	           else{
	               
	               
	           
	           	   if($grandTotalpearpercen >= 80){
	               $gpa = 5.00;
	               $lg = "A+";
	           }
	           else if($grandTotalpearpercen > 69){
	               $gpa = 4.00;
	               $lg = "A";
	           }
	           else if($grandTotalpearpercen > 59){
	               $gpa = 3.50;
	               $lg = "A-";
	           }
	           else if($grandTotalpearpercen > 49){
	               $gpa = 3.00;
	               $lg = "B";
	           }
	           else if($grandTotalpearpercen > 39){
	               $gpa = 2.00;
	               $lg = "C";
	           }
	           else if($grandTotalpearpercen > 32){
	               $gpa = 1.00;
	               $lg = "D";
	           }
	           else{
	               $gpa = 0.00;
	               $lg = "F";
	           }
	           }
	       //    echo $cqtotal." " ; 
	       //   // echo $nubtype1sub1." " ; echo $cqtotal." " ; 
	       //    echo $mcqtotal." " ;echo $gpa." " ; echo $lg." " ;
	           
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1',`grand_total`='$grandTotalpear',`mark_in_present`='$grandTotalpearpercen',`res_gpa`='$gpa',`res_lg`='$lg' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='2' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll1'";
	           $quupdate=$mysqli->query($update);
	           
	           
	               }
	               else if($stusubjId == 4){
	                 
	           $getpare = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='3'";
	           $qgetpare=$mysqli->query($getpare);
	           $shqgetpare=$qgetpare->fetch_assoc(); 
	            $total8percen1 = $shqgetpare['final_res_total_mark_80_percent'];
	            $total2percen1 = $shqgetpare['halfearly_res_total_mark_20_percent'];
	            $grandTotalsub1 = $total8percen1 + $total2percen1;
	            
	          	$getpare2 = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='4'";
	            $qgetpare2=$mysqli->query($getpare2);
	            $shqgetpare2=$qgetpare2->fetch_assoc(); 
	            $total8percen2 = $shqgetpare2['final_res_total_mark_80_percent'];
	            $total2percen2 = $shqgetpare2['halfearly_res_total_mark_20_percent'];
	            $grandTotalsub2 = $total8percen2 + $total2percen2;
	            
	            $grandTotalpear = $grandTotalsub1 + $grandTotalsub2;
	            $grandTotalpearpercen = round(($grandTotalpear*100)/200);
	            
	            
	           
	           
	           
	           	   if($grandTotalpearpercen >= 80){
	               $gpa = 5.00;
	               $lg = "A+";
	           }
	           else if($grandTotalpearpercen > 69){
	               $gpa = 4.00;
	               $lg = "A";
	           }
	           else if($grandTotalpearpercen > 59){
	               $gpa = 3.50;
	               $lg = "A-";
	           }
	           else if($grandTotalpearpercen > 49){
	               $gpa = 3.00;
	               $lg = "B";
	           }
	           else if($grandTotalpearpercen > 39){
	               $gpa = 2.00;
	               $lg = "C";
	           }
	           else if($grandTotalpearpercen > 32){
	               $gpa = 1.00;
	               $lg = "D";
	           }
	           else{
	               $gpa = 0.00;
	               $lg = "F";
	           }
	           
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1',`grand_total`='$grandTotalpear',`mark_in_present`='$grandTotalpearpercen',`res_gpa`='$gpa',`res_lg`='$lg' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='4' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll1'";
	           $quupdate=$mysqli->query($update);
	                 
	                   
	               }
	               
	               
	           }
	           else{
	           
	           	       $getnopare ="SELECT * FROM `borno_class9_10_final_result` WHERE `borno_student_info_id` ='$studinfoId1' AND `borno_subject_nine_ten_id` ='$stusubjId' AND `borno_result_term_id` ='19'";
	                   $qgetnopare=$mysqli->query($getnopare);
	                   $shqgetnopare=$qgetnopare->fetch_assoc();
	                   $res_gpa1 = $shqgetnopare['res_gpa'];    
	           
	               
	             if($res_gpa1 == 0){
	               $gpa = 0.00;
	               $lg = "F";
	             }
	             else{
	             
	               if($grandtotalpercentage >= 80){
	               $gpa = 5.00;
	               $lg = "A+";
	           }
	           else if($grandtotalpercentage > 69){
	               $gpa = 4.00;
	               $lg = "A";
	           }
	           else if($grandtotalpercentage > 59){
	               $gpa = 3.50;
	               $lg = "A-";
	           }
	           else if($grandtotalpercentage > 49){
	               $gpa = 3.00;
	               $lg = "B";
	           }
	           else if($grandtotalpercentage > 39){
	               $gpa = 2.00;
	               $lg = "C";
	           }
	           else if($grandtotalpercentage > 32){
	               $gpa = 1.00;
	               $lg = "D";
	           }
	           else{
	               $gpa = 0.00;
	               $lg = "F";
	           }
	             }
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1',`grand_total`='$grandTotal',`mark_in_present`='$grandtotalpercentage',`res_gpa`='$gpa',`res_lg`='$lg' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='$stusubjId' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll1'";
	           $quupdate=$mysqli->query($update);
	               
	           }
	            }
				}
				
				}
		
	    
	}
	  

}
//---------------------End Nine Ten GrandTotal GPA Set-------------------
	
//-----------------------Six To Eight GrandTotal GPA Set-------------------
elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{
    echo $studClass1." ";
$delbtbornores1="DELETE from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'";
$mysqli->query($delbtbornores1);	
	
$delbtbornores="DELETE from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'";
$mysqli->query($delbtbornores);	

	$getsubject="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1'  AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section' AND borno_school_session='$stsess1' GROUP BY `subject_id_six_eight`";
  
    $qgetsubject=$mysqli->query($getsubject);
	while($shqgetsubject=$qgetsubject->fetch_assoc()){
	    
		  
		$stusubjId =  $shqgetsubject['subject_id_six_eight'];
		
		$getpare1="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId' GROUP BY `subject_id_six_eight`";
		
		$qgetpare1=$mysqli->query($getpare1);
		$shqgetpare1=$qgetpare1->fetch_assoc();	 
		$uncountable = $shgettarmmark['uncountable'];
	    $forth_subject = $shgettarmmark['six_eight_4th_subject'];
		
		//echo $stusubjId;
        $gtterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type IN (1,2) ORDER BY `term_type` DESC";
				$qgterm=$mysqli->query($gtterm);
				while($shsterm=$qgterm->fetch_assoc()){	
				$selTerm=$shsterm['borno_result_term_id'];
				$termType = $shsterm['term_type'];
				
				if($termType == 2){
				$gettarmmark="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
                $qgettarmmark=$mysqli->query($gettarmmark);
	            while($shgettarmmark=$qgettarmmark->fetch_assoc()){
	                
	                $studinfoId = $shgettarmmark['borno_student_info_id'];
	                $studRoll = $shgettarmmark['borno_school_roll'];
	                $studName = $shgettarmmark['borno_school_student_name']; 
	                $numbty1 = $shgettarmmark['temp_res_number_type1'];
	                $numbty2 = $shgettarmmark['temp_res_number_type2'];
	                $numbty3 = $shgettarmmark['temp_res_number_type3'];
	                $numbty4 = $shgettarmmark['temp_res_number_type4'];
	                $numbty5 = $shgettarmmark['temp_res_number_type5'];
	                $numbty6 = $shgettarmmark['temp_res_number_type6'];
	                $gttotalmrk = $shgettarmmark['total_mark'];
	                $totaleightypercent = round(($gttotalmrk*80)/100);
	                $pare = $shgettarmmark['subject_pare'];
	       
	       	$insfmark1="INSERT INTO `borno_class_avg_result`(`borno_school_id`, 
	       	`borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_school_stud_group`, 
	       	`subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `final_res_number_type1`, `final_res_number_type2`,
	       	`final_res_number_type3`, `final_res_number_type4`, `final_res_number_type5`, `final_res_number_type6`, `final_res_total_mark`, `final_res_total_conv`,
	       	`final_res_total_mark_80_percent`, `halfearly_res_total_mark`, `halfearly_res_total_mark_20_percent`, `grand_total`, `mark_in_present`, `res_gpa`,
	       	`res_lg`, `pare`, `4th_subject`, `uncountable`)
		                      
		                       VALUES ('$schId', 
		                       '$branchId1', 
		                       '$studClass1', 
		                       '$shiftId1', 
		                       '$section1', 
		                       '$stsess1',
		                       '0',
		                       '$stusubjId', 
		                       '0', 
		                       '$studinfoId', 
		                       '$studRoll', 
		                       '$studName', 
		                       '$numbty1', 
		                       '$numbty2', 
		                       '$numbty3', 
		                       '$numbty4', 
		                       '$numbty5', 
		                       '$numbty6', 
		                       '$gttotalmrk',
		                       '$gttotalmrk',
		                       '$totaleightypercent',
		                       '0',
		                       '0',
		                       '0',
		                       '0',
		                       '0',
		                       '',
		                       '$pare',
		                       '$forth_subject',
		                       '$uncountable')";
		                      $quygeneralsubmark1=$mysqli->query($insfmark1);        
	               
	            }
	             
				    
				}
				else{
				    
				 
				$gettarmmark="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
                $qgettarmmark=$mysqli->query($gettarmmark);
	            while($shgettarmmark=$qgettarmmark->fetch_assoc()){
	                
	                $studinfoId1 = $shgettarmmark['borno_student_info_id'];
	                $studRoll = $shgettarmmark['borno_school_roll'];
	                $gttotalmrk1 = $shgettarmmark['total_mark'];
	                $totalpercent1 = round(($gttotalmrk1*20)/100);
	           $getperce = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='$stusubjId'";
	           $qgetperce=$mysqli->query($getperce);
	           $shqgetperce=$qgetperce->fetch_assoc();
	           $total8percen = $shqgetperce['final_res_total_mark_80_percent'];
	           $grandTotal = $total8percen + $totalpercent1;
	           if($stusubjId == 12 ){
	               $grandtotalpercentage = round(($grandTotal*100)/50);
	           }
	           else{
	               $grandtotalpercentage = round(($grandTotal*100)/100);
	           }
	          
	           
	           
	           if($stusubjId == 1 OR $stusubjId == 2 OR $stusubjId == 3 OR$stusubjId == 4){
	               
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='$stusubjId' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll'";
	           $quupdate=$mysqli->query($update);
	               
	               
	               if($stusubjId == 2){
	           $getpare = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='1'";
	           $qgetpare=$mysqli->query($getpare);
	           $shqgetpare=$qgetpare->fetch_assoc(); 
	            $total8percen1 = $shqgetpare['final_res_total_mark_80_percent'];
	            $total2percen1 = $shqgetpare['halfearly_res_total_mark_20_percent'];
	            $grandTotalsub1 = $total8percen1 + $total2percen1;
	            
	          	$getpare2 = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='2'";
	            $qgetpare2=$mysqli->query($getpare2);
	            $shqgetpare2=$qgetpare2->fetch_assoc(); 
	            $total8percen2 = $shqgetpare2['final_res_total_mark_80_percent'];
	            $total2percen2 = $shqgetpare2['halfearly_res_total_mark_20_percent'];
	            $grandTotalsub2 = $total8percen2 + $total2percen2;
	            
	            $grandTotalpear = $grandTotalsub1 + $grandTotalsub2;
	            $grandTotalpearpercen = round(($grandTotalpear*100)/150);
	            
	            
	           
	           
	           
	           	   if($grandTotalpearpercen >= 80){
	               $gpa = 5.00;
	               $lg = "A+";
	           }
	           else if($grandTotalpearpercen > 69){
	               $gpa = 4.00;
	               $lg = "A";
	           }
	           else if($grandTotalpearpercen > 59){
	               $gpa = 3.50;
	               $lg = "A-";
	           }
	           else if($grandTotalpearpercen > 49){
	               $gpa = 3.00;
	               $lg = "B";
	           }
	           else if($grandTotalpearpercen > 39){
	               $gpa = 2.00;
	               $lg = "C";
	           }
	           else if($grandTotalpearpercen > 32){
	               $gpa = 1.00;
	               $lg = "D";
	           }
	           else{
	               $gpa = 0.00;
	               $lg = "F";
	           }
	           
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1',`grand_total`='$grandTotalpear',`mark_in_present`='$grandTotalpearpercen',`res_gpa`='$gpa',`res_lg`='$lg' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='2' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll'";
	           $quupdate=$mysqli->query($update);
	           
	           
	               }
	               else if($stusubjId == 4){
	                 
	           $getpare = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='3'";
	           $qgetpare=$mysqli->query($getpare);
	           $shqgetpare=$qgetpare->fetch_assoc(); 
	            $total8percen1 = $shqgetpare['final_res_total_mark_80_percent'];
	            $total2percen1 = $shqgetpare['halfearly_res_total_mark_20_percent'];
	            $grandTotalsub1 = $total8percen1 + $total2percen1;
	            
	          	$getpare2 = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='4'";
	            $qgetpare2=$mysqli->query($getpare2);
	            $shqgetpare2=$qgetpare2->fetch_assoc(); 
	            $total8percen2 = $shqgetpare2['final_res_total_mark_80_percent'];
	            $total2percen2 = $shqgetpare2['halfearly_res_total_mark_20_percent'];
	            $grandTotalsub2 = $total8percen2 + $total2percen2;
	            
	            $grandTotalpear = $grandTotalsub1 + $grandTotalsub2;
	            $grandTotalpearpercen = round(($grandTotalpear*100)/150);
	            
	            
	           
	           
	           
	           	   if($grandTotalpearpercen >= 80){
	               $gpa = 5.00;
	               $lg = "A+";
	           }
	           else if($grandTotalpearpercen > 69){
	               $gpa = 4.00;
	               $lg = "A";
	           }
	           else if($grandTotalpearpercen > 59){
	               $gpa = 3.50;
	               $lg = "A-";
	           }
	           else if($grandTotalpearpercen > 49){
	               $gpa = 3.00;
	               $lg = "B";
	           }
	           else if($grandTotalpearpercen > 39){
	               $gpa = 2.00;
	               $lg = "C";
	           }
	           else if($grandTotalpearpercen > 32){
	               $gpa = 1.00;
	               $lg = "D";
	           }
	           else{
	               $gpa = 0.00;
	               $lg = "F";
	           }
	           
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1',`grand_total`='$grandTotalpear',`mark_in_present`='$grandTotalpearpercen',`res_gpa`='$gpa',`res_lg`='$lg' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='4' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll'";
	           $quupdate=$mysqli->query($update);
	                 
	                   
	               }
	               
	               
	           }
	           else{
	             
	             
	               if($grandtotalpercentage >= 80){
	               $gpa = 5.00;
	               $lg = "A+";
	           }
	           else if($grandtotalpercentage > 69){
	               $gpa = 4.00;
	               $lg = "A";
	           }
	           else if($grandtotalpercentage > 59){
	               $gpa = 3.50;
	               $lg = "A-";
	           }
	           else if($grandtotalpercentage > 49){
	               $gpa = 3.00;
	               $lg = "B";
	           }
	           else if($grandtotalpercentage > 39){
	               $gpa = 2.00;
	               $lg = "C";
	           }
	           else if($grandtotalpercentage > 32){
	               $gpa = 1.00;
	               $lg = "D";
	           }
	           else{
	               $gpa = 0.00;
	               $lg = "F";
	           }
	           
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1',`grand_total`='$grandTotal',`mark_in_present`='$grandtotalpercentage',`res_gpa`='$gpa',`res_lg`='$lg' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='$stusubjId' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll'";
	           $quupdate=$mysqli->query($update);
	               
	           }
	           

	            }
				}
				
				}
		
	    
	}

}

//---------------------End Six To Eight GrandTotal GPA Set-------------------

//-------------------------Play To Five GrandTotal GPA Set-------------------
else
{
$delbtbornores1="DELETE from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'";
$mysqli->query($delbtbornores1);	
	
$delbtbornores="DELETE from borno_play_five_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'";
$mysqli->query($delbtbornores);	

	$getsubject="select * from borno_class1_temp_mark1 where borno_school_id='$schId'  AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section' AND borno_school_session='$stsess1' GROUP BY `borno_result_subject_id`";
  
    $qgetsubject=$mysqli->query($getsubject);
	while($shqgetsubject=$qgetsubject->fetch_assoc()){
		  
		$stusubjId =  $shqgetsubject['borno_result_subject_id'];
 $gtterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type IN (1,2) ORDER BY `term_type` DESC";
				$qgterm=$mysqli->query($gtterm);
				while($shsterm=$qgterm->fetch_assoc()){	
				$selTerm=$shsterm['borno_result_term_id'];
				$termType = $shsterm['term_type'];
				
				if($termType == 2){
				$gettarmmark="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
                $qgettarmmark=$mysqli->query($gettarmmark);
	            while($shgettarmmark=$qgettarmmark->fetch_assoc()){
	                
	                $studinfoId = $shgettarmmark['borno_student_info_id'];
	                $studRoll = $shgettarmmark['borno_school_roll'];
	                $studName = $shgettarmmark['borno_school_student_name']; 
	                $numbty1 = $shgettarmmark['temp_res_number_type1'];
	                $numbty2 = $shgettarmmark['temp_res_number_type2'];
	                $numbty3 = $shgettarmmark['temp_res_number_type3'];
	                $numbty4 = $shgettarmmark['temp_res_number_type4'];
	                $numbty5 = $shgettarmmark['temp_res_number_type5'];
	                $numbty6 = $shgettarmmark['temp_res_number_type6'];
	                $gttotalmrk = $shgettarmmark['totalmark'];
	                $totaleightypercent = round(($gttotalmrk*80)/100);
	                $pare = $shgettarmmark['pare'];
	       
	       	$insfmark1="INSERT INTO `borno_class_avg_result`(`borno_school_id`, 
	       	`borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_school_stud_group`, 
	       	`subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `final_res_number_type1`, `final_res_number_type2`,
	       	`final_res_number_type3`, `final_res_number_type4`, `final_res_number_type5`, `final_res_number_type6`, `final_res_total_mark`, `final_res_total_conv`,
	       	`final_res_total_mark_80_percent`, `halfearly_res_total_mark`, `halfearly_res_total_mark_20_percent`, `grand_total`, `mark_in_present`, `res_gpa`,
	       	`res_lg`, `pare`, `4th_subject`, `uncountable`)
		                      
		                       VALUES ('$schId', 
		                       '$branchId1', 
		                       '$studClass1', 
		                       '$shiftId1', 
		                       '$section1', 
		                       '$stsess1',
		                       '0',
		                       '$stusubjId', 
		                       '0', 
		                       '$studinfoId', 
		                       '$studRoll', 
		                       '$studName', 
		                       '$numbty1', 
		                       '$numbty2', 
		                       '$numbty3', 
		                       '$numbty4', 
		                       '$numbty5', 
		                       '$numbty6', 
		                       '$gttotalmrk',
		                       '$gttotalmrk',
		                       '$totaleightypercent',
		                       '0',
		                       '0',
		                       '0',
		                       '0',
		                       '0',
		                       '',
		                       '$pare',
		                       '0',
		                       '0')";
		                      $quygeneralsubmark1=$mysqli->query($insfmark1);        
	               
	            }
	             
				    
				}
				else{
				$gettarmmark="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
                $qgettarmmark=$mysqli->query($gettarmmark);
	            while($shgettarmmark=$qgettarmmark->fetch_assoc()){
	                
	                $studinfoId1 = $shgettarmmark['borno_student_info_id'];
	                $studRoll = $shgettarmmark['borno_school_roll'];
	                $gttotalmrk1 = $shgettarmmark['totalmark'];
	                $totalpercent1 = round(($gttotalmrk1*20)/100);
	           $getperce = "select * from borno_class_avg_result where borno_student_info_id='$studinfoId1' AND subject_id ='$stusubjId'";
	           $qgetperce=$mysqli->query($getperce);
	           $shqgetperce=$qgetperce->fetch_assoc();
	           $total8percen = $shqgetperce['final_res_total_mark_80_percent'];
	           $grandTotal = $total8percen + $totalpercent1;
	           $grandtotalpercentage = round(($grandTotal*100)/100);
	           
	           if($grandTotal >= 80){
	               $gpa = 5.00;
	               $lg = "A+";
	           }
	           else if($grandTotal > 69){
	               $gpa = 4.00;
	               $lg = "A";
	           }
	           else if($grandTotal > 59){
	               $gpa = 3.50;
	               $lg = "A-";
	           }
	           else if($grandTotal > 49){
	               $gpa = 3.00;
	               $lg = "B";
	           }
	           else if($grandTotal > 39){
	               $gpa = 2.00;
	               $lg = "C";
	           }
	           else if($grandTotal > 32){
	               $gpa = 1.00;
	               $lg = "D";
	           }
	           else{
	               $gpa = 0.00;
	               $lg = "F";
	           }
	           
	           $update = "UPDATE `borno_class_avg_result` SET `halfearly_res_total_mark` ='$gttotalmrk1' ,`halfearly_res_total_mark_20_percent`='$totalpercent1',`grand_total`='$grandTotal',`mark_in_present`='$grandtotalpercentage',`res_gpa`='$gpa',`res_lg`='$lg' 
	           WHERE`borno_student_info_id` = '$studinfoId1' AND `subject_id` ='$stusubjId' AND `borno_school_session` = '$stsess1' AND `borno_school_section_id` = '$section1' AND `borno_school_roll` = '$studRoll'";
	           $quupdate=$mysqli->query($update);
	            }
				}
				
				}
		
	    
	}
}
//-------------------------Play To Five GrandTotal GPA Set End---------------



//------------------------------Nine Ten Start ---------------------------
// if($studClass1==1 OR $studClass1==2)
// {
// 		$gtctmarg="select * from borno_class9_10_average_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$group1' AND borno_result_term_id='0' group by borno_subject_nine_ten_id asc";
  
//     $qgtctmarg=$mysqli->query($gtctmarg);
// 	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
// 		$stusubjId=$shgtctmarg['borno_subject_nine_ten_id']; 
// 		$pare=$shgtctmarg['subject_pare'];
	
		
// if($pare==1)
// {
//  $gtsdmrk1="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId' AND pare='1'";
				
// 				$qgtsdmrk1=$mysqli->query($gtsdmrk1);
// 				$shsubjdet1=$qgtsdmrk1->fetch_assoc();
				
// 				$numbtype11_conv=$shsubjdet1['number_type1_conv'];
// 				$numbtype12_conv=$shsubjdet1['number_type2_conv'];
// 				$numbtype13_conv=$shsubjdet1['number_type3_conv'];
// 				$numbtype14_conv=$shsubjdet1['number_type4_conv'];
// 				$numbtype15_conv=$shsubjdet1['number_type5_conv'];
// 				$numbtype16_conv=$shsubjdet1['number_type6_conv'];
				
// 				$gtnumty11pass=$shsubjdet1['number_type1_pass'];
// 				$gtnumty12pass=$shsubjdet1['number_type2_pass'];
// 				$gtnumty13pass=$shsubjdet1['number_type3_pass'];
// 				$gtnumty14pass=$shsubjdet1['number_type4_pass'];
// 				$gtnumty15pass=$shsubjdet1['number_type5_pass'];
// 				$gtnumty16pass=$shsubjdet1['number_type6_pass'];

// 				$gtsubjfmark1=$shsubjdet1['borno_nine_ten_subfullmark'];

//  $gtsdmrk2="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id!='$stusubjId' AND pare='1'";
				
// 				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
// 				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
// 				$stusubjId1=$shsubjdet2['borin_subject_nine_ten_id'];
// 				$numbtype21_conv=$shsubjdet2['number_type1_conv'];
// 				$numbtype22_conv=$shsubjdet2['number_type2_conv'];
// 				$numbtype23_conv=$shsubjdet2['number_type3_conv'];
// 				$numbtype24_conv=$shsubjdet2['number_type4_conv'];
// 				$numbtype25_conv=$shsubjdet2['number_type5_conv'];
// 				$numbtype26_conv=$shsubjdet2['number_type6_conv'];
				
// 				$gtnumty21pass=$shsubjdet2['number_type1_pass'];
// 				$gtnumty22pass=$shsubjdet2['number_type2_pass'];
// 				$gtnumty23pass=$shsubjdet2['number_type3_pass'];
// 				$gtnumty24pass=$shsubjdet2['number_type4_pass'];
// 				$gtnumty25pass=$shsubjdet2['number_type5_pass'];
// 				$gtnumty26pass=$shsubjdet2['number_type6_pass'];
// 				$gtsubjfmark2=$shsubjdet2['borno_nine_ten_subfullmark'];
				
// 				$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
// 				$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
// 				$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
// 				$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
// 				$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
// 				$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;

	
	
// 	$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
// 	$gtsdmrk3="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND pare='1' order by borin_subject_nine_ten_id desc limit 0,1";
				
// 				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
// 				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
// 				$subjectidpare=$shsubjdet3['borin_subject_nine_ten_id'];
// }
// elseif($pare==2)
// {
//  $gtsdmrk1="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId' AND pare='2'";
				
// 				$qgtsdmrk1=$mysqli->query($gtsdmrk1);
// 				$shsubjdet1=$qgtsdmrk1->fetch_assoc();
				
// 				$numbtype11_conv=$shsubjdet1['number_type1_conv'];
// 				$numbtype12_conv=$shsubjdet1['number_type2_conv'];
// 				$numbtype13_conv=$shsubjdet1['number_type3_conv'];
// 				$numbtype14_conv=$shsubjdet1['number_type4_conv'];
// 				$numbtype15_conv=$shsubjdet1['number_type5_conv'];
// 				$numbtype16_conv=$shsubjdet1['number_type6_conv'];
				
// 				$gtnumty11pass=$shsubjdet1['number_type1_pass'];
// 				$gtnumty12pass=$shsubjdet1['number_type2_pass'];
// 				$gtnumty13pass=$shsubjdet1['number_type3_pass'];
// 				$gtnumty14pass=$shsubjdet1['number_type4_pass'];
// 				$gtnumty15pass=$shsubjdet1['number_type5_pass'];
// 				$gtnumty16pass=$shsubjdet1['number_type6_pass'];
		
// 				$gtsubjfmark1=$shsubjdet1['borno_nine_ten_subfullmark'];

//  $gtsdmrk2="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id!='$stusubjId' AND pare='2'";
				
// 				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
// 				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
// 				$stusubjId1=$shsubjdet2['borin_subject_nine_ten_id'];
// 				$numbtype21_conv=$shsubjdet2['number_type1_conv'];
// 				$numbtype22_conv=$shsubjdet2['number_type2_conv'];
// 				$numbtype23_conv=$shsubjdet2['number_type3_conv'];
// 				$numbtype24_conv=$shsubjdet2['number_type4_conv'];
// 				$numbtype25_conv=$shsubjdet2['number_type5_conv'];
// 				$numbtype26_conv=$shsubjdet2['number_type6_conv'];
				
// 				$gtnumty21pass=$shsubjdet2['number_type1_pass'];
// 				$gtnumty22pass=$shsubjdet2['number_type2_pass'];
// 				$gtnumty23pass=$shsubjdet2['number_type3_pass'];
// 				$gtnumty24pass=$shsubjdet2['number_type4_pass'];
// 				$gtnumty25pass=$shsubjdet2['number_type5_pass'];
// 				$gtnumty26pass=$shsubjdet2['number_type6_pass'];
				
// 				$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
// 				$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
// 				$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
// 				$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
// 				$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
// 				$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;

// 				$gtsubjfmark2=$shsubjdet2['borno_nine_ten_subfullmark'];
	
// 				$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
// 	$gtsdmrk3="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND pare='2' order by borin_subject_nine_ten_id desc limit 0,1";
				
// 				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
// 				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
// 				$subjectidpare=$shsubjdet3['borin_subject_nine_ten_id'];
// }
// else
// {
//  $gtsdmrk="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId'";
				
// 				$qgtsdmrk=$mysqli->query($gtsdmrk);
// 				$shsubjdet=$qgtsdmrk->fetch_assoc();
				
// 				$numbtype1_conv=$shsubjdet['number_type1_conv'];
// 				$numbtype2_conv=$shsubjdet['number_type2_conv'];
// 				$numbtype3_conv=$shsubjdet['number_type3_conv'];
// 				$numbtype4_conv=$shsubjdet['number_type4_conv'];
// 				$numbtype5_conv=$shsubjdet['number_type5_conv'];
// 				$numbtype6_conv=$shsubjdet['number_type6_conv'];
				
// 				$gtnumty1pass=$shsubjdet['number_type1_pass'];
// 				$gtnumty2pass=$shsubjdet['number_type2_pass'];
// 				$gtnumty3pass=$shsubjdet['number_type3_pass'];
// 				$gtnumty4pass=$shsubjdet['number_type4_pass'];
// 				$gtnumty5pass=$shsubjdet['number_type5_pass'];
// 				$gtnumty6pass=$shsubjdet['number_type6_pass'];
				
// 				$uncountable=$shsubjdet['uncountable'];

// 				$gtsubjfmark=$shsubjdet['borno_nine_ten_subfullmark'];
// }

// 		//------ get number type from query top -----------------------
// 		$gtctmarg3="select * from borno_class9_10_average_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_school_stud_group='$group1' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='0' order by borno_school_roll asc";
  
//     $qgtctmarg3=$mysqli->query($gtctmarg3);
// 	while($shgtctmarg3=$qgtctmarg3->fetch_assoc()){
		  
		
		
// 		$studinfoId=$shgtctmarg3['borno_student_info_id']; 
// 		$studName=$shgtctmarg3['borno_school_student_name']; 
// 		$studRoll=$shgtctmarg3['borno_school_roll']; 
		
// 		if($pare==1)
// 		{
			
// $delpare1="delete from borno_class9_10_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_school_stud_group='$group1' AND pare='1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
	

			
// 			//------ Bangla-----------------------
// 				$gtctmarg1="select * from borno_class9_10_average_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_school_stud_group='$group1' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND subject_pare=1";
  
//     $qgtctmarg1=$mysqli->query($gtctmarg1);
// 	$shgtctmarg1=$qgtctmarg1->fetch_assoc();
		
// 		if($shgtctmarg1['temp_res_number_type1']!="")
// 		{	
// 		$numbty11=$shgtctmarg1['temp_res_number_type1'];
// 		$convnumbty11=($numbty11/100) * $numbtype11_conv;
		
		
// 		$numbty12=$shgtctmarg1['temp_res_number_type2'];
// 		$convnumbty12=($numbty12/100)  * $numbtype12_conv;
		
		
// 		$numbty13=$shgtctmarg1['temp_res_number_type3']; 
// 		$convnumbty13=($numbty13/100)  * $numbtype13_conv;
		
		
// 		$numbty14=$shgtctmarg1['temp_res_number_type4']; 
// 		$convnumbty14=($numbty14/100)  * $numbtype14_conv;
		
		
// 		$numbty15=$shgtctmarg1['temp_res_number_type5'];
// 		$convnumbty15=($numbty15/100)  * $numbtype15_conv;
		
		
// 		$numbty16=$shgtctmarg1['temp_res_number_type6'];
// 		$convnumbty16=($numbty16/100)  * $numbtype16_conv;
		
		
// 	   $gttotalmrk1=($numbty11+$numbty12+$numbty13+$numbty14+$numbty15+$numbty16);
// 		$gtconvtotal1=($convnumbty11+$convnumbty12+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ Bangla-2-----------------------

// 				$gtctmarg2="select * from borno_class9_10_average_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_school_stud_group='$group1' AND borno_subject_nine_ten_id!='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND subject_pare=1";
  
//     $qgtctmarg2=$mysqli->query($gtctmarg2);
// 	$shgtctmarg2=$qgtctmarg2->fetch_assoc();
	
	
		
// 		if($shgtctmarg2['temp_res_number_type1']!="")
// 		{	
// 		$numbty21=$shgtctmarg2['temp_res_number_type1'];
// 		$convnumbty21=($numbty21/100) * $numbtype21_conv;
		
		
// 		$numbty22=$shgtctmarg2['temp_res_number_type2'];
// 		$convnumbty22=($numbty22/100)  * $numbtype22_conv;
		
		
// 		$numbty23=$shgtctmarg2['temp_res_number_type3']; 
// 		$convnumbty23=($numbty23/100)  * $numbtype23_conv;
		
		
// 		$numbty24=$shgtctmarg2['temp_res_number_type4']; 
// 		$convnumbty24=($numbty24/100)  * $numbtype24_conv;
		
		
// 		$numbty25=$shgtctmarg2['temp_res_number_type5'];
// 		$convnumbty25=($numbty25/100)  * $numbtype25_conv;
		
		
// 		$numbty26=$shgtctmarg2['temp_res_number_type6'];
// 		$convnumbty26=($numbty26/100)  * $numbtype26_conv;
		
		
// 	    $gttotalmrk2=($numbty21+$numbty22+$numbty23+$numbty24+$numbty25+$numbty26);
// 		$gtconvtota21=($convnumbty21+$convnumbty22+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ get number type from query top -----------------------	
// 	if($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=$numbty11+$numbty21;
// 		$numbty2=$numbty12+$numbty22;
// 		$numbty3=$numbty13+$numbty23;
// 		$numbty4=$numbty14+$numbty24;
// 		$numbty5=$numbty15+$numbty25;
// 		$numbty6=$numbty16+$numbty26;

// 		$convnumbty1=$convnumbty11+$convnumbty21;
// 		$convnumbty2=$convnumbty12+$convnumbty22;
// 		$convnumbty3=$convnumbty13+$convnumbty23;
// 		$convnumbty4=$convnumbty14+$convnumbty24;
// 		$convnumbty5=$convnumbty15+$convnumbty25;
// 		$convnumbty6=$convnumbty16+$convnumbty26;
		
// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']=="")
// 	{
// 		$numbty1=$numbty11+0;
// 		$numbty2=$numbty12+0;
// 		$numbty3=$numbty13+0;
// 		$numbty4=$numbty14+0;
// 		$numbty5=$numbty15+0;
// 		$numbty6=$numbty16+0;

// 		$convnumbty1=$convnumbty11+0;
// 		$convnumbty2=$convnumbty12+0;
// 		$convnumbty3=$convnumbty13+0;
// 		$convnumbty4=$convnumbty14+0;
// 		$convnumbty5=$convnumbty15+0;
// 		$convnumbty6=$convnumbty16+0;

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']=="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=0+$numbty21;
// 		$numbty2=0+$numbty22;
// 		$numbty3=0+$numbty23;
// 		$numbty4=0+$numbty24;
// 		$numbty5=0+$numbty25;
// 		$numbty6=0+$numbty26;
		
// 		$convnumbty1=0+$convnumbty21;
// 		$convnumbty2=0+$convnumbty22;
// 		$convnumbty3=0+$convnumbty23;
// 		$convnumbty4=0+$convnumbty24;
// 		$convnumbty5=0+$convnumbty25;
// 		$convnumbty6=0+$convnumbty26;
		

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 	 $gtsubjfmark;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 		}
		
// 		elseif($pare==2)
// 		{
			
// $delpare1="delete from borno_class9_10_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_school_stud_group='$group1' AND pare='2' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
	

			
// 			//------ Bangla-----------------------
// 				$gtctmarg1="select * from borno_class9_10_average_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_school_stud_group='$group1' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND subject_pare=2";
  
//     $qgtctmarg1=$mysqli->query($gtctmarg1);
// 	$shgtctmarg1=$qgtctmarg1->fetch_assoc();
		
// 		if($shgtctmarg1['temp_res_number_type1']!="")
// 		{	
// 		$numbty11=$shgtctmarg1['temp_res_number_type1'];
// 		$convnumbty11=($numbty11/100) * $numbtype11_conv;
		
		
// 		$numbty12=$shgtctmarg1['temp_res_number_type2'];
// 		$convnumbty12=($numbty12/100)  * $numbtype12_conv;
		
		
// 		$numbty13=$shgtctmarg1['temp_res_number_type3']; 
// 		$convnumbty13=($numbty13/100)  * $numbtype13_conv;
		
		
// 		$numbty14=$shgtctmarg1['temp_res_number_type4']; 
// 		$convnumbty14=($numbty14/100)  * $numbtype14_conv;
		
		
// 		$numbty15=$shgtctmarg1['temp_res_number_type5'];
// 		$convnumbty15=($numbty15/100)  * $numbtype15_conv;
		
		
// 		$numbty16=$shgtctmarg1['temp_res_number_type6'];
// 		$convnumbty16=($numbty16/100)  * $numbtype16_conv;
		
		
// 	   $gttotalmrk1=($numbty11+$numbty12+$numbty13+$numbty14+$numbty15+$numbty16);
// 		$gtconvtotal1=($convnumbty11+$convnumbty12+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ Bangla-2-----------------------

// 				$gtctmarg2="select * from borno_class9_10_average_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_school_stud_group='$group1' AND borno_subject_nine_ten_id!='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND subject_pare=2";
  
//     $qgtctmarg2=$mysqli->query($gtctmarg2);
// 	$shgtctmarg2=$qgtctmarg2->fetch_assoc();
	
	
		
// 		if($shgtctmarg2['temp_res_number_type1']!="")
// 		{	
// 		$numbty21=$shgtctmarg2['temp_res_number_type1'];
// 		$convnumbty21=($numbty21/100) * $numbtype21_conv;
		
		
// 		$numbty22=$shgtctmarg2['temp_res_number_type2'];
// 		$convnumbty22=($numbty22/100)  * $numbtype22_conv;
		
		
// 		$numbty23=$shgtctmarg2['temp_res_number_type3']; 
// 		$convnumbty23=($numbty23/100)  * $numbtype23_conv;
		
		
// 		$numbty24=$shgtctmarg2['temp_res_number_type4']; 
// 		$convnumbty24=($numbty24/100)  * $numbtype24_conv;
		
		
// 		$numbty25=$shgtctmarg2['temp_res_number_type5'];
// 		$convnumbty25=($numbty25/100)  * $numbtype25_conv;
		
		
// 		$numbty26=$shgtctmarg2['temp_res_number_type6'];
// 		$convnumbty26=($numbty26/100)  * $numbtype26_conv;
		
		
// 	    $gttotalmrk2=($numbty21+$numbty22+$numbty23+$numbty24+$numbty25+$numbty26);
// 		$gtconvtota21=($convnumbty21+$convnumbty22+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ get number type from query top -----------------------	
// 	if($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=$numbty11+$numbty21;
// 		$numbty2=$numbty12+$numbty22;
// 		$numbty3=$numbty13+$numbty23;
// 		$numbty4=$numbty14+$numbty24;
// 		$numbty5=$numbty15+$numbty25;
// 		$numbty6=$numbty16+$numbty26;

// 		$convnumbty1=$convnumbty11+$convnumbty21;
// 		$convnumbty2=$convnumbty12+$convnumbty22;
// 		$convnumbty3=$convnumbty13+$convnumbty23;
// 		$convnumbty4=$convnumbty14+$convnumbty24;
// 		$convnumbty5=$convnumbty15+$convnumbty25;
// 		$convnumbty6=$convnumbty16+$convnumbty26;
		
// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']=="")
// 	{
// 		$numbty1=$numbty11+0;
// 		$numbty2=$numbty12+0;
// 		$numbty3=$numbty13+0;
// 		$numbty4=$numbty14+0;
// 		$numbty5=$numbty15+0;
// 		$numbty6=$numbty16+0;

// 		$convnumbty1=$convnumbty11+0;
// 		$convnumbty2=$convnumbty12+0;
// 		$convnumbty3=$convnumbty13+0;
// 		$convnumbty4=$convnumbty14+0;
// 		$convnumbty5=$convnumbty15+0;
// 		$convnumbty6=$convnumbty16+0;

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']=="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=0+$numbty21;
// 		$numbty2=0+$numbty22;
// 		$numbty3=0+$numbty23;
// 		$numbty4=0+$numbty24;
// 		$numbty5=0+$numbty25;
// 		$numbty6=0+$numbty26;
		
// 		$convnumbty1=0+$convnumbty21;
// 		$convnumbty2=0+$convnumbty22;
// 		$convnumbty3=0+$convnumbty23;
// 		$convnumbty4=0+$convnumbty24;
// 		$convnumbty5=0+$convnumbty25;
// 		$convnumbty6=0+$convnumbty26;
		

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 		}
		
// 		else
// 		{
// 		$delpare1="delete from borno_class9_10_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_school_stud_group='$group1' AND borno_subject_nine_ten_id='$stusubjId'  AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
			
// 		$stu4thsub=$shgtctmarg3['stu4thsub'];	
// 		$numbty1=$shgtctmarg3['temp_res_number_type1'];
// 		$convnumbty1=($numbty1/100) * $numbtype1_conv;
		
		
// 		$numbty2=$shgtctmarg3['temp_res_number_type2'];
// 		$convnumbty2=($numbty2/100)  * $numbtype2_conv;
		
		
// 		$numbty3=$shgtctmarg3['temp_res_number_type3']; 
// 		$convnumbty3=($numbty3/100)  * $numbtype3_conv;
		
		
// 		$numbty4=$shgtctmarg3['temp_res_number_type4']; 
// 		$convnumbty4=($numbty4/100)  * $numbtype4_conv;
		
		
// 		$numbty5=$shgtctmarg3['temp_res_number_type5'];
// 		$convnumbty5=($numbty5/100)  * $numbtype5_conv;
		
		
// 		$numbty6=$shgtctmarg3['temp_res_number_type6'];
// 		$convnumbty6=($numbty6/100)  * $numbtype6_conv;
		
		
// 	    $gttotalmrk=($numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6);
// 		$gtconvtotal=($convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6);
		
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 		}
		

// 	//------------------------------------  Greade Point (GPA) ----------------------------------------------------------------------	
// 		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom1) { $finalGpa=$gtgrtpoint1; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom2) { $finalGpa=$gtgrtpoint2; }
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom3) { $finalGpa=$gtgrtpoint3; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom4) { $finalGpa=$gtgrtpoint4; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom5) { $finalGpa=$gtgrtpoint5; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom6) { $finalGpa=$gtgrtpoint6; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom7) { $finalGpa=$gtgrtpoint7; } 
		
// 		else { $finalGpa=0; } 
		
		
		
// // ------------------------ End GPA --------------------------------------------------------------	

// //----------------------------- Latter Grade ------------------------------------------------------------------

			
		
// 		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom1) { $finallg=$gtlettergrd1; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom2) { $finallg=$gtlettergrd2; }
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom3) { $finallg=$gtlettergrd3; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom4) { $finallg=$gtlettergrd4; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom5) { $finallg=$gtlettergrd5; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom6) { $finallg=$gtlettergrd6; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6passt AND $markinpers>=$gtmarksfrom7) { $finallg=$gtlettergrd7; } 
		
// 		else { $finallg='F'; } 
		
		
	

// // ------------------------ Eng lg --------------------------------------------------------------			
// if($pare==1)
// {
//   $insfmark="INSERT INTO `borno_class9_10_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_nine_ten_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`six_eight_4th_subject`,`uncountable`,`pare`,`borno_school_stud_group`,`stu4thsub`,`heightsubjt1`,`heightsubjt2`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','0','$uncountable','$pare','$group1','0','0','0')";
	
// $quygeneralsubmark=$mysqli->query($insfmark);
// }
// elseif($pare==2)
// {
//  $insfmark="INSERT INTO `borno_class9_10_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_nine_ten_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`six_eight_4th_subject`,`uncountable`,`pare`,`borno_school_stud_group`,`stu4thsub`,`heightsubjt1`,`heightsubjt2`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','0','$uncountable','$pare','$group1','0','0','0')";
		
// $quygeneralsubmark=$mysqli->query($insfmark);
// }
// else
// {
//  $insfmark="INSERT INTO `borno_class9_10_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_nine_ten_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`six_eight_4th_subject`,`uncountable`,`pare`,`borno_school_stud_group`,`stu4thsub`,`heightsubjt1`,`heightsubjt2`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa','$finallg','0','$uncountable','$pare','$group1','$stu4thsub','0','0')";
		
// $quygeneralsubmark=$mysqli->query($insfmark);
// }

// 	}
// }

// }
// //------------------------------Nine Ten End ---------------------------


// //---------------------Six to Eight Start------------------------------------
// elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
// {
// 		$gtctmarg="select * from borno_class6_8_avg_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' group by subject_id_six_eight asc";
  
//     $qgtctmarg=$mysqli->query($gtctmarg);
// 	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
// 		$stusubjId=$shgtctmarg['subject_id_six_eight']; 
// 		$pare=$shgtctmarg['pare'];
	
		
// if($pare==1)
// {
//  $gtsdmrk1="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
				
// 				$qgtsdmrk1=$mysqli->query($gtsdmrk1);
// 				$shsubjdet1=$qgtsdmrk1->fetch_assoc();
				
// 				$numbtype11_conv=$shsubjdet1['number_type1_conv'];
// 				$numbtype12_conv=$shsubjdet1['number_type2_conv'];
// 				$numbtype13_conv=$shsubjdet1['number_type3_conv'];
// 				$numbtype14_conv=$shsubjdet1['number_type4_conv'];
// 				$numbtype15_conv=$shsubjdet1['number_type5_conv'];
// 				$numbtype16_conv=$shsubjdet1['number_type6_conv'];
				
// 				$gtnumty11pass=$shsubjdet1['number_type1_pass'];
// 				$gtnumty12pass=$shsubjdet1['number_type2_pass'];
// 				$gtnumty13pass=$shsubjdet1['number_type3_pass'];
// 				$gtnumty14pass=$shsubjdet1['number_type4_pass'];
// 				$gtnumty15pass=$shsubjdet1['number_type5_pass'];
// 				$gtnumty16pass=$shsubjdet1['number_type6_pass'];
			
// 	$gtsubjfm1="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId'";
// 	$qggtsubjfm1=$mysqli->query($gtsubjfm1);
// 	$shgtsubjfm1=$qggtsubjfm1->fetch_assoc();
// 	$gtsubjfmark1=$shgtsubjfm1['sub_six_eight_fullmark'];
	
// 	$gtpare1="select * from borno_subject_six_eight where subject_id_six_eight!='$stusubjId' AND six_eight_subject_pare=1";
// 	$qggtpare1=$mysqli->query($gtpare1);
// 	$shqggtpare1=$qggtpare1->fetch_assoc();
// 	$stusubjId1=$shqggtpare1['subject_id_six_eight'];	

//  $gtsdmrk2="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId1'";
				
// 				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
// 				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
// 				$numbtype21_conv=$shsubjdet2['number_type1_conv'];
// 				$numbtype22_conv=$shsubjdet2['number_type2_conv'];
// 				$numbtype23_conv=$shsubjdet2['number_type3_conv'];
// 				$numbtype24_conv=$shsubjdet2['number_type4_conv'];
// 				$numbtype25_conv=$shsubjdet2['number_type5_conv'];
// 				$numbtype26_conv=$shsubjdet2['number_type6_conv'];
				
// 				$gtnumty21pass=$shsubjdet2['number_type1_pass'];
// 				$gtnumty22pass=$shsubjdet2['number_type2_pass'];
// 				$gtnumty23pass=$shsubjdet2['number_type3_pass'];
// 				$gtnumty24pass=$shsubjdet2['number_type4_pass'];
// 				$gtnumty25pass=$shsubjdet2['number_type5_pass'];
// 				$gtnumty26pass=$shsubjdet2['number_type6_pass'];
				
// 				$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
// 				$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
// 				$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
// 				$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
// 				$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
// 				$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
					
				
				
// 	$gtsubjfm2="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId1'";
	
// 	$qggtsubjfm2=$mysqli->query($gtsubjfm2);
// 	$shgtsubjfm2=$qggtsubjfm2->fetch_assoc();
	
// 	$gtsubjfmark2=$shgtsubjfm2['sub_six_eight_fullmark'];
	
// 	$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
// 	$gtsdmrk3="select * from borno_subject_six_eight where six_eight_subject_pare='1' order by subject_id_six_eight desc limit 0,1";
				
// 				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
// 				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
// 				$subjectidpare=$shsubjdet3['subject_id_six_eight'];
// }
// elseif($pare==2)
// {
//  $gtsdmrk1="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
				
// 				$qgtsdmrk1=$mysqli->query($gtsdmrk1);
// 				$shsubjdet1=$qgtsdmrk1->fetch_assoc();
				
// 				$numbtype11_conv=$shsubjdet1['number_type1_conv'];
// 				$numbtype12_conv=$shsubjdet1['number_type2_conv'];
// 				$numbtype13_conv=$shsubjdet1['number_type3_conv'];
// 				$numbtype14_conv=$shsubjdet1['number_type4_conv'];
// 				$numbtype15_conv=$shsubjdet1['number_type5_conv'];
// 				$numbtype16_conv=$shsubjdet1['number_type6_conv'];
				
// 				$gtnumty11pass=$shsubjdet1['number_type1_pass'];
// 				$gtnumty12pass=$shsubjdet1['number_type2_pass'];
// 				$gtnumty13pass=$shsubjdet1['number_type3_pass'];
// 				$gtnumty14pass=$shsubjdet1['number_type4_pass'];
// 				$gtnumty15pass=$shsubjdet1['number_type5_pass'];
// 				$gtnumty16pass=$shsubjdet1['number_type6_pass'];
			
// 	$gtsubjfm1="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId'";
// 	$qggtsubjfm1=$mysqli->query($gtsubjfm1);
// 	$shgtsubjfm1=$qggtsubjfm1->fetch_assoc();
// 	$gtsubjfmark1=$shgtsubjfm1['sub_six_eight_fullmark'];
	
// 	$gtpare1="select * from borno_subject_six_eight where subject_id_six_eight!='$stusubjId' AND six_eight_subject_pare=2";
// 	$qggtpare1=$mysqli->query($gtpare1);
// 	$shqggtpare1=$qggtpare1->fetch_assoc();
// 	$stusubjId1=$shqggtpare1['subject_id_six_eight'];	

//  $gtsdmrk2="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId1'";
				
// 				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
// 				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
// 				$numbtype21_conv=$shsubjdet2['number_type1_conv'];
// 				$numbtype22_conv=$shsubjdet2['number_type2_conv'];
// 				$numbtype23_conv=$shsubjdet2['number_type3_conv'];
// 				$numbtype24_conv=$shsubjdet2['number_type4_conv'];
// 				$numbtype25_conv=$shsubjdet2['number_type5_conv'];
// 				$numbtype26_conv=$shsubjdet2['number_type6_conv'];
				
// 				$gtnumty21pass=$shsubjdet2['number_type1_pass'];
// 				$gtnumty22pass=$shsubjdet2['number_type2_pass'];
// 				$gtnumty23pass=$shsubjdet2['number_type3_pass'];
// 				$gtnumty24pass=$shsubjdet2['number_type4_pass'];
// 				$gtnumty25pass=$shsubjdet2['number_type5_pass'];
// 				$gtnumty26pass=$shsubjdet2['number_type6_pass'];
				
// 				$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
// 				$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
// 				$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
// 				$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
// 				$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
// 				$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
					
				
				
// 	$gtsubjfm2="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId1'";
	
// 	$qggtsubjfm2=$mysqli->query($gtsubjfm2);
// 	$shgtsubjfm2=$qggtsubjfm2->fetch_assoc();
	
// 	$gtsubjfmark2=$shgtsubjfm2['sub_six_eight_fullmark'];
	
// 	$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
// 	$gtsdmrk3="select * from borno_subject_six_eight where six_eight_subject_pare='2' order by subject_id_six_eight desc limit 0,1";
				
// 				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
// 				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
// 				$subjectidpare=$shsubjdet3['subject_id_six_eight'];
// }
// else
// {
//  $gtsdmrk="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
				
// 				$qgtsdmrk=$mysqli->query($gtsdmrk);
// 				$shsubjdet=$qgtsdmrk->fetch_assoc();
				
// 				$numbtype1_conv=$shsubjdet['number_type1_conv'];
// 				$numbtype2_conv=$shsubjdet['number_type2_conv'];
// 				$numbtype3_conv=$shsubjdet['number_type3_conv'];
// 				$numbtype4_conv=$shsubjdet['number_type4_conv'];
// 				$numbtype5_conv=$shsubjdet['number_type5_conv'];
// 				$numbtype6_conv=$shsubjdet['number_type6_conv'];
				
// 				$gtnumty1pass=$shsubjdet['number_type1_pass'];
// 				$gtnumty2pass=$shsubjdet['number_type2_pass'];
// 				$gtnumty3pass=$shsubjdet['number_type3_pass'];
// 				$gtnumty4pass=$shsubjdet['number_type4_pass'];
// 				$gtnumty5pass=$shsubjdet['number_type5_pass'];
// 				$gtnumty6pass=$shsubjdet['number_type6_pass'];
				
// 				$uncountable=$shsubjdet['uncountable'];
// 				$sub4th=$shsubjdet['six_eight_4th_subject'];
			
				
				
// 	$gtsubjfm="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId'";
	
// 	$qggtsubjfm=$mysqli->query($gtsubjfm);
// 	$shgtsubjfm=$qggtsubjfm->fetch_assoc();
	
// 	$gtsubjfmark=$shgtsubjfm['sub_six_eight_fullmark'];
// }

// 		//------ get number type from query top -----------------------
// 		$gtctmarg3="select * from borno_class6_8_avg_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId' AND borno_result_term_id='0' order by borno_school_roll asc";
  
//     $qgtctmarg3=$mysqli->query($gtctmarg3);
// 	while($shgtctmarg3=$qgtctmarg3->fetch_assoc()){
		  
		
		
// 		$studinfoId=$shgtctmarg3['borno_student_info_id']; 
// 		$studName=$shgtctmarg3['borno_school_student_name']; 
// 		$studRoll=$shgtctmarg3['borno_school_roll']; 
		
// 		if($pare==1)
// 		{
			
// $delpare1="delete from borno_class6_8_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND pare='1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
	

			
// 			//------ Bangla-----------------------
// 				$gtctmarg1="select * from borno_class6_8_avg_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND pare=1";
  
//     $qgtctmarg1=$mysqli->query($gtctmarg1);
// 	$shgtctmarg1=$qgtctmarg1->fetch_assoc();
		
// 		if($shgtctmarg1['temp_res_number_type1']!="")
// 		{	
// 		$numbty11=$shgtctmarg1['temp_res_number_type1'];
// 		$convnumbty11=($numbty11/100) * $numbtype11_conv;
		
		
// 		$numbty12=$shgtctmarg1['res_number_type2'];
// 		$convnumbty12=($numbty12/100)  * $numbtype12_conv;
		
		
// 		$numbty13=$shgtctmarg1['res_number_type3']; 
// 		$convnumbty13=($numbty13/100)  * $numbtype13_conv;
		
		
// 		$numbty14=$shgtctmarg1['res_number_type4']; 
// 		$convnumbty14=($numbty14/100)  * $numbtype14_conv;
		
		
// 		$numbty15=$shgtctmarg1['res_number_type5'];
// 		$convnumbty15=($numbty15/100)  * $numbtype15_conv;
		
		
// 		$numbty16=$shgtctmarg1['res_number_type6'];
// 		$convnumbty16=($numbty16/100)  * $numbtype16_conv;
		
		
// 	   $gttotalmrk1=($numbty11+$numbty12+$numbty13+$numbty14+$numbty15+$numbty16);
// 		$gtconvtotal1=($convnumbty11+$convnumbty12+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ Bangla-2-----------------------

// 				$gtctmarg2="select * from borno_class6_8_avg_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND subject_id_six_eight!='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND pare=1";
  
//     $qgtctmarg2=$mysqli->query($gtctmarg2);
// 	$shgtctmarg2=$qgtctmarg2->fetch_assoc();
	
	
		
// 		if($shgtctmarg2['temp_res_number_type1']!="")
// 		{	
// 		$numbty21=$shgtctmarg2['temp_res_number_type1'];
// 		$convnumbty21=($numbty21/100) * $numbtype21_conv;
		
		
// 		$numbty22=$shgtctmarg2['res_number_type2'];
// 		$convnumbty22=($numbty22/100)  * $numbtype22_conv;
		
		
// 		$numbty23=$shgtctmarg2['res_number_type3']; 
// 		$convnumbty23=($numbty23/100)  * $numbtype23_conv;
		
		
// 		$numbty24=$shgtctmarg2['res_number_type4']; 
// 		$convnumbty24=($numbty24/100)  * $numbtype24_conv;
		
		
// 		$numbty25=$shgtctmarg2['res_number_type5'];
// 		$convnumbty25=($numbty25/100)  * $numbtype25_conv;
		
		
// 		$numbty26=$shgtctmarg2['res_number_type6'];
// 		$convnumbty26=($numbty26/100)  * $numbtype26_conv;
		
		
// 	    $gttotalmrk2=($numbty21+$numbty22+$numbty23+$numbty24+$numbty25+$numbty26);
// 		$gtconvtota21=($convnumbty21+$convnumbty22+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ get number type from query top -----------------------	
// 	if($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=$numbty11+$numbty21;
// 		$numbty2=$numbty12+$numbty22;
// 		$numbty3=$numbty13+$numbty23;
// 		$numbty4=$numbty14+$numbty24;
// 		$numbty5=$numbty15+$numbty25;
// 		$numbty6=$numbty16+$numbty26;

// 		$convnumbty1=$convnumbty11+$convnumbty21;
// 		$convnumbty2=$convnumbty12+$convnumbty22;
// 		$convnumbty3=$convnumbty13+$convnumbty23;
// 		$convnumbty4=$convnumbty14+$convnumbty24;
// 		$convnumbty5=$convnumbty15+$convnumbty25;
// 		$convnumbty6=$convnumbty16+$convnumbty26;
		
// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']=="")
// 	{
// 		$numbty1=$numbty11+0;
// 		$numbty2=$numbty12+0;
// 		$numbty3=$numbty13+0;
// 		$numbty4=$numbty14+0;
// 		$numbty5=$numbty15+0;
// 		$numbty6=$numbty16+0;

// 		$convnumbty1=$convnumbty11+0;
// 		$convnumbty2=$convnumbty12+0;
// 		$convnumbty3=$convnumbty13+0;
// 		$convnumbty4=$convnumbty14+0;
// 		$convnumbty5=$convnumbty15+0;
// 		$convnumbty6=$convnumbty16+0;

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']=="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=0+$numbty21;
// 		$numbty2=0+$numbty22;
// 		$numbty3=0+$numbty23;
// 		$numbty4=0+$numbty24;
// 		$numbty5=0+$numbty25;
// 		$numbty6=0+$numbty26;
		
// 		$convnumbty1=0+$convnumbty21;
// 		$convnumbty2=0+$convnumbty22;
// 		$convnumbty3=0+$convnumbty23;
// 		$convnumbty4=0+$convnumbty24;
// 		$convnumbty5=0+$convnumbty25;
// 		$convnumbty6=0+$convnumbty26;
		

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 	 $gtsubjfmark;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 		}
		
// 		elseif($pare==2)
// 		{
			
// $delpare1="delete from borno_class6_8_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND pare='2' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
	

			
// 			//------ Bangla-----------------------
// 				$gtctmarg1="select * from borno_class6_8_avg_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND pare=2";
  
//     $qgtctmarg1=$mysqli->query($gtctmarg1);
// 	$shgtctmarg1=$qgtctmarg1->fetch_assoc();
		
// 		if($shgtctmarg1['temp_res_number_type1']!="")
// 		{	
// 		$numbty11=$shgtctmarg1['temp_res_number_type1'];
// 		$convnumbty11=($numbty11/100) * $numbtype11_conv;
		
		
// 		$numbty12=$shgtctmarg1['res_number_type2'];
// 		$convnumbty12=($numbty12/100)  * $numbtype12_conv;
		
		
// 		$numbty13=$shgtctmarg1['res_number_type3']; 
// 		$convnumbty13=($numbty13/100)  * $numbtype13_conv;
		
		
// 		$numbty14=$shgtctmarg1['res_number_type4']; 
// 		$convnumbty14=($numbty14/100)  * $numbtype14_conv;
		
		
// 		$numbty15=$shgtctmarg1['res_number_type5'];
// 		$convnumbty15=($numbty15/100)  * $numbtype15_conv;
		
		
// 		$numbty16=$shgtctmarg1['res_number_type6'];
// 		$convnumbty16=($numbty16/100)  * $numbtype16_conv;
		
		
// 	   $gttotalmrk1=($numbty11+$numbty12+$numbty13+$numbty14+$numbty15+$numbty16);
// 		$gtconvtotal1=($convnumbty11+$convnumbty12+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ Bangla-2-----------------------

// 				$gtctmarg2="select * from borno_class6_8_avg_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND subject_id_six_eight!='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND pare=2";
  
//     $qgtctmarg2=$mysqli->query($gtctmarg2);
// 	$shgtctmarg2=$qgtctmarg2->fetch_assoc();
	
	
		
// 		if($shgtctmarg2['temp_res_number_type1']!="")
// 		{	
// 		$numbty21=$shgtctmarg2['temp_res_number_type1'];
// 		$convnumbty21=($numbty21/100) * $numbtype21_conv;
		
		
// 		$numbty22=$shgtctmarg2['res_number_type2'];
// 		$convnumbty22=($numbty22/100)  * $numbtype22_conv;
		
		
// 		$numbty23=$shgtctmarg2['res_number_type3']; 
// 		$convnumbty23=($numbty23/100)  * $numbtype23_conv;
		
		
// 		$numbty24=$shgtctmarg2['res_number_type4']; 
// 		$convnumbty24=($numbty24/100)  * $numbtype24_conv;
		
		
// 		$numbty25=$shgtctmarg2['res_number_type5'];
// 		$convnumbty25=($numbty25/100)  * $numbtype25_conv;
		
		
// 		$numbty26=$shgtctmarg2['res_number_type6'];
// 		$convnumbty26=($numbty26/100)  * $numbtype26_conv;
		
		
// 	    $gttotalmrk2=($numbty21+$numbty22+$numbty23+$numbty24+$numbty25+$numbty26);
// 		$gtconvtota21=($convnumbty21+$convnumbty22+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ get number type from query top -----------------------	
// 	if($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=$numbty11+$numbty21;
// 		$numbty2=$numbty12+$numbty22;
// 		$numbty3=$numbty13+$numbty23;
// 		$numbty4=$numbty14+$numbty24;
// 		$numbty5=$numbty15+$numbty25;
// 		$numbty6=$numbty16+$numbty26;

// 		$convnumbty1=$convnumbty11+$convnumbty21;
// 		$convnumbty2=$convnumbty12+$convnumbty22;
// 		$convnumbty3=$convnumbty13+$convnumbty23;
// 		$convnumbty4=$convnumbty14+$convnumbty24;
// 		$convnumbty5=$convnumbty15+$convnumbty25;
// 		$convnumbty6=$convnumbty16+$convnumbty26;
		
// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']=="")
// 	{
// 		$numbty1=$numbty11+0;
// 		$numbty2=$numbty12+0;
// 		$numbty3=$numbty13+0;
// 		$numbty4=$numbty14+0;
// 		$numbty5=$numbty15+0;
// 		$numbty6=$numbty16+0;

// 		$convnumbty1=$convnumbty11+0;
// 		$convnumbty2=$convnumbty12+0;
// 		$convnumbty3=$convnumbty13+0;
// 		$convnumbty4=$convnumbty14+0;
// 		$convnumbty5=$convnumbty15+0;
// 		$convnumbty6=$convnumbty16+0;

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']=="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=0+$numbty21;
// 		$numbty2=0+$numbty22;
// 		$numbty3=0+$numbty23;
// 		$numbty4=0+$numbty24;
// 		$numbty5=0+$numbty25;
// 		$numbty6=0+$numbty26;
		
// 		$convnumbty1=0+$convnumbty21;
// 		$convnumbty2=0+$convnumbty22;
// 		$convnumbty3=0+$convnumbty23;
// 		$convnumbty4=0+$convnumbty24;
// 		$convnumbty5=0+$convnumbty25;
// 		$convnumbty6=0+$convnumbty26;
		

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 		}
		
// 		else
// 		{
// 		$delpare1="delete from borno_class6_8_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND subject_id_six_eight='$stusubjId'  AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
			
			
// 		$numbty1=$shgtctmarg3['temp_res_number_type1'];
// 		$convnumbty1=($numbty1/100) * $numbtype1_conv;
		
		
// 		$numbty2=$shgtctmarg3['res_number_type2'];
// 		$convnumbty2=($numbty2/100)  * $numbtype2_conv;
		
		
// 		$numbty3=$shgtctmarg3['res_number_type3']; 
// 		$convnumbty3=($numbty3/100)  * $numbtype3_conv;
		
		
// 		$numbty4=$shgtctmarg3['res_number_type4']; 
// 		$convnumbty4=($numbty4/100)  * $numbtype4_conv;
		
		
// 		$numbty5=$shgtctmarg3['res_number_type5'];
// 		$convnumbty5=($numbty5/100)  * $numbtype5_conv;
		
		
// 		$numbty6=$shgtctmarg3['res_number_type6'];
// 		$convnumbty6=($numbty6/100)  * $numbtype6_conv;
		
		
// 	    $gttotalmrk=($numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6);
// 		$gtconvtotal=($convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6);
		
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 		}
		

// 	//------------------------------------  Greade Point (GPA) ----------------------------------------------------------------------	
// 		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom1) { $finalGpa=$gtgrtpoint1; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom2) { $finalGpa=$gtgrtpoint2; }
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom3) { $finalGpa=$gtgrtpoint3; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom4) { $finalGpa=$gtgrtpoint4; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom5) { $finalGpa=$gtgrtpoint5; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom6) { $finalGpa=$gtgrtpoint6; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom7) { $finalGpa=$gtgrtpoint7; } 
		
// 		else { $finalGpa=0; } 
		
		
		
// // ------------------------ End GPA --------------------------------------------------------------	

// //----------------------------- Latter Grade ------------------------------------------------------------------

			
		
// 		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom1) { $finallg=$gtlettergrd1; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom2) { $finallg=$gtlettergrd2; }
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom3) { $finallg=$gtlettergrd3; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom4) { $finallg=$gtlettergrd4; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom5) { $finallg=$gtlettergrd5; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom6) { $finallg=$gtlettergrd6; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6passt AND $markinpers>=$gtmarksfrom7) { $finallg=$gtlettergrd7; } 
		
// 		else { $finallg='F'; } 
		
		
	

// // ------------------------ Eng lg --------------------------------------------------------------			
// if($pare==1)
// {
//   $insfmark="INSERT INTO `borno_class6_8_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `subject_id_six_eight`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$pare','0','0')";

	
// $quygeneralsubmark=$mysqli->query($insfmark);
// }

			
// elseif($pare==2)
// {
//  $insfmark="INSERT INTO `borno_class6_8_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `subject_id_six_eight`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$pare','0','0')";
		
// $quygeneralsubmark=$mysqli->query($insfmark);
// }
// else
// {
//  $insfmark="INSERT INTO `borno_class6_8_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `subject_id_six_eight`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa','$finallg','$pare','$sub4th','$uncountable')";
		
// $quygeneralsubmark=$mysqli->query($insfmark);
// }


// }
// }

// }
// //----------------------------Six to Eight End------------------------------

// //----------------------------Play To Five Start-----------------------------
// else
// {
// 		$gtctmarg="select * from borno_class1_avgtemp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' group by borno_result_subject_id asc";
  
//     $qgtctmarg=$mysqli->query($gtctmarg);
// 	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
// 		$stusubjId=$shgtctmarg['borno_result_subject_id']; 
// 		$pare=$shgtctmarg['pare'];
	
		
// if($pare==1)
// {
//  $gtsdmrk1="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId' AND pare='1'";
				
// 				$qgtsdmrk1=$mysqli->query($gtsdmrk1);
// 				$shsubjdet1=$qgtsdmrk1->fetch_assoc();
				
// 				$numbtype11_conv=$shsubjdet1['number_type1_conv'];
// 				$numbtype12_conv=$shsubjdet1['number_type2_conv'];
// 				$numbtype13_conv=$shsubjdet1['number_type3_conv'];
// 				$numbtype14_conv=$shsubjdet1['number_type4_conv'];
// 				$numbtype15_conv=$shsubjdet1['number_type5_conv'];
// 				$numbtype16_conv=$shsubjdet1['number_type6_conv'];
				
// 				$gtnumty11pass=$shsubjdet1['number_type1_pass'];
// 				$gtnumty12pass=$shsubjdet1['number_type2_pass'];
// 				$gtnumty13pass=$shsubjdet1['number_type3_pass'];
// 				$gtnumty14pass=$shsubjdet1['number_type4_pass'];
// 				$gtnumty15pass=$shsubjdet1['number_type5_pass'];
// 				$gtnumty16pass=$shsubjdet1['number_type6_pass'];
			
				
				
// 	$gtsubjfm1="select * from borno_result_subject where borno_result_subject_id='$stusubjId'";
	
// 	$qggtsubjfm1=$mysqli->query($gtsubjfm1);
// 	$shgtsubjfm1=$qggtsubjfm1->fetch_assoc();
	
// 	$gtsubjfmark1=$shgtsubjfm1['borno_school_subject_fullmark'];

//  $gtsdmrk2="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_result_subject_id!='$stusubjId' AND pare='1'";
				
// 				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
// 				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
// 				$stusubjId1=$shsubjdet2['borno_result_subject_id'];
// 				$numbtype21_conv=$shsubjdet2['number_type1_conv'];
// 				$numbtype22_conv=$shsubjdet2['number_type2_conv'];
// 				$numbtype23_conv=$shsubjdet2['number_type3_conv'];
// 				$numbtype24_conv=$shsubjdet2['number_type4_conv'];
// 				$numbtype25_conv=$shsubjdet2['number_type5_conv'];
// 				$numbtype26_conv=$shsubjdet2['number_type6_conv'];
				
// 				$gtnumty21pass=$shsubjdet2['number_type1_pass'];
// 				$gtnumty22pass=$shsubjdet2['number_type2_pass'];
// 				$gtnumty23pass=$shsubjdet2['number_type3_pass'];
// 				$gtnumty24pass=$shsubjdet2['number_type4_pass'];
// 				$gtnumty25pass=$shsubjdet2['number_type5_pass'];
// 				$gtnumty26pass=$shsubjdet2['number_type6_pass'];
				
// 				$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
// 				$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
// 				$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
// 				$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
// 				$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
// 				$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
					
				
				
// 	$gtsubjfm2="select * from borno_result_subject where borno_result_subject_id='$stusubjId1'";
	
// 	$qggtsubjfm2=$mysqli->query($gtsubjfm2);
// 	$shgtsubjfm2=$qggtsubjfm2->fetch_assoc();
	
// 	$gtsubjfmark2=$shgtsubjfm2['borno_school_subject_fullmark'];
	
// 	$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
// 	$gtsdmrk3="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND pare='1' order by borno_result_subject_id desc limit 0,1";
				
// 				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
// 				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
// 				$subjectidpare=$shsubjdet3['borno_result_subject_id'];
// }
// elseif($pare==2)
// {
//  $gtsdmrk1="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId' AND pare='2'";
				
// 				$qgtsdmrk1=$mysqli->query($gtsdmrk1);
// 				$shsubjdet1=$qgtsdmrk1->fetch_assoc();
				
// 				$numbtype11_conv=$shsubjdet1['number_type1_conv'];
// 				$numbtype12_conv=$shsubjdet1['number_type2_conv'];
// 				$numbtype13_conv=$shsubjdet1['number_type3_conv'];
// 				$numbtype14_conv=$shsubjdet1['number_type4_conv'];
// 				$numbtype15_conv=$shsubjdet1['number_type5_conv'];
// 				$numbtype16_conv=$shsubjdet1['number_type6_conv'];
				
// 				$gtnumty11pass=$shsubjdet1['number_type1_pass'];
// 				$gtnumty12pass=$shsubjdet1['number_type2_pass'];
// 				$gtnumty13pass=$shsubjdet1['number_type3_pass'];
// 				$gtnumty14pass=$shsubjdet1['number_type4_pass'];
// 				$gtnumty15pass=$shsubjdet1['number_type5_pass'];
// 				$gtnumty16pass=$shsubjdet1['number_type6_pass'];
			
				
				
// 	$gtsubjfm1="select * from borno_result_subject where borno_result_subject_id='$stusubjId'";
	
// 	$qggtsubjfm1=$mysqli->query($gtsubjfm1);
// 	$shgtsubjfm1=$qggtsubjfm1->fetch_assoc();
	
// 	$gtsubjfmark1=$shgtsubjfm1['borno_school_subject_fullmark'];

//  $gtsdmrk2="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_result_subject_id!='$stusubjId' AND pare='2'";
				
// 				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
// 				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
// 				$stusubjId1=$shsubjdet2['borno_result_subject_id'];
// 				$numbtype21_conv=$shsubjdet2['number_type1_conv'];
// 				$numbtype22_conv=$shsubjdet2['number_type2_conv'];
// 				$numbtype23_conv=$shsubjdet2['number_type3_conv'];
// 				$numbtype24_conv=$shsubjdet2['number_type4_conv'];
// 				$numbtype25_conv=$shsubjdet2['number_type5_conv'];
// 				$numbtype26_conv=$shsubjdet2['number_type6_conv'];
				
// 				$gtnumty21pass=$shsubjdet2['number_type1_pass'];
// 				$gtnumty22pass=$shsubjdet2['number_type2_pass'];
// 				$gtnumty23pass=$shsubjdet2['number_type3_pass'];
// 				$gtnumty24pass=$shsubjdet2['number_type4_pass'];
// 				$gtnumty25pass=$shsubjdet2['number_type5_pass'];
// 				$gtnumty26pass=$shsubjdet2['number_type6_pass'];
				
// 				$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
// 				$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
// 				$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
// 				$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
// 				$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
// 				$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
					
				
				
// 	$gtsubjfm2="select * from borno_result_subject where borno_result_subject_id='$stusubjId1'";
	
// 	$qggtsubjfm2=$mysqli->query($gtsubjfm2);
// 	$shgtsubjfm2=$qggtsubjfm2->fetch_assoc();
	
// 	$gtsubjfmark2=$shgtsubjfm2['borno_school_subject_fullmark'];
	
// 	$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
// 	$gtsdmrk3="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND pare='2' order by borno_result_subject_id desc limit 0,1";
				
// 				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
// 				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
// 				$subjectidpare=$shsubjdet3['borno_result_subject_id'];
// }
// else
// {
//  $gtsdmrk="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
				
// 				$qgtsdmrk=$mysqli->query($gtsdmrk);
// 				$shsubjdet=$qgtsdmrk->fetch_assoc();
				
// 				$numbtype1_conv=$shsubjdet['number_type1_conv'];
// 				$numbtype2_conv=$shsubjdet['number_type2_conv'];
// 				$numbtype3_conv=$shsubjdet['number_type3_conv'];
// 				$numbtype4_conv=$shsubjdet['number_type4_conv'];
// 				$numbtype5_conv=$shsubjdet['number_type5_conv'];
// 				$numbtype6_conv=$shsubjdet['number_type6_conv'];
				
// 				$gtnumty1pass=$shsubjdet['number_type1_pass'];
// 				$gtnumty2pass=$shsubjdet['number_type2_pass'];
// 				$gtnumty3pass=$shsubjdet['number_type3_pass'];
// 				$gtnumty4pass=$shsubjdet['number_type4_pass'];
// 				$gtnumty5pass=$shsubjdet['number_type5_pass'];
// 				$gtnumty6pass=$shsubjdet['number_type6_pass'];
				
// 				$sunstatus=$shsubjdet['subject_type'];
			
				
				
// 	$gtsubjfm="select * from borno_result_subject where borno_result_subject_id='$stusubjId'";
	
// 	$qggtsubjfm=$mysqli->query($gtsubjfm);
// 	$shgtsubjfm=$qggtsubjfm->fetch_assoc();
	
// 	$gtsubjfmark=$shgtsubjfm['borno_school_subject_fullmark'];
// }

// 		//------ get number type from query top -----------------------
// 		$gtctmarg3="select * from borno_class1_avgtemp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='0' order by borno_school_roll asc";
  
//     $qgtctmarg3=$mysqli->query($gtctmarg3);
// 	while($shgtctmarg3=$qgtctmarg3->fetch_assoc()){
		  
		
		
// 		$studinfoId=$shgtctmarg3['borno_student_info_id']; 
// 		$studName=$shgtctmarg3['borno_school_student_name']; 
// 		$studRoll=$shgtctmarg3['borno_school_roll']; 
		
// 		if($pare==1)
// 		{
			
// $delpare1="delete from borno_play_five_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND pare='1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
	

			
// 			//------ Bangla-----------------------
// 				$gtctmarg1="select * from borno_class1_avgtemp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND pare=1";
  
//     $qgtctmarg1=$mysqli->query($gtctmarg1);
// 	$shgtctmarg1=$qgtctmarg1->fetch_assoc();
		
// 		if($shgtctmarg1['temp_res_number_type1']!="")
// 		{	
// 		$numbty11=$shgtctmarg1['temp_res_number_type1'];
// 		$convnumbty11=($numbty11/100) * $numbtype11_conv;
		
		
// 		$numbty12=$shgtctmarg1['temp_res_number_type2'];
// 		$convnumbty12=($numbty12/100)  * $numbtype12_conv;
		
		
// 		$numbty13=$shgtctmarg1['temp_res_number_type3']; 
// 		$convnumbty13=($numbty13/100)  * $numbtype13_conv;
		
		
// 		$numbty14=$shgtctmarg1['temp_res_number_type4']; 
// 		$convnumbty14=($numbty14/100)  * $numbtype14_conv;
		
		
// 		$numbty15=$shgtctmarg1['temp_res_number_type5'];
// 		$convnumbty15=($numbty15/100)  * $numbtype15_conv;
		
		
// 		$numbty16=$shgtctmarg1['temp_res_number_type6'];
// 		$convnumbty16=($numbty16/100)  * $numbtype16_conv;
		
		
// 	   $gttotalmrk1=($numbty11+$numbty12+$numbty13+$numbty14+$numbty15+$numbty16);
// 		$gtconvtotal1=($convnumbty11+$convnumbty12+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ Bangla-2-----------------------

// 				$gtctmarg2="select * from borno_class1_avgtemp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_subject_id!='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND pare=1";
  
//     $qgtctmarg2=$mysqli->query($gtctmarg2);
// 	$shgtctmarg2=$qgtctmarg2->fetch_assoc();
	
	
		
// 		if($shgtctmarg2['temp_res_number_type1']!="")
// 		{	
// 		$numbty21=$shgtctmarg2['temp_res_number_type1'];
// 		$convnumbty21=($numbty21/100) * $numbtype21_conv;
		
		
// 		$numbty22=$shgtctmarg2['temp_res_number_type2'];
// 		$convnumbty22=($numbty22/100)  * $numbtype22_conv;
		
		
// 		$numbty23=$shgtctmarg2['temp_res_number_type3']; 
// 		$convnumbty23=($numbty23/100)  * $numbtype23_conv;
		
		
// 		$numbty24=$shgtctmarg2['temp_res_number_type4']; 
// 		$convnumbty24=($numbty24/100)  * $numbtype24_conv;
		
		
// 		$numbty25=$shgtctmarg2['temp_res_number_type5'];
// 		$convnumbty25=($numbty25/100)  * $numbtype25_conv;
		
		
// 		$numbty26=$shgtctmarg2['temp_res_number_type6'];
// 		$convnumbty26=($numbty26/100)  * $numbtype26_conv;
		
		
// 	    $gttotalmrk2=($numbty21+$numbty22+$numbty23+$numbty24+$numbty25+$numbty26);
// 		$gtconvtota21=($convnumbty21+$convnumbty22+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ get number type from query top -----------------------	
// 	if($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=$numbty11+$numbty21;
// 		$numbty2=$numbty12+$numbty22;
// 		$numbty3=$numbty13+$numbty23;
// 		$numbty4=$numbty14+$numbty24;
// 		$numbty5=$numbty15+$numbty25;
// 		$numbty6=$numbty16+$numbty26;

// 		$convnumbty1=$convnumbty11+$convnumbty21;
// 		$convnumbty2=$convnumbty12+$convnumbty22;
// 		$convnumbty3=$convnumbty13+$convnumbty23;
// 		$convnumbty4=$convnumbty14+$convnumbty24;
// 		$convnumbty5=$convnumbty15+$convnumbty25;
// 		$convnumbty6=$convnumbty16+$convnumbty26;
		
// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']=="")
// 	{
// 		$numbty1=$numbty11+0;
// 		$numbty2=$numbty12+0;
// 		$numbty3=$numbty13+0;
// 		$numbty4=$numbty14+0;
// 		$numbty5=$numbty15+0;
// 		$numbty6=$numbty16+0;

// 		$convnumbty1=$convnumbty11+0;
// 		$convnumbty2=$convnumbty12+0;
// 		$convnumbty3=$convnumbty13+0;
// 		$convnumbty4=$convnumbty14+0;
// 		$convnumbty5=$convnumbty15+0;
// 		$convnumbty6=$convnumbty16+0;

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']=="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=0+$numbty21;
// 		$numbty2=0+$numbty22;
// 		$numbty3=0+$numbty23;
// 		$numbty4=0+$numbty24;
// 		$numbty5=0+$numbty25;
// 		$numbty6=0+$numbty26;
		
// 		$convnumbty1=0+$convnumbty21;
// 		$convnumbty2=0+$convnumbty22;
// 		$convnumbty3=0+$convnumbty23;
// 		$convnumbty4=0+$convnumbty24;
// 		$convnumbty5=0+$convnumbty25;
// 		$convnumbty6=0+$convnumbty26;
		

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 	 $gtsubjfmark;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 		}
		
// 		elseif($pare==2)
// 		{
			
// $delpare1="delete from borno_play_five_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND pare='2' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
	

			
// 			//------ Bangla-----------------------
// 				$gtctmarg1="select * from borno_class1_avgtemp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND pare=2";
  
//     $qgtctmarg1=$mysqli->query($gtctmarg1);
// 	$shgtctmarg1=$qgtctmarg1->fetch_assoc();
		
// 		if($shgtctmarg1['temp_res_number_type1']!="")
// 		{	
// 		$numbty11=$shgtctmarg1['temp_res_number_type1'];
// 		$convnumbty11=($numbty11/100) * $numbtype11_conv;
		
		
// 		$numbty12=$shgtctmarg1['temp_res_number_type2'];
// 		$convnumbty12=($numbty12/100)  * $numbtype12_conv;
		
		
// 		$numbty13=$shgtctmarg1['temp_res_number_type3']; 
// 		$convnumbty13=($numbty13/100)  * $numbtype13_conv;
		
		
// 		$numbty14=$shgtctmarg1['temp_res_number_type4']; 
// 		$convnumbty14=($numbty14/100)  * $numbtype14_conv;
		
		
// 		$numbty15=$shgtctmarg1['temp_res_number_type5'];
// 		$convnumbty15=($numbty15/100)  * $numbtype15_conv;
		
		
// 		$numbty16=$shgtctmarg1['temp_res_number_type6'];
// 		$convnumbty16=($numbty16/100)  * $numbtype16_conv;
		
		
// 	   $gttotalmrk1=($numbty11+$numbty12+$numbty13+$numbty14+$numbty15+$numbty16);
// 		$gtconvtotal1=($convnumbty11+$convnumbty12+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ Bangla-2-----------------------

// 				$gtctmarg2="select * from borno_class1_avgtemp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_subject_id!='$stusubjId' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId' AND pare=2";
  
//     $qgtctmarg2=$mysqli->query($gtctmarg2);
// 	$shgtctmarg2=$qgtctmarg2->fetch_assoc();
	
	
		
// 		if($shgtctmarg2['temp_res_number_type1']!="")
// 		{	
// 		$numbty21=$shgtctmarg2['temp_res_number_type1'];
// 		$convnumbty21=($numbty21/100) * $numbtype21_conv;
		
		
// 		$numbty22=$shgtctmarg2['temp_res_number_type2'];
// 		$convnumbty22=($numbty22/100)  * $numbtype22_conv;
		
		
// 		$numbty23=$shgtctmarg2['temp_res_number_type3']; 
// 		$convnumbty23=($numbty23/100)  * $numbtype23_conv;
		
		
// 		$numbty24=$shgtctmarg2['temp_res_number_type4']; 
// 		$convnumbty24=($numbty24/100)  * $numbtype24_conv;
		
		
// 		$numbty25=$shgtctmarg2['temp_res_number_type5'];
// 		$convnumbty25=($numbty25/100)  * $numbtype25_conv;
		
		
// 		$numbty26=$shgtctmarg2['temp_res_number_type6'];
// 		$convnumbty26=($numbty26/100)  * $numbtype26_conv;
		
		
// 	    $gttotalmrk2=($numbty21+$numbty22+$numbty23+$numbty24+$numbty25+$numbty26);
// 		$gtconvtota21=($convnumbty21+$convnumbty22+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
// 		}
// //------ get number type from query top -----------------------	
// 	if($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=$numbty11+$numbty21;
// 		$numbty2=$numbty12+$numbty22;
// 		$numbty3=$numbty13+$numbty23;
// 		$numbty4=$numbty14+$numbty24;
// 		$numbty5=$numbty15+$numbty25;
// 		$numbty6=$numbty16+$numbty26;

// 		$convnumbty1=$convnumbty11+$convnumbty21;
// 		$convnumbty2=$convnumbty12+$convnumbty22;
// 		$convnumbty3=$convnumbty13+$convnumbty23;
// 		$convnumbty4=$convnumbty14+$convnumbty24;
// 		$convnumbty5=$convnumbty15+$convnumbty25;
// 		$convnumbty6=$convnumbty16+$convnumbty26;
		
// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']=="")
// 	{
// 		$numbty1=$numbty11+0;
// 		$numbty2=$numbty12+0;
// 		$numbty3=$numbty13+0;
// 		$numbty4=$numbty14+0;
// 		$numbty5=$numbty15+0;
// 		$numbty6=$numbty16+0;

// 		$convnumbty1=$convnumbty11+0;
// 		$convnumbty2=$convnumbty12+0;
// 		$convnumbty3=$convnumbty13+0;
// 		$convnumbty4=$convnumbty14+0;
// 		$convnumbty5=$convnumbty15+0;
// 		$convnumbty6=$convnumbty16+0;

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 	elseif($shgtctmarg1['temp_res_number_type1']=="" AND $shgtctmarg2['temp_res_number_type1']!="")
// 	{
// 		$numbty1=0+$numbty21;
// 		$numbty2=0+$numbty22;
// 		$numbty3=0+$numbty23;
// 		$numbty4=0+$numbty24;
// 		$numbty5=0+$numbty25;
// 		$numbty6=0+$numbty26;
		
// 		$convnumbty1=0+$convnumbty21;
// 		$convnumbty2=0+$convnumbty22;
// 		$convnumbty3=0+$convnumbty23;
// 		$convnumbty4=0+$convnumbty24;
// 		$convnumbty5=0+$convnumbty25;
// 		$convnumbty6=0+$convnumbty26;
		

// 		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
// 		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
// 	}
// 		}
		
// 		else
// 		{
// 		$delpare1="delete from borno_play_five_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_subject_id='$stusubjId'  AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
//     $mysqli->query($delpare1);	
			
			
// 		$numbty1=$shgtctmarg3['temp_res_number_type1'];
// 		$convnumbty1=($numbty1/100) * $numbtype1_conv;
		
		
// 		$numbty2=$shgtctmarg3['temp_res_number_type2'];
// 		$convnumbty2=($numbty2/100)  * $numbtype2_conv;
		
		
// 		$numbty3=$shgtctmarg3['temp_res_number_type3']; 
// 		$convnumbty3=($numbty3/100)  * $numbtype3_conv;
		
		
// 		$numbty4=$shgtctmarg3['temp_res_number_type4']; 
// 		$convnumbty4=($numbty4/100)  * $numbtype4_conv;
		
		
// 		$numbty5=$shgtctmarg3['temp_res_number_type5'];
// 		$convnumbty5=($numbty5/100)  * $numbtype5_conv;
		
		
// 		$numbty6=$shgtctmarg3['temp_res_number_type6'];
// 		$convnumbty6=($numbty6/100)  * $numbtype6_conv;
		
		
// 	    $gttotalmrk=($numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6);
// 		$gtconvtotal=($convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6);
		
// 		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
// 		}
		

// 	//------------------------------------  Greade Point (GPA) ----------------------------------------------------------------------	
// 		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom1) { $finalGpa=$gtgrtpoint1; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom2) { $finalGpa=$gtgrtpoint2; }
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom3) { $finalGpa=$gtgrtpoint3; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom4) { $finalGpa=$gtgrtpoint4; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom5) { $finalGpa=$gtgrtpoint5; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom6) { $finalGpa=$gtgrtpoint6; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom7) { $finalGpa=$gtgrtpoint7; } 
		
// 		else { $finalGpa=0; } 
		
		
		
// // ------------------------ End GPA --------------------------------------------------------------	

// //----------------------------- Latter Grade ------------------------------------------------------------------

			
		
// 		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom1) { $finallg=$gtlettergrd1; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom2) { $finallg=$gtlettergrd2; }
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom3) { $finallg=$gtlettergrd3; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom4) { $finallg=$gtlettergrd4; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom5) { $finallg=$gtlettergrd5; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom6) { $finallg=$gtlettergrd6; } 
		
// 		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6passt AND $markinpers>=$gtmarksfrom7) { $finallg=$gtlettergrd7; } 
		
// 		else { $finallg='F'; } 
		
		
	

// // ------------------------ Eng lg --------------------------------------------------------------			
// if($pare==1)
// {
//   $insfmark="INSERT INTO `borno_play_five_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`subst`,`pare`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','0','$pare')";
	
// $quygeneralsubmark=$mysqli->query($insfmark);
// }
// elseif($pare==2)
// {
//  $insfmark="INSERT INTO `borno_play_five_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`subst`,`pare`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','0','$pare')";
		
// $quygeneralsubmark=$mysqli->query($insfmark);
// }
// else
// {
// $insfmark="INSERT INTO `borno_play_five_avg_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`subst`,`pare`)
		
		
// 		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '0', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa','$finallg','$sunstatus','$pare')";
		
// $quygeneralsubmark=$mysqli->query($insfmark);
// }

// 	}
// }

// }

//----------------------------Play To Five End-----------------------------
	
if($quupdate) { header("location:process_result.php?msg=1&branchId=$branchId&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess");} else { header('location:process_result.php?msg=2');}
										
					
	

		
		
			
 ?>


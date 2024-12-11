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
	
							
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);

		$studClass2 = clean_html($_POST['studClass1']);
		$studClass21 = strip_tags($_POST['studClass1']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);

		$stsess2 = clean_html($_POST['stsess1']);
		$stsess21 = strip_tags($_POST['stsess1']);
		
		$term = clean_html($_POST['term']);
		$term1 = strip_tags($_POST['term']);
		
		$term2 = clean_html($_POST['term1']);
		$term21 = strip_tags($_POST['term1']);
		
		
		$subid= $_POST['subid'];
		$full= $_POST['Full'];
		$subdetailid= $_POST['subdetailid'];
		$uncountable= $_POST['uncountable'];
		
		
		$mark1= $_POST['mark1'];
		$mark2= $_POST['mark2'];
		$mark3= $_POST['mark3'];
		$mark4= $_POST['mark4'];
		$mark5= $_POST['mark5'];
		$mark6= $_POST['mark6'];
		
		$pass1= $_POST['pass1'];
		$pass2= $_POST['pass2'];
		$pass3= $_POST['pass3'];
		$pass4= $_POST['pass4'];
		$pass5= $_POST['pass5'];
		$pass6= $_POST['pass6'];
		
		$con1= $_POST['con1'];
		$con2= $_POST['con2'];
		$con3= $_POST['con3'];
		$con4= $_POST['con4'];
		$con5= $_POST['con5'];
		$con6= $_POST['con6'];
		
		
		
		

		
		
				// 	  if($term1==$term21 AND $stsess1==$stsess21 AND $studClass1==$studClass21)
				// 	  {
					
									for($i=0; $i<count($subid); $i++){
										
										
			if ($mark1[$i]!=""){ $mark1[$i]=$mark1[$i]; } else { $mark1[$i]=0;}
			if ($mark2[$i]!=""){ $mark2[$i]=$mark2[$i]; } else { $mark2[$i]=0;}
			if ($mark3[$i]!=""){ $mark3[$i]=$mark3[$i]; } else { $mark3[$i]=0;}
			if ($mark4[$i]!=""){ $mark4[$i]=$mark4[$i]; } else { $mark4[$i]=0;}
			if ($mark5[$i]!=""){ $mark5[$i]=$mark5[$i]; } else { $mark5[$i]=0;}
			if ($mark6[$i]!=""){ $mark6[$i]=$mark6[$i]; } else { $mark6[$i]=0;}
			
			if ($pass1[$i]!=""){ $pass1[$i]=$pass1[$i]; } else { $pass1[$i]=0;}
			if ($pass2[$i]!=""){ $pass2[$i]=$pass2[$i]; } else { $pass2[$i]=0;}
			if ($pass3[$i]!=""){ $pass3[$i]=$pass3[$i]; } else { $pass3[$i]=0;}
			if ($pass4[$i]!=""){ $pass4[$i]=$pass4[$i]; } else { $pass4[$i]=0;}
			if ($pass5[$i]!=""){ $pass5[$i]=$pass5[$i]; } else { $pass5[$i]=0;}
			if ($pass6[$i]!=""){ $pass6[$i]=$pass6[$i]; } else { $pass6[$i]=0;}
			
			if ($con1[$i]!=""){ $con1[$i]=$con1[$i]; } else { $con1[$i]=0;}
			if ($con2[$i]!=""){ $con2[$i]=$con2[$i]; } else { $con2[$i]=0;}
			if ($con3[$i]!=""){ $con3[$i]=$con3[$i]; } else { $con3[$i]=0;}
			if ($con4[$i]!=""){ $con4[$i]=$con4[$i]; } else { $con4[$i]=0;}
			if ($con5[$i]!=""){ $con5[$i]=$con5[$i]; } else { $con5[$i]=0;}
			if ($con6[$i]!=""){ $con6[$i]=$con6[$i]; } else { $con6[$i]=0;}
		//	echo "test";							
										if($subid[$i]!=""){
										  
										 // echo "test1";  
										    
											$insmk="UPDATE `borno_result_nine_ten_subject_details` SET `borno_nine_ten_subfullmark`='$full[$i]',`number_type1_marks`='$mark1[$i]',`number_type2_marks`='$mark2[$i]',`number_type3_marks`='$mark3[$i]',`number_type4_marks`='$mark4[$i]',`number_type5_marks`='$mark5[$i]',`number_type6_marks`='$mark6[$i]',`number_type1_pass`='$pass1[$i]',`number_type2_pass`='$pass2[$i]',`number_type3_pass`='$pass3[$i]',`number_type4_pass`='$pass4[$i]',`number_type5_pass`='$pass5[$i]',`number_type6_pass`='$pass6[$i]',`number_type1_conv`='$con1[$i]',`number_type2_conv`='$con2[$i]',`number_type3_conv`='$con3[$i]',`number_type4_conv`='$con4[$i]',`number_type5_conv`='$con5[$i]',`number_type6_conv`='$con6[$i]',`uncountable`='$uncountable[$i]' where borno_result_subject_details_nineTen_id='$subdetailid[$i]'";
											 
							
											 $qterm=$mysqli->query($insmk);
										$insmk="UPDATE `schl_subjs` SET `borno_school_subject_fullmark`='$full[$i]' where borno_school_subject_id='$subdetailid[$i]'";
										} 
									}
										if($qterm) { header('location:manage_subject_details910.php?msg=1');} else { header('location:manage_subject_details910.php?msg=2');}
										
			//		  }
// 					  else
// 	{
	    
// 	    echo "test1";
// 	    if($stsess1==$stsess21 AND $studClass1==$studClass21){$term21=$term21;}
// 	    else{
// 	$gpare1="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass21' AND borno_school_session='$stsess21' AND term_type=1";
// 	$qgpare1=$mysqli->query($gpare1);
// 	$shqgpare1=$qgpare1->fetch_assoc(); 
// 		$pterm=$shqgpare1['borno_result_term_id'];	
// 		$term21=$pterm;
// 	    }
	    
// 		if($term21!="")
// 		{
// $gsesssub="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass21' AND borno_school_session='$stsess21' AND borno_result_term_id='$term21'";
	
//  	$qtermsub=$mysqli->query($gsesssub);
// 	$shtermsub=$qtermsub->fetch_assoc();
// 	$gtermsesssub=$shtermsub['borin_subject_nine_ten_id'];
	
// 	if($gtermsesssub=="")
// 		 {
// 		for($i=0; $i<count($subid); $i++){
										
			
// 			if ($mark1[$i]!=""){ $mark1[$i]=$mark1[$i]; } else { $mark1[$i]=0;}
// 			if ($mark2[$i]!=""){ $mark2[$i]=$mark2[$i]; } else { $mark2[$i]=0;}
// 			if ($mark3[$i]!=""){ $mark3[$i]=$mark3[$i]; } else { $mark3[$i]=0;}
// 			if ($mark4[$i]!=""){ $mark4[$i]=$mark4[$i]; } else { $mark4[$i]=0;}
// 			if ($mark5[$i]!=""){ $mark5[$i]=$mark5[$i]; } else { $mark5[$i]=0;}
// 			if ($mark6[$i]!=""){ $mark6[$i]=$mark6[$i]; } else { $mark6[$i]=0;}
			
// 			if ($pass1[$i]!=""){ $pass1[$i]=$pass1[$i]; } else { $pass1[$i]=0;}
// 			if ($pass2[$i]!=""){ $pass2[$i]=$pass2[$i]; } else { $pass2[$i]=0;}
// 			if ($pass3[$i]!=""){ $pass3[$i]=$pass3[$i]; } else { $pass3[$i]=0;}
// 			if ($pass4[$i]!=""){ $pass4[$i]=$pass4[$i]; } else { $pass4[$i]=0;}
// 			if ($pass5[$i]!=""){ $pass5[$i]=$pass5[$i]; } else { $pass5[$i]=0;}
// 			if ($pass6[$i]!=""){ $pass6[$i]=$pass6[$i]; } else { $pass6[$i]=0;}
			
// 			if ($con1[$i]!=""){ $con1[$i]=$con1[$i]; } else { $con1[$i]=0;}
// 			if ($con2[$i]!=""){ $con2[$i]=$con2[$i]; } else { $con2[$i]=0;}
// 			if ($con3[$i]!=""){ $con3[$i]=$con3[$i]; } else { $con3[$i]=0;}
// 			if ($con4[$i]!=""){ $con4[$i]=$con4[$i]; } else { $con4[$i]=0;}
// 			if ($con5[$i]!=""){ $con5[$i]=$con5[$i]; } else { $con5[$i]=0;}
// 			if ($con6[$i]!=""){ $con6[$i]=$con6[$i]; } else { $con6[$i]=0;}
			
			
										
										
// 	if($subid[$i]!=""){
// 	$gpare="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$subid[$i]'";
// 	$qgpare=$mysqli->query($gpare);
// 	$shqgpare=$qgpare->fetch_assoc();	
// 	$pare=$shqgpare['borno_subject_nine_ten_pare'];																	
// 										$insmk="INSERT INTO `borno_result_nine_ten_subject_details` (`borno_school_id`,`borno_school_class_id`,`borno_school_session`, `borno_result_term_id`,`borin_subject_nine_ten_id`,`borno_nine_ten_subfullmark`, `number_type1_marks`,`number_type2_marks`,`number_type3_marks`,`number_type4_marks`,`number_type5_marks`,`number_type6_marks`,`number_type1_pass`,`number_type2_pass`,`number_type3_pass`,`number_type4_pass`,`number_type5_pass`,`number_type6_pass`,`number_type1_conv`,`number_type2_conv`,`number_type3_conv`,`number_type4_conv`,`number_type5_conv`,`number_type6_conv`,`pare`,`uncountable`)
											
// 											 VALUES ('$schId','$studClass21','$stsess21','$term21', '$subid[$i]','$full[$i]', '$mark1[$i]','$mark2[$i]','$mark3[$i]','$mark4[$i]','$mark5[$i]','$mark6[$i]','$pass1[$i]','$pass2[$i]','$pass3[$i]','$pass4[$i]','$pass5[$i]','$pass6[$i]','$con1[$i]','$con2[$i]','$con3[$i]','$con4[$i]','$con5[$i]','$con6[$i]','$pare','$uncountable[$i]')";
											 
								
// 											 $qterm=$mysqli->query($insmk);
										
// 										} 
// 									}
// 							//			if($qterm) { header('location:manage_subject_details910.php?msg=3');} else { header('location:manage_subject_details910.php?msg=2');}
										
		
// 		 }
// //else{ header('location:manage_subject_details910.php?msg=2');}
		 
// 		 }
// 	//	else { header('location:manage_subject_details910.php?msg=2');}
// 		}

		
		
			
 ?>


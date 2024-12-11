<?php
 require_once('../result_settings/result_sett_top.php');
 
 require_once '../../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
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
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		$trade = clean_html($_POST['trade']);
		$trade1 = strip_tags($_POST['trade']);	
		
		$term = clean_html($_POST['term']);
		$term1 = strip_tags($_POST['term']);
		
		$term2 = clean_html($_POST['term1']);
		$term21 = strip_tags($_POST['term1']);
		
		$subname= $_POST['subname'];
		$subid= $_POST['subid'];
		$subdetailid= $_POST['subdetailid'];
		$subtype= $_POST['subtype'];
		$pare= $_POST['pare'];
		
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
		
		
		
		

		
		
					  if($term1==$term21)
					  {
					
									for($i=0; $i<count($subid); $i++){
										
										
										
										if($subid[$i]!=""){
											$insmk="UPDATE `borno_result_subject_details_voc` SET `number_type1_marks`='$mark1[$i]',`number_type2_marks`='$mark2[$i]',`number_type3_marks`='$mark3[$i]',`number_type4_marks`='$mark4[$i]',`number_type5_marks`='$mark5[$i]',`number_type6_marks`='$mark6[$i]',`number_type1_pass`='$pass1[$i]',`number_type2_pass`='$pass2[$i]',`number_type3_pass`='$pass3[$i]',`number_type4_pass`='$pass4[$i]',`number_type5_pass`='$pass5[$i]',`number_type6_pass`='$pass6[$i]',`number_type1_conv`='$con1[$i]',`number_type2_conv`='$con2[$i]',`number_type3_conv`='$con3[$i]',`number_type4_conv`='$con4[$i]',`number_type5_conv`='$con5[$i]',`number_type6_conv`='$con6[$i]',`uncountable`='$subtype[$i]',`sub4th`='$pare[$i]' where borno_result_subject_details_voc_id='$subdetailid[$i]'";
											 
							
											 $qterm=$mysqli->query($insmk);
										
										} 
									}
										if($qterm) { header('location:manage_subject_details05.php?msg=1');} else { header('location:manage_subject_details05.php?msg=2');}
										
					  }
					  elseif($term1!=$term21)
	{
		if($term21!="")
		{
		for($i=0; $i<count($subid); $i++){
										
										
										
																	if($subid[$i]!=""){
											$insmk="INSERT INTO `borno_result_subject_details_voc` (`borno_school_id`,`borno_school_class_id`,`borno_school_session`,`borno_result_trade`, `borno_result_term_id`,`borno_result_subject_id`, `number_type1_marks`,`number_type2_marks`,`number_type3_marks`,`number_type4_marks`,`number_type5_marks`,`number_type6_marks`,`number_type1_pass`,`number_type2_pass`,`number_type3_pass`,`number_type4_pass`,`number_type5_pass`,`number_type6_pass`,`number_type1_conv`,`number_type2_conv`,`number_type3_conv`,`number_type4_conv`,`number_type5_conv`,`number_type6_conv`,`uncountable`,`sub4th`)
											
											 VALUES ('$schId','$studClass1','$stsess1','$trade1','$term21', '$subid[$i]', '$mark1[$i]','$mark2[$i]','$mark3[$i]','$mark4[$i]','$mark5[$i]','$mark6[$i]','$pass1[$i]','$pass2[$i]','$pass3[$i]','$pass4[$i]','$pass5[$i]','$pass6[$i]','$con1[$i]','$con2[$i]','$con3[$i]','$con4[$i]','$con5[$i]','$con6[$i]','$subtype[$i]','$pare[$i]')";
											 
									
											 $qterm=$mysqli->query($insmk);
										
										} 
									}
										if($qterm) { header('location:manage_subject_details05.php?msg=3');} else { header('location:manage_subject_details05.php?msg=2');}
										
		}
		else { header('location:manage_subject_details05.php?msg=2');}
		}

		
		
			
 ?>


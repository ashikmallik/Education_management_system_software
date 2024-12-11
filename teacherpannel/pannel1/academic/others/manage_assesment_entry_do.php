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
		
		$selTerm = clean_html($_POST['term']);
		$selTerm1 = strip_tags($_POST['term']);
		

		

	$assid= $_POST['assid'];

	$regulation= $_POST['regulation'];
	$patritism= $_POST['patritism'];
	$honesty= $_POST['honesty'];	
	$leadership= $_POST['leadership'];
	$discipline= $_POST['discipline'];
	$cooperation= $_POST['cooperation'];
	$participation= $_POST['participation'];
	$sympathy= $_POST['sympathy'];
	$awareness= $_POST['awareness'];
	$punctuality= $_POST['punctuality'];
		
	for($i=0; $i<count($regulation); $i++){
	if($regulation[$i]!=""){
		
	
if($regulation[$i]>3){$regulation[$i]=0;}	
if($patritism[$i]>3){$patritism[$i]=0;}
if($honesty[$i]>3){$honesty[$i]=0;}
if($leadership[$i]>3){$leadership[$i]=0;}
if($discipline[$i]>3){$discipline[$i]=0;}
if($cooperation[$i]>3){$cooperation[$i]=0;}
if($participation[$i]>3){$participation[$i]=0;}
if($sympathy[$i]>3){$sympathy[$i]=0;}
if($awareness[$i]>3){$awareness[$i]=0;}
if($punctuality[$i]>3){$punctuality[$i]=0;}	
			
$total=$regulation[$i]+$patritism[$i]+$honesty[$i]+$leadership[$i]+$discipline[$i]+$cooperation[$i]+$participation[$i]+$sympathy[$i]+$awareness[$i]+$punctuality[$i];

if($total>=26 AND $total<=30) {$remarks="Excellent";}
elseif($total>=21 AND $total<=25) {$remarks="Very Good";}
elseif($total>=16 AND $total<=20) {$remarks="Good";}
elseif($total>=10 AND $total<=15) {$remarks="Improvement Needed";}

 $insmk="UPDATE `borno_school_assesment` SET `regulation`='$regulation[$i]',`patritism`='$patritism[$i]',`honesty`='$honesty[$i]',`leadership`='$leadership[$i]',`discipline`='$discipline[$i]',`cooperation`='$cooperation[$i]',`participation`='$participation[$i]',`sympathy`='$sympathy[$i]',`awareness`='$awareness[$i]',`punctuality`='$punctuality[$i]',`total_mark`='$total',`remarks`='$remarks' where borno_school_assesment_id='$assid[$i]'";
								
	$qterm=$mysqli->query($insmk);
	
	}
	}
								
										if($qterm) { header('location:manage_assesment_entry.php?msg=3');} else { header('location:manage_assesment_entry.php?msg=2');}
										
					
	

		
		
			
 ?>


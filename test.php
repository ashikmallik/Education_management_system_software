<?php 

// INSERT INTO `borno_result_add_term` (`borno_result_term_id`, `borno_school_id`, `borno_school_class_id`, `borno_school_session`, `borno_result_term_name`, `borno_result_term_percent`, `term_type`, `term_status`) 
// VALUES (NULL, '1', '13', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), 
// (NULL, '1', '14', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), (NULL, '1', '15', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), 
// (NULL, '1', '6', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), (NULL, '1', '10', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), 
// (NULL, '1', '5', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), (NULL, '1', '4', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), 
// (NULL, '1', '3', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), (NULL, '1', '2', '2022', 'Final Institutional Class Test-2022', '20', '5', '0'), 
// (NULL, '1', '1', '2022', 'Final Institutional Class Test-2022', '20', '5', '0')




 
include('connection.php');

$stsess = '2023';
$fiscalid = 7;
$cdate = date("d/m/Y");	
 	$gtstudentinfo="SELECT * FROM `borno_student_info` WHERE `borno_student_info_id` IN ('BBM2309006',
'BBM2306130',
'MED2309015',
'MED2309015',
'MBD2309062',
'MBD2309062',
'MEM2303002',
'MEM2303002',
'BBM2306121',
'BBM2306121',
'BBM2306120',
'BBM2306120',
'MBM2307123',
'MBM2307123',
'MBD2302538',
'MBD2302538',
'MBD2309292',
'MBD2309292',
'MBD2302534',
'MBD2302534',
'MBD2305132',
'MBD2305132',
'MEM2309015',
'MEM2309015',
'MBD2302540',
'MBD2302540',
'BBM2308056',
'BBM2308056',
'BBM2308055',
'BBM2308055',
'MBM2306253',
'MBM2306253',
'MBD2302353',
'MBD2302353',
'BBM2306124',
'BBM2306124',
'MBD2301754',
'MBD2301754',
'MBD2303179',
'MBD2303179',
'MBD2302535',
'MBD2302535',
'MBD2302044',
'MBD2302044',
'MEM2301326',
'MEM2301326',
'BBD2301059',
'BBD2301059',
'BBM2309059',
'BBM2309059',
'BBD2308061',
'BBD2308061',
'BBD2302069',
'BBD2302069',
'BBM2307060',
'BBM2307060',
'BBD2309075',
'BBD2309075',
'BBD2303069',
'BBD2303069',
'MBD2301747',
'MBD2301747',
'MBM2309304',
'MBM2309304',
'MBM2304321',
'MBM2304321',
'MBM2303339',
'MBM2303339',
'MBM2306188',
'MBM2306188',
'MBD2301505',
'MBD2301505',
'MBD2308183',
'MBD2308183',
'MBD2308078',
'MBD2308078',
'MBM2309204',
'MBM2309204',
'MBD2301682',
'MBD2301682',
'BBM2306113',
'BBM2306113',
'BBM2306122',
'BBD2306120',
'BBD2306120',
'BBD2305045',
'BBD2305045',
'MBD2309283',
'MBD2309283',
'MBD2309289',
'MBD2309289',
'MBD2306142',
'MBD2306142',
'MBD2309278',
'MBD2309278',
'MBD2308184',
'MBD2308184',
'MBD2302152',
'MBD2302152',
'MBD2309293',
'MBD2309293',
'MBD2303181',
'MBD2303181',
'MBD2306554',
'MBD2306554',
'BBM2301087',
'BBM2301087',
'BBD2307057',
'BBD2307057',
'MBD2301752',
'MBD2301752',
'MBM2308121',
'MBM2308121',
'BBM2306122',
'BBM2309028',
'BBM2309028',
'BBM2307015',
'BBM2307015',
'MBM2308055',
'MBM2308055',
'MBD2309115',
'MBD2309115',
'BBD2302070',
'BBD2302070',
'MEM2301065',
'MEM2301065',
'BBM2301170',
'BBM2301170',
'MBM2306254',
'MBM2306254',
'MBD2304225',
'MBD2304225',
'MBD2309279',
'MBD2309279',
'BBM2308015',
'BBM2308015',
'MBM2304323',
'MBM2304323',
'MBM2303336',
'MBM2303336',
'BBD2306121',
'BBD2306121',
'MBD2307179',
'MBD2307179',
'MBM2301504',
'MBM2301504',
'BBD2305046',
'BBD2305046',
'MBD2309291',
'MBD2309291',
'MBD2302537',
'MBD2302537',
'MBD2301756',
'MBD2301756',
'BBD2306119',
'BBD2306119',
'BBD2301164',
'BBD2301164',
'BBM2308053',
'BBM2308053',
'MBD2303178',
'MBD2303178',
'BBM2305046',
'BBM2305046',
'BBM2301169',
'BBM2301169',
'MBD2301750',
'MBD2301750',
'BBM2306119',
'BBM2306119',
'MBM2308117',
'MBM2308117',
'MBD2308180',
'MBD2308180',
'MBD2309285',
'MBD2309285',
'MBD2309284',
'MBD2309284',
'MBD2303275',
'MBD2303275',
'BBD2301165',
'BBD2301165',
'MBD2301748',
'MBD2301748',
'MBD2303279',
'MBD2303279',
'MBD2301755',
'MBD2301755',
'MBD2301751',
'MBD2301751',
'MBM2303099',
'MBM2303099',
'MEM2303055',
'MEM2303055',
'MEM2301080',
'MEM2301080',
'MEM2301072',
'MEM2301072',
'MEM2304034',
'MEM2304034',
'MBD2303047',
'MBD2303047',
'MBD2304228',
'MBD2304228',
'MBM2303337',
'MBM2303337',
'MBM2303338',
'MBM2303338',
'MEM2303137',
'MEM2303137',
'MBM2301393',
'MBM2301393',
'MBD2308177',
'MBD2308177',
'MBD2308182',
'MBM2304324',
'MBM2304324',
'MBD2302531',
'MBD2302531',
'MEM2301490',
'MEM2301490',
'MBD2302533',
'MBD2302533',
'MBD2306260',
'MBD2306260',
'MBD2308181',
'MBD2308181',
'MBD2307176',
'MBD2307176',
'MBD2308182',
'MBD2309049',
'MBD2309049',
'MEM2301024',
'MEM2301024',
'MEM2301160',
'MEM2301160',
'MBD2301735',
'MBD2301735',
'BBD2301140',
'BBD2301140',
'MBM2308107',
'MBM2308107',
'MBD2308081',
'MBD2301265',
'MBD2301265',
'MBD2308081',
'MBD2306356',
'MBD2306356',
'MED2301121',
'MED2301121',
'MBM2303086',
'MBM2303086',
'MBD2303174',
'MBD2303174',
'BBM2304031',
'BBM2304031',
'MBD2302216',
'MBD2302216',
'MBD2303183',
'MBD2303183',
'MBD2301024',
'MBD2301024',
'MBD2304082',
'MBD2304082',
'MED2307016',
'MED2307016',
'MBD2301437',
'MBD2301437',
'MBM2301313',
'MBM2301313',
'MBD2302316',
'MBD2302316',
'MBD2302283',
'MBD2302283',
'MEM2302027',
'MEM2302027',
'MEM2302028',
'MEM2302028',
'MEM2301193',
'MEM2301193',
'MBM2306200',
'MBM2306200',
'MBM2305177',
'MBM2305177',
'BBM2309006',
'MBD2306520',
'MBD2306520',
'MBD2301503',
'MBD2301503',
'MBM2308106',
'MBM2308106',
'MBD2308062',
'MBD2308062',
'MBD2309140',
'MBD2309140',
'MBM2308048',
'MBM2308048',
'BBD2308036',
'BBD2308036',
'MBM2307032',
'MBM2307032',
'MBD2301128',
'MBD2301128',
'MEM2301035',
'MEM2301035',
'MEM2301136',
'MEM2301136',
'BBD2301090',
'BBD2301090',
'MBM2301182',
'MBM2301182',
'MEM2302033',
'MEM2302033',
'MBD2302176',
'MBD2302176',
'MBD2302311',
'MBD2302311',
'MBM2302097',
'MBM2302097',
'MBD2302217',
'MBD2302217',
'BBM2303042',
'BBM2303042',
'MBM2303087',
'MBM2303087',
'BBD2303019',
'BBD2303019',
'MBM2303010',
'MBM2303010',
'MBD2302545',
'MBD2302545',
'MBM2309330',
'MBM2309330',
'MBD2303282',
'MBD2303282',
'MBM2305255',
'MBM2305255',
'MBD2303280',
'MBD2303280',
'MBM2307125',
'MBM2307125',
'MED2308008',
'MED2308008',
'MBM2301511',
'MBM2301511',
'MBM2305257',
'MBM2305257',
'MBD2307180',
'MBD2307180',
'MBM2306255',
'MBM2306255',
'BBM2303076',
'BBM2303076',
'MBD2309280',
'MBD2309280',
'MBD2305202',
'MBD2305202',
'MBD2306560',
'MBD2306560',
'MBM2309328',
'MBM2309328',
'MBD2308190',
'MBD2308190',
'MBM2303342',
'MBM2303342',
'MBD2301762',
'MBD2301762',
'BBD2303070',
'BBD2303070',
'MBM2301508',
'MBM2301508',
'MEM2301493',
'MEM2301493',
'BBD2304054',
'BBD2304054',
'MBD2303283',
'MBD2303283',
'MBM2309333',
'MBM2309333',
'MBD2308186',
'MBD2308186',
'MBD2306558',
'MBD2306558',
'MBD2307181',
'MBD2307181',
'MBD2301758',
'MBD2301758',
'MBD2306556',
'MBD2306556',
'MBD2306555',
'MBD2306555',
'MED2301157',
'MED2301157',
'MBM2301509',
'MBM2301509',
'MBD2301759',
'MBD2301759',
'MEM2301451',
'MEM2301451',
'MBD2309297',
'MBD2309297',
'MBD2301760',
'MBD2301760',
'MBM2309334',
'MBM2309334',
'MBM2308122',
'MBM2308122',
'MBM2309329',
'MBM2309329',
'MBD2309208',
'MBD2309208',
'MBM2303346',
'MBM2303346',
'MBM2302243',
'MBM2302243',
'BBM2301172',
'BBM2301172',
'BBM2307061',
'BBM2307061',
'BBD2308063',
'BBD2308063',
'MBD2309295',
'MBD2309295',
'MBD2306559',
'MBD2306559',
'MEM2305017',
'MEM2305017',
'MBM2306256',
'MBM2306256',
'MBM2301512',
'MBM2301512',
'MBM2307084',
'MBM2307084',
'MBD2309299',
'MBD2309299',
'MBD2308192',
'MBD2308192',
'MEM2304107',
'MEM2304107',
'MBM2301514',
'MBM2301514',
'MBD2302542',
'MBD2302542',
'MBM2301499',
'MBM2301499',
'MBM2309335',
'MBM2309335',
'MBD2308195',
'MBD2308195',
'MBD2301757',
'MBD2301757',
'MBD2304070',
'MBD2304070',
'MBD2306553',
'MBD2306553',
'MBD2309282',
'MBD2309282',
'MBM2309336',
'MBM2309336',
'MBD2302544',
'MBD2302544',
'MBD2306561',
'MBD2306561',
'MBM2305258',
'MBM2305258',
'MBM2307127',
'MBM2307127',
'MEM2301491',
'MEM2301491',
'MBD2308187',
'MBD2308187',
'MED2301158',
'MED2301158',
'MBD2305203',
'MBD2305203',
'MBD2308193',
'MBD2308193',
'MBD2308194',
'MBD2308194',
'MBM2309332',
'MBM2309332',
'MBD2308191',
'MBD2308191',
'MBM2303347',
'MBM2303347',
'MBD2307050',
'MBD2307050',
'MBD2306563',
'MBD2306563',
'MBM2306152',
'MBM2306152',
'MBM2301505',
'MBM2301505',
'MBD2302539',
'MBD2302539',
'MBM2303348',
'MBM2303348',
'MBM2306240',
'MBM2306240',
'MBD2309298',
'MBD2309298',
'MBM2301517',
'MBM2301517',
'MBM2302248',
'MBM2302248',
'BBD2307053',
'BBD2307053',
'BBM2308062',
'BBM2308062',
'MEM2301494',
'MEM2301494',
'BBM2306125',
'BBM2306125',
'BBM2307063',
'BBM2307063',
'BBD2305047',
'BBD2305047',
'BBM2301174',
'BBM2301174',
'BBM2301173',
'BBM2301173',
'MBD2307186',
'MBD2307186',
'MBD2303285',
'MBD2303285',
'MBM2306258',
'MBM2306258',
'MBM2306257',
'MBM2306257',
'MBM2301515',
'MBM2301515',
'MBD2304230',
'MBD2304230',
'MBD2301765',
'MBD2301765',
'MBD2303284',
'MBD2303284',
'MBD2301764',
'MBD2301764',
'MBD2304231',
'MBD2304231',
'MBM2301516',
'MBM2301516',
'MBD2307189',
'MBD2307189',
'MBD2307188',
'MBD2307188',
'MBD2306565',
'MBD2306565',
'BBM2306123',
'BBM2306123',
'BBM2301175',
'BBM2301175',
'MBM2308030',
'MBM2308030',
'MBD2303286',
'MBD2303286',
'MBM2301500',
'MBM2301500',
'BBD2303027',
'BBD2303027',
'BBM2306126',
'BBM2306126',
'MBD2307187',
'MBD2307187',
'MBD2309305',
'MBD2309305',
'MBM2302245',
'MBM2302245',
'MEM2301495',
'MEM2301495',
'MBM2309337',
'MBM2309337',
'BBD2309050',
'BBD2309050',
'BBD2308065',
'BBD2308065',
'BBM2303078',
'BBM2303078',
'MBD2301766',
'MBD2301766',
'MBD2308196',
'MBD2308196',
'MBM2301518',
'MBM2301518',
'MBD2308197',
'MBD2308197',
'MBM2302246',
'MBM2302246',
'BBM2306130',
'BBD2303072',
'BBD2303072',
'BBM2308064',
'BBM2308064',
'BBD2308066',
'BBD2308066',
'BBD2301169',
'BBD2301169',
'BBM2305048',
'BBM2305048',
'MBM2301519',
'MBM2301519',
'BBM2304053',
'BBM2304053',
'BBD2301168',
'BBD2301168',
'MBM2308124',
'MBM2308124',
'BBD2308067',
'BBD2308067',
'BBD2309080',
'BBD2309080',
'MBD2306564',
'MBD2306564',
'MBD2301767',
'MBD2301767',
'MBD2309306',
'MBD2309306',
'BBM2309065',
'BBM2309065',
'MBM2309242',
'MBM2309242',
'MBM2303350',
'MBM2303350',
'MBD2301763',
'MBD2301763',
'MBD2309307',
'MBD2309307',
'MBD2304232',
'MBD2304232',
'MBD2307139',
'MBD2307139',
'MBD2305205',
'MBD2305205',
'BBD2304058',
'BBD2304058',
'BBD2309081',
'BBD2309081') AND `borno_school_session` = '2023'  AND `borno_student_status` = 1 AND `student_type` = 1";  //`borno_student_info_id` IN ('MSC22111397','MSC22111398')
// // 	}
// // 	else{
// // 	    $gtstudentinfo="SELECT * FROM `borno_student_info` WHERE `borno_school_class_id`='$studClass' AND `borno_school_branch_id`='$studBranch'  AND `borno_school_session`='$stsess' AND `borno_school_stud_group`='$studGroup'  AND `borno_student_status` = 1";
	    
// // 	    //echo "test";
// // 	}
  		$qgtstudentinfo=$mysqli->query($gtstudentinfo);
		while($shgtstudentinfo=$qgtstudentinfo->fetch_assoc()){
	
		$studentinfoid = $shgtstudentinfo['borno_student_info_id'];
		$classid = $shgtstudentinfo['borno_school_class_id'];
		$branchid = $shgtstudentinfo['borno_school_branch_id'];
		$group = $shgtstudentinfo['borno_school_stud_group'];
		
// // // 		echo $classid." ";
// // // 		echo $branchid." ";
// // // 		echo $studentinfoid." ";
// // // 		echo $fiscalid." <br>";
		
// // 	//	echo $group ;
		
// // 	//	echo $studentinfoid;
// // //	if($type == 'Monthly'){

		
// // 			//    	if(empty($group)){
		
 		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `fiscal_year_id` = '$fiscalid' AND head_type ='Monthly'";
// // 	}
// // 	else{
// 	    $gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$studClass' AND `branch_id`='$branchid' AND `student_group` = '$group' AND fiscal_year_id = '$fiscalid' AND head_type ='Monthly'";
// 	}
	
		$qgtheadid=$mysqli->query($gtheadid);
		while($shgtheadid=$qgtheadid->fetch_assoc()){
		$headid = $shgtheadid['head_id'];
		$amount = $shgtheadid['amount'];
		
		
		
		$getmonthname = "SELECT * FROM `fiscal_year_details` WHERE `fiscal_year_id` = '$fiscalid' AND `month` NOT IN (1)";
		$qgetmonthname=$mysqli->query($getmonthname);
		while($shqqgetmonthname=$qgetmonthname->fetch_assoc()){
		  echo "test";  
        $monthsortname = $shqqgetmonthname['month_short_name'];
        $year = $shqqgetmonthname['year'];
        $monthid = $shqqgetmonthname['month'];
        $yeardetails = $shqqgetmonthname['fiscal_year_details_id'];
        
// 		echo $stsess." ";
// 		echo $studentinfoid." ";
// 		echo $headid." ";
// 		echo $amount." ";
// 		echo $monthid." ";
// 		echo $yeardetails." ";
// 		echo $monthsortname." ";
// 		echo $year." ";
// 		echo $fiscalid." ";
// 		echo $cdate." <br>";

		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$yeardetails','$monthsortname','$year','$fiscalid','0','0','','0','$cdate','','')";
	        						$qinfeesstuden=$mysqli->query($infeesstuden);
		}
  }
// 		}
// 		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `fiscal_year_id` = '$fiscalid' AND `head_type` NOT IN ('Monthly') ";

	
// 		$qgtheadid=$mysqli->query($gtheadid);
// 		while($shgtheadid=$qgtheadid->fetch_assoc()){
	
// 		$headid = $shgtheadid['head_id'];
// 		$amount = $shgtheadid['amount'];
// 		$monthid = $shgtheadid['month_id'];
// 		if($monthid==0){
// 		$monthsortname = "";
//         $year = 0;
//         $yeardetails = 0;
// 		}
// 		else{
// 		 $getmonthname = "SELECT * FROM `fiscal_year_details` WHERE `month` = '$monthid' AND `fiscal_year_id`  = '$fiscalid' AND `month` NOT IN (1)";
// 		$qgetmonthname=$mysqli->query($getmonthname);
//         $shqqgetmonthname=$qgetmonthname->fetch_assoc();
//         $monthsortname = $shqqgetmonthname['month_short_name'];
//         $year = $shqqgetmonthname['year'];
//         $yeardetails = $shqqgetmonthname['fiscal_year_details_id'];
// 		}

// 		// echo $stsess . " ";
// 		// echo $studentinfoid . " ";
// 		// echo $headid . " ";
// 		// echo $amount . " ";
// 		// echo $monthid . " ";
// 		// echo $monthsortname . " ";
// 		// echo $year . " ";
// 		// echo $fiscalid . " ";
// 		// echo $cdate . " <br>";

// 		echo "test";
		
// 			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id` ,`money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
// 	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$yeardetails','$monthsortname','$year','$fiscalid','0','0','','0','$cdate','','')";
// 	        						$qinfeesstuden=$mysqli->query($infeesstuden);
	        						
// 	        			// 			if($qinfeesstuden){
	        						    
// 	        			// 			}
// 	        			// 			else{
// 	        			// 			    $message = 'Something Wrong !';
//             //                                 echo "<SCRIPT> 
//             //                                     alert('$message')
//             //                                     window.location.replace('process.php');
//             //                                 </SCRIPT>";
// 	        			// 			}
     
//       }
      
//       		echo "test";
		
// 			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id` ,`money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
// 	                                          VALUES ('$stsess','$studentinfoid','13','2500','2500','0','0','0','0','0','','2022','$fiscalid','0','0','','0','$cdate','','')";
// 	        						$qinfeesstuden=$mysqli->query($infeesstuden);
   
		}

            //                     $getdate="select * from fiscal_year Where fiscal_year_id = 5";
     						 //   $qgetdate=$mysqli->query($getdate);
            //                  	$sgetdate=$qgetdate->fetch_assoc();
	           //                 $fromdate=$sgetdate['from_date'];
	           //                 $todate=$sgetdate['to_date'];
	           //                 $fiscal_year_id = $sgetdate['fiscal_year_id'];
     						 //   //header('location:assign_fund.php?msg=1'); 
     						    
     						 //   $start    = (new DateTime("$fromdate"))->modify('first day of this month');
            //                     $end      = (new DateTime("$todate"))->modify('first day of next month');
            //                     $interval = DateInterval::createFromDateString('1 month');
            //                     $period   = new DatePeriod($start, $interval, $end);

            //                     foreach ($period as $dt) {
            //                          $month=$dt->format("m");
            //                          $monthsortname=$dt->format("M");
            //                          $monthname=$dt->format("F");
            //                          $year=$dt->format("Y");
                                     
            //                          $infiscalyeardetails="INSERT INTO `fiscal_year_details`(`month`,`month_name`,`month_short_name`,`year`,`fiscal_year_id`)
	           //         		                                              VALUES ('$month','$monthname','$monthsortname','$year','$fiscal_year_id')";
	        			// 			$qfiscalyeardetails=$mysqli->query($infiscalyeardetails);
            //                     }
    
    
//     $getwev = "SELECT * FROM `poor_fune_2022_motijheel_02`";
//     		$qgetwev=$mysqli->query($getwev);
//  		while($shqgetwev=$qgetwev->fetch_assoc()){
 		    
//  		    $sid = $shqgetwev['COL 1'];
//  		    $due = $shqgetwev['COL 2'];
 		
//  		$getdue = "SELECT * FROM `student_fees` WHERE `student_id` = '$sid'  AND `due_amount` > 0";
//  		 $qgetdue=$mysqli->query($getdue);
//  		$shqgetdue=$qgetdue->fetch_assoc();
//  		$student_fees_id =$shqgetdue['student_fees_id'];
 		
//  		if(!empty($student_fees_id)){
//  		   $getsdue = "SELECT * FROM `student_fees` WHERE `student_id` = '$sid'  AND `due_amount` > 0 ORDER BY `fiscal_year_details_id` ASC";
//  		 $qgetsdue=$mysqli->query($getsdue);
//  		while($shqgetsdue=$qgetsdue->fetch_assoc()){
 		    
//  		    $sdue = $shqgetsdue['due_amount'];
//  		    $fees_id = $shqgetsdue['student_fees_id'];
//  		    if($sdue <= $due){
//  		        $ndue = $due - $sdue;
//  		        $update ="UPDATE `student_fees` SET `due_amount` = 0 WHERE `student_fees_id` = '$fees_id'";
//  		        $qinupdate=$mysqli->query($update);
//  		        $due = $ndue;
 		        
//  		    }
//  		else{
//  		      $update ="UPDATE `student_fees` SET `due_amount` = `due_amount` - $due  WHERE `student_fees_id` = '$fees_id'";
//  		      $qinupdate=$mysqli->query($update);
 		      
 		     
//  		}
 		  
 		  
//  		   if($qinupdate){
//  		       echo $due."<br>";
//  		   }  
//  		}
 		    
//  		}    
 		    
//  		}
    
            
            
            
?>
<?php
ob_start();
include('../../../connection.php');

$schId=$_GET['schId'];
$gtfbranchId=$_GET['gtfbranchId'];
$shiftId=$_GET['shiftId'];
$teacherid=$_GET['teacherid'];




	$branchName="select * from borno_school_branch where borno_school_branch_id='$gtfbranchId'";
	$qbranchName=$mysqli->query($branchName);
	$shbranchName=$qbranchName->fetch_assoc();
	
	$gtschbranchName=$shbranchName['borno_school_branch_name'];
	
		
	$schshift="select * from borno_school_shift where borno_school_shift_id='$shiftId'";
	$qschshift=$mysqli->query($schshift);
	$shschshift=$qschshift->fetch_assoc();
	
	$gtschshiftname=$shschshift['borno_school_shift_name'];
	
	
	$schteaname="select * from borno_teacher_info where borno_teacher_info_id='$teacherid'";
	$qschteaname=$mysqli->query($schteaname);
	$shqschteaname=$qschteaname->fetch_assoc();
	
	$gtteacname=$shqschteaname['borno_teacher_name'];
	
	
	$gtscnmlogo="select * from borno_school where borno_school_id='$schId'";
	$qgtscnmlogo=$mysqli->query($gtscnmlogo);
	$shgtscnmlogo=$qgtscnmlogo->fetch_assoc();
	
	$gtschoolName=$shgtscnmlogo['borno_school_name'];
	



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  </title>

<style>
.projectlist {
    border-left: 1px solid #2b032a;
    border-top: 1px solid #2b032a;
}
.projectlist th {
    background-color: #2b032a;
    border-bottom: 1px solid #2b032a;
    border-right: 1px solid #2b032a;
    color: #420000;
    font-size: 12px;
    height: 30px;
    text-align: center;
}
.projectlist td {
    border-bottom: 1px solid #2b032a;
    border-right: 1px solid #2b032a;
    padding: 1px;
}




</style>
</head>

<body>

<table width="1040" border="0" cellspacing="0" cellpadding="0" style="border:2px #2b032a solid" align="center">
  <tr>
    <td>



<table width="1024" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td align="center" style="font-size:26px; font-family:Arial, Helvetica, sans-serif">
    	

<!--  <button onclick="myFunction()">Print this page</button>  -->

<script>
function myFunction() {
    window.print();
}
</script>
    </td>
  </tr>
  <tr>
    <td align="center" style="font-size:32px; font-family:Arial, Helvetica, sans-serif">
    	<i><?php echo $gtschoolName; ?></i>
    </td>
  </tr>
  <tr>
    <td align="center" style="font-size:22px; font-family:Arial, Helvetica, sans-serif">
    	<i>Teacher Wise Class Routine</i>
    </td>
  </tr>
   <tr>
    <td>&nbsp;
    	
    </td>
  </tr>
  <tr>
    <td>
                <table width="354" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td width="114"><em>Branch</em></td>
                    <td width="24" align="center">:</td>
                    <td width="216">
                    		<i><?php echo $gtschbranchName; ?></i>
                    </td>
                  </tr>
                  <tr>
                    <td><em>Shift</em></td>
                    <td align="center">:</td>
                    <td><i><?php echo $gtschshiftname; ?></i></td>
                  </tr>
                  <tr>
                    <td><em>Teacher's Name</em></td>
                    <td align="center">:</td>
                    <td><i><?php echo $gtteacname; ?></i></td>
                  </tr>
                </table>

    </td>
  </tr>
  <tr>
    <td>&nbsp;
    	
    </td>
  </tr>
</table>



			<table width="895" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="81" align="center"><strong>Day/Period</strong></td>
    <td width="120" align="center"><strong>First</strong></td>
    <td width="120" align="center"><strong>Second </strong></td>
    <td width="120" align="center"><strong>Third</strong></td>
    <td width="120" align="center"><strong>Four</strong></td>
    <td width="120" align="center"><strong>Five </strong></td>
    <td width="120" align="center"><strong>Six</strong></td>
    <td width="120" align="center"><strong>Seven</strong></td>
    <td width="120" align="center"><strong>Eight</strong></td>
    </tr>
  <?php
 	$qry = $mysqli->query("select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId' AND borno_school_routine_teacher_name='$teacherid'  order by borno_school_routine_day asc");

$data = "";

while($row = $qry->fetch_assoc()) { 

  ?>
  <tr>
    <td>
		<?php 
		   $gtday=$row['borno_school_routine_day']; 
		   
		   if($gtday==1) { echo "Saturday"; }
		   elseif($gtday==2) { echo "Sunday"; }
		   elseif($gtday==3) { echo "Monday"; }
		   elseif($gtday==4) { echo "Tuesday"; }
		   elseif($gtday==5) { echo "Wednesday"; }
		   elseif($gtday==6) { echo "Thursday"; }
		   
		   
		?>
    
    </td>
    <td>
	   <?php 
	   		$getClassId=$row['borno_school_routine_studClass1'];
						
			$getClassName="select * from borno_school_class where borno_school_class_id='$getClassId'";
			$qgetClassName=$mysqli->query($getClassName);
			$shgetClassName=$qgetClassName->fetch_assoc();
			
			echo $shgetClassName['borno_school_class_name'];
			
				
				
			
				
			
			echo ',';		
			    
			$getsectionId=$row['borno_school_routine_studSection1']; 
			
			$getSectionName="select * from borno_school_section where borno_school_section_id='$getsectionId'";
			$qgetSectionName=$mysqli->query($getSectionName);
			$shgetSectionName=$qgetSectionName->fetch_assoc();
			
			echo $shgetSectionName['borno_school_section_name'];
	 
	 		echo ',';
			
			if($shgetClassName['class_step']==0){
				
				    $getSubjId=$row['borno_school_routine_sub1']; 
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($shgetClassName['class_step']==1){
				
					$getSubjId=$row['borno_school_routine_sub1']; 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($shgetClassName['class_step']==2){
				
		$getSubjId=$row['borno_school_routine_sub1']; 
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getSubjId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      
	 
	 ?>
    
    </td>
    <td><?php 
	   		$getClassId=$row['borno_school_routine_studClass2'];
						
			$getClassName="select * from borno_school_class where borno_school_class_id='$getClassId'";
			$qgetClassName=$mysqli->query($getClassName);
			$shgetClassName=$qgetClassName->fetch_assoc();
			
			echo $shgetClassName['borno_school_class_name'];
			
				
				
			
				
			
			echo ',';		
			    
			$getsectionId=$row['borno_school_routine_studSection2']; 
			
			$getSectionName="select * from borno_school_section where borno_school_section_id='$getsectionId'";
			$qgetSectionName=$mysqli->query($getSectionName);
			$shgetSectionName=$qgetSectionName->fetch_assoc();
			
			echo $shgetSectionName['borno_school_section_name'];
	 
	 		echo ',';
			
			if($shgetClassName['class_step']==0){
				
				    $getSubjId=$row['borno_school_routine_sub2']; 
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($shgetClassName['class_step']==1){
				
					$getSubjId=$row['borno_school_routine_sub2']; 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['six_eight_subject_name'];
				
				}	
				
			elseif($shgetClassName['class_step']==2){
				
		$getSubjId=$row['borno_school_routine_sub2']; 
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getSubjId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}
	 
	      
	 
	 ?></td>
   <td><?php 
	   		$getClassId=$row['borno_school_routine_studClass3'];
						
			$getClassName="select * from borno_school_class where borno_school_class_id='$getClassId'";
			$qgetClassName=$mysqli->query($getClassName);
			$shgetClassName=$qgetClassName->fetch_assoc();
			
			echo $shgetClassName['borno_school_class_name'];

			echo ',';		
			    
			$getsectionId=$row['borno_school_routine_studSection3']; 
			
			$getSectionName="select * from borno_school_section where borno_school_section_id='$getsectionId'";
			$qgetSectionName=$mysqli->query($getSectionName);
			$shgetSectionName=$qgetSectionName->fetch_assoc();
			
			echo $shgetSectionName['borno_school_section_name'];
	 
	 		echo ',';
			
			if($shgetClassName['class_step']==0){
				
				    $getSubjId=$row['borno_school_routine_sub3']; 
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($shgetClassName['class_step']==1){
				
					$getSubjId=$row['borno_school_routine_sub3']; 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['six_eight_subject_name'];
				
				}	
				
			elseif($shgetClassName['class_step']==2){
				
		$getSubjId=$row['borno_school_routine_sub3']; 
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getSubjId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}
	 
	      
	 
	 ?></td>
    <td><?php 
	   		$getClassId=$row['borno_school_routine_studClass4'];
						
			$getClassName="select * from borno_school_class where borno_school_class_id='$getClassId'";
			$qgetClassName=$mysqli->query($getClassName);
			$shgetClassName=$qgetClassName->fetch_assoc();
			
			echo $shgetClassName['borno_school_class_name'];

			echo ',';		
			    
			$getsectionId=$row['borno_school_routine_studSection4']; 
			
			$getSectionName="select * from borno_school_section where borno_school_section_id='$getsectionId'";
			$qgetSectionName=$mysqli->query($getSectionName);
			$shgetSectionName=$qgetSectionName->fetch_assoc();
			
			echo $shgetSectionName['borno_school_section_name'];
	 
	 		echo ',';
			
			if($shgetClassName['class_step']==0){
				
				    $getSubjId=$row['borno_school_routine_sub4']; 
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($shgetClassName['class_step']==1){
				
					$getSubjId=$row['borno_school_routine_sub4']; 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['six_eight_subject_name'];
				
				}	
				
			elseif($shgetClassName['class_step']==2){
				
		$getSubjId=$row['borno_school_routine_sub4']; 
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getSubjId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}
	 
	      
	 
	 ?></td>
   <td><?php 
	   		$getClassId=$row['borno_school_routine_studClass5'];
						
			$getClassName="select * from borno_school_class where borno_school_class_id='$getClassId'";
			$qgetClassName=$mysqli->query($getClassName);
			$shgetClassName=$qgetClassName->fetch_assoc();
			
			echo $shgetClassName['borno_school_class_name'];

			echo ',';		
			    
			$getsectionId=$row['borno_school_routine_studSection5']; 
			
			$getSectionName="select * from borno_school_section where borno_school_section_id='$getsectionId'";
			$qgetSectionName=$mysqli->query($getSectionName);
			$shgetSectionName=$qgetSectionName->fetch_assoc();
			
			echo $shgetSectionName['borno_school_section_name'];
	 
	 		echo ',';
			
			if($shgetClassName['class_step']==0){
				
				    $getSubjId=$row['borno_school_routine_sub5']; 
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($shgetClassName['class_step']==1){
				
					$getSubjId=$row['borno_school_routine_sub5']; 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['six_eight_subject_name'];
				
				}	
				
			elseif($shgetClassName['class_step']==2){
				
		$getSubjId=$row['borno_school_routine_sub5']; 
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getSubjId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}
	 
	      
	 
	 ?></td>
    <td><?php 
	   		$getClassId=$row['borno_school_routine_studClass6'];
						
			$getClassName="select * from borno_school_class where borno_school_class_id='$getClassId'";
			$qgetClassName=$mysqli->query($getClassName);
			$shgetClassName=$qgetClassName->fetch_assoc();
			
			echo $shgetClassName['borno_school_class_name'];

			echo ',';		
			    
			$getsectionId=$row['borno_school_routine_studSection6']; 
			
			$getSectionName="select * from borno_school_section where borno_school_section_id='$getsectionId'";
			$qgetSectionName=$mysqli->query($getSectionName);
			$shgetSectionName=$qgetSectionName->fetch_assoc();
			
			echo $shgetSectionName['borno_school_section_name'];
	 
	 		echo ',';
			
			if($shgetClassName['class_step']==0){
				
				    $getSubjId=$row['borno_school_routine_sub6']; 
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($shgetClassName['class_step']==1){
				
					$getSubjId=$row['borno_school_routine_sub6']; 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['six_eight_subject_name'];
				
				}	
				
			elseif($shgetClassName['class_step']==2){
				
		$getSubjId=$row['borno_school_routine_sub6']; 
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getSubjId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}
	 
	      
	 
	 ?></td>
   <td><?php 
	   		$getClassId=$row['borno_school_routine_studClass7'];
						
			$getClassName="select * from borno_school_class where borno_school_class_id='$getClassId'";
			$qgetClassName=$mysqli->query($getClassName);
			$shgetClassName=$qgetClassName->fetch_assoc();
			
			echo $shgetClassName['borno_school_class_name'];

			echo ',';		
			    
			$getsectionId=$row['borno_school_routine_studSection7']; 
			
			$getSectionName="select * from borno_school_section where borno_school_section_id='$getsectionId'";
			$qgetSectionName=$mysqli->query($getSectionName);
			$shgetSectionName=$qgetSectionName->fetch_assoc();
			
			echo $shgetSectionName['borno_school_section_name'];
	 
	 		echo ',';
			
			if($shgetClassName['class_step']==0){
				
				    $getSubjId=$row['borno_school_routine_sub7']; 
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($shgetClassName['class_step']==1){
				
					$getSubjId=$row['borno_school_routine_sub7']; 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['six_eight_subject_name'];
				
				}	
				
			elseif($shgetClassName['class_step']==2){
				
		$getSubjId=$row['borno_school_routine_sub7']; 
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getSubjId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}
	 
	      
	 
	 ?></td>
      <td><?php 
	   		$getClassId=$row['borno_school_routine_studClass8'];
						
			$getClassName="select * from borno_school_class where borno_school_class_id='$getClassId'";
			$qgetClassName=$mysqli->query($getClassName);
			$shgetClassName=$qgetClassName->fetch_assoc();
			
			echo $shgetClassName['borno_school_class_name'];

			echo ',';		
			    
			$getsectionId=$row['borno_school_routine_studSection8']; 
			
			$getSectionName="select * from borno_school_section where borno_school_section_id='$getsectionId'";
			$qgetSectionName=$mysqli->query($getSectionName);
			$shgetSectionName=$qgetSectionName->fetch_assoc();
			
			echo $shgetSectionName['borno_school_section_name'];
	 
	 		echo ',';
			
			if($shgetClassName['class_step']==0){
				
				    $getSubjId=$row['borno_school_routine_sub8']; 
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($shgetClassName['class_step']==1){
				
					$getSubjId=$row['borno_school_routine_sub8']; 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['six_eight_subject_name'];
				
				}	
				
			elseif($shgetClassName['class_step']==2){
				
		$getSubjId=$row['borno_school_routine_sub8']; 
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getSubjId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}
	 
	      
	 
	 ?></td>
    </tr>
<?php } ?>  
</table>
<br>

</td>
  </tr>
</table>
</body>
</html>

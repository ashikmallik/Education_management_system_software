
<script language="javascript">
	function contalt_valid()
	{
		
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}
		
		if(document.frmcontent.section.value=="")
		{
			alert("Please Select Section");
			document.frmcontent.section.focus();
			return (false);
		}
		
		if(document.frmcontent.stusubjId.value=="")
		{
			alert("Please Select Subject");
			document.frmcontent.stusubjId.focus();
			return (false);
		}
		
		
		if(document.frmcontent.selTerm.value=="")
		{
			alert("Please Select Term");
			document.frmcontent.selTerm.focus();
			return (false);
		}
		
		if(document.frmcontent.csv.value=="")
		{
			alert("Please Browse CSV File");
			document.frmcontent.csv.focus();
			return (false);
		}
		
		
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="index.php?action=upload_marks_class1";
	 document.frmcontent.submit();
	}
	
	
	
</script>
<?php
	$msg=$_GET['msg'];
	if($msg==1){	
?>

 <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#008000; font-weight:bold; font-size:32px; text-align:center; background:#CCC">  Upload Success </td>
          </tr>
        </table>


<?php
	
   }	else if($msg==3){	
?>

        <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center; background:#CCC"> Already Upload Marks </td>
          </tr>
        </table>


<?php 
	} else if($msg==2){

 ?>
 
       <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center;background:#CCC"> ! Upload Failed  </td>
          </tr>
        </table>
        

 <?php } else { echo ""; } ?>

<br>

<form name="frmcontent" id="myform" action="upload_marks_class1_do.php" method="post" enctype="multipart/form-data">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td width="195"><strong>Select Branch *</strong></td>
    <td width="35" align="center"><strong>:</strong></td>
    <td width="420"><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select </option>
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schsId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];
					$gstclass="select * from borno_school_class where class_step=0 order by clorder asc";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Select Shift *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> Select </option>
      <?php
					$studClass=$_REQUEST['studClass'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <?php
 // $shiftId=$_REQUEST['shiftId'];
			//	echo	$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
  ?>
  <tr>
    <td><strong>Select  Section *</strong></td>
    <td align="center"><strong>:</strong></td>
   
    <td>
      <select name="section" id="section">
       <option value=""> Select </option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schsId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
  <tr>
    <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stsess" id="stsess">
      
      <option value="2017"> 2017 </option>
      <option value="2018"> 2018 </option>
      <option value="2019"> 2019 </option>
      <option value="2020"> 2020 </option>
    </select></td>
  </tr>
  <tr>
    <td><strong>Subject  *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stusubjId" id="stusubjId" onchange="callpage();">
      <option value="">Select</option>
      <?php
			$studClass=$_REQUEST['studClass'];
			$clSess=$_REQUEST['stsess'];
			
		
			$gsubjName="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schsId'";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
		?>
      <option value="<?php echo $shgsubjName['borno_result_subject_id']; ?>" <?php if($shgsubjName['borno_result_subject_id']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_school_subject_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
  <tr>
    <td><strong>Select Tearm *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <select name="selTerm" id="selTerm">
      <option value=""> Select </option>
	  <?php
			$schexterm="select * from borno_result_add_term where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schsId'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$_REQUEST['selTerm']) { echo "selected"; } ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
        
      <?php } ?>  
        
      </select>
    </td>
  </tr>
  <tr>
    <td><strong>Browse CSV</strong> *</td>
    <td align="center"><strong>:</strong></td>
    <td><label for="csv"></label>
      <input type="file" name="csv" id="csv"></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="Submit" value="Upload" onClick="return contalt_valid()">
      <input type="hidden" name="schoolId" id="schoolId" value="<?php echo $schsId; ?>">
      <input type="hidden" name="subjName" id="subjName" value="<?php echo $shgsubjName['borno_school_subject_name']; ?>">
      <input type="hidden" name="substatus" id="substatus" value="
	  
	   <?php 
	  
	  		$stusubjId=$_REQUEST['stusubjId'];
			$gsubjstatus="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schsId' AND borno_result_subject_id='$stusubjId'";
			$qgsubjstatus=$mysqli->query($gsubjstatus);
			$shgsubjstatus=$qgsubjstatus->fetch_assoc();
				
				
			echo $shgsubjstatus['subst'];	
				
	  
	  
	   ?>
      
      
      " />
    </label></td>
  </tr>
</table>
</form>
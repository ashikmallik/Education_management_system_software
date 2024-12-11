<?php require_once('teacher_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Panel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

<script language="javascript">

function callpage()
	{
	 document.frmcontent.action="manage_teacher.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>

<div class="wrapper">
    <div class="side_main_menu">
        <?php include('lefymenu.php'); ?>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Teacher Panel [<?php echo $shget_schoolName['borno_school_name']; ?>]</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Manage Teacher</h2></div>
                <div class="form">
                  <center>
                    <form name="frmcontent" action="manage_teacher_do.php" method="post" enctype="multipart/form-data">
                     <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Update Teacher Successfull"; }
					else if($msg==2){ echo "Failed"; }
										
					
				?>
            <table width="393" style="border: 1px solid #005067;">
                            <tr>
                                <td width="142" class="text_table">Branch :</td>
                                <td width="239"><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
                            </tr>

                      </table>    
                
                
                
                
                        
                    </form>
    <table width="120" border="0" cellspacing="0" cellpadding="0" align="center">
        <?php  
		$brnchId=$_REQUEST['branchId'];
		?>            
                    
  <tr>
    <td class="text_table" align="right"><a href="download_teacher_info_pdf.php?schoolId=<?php echo $schId; ?>&brnId=<?php echo $brnchId; ?>" target="_blank">Download as PDF</a></td>
  </tr>
</table>

<table   width="785" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="27" align="center">SL</td>
    <td  width="196" align="center">Teacher Name</td>
    <td  width="121" align="center">Phone</td>
    <td  width="121" align="center">Shift</td>
    <td  width="123" align="center">Designation</td>
    <td  colspan="3" align="center">Action</td>
  </tr>
  
  <?php
  	
	$techId=$_GET['techId'];
	if($techId!="") {
		
			$deltect="delete from borno_teacher_info where borno_teacher_info_id='$techId'";
			$mysqli->query($deltect);
			
			echo "Delete Success";	
		}
  

	
	?>
 
    
    <?
	$sl=0;
	$brnchId=$_REQUEST['branchId'];
	$techinfo="select * from borno_teacher_info where  borno_school_id='$schId' and borno_school_branch_id='$brnchId' ";
	$qtechinfo=$mysqli->query($techinfo);	
		
	while($shtechinfo=$qtechinfo->fetch_assoc()){ $sl++;
	
	 $shiftt=$shtechinfo['borno_school_shift_id'];
	
	if ($shiftt == 2) {
    $shiftname = "Morning";
} elseif ($shiftt == 3) {
    $shiftname = "Day";
}
		
  ?>
  
       
     <tr>
    <td align="center"><?php echo $sl; ?></td>
    <td> <?php echo $shtechinfo['borno_teacher_name']; ?></td>
    <td> <?php echo substr($shtechinfo['borno_teacher_phone'],2,11); ?></td>
    <td> <?php echo $shiftname; ?></td>
    <td> <?php echo $shtechinfo['borno_teachers_designation']; ?></td>
    <td width="39" align="center"><a href="edit_teacher.php?techId=<?php echo $shtechinfo['borno_teacher_info_id']; ?>">Edit</a></td>
    <td width="57" align="center"><a href="manage_teacher.php?techId=<?php echo $shtechinfo['borno_teacher_info_id']; ?>" onClick="return confirm('Delete')">Delete</a></td>
    <td width="101" align="center">
    
   
    <?php 
		$gttechId=$shtechinfo['borno_teacher_info_id'];
		if($gttechId==1037 ) { 
	 ?>
    	        
        <a href="eve/SALINA_NASRIN.pdf" target="_blank">	Performance </a>
      
      <?php
		} else if($gttechId==1038 ){
	  ?> 
      
      <a href="eve/Most_Afroza_Sultana_Sumi.pdf" target="_blank">	Performance </a>
      
     <?php
		} else if($gttechId==1039){
	  ?> 
      
      <a href="eve/Most_Hasna_Al_Homayra.pdf" target="_blank">	Performance </a>
      
      <?php
		} else if($gttechId==1040){
	  ?> 
      
      <a href="eve/Md_Golam_Mostafa.pdf  " target="_blank">	Performance </a>
      
      <?php
		} else if($gttechId==1041 ){
	  ?> 
      
      <a href="eve/Muhammad_Ashraful_Islam.pdf  " target="_blank">	Performance </a>
      
      <?php
		} else if($gttechId==1042 ){
	  ?> 
      
      <a href="eve/MOHAMMAD_SHARIF_HASAN.pdf  " target="_blank">	Performance </a>
      
      <?php
		} else if($gttechId==1043 ){
	  ?> 
      
      <a href="eve/SEHLIN_JAHAN_KABIR.pdf  " target="_blank">	Performance </a>
      
      <?php
		} else if($gttechId==1044 ){
	  ?> 
      
      <a href="eve/MD_ABDULLAH_AL_MAMUN.pdf  " target="_blank">	Performance </a>
      
      <?php
		} else if($gttechId==1045 ){
	  ?> 
      
      <a href="eve/NILUFA_YESMIN.pdf  " target="_blank">	Performance </a>
      
      <?php
		} else if($gttechId==1046 ){
	  ?> 
      
      <a href="eve/FARZANA_BEGUM.pdf  " target="_blank">	Performance </a>      
      
      
      <?php } else { echo ""; } ?>
        
    </td>
     </tr>
    <?php } ?>   
  
</table>
                    </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>
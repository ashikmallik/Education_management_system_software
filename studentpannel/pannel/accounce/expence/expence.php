<?php require_once('expence_sett_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Payment]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
    
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}

						
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="expence.php";
	 document.frmcontent.submit();
	}	
	
		
</script> 
<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
            <a href=""><img src="../../academic/assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Payment [<?php echo $shget_schoolName['borno_school_student_name']; ?>] </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

  <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Payment History</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="download_payment_history.php" method="post" enctype="multipart/form-data" target="">

<table  border="" cellspacing="0" cellpadding="0" style="color:#000; margin-left:50px; margin-top:-35px" > 
  <tr>
    <td class="">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
    <option value="">--Session--</option>
      <?php
					$data1="select borno_school_session from borno_school_receipt where borno_student_info_id='$stdid' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
 <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
     </select></td>
  </tr>
 </table>
</br>
<?php
 $stdsession=trim($_POST['stsess']);
$sql ="select * from borno_school_receipt where borno_student_info_id='$stdid' and borno_school_session='$stdsession' group by borno_school_class_id,borno_school_section_id,borno_school_shift_id ";

					$qsql=$mysqli->query($sql);
					$shqsql=$qsql->fetch_assoc();
        $stcls=$shqsql['borno_school_class_id'];
		$oldsection=$shqsql['borno_school_section_id'];
		$stshift=$shqsql['borno_school_shift_id']; 
	   	$roll=$shqsql['borno_school_roll'];

          if ($stshift==2){$shiftname='Morning';}
	   	 else{$shiftname='Day';}

	   	
$gsectionName13 ="select * from borno_school_class where borno_school_class_id='$stcls'";
					$qgsectionName13=$mysqli->query($gsectionName13);
					$shsectionname13=$qgsectionName13->fetch_assoc();
					$classname1=$shsectionname13['borno_school_class_name'];                    

 $gsectionName12 ="select * from borno_school_section where borno_school_section_id='$oldsection'";
					$qgsectionName12=$mysqli->query($gsectionName12);
					$shsectionname12=$qgsectionName12->fetch_assoc();
					$sectionname2=$shsectionname12['borno_school_section_name'];

?>

	
   <table width="713"  border="" cellpadding="0" cellspacing="0" style="color:#000; margin-left:50px; text-indent:3px" >
   		<tr>
        	<td>Class </td>
            <td><?php echo $classname1; ?> </td>
            <td>Shift </td>
            <td>		
			<?php echo $shiftname; ?> 
             </td>
            <td>Section </td>
            <td> <?php echo $sectionname2; ?> </td>
            <td>Session </td>
            <td> <?php echo $stdsession; ?> </td>
             <td>Roll No </td>
            <td> <?php echo $roll; ?> </td>
        </tr>
   </table>
 <br>  
   <?php
	   $stdsession=trim($_POST['stsess']);
	   		
      $gmemo ="select * from borno_school_receipt where borno_student_info_id='$stdid' and borno_school_session='$stdsession'  group by borno_school_memo asc";

					$qgmemo=$mysqli->query($gmemo);
					while($shsmemo=$qgmemo->fetch_assoc()){
					$memo=$shsmemo['borno_school_memo'];  
					$date=$shsmemo['borno_school_date']; 
					$date=date("d-M-Y",strtotime($date));
	   ?>  
    <table width="713"  border="" cellpadding="0" cellspacing="0" style="color:#000; margin-left:50px; text-indent:5px" >
    	<tr>
        	<td width="150">Payment Date  </td>
            <td width="154"> <?php echo $date; ?>  </td>
            <td width="235">Memo No  </td>
            <td width="164" align="center"> <?php echo $memo; ?> </td>
        </tr>
        <tr>
        	<td colspan="4" align="center">Payment Details        </td>
            </tr>	
          <?php
          $gmemo1 ="select * from borno_school_receipt where borno_school_memo='$memo' order by borno_school_fund_id,borno_school_sub_fund_id asc";
					$qgmemo1=$mysqli->query($gmemo1);
					while($shsmemo1=$qgmemo1->fetch_assoc()){
                    $fundid=$shsmemo1['borno_school_fund_id'];
                    $subfundid=$shsmemo1['borno_school_sub_fund_id'];
                    $fees=$shsmemo1['borno_school_fee'];
 $gfundname ="select * from borno_school_fund where borno_school_fund_id='$fundid'";
					$qgfundname=$mysqli->query($gfundname);
					$shsfundname=$qgfundname->fetch_assoc();
					$fundname=$shsfundname['borno_school_fund_name'];

if($subfundid=="0")
{
  $subfundname='';
}
else{
 $gsubfundname ="select * from borno_school_sub_fund where  borno_school_sub_fund_id='$subfundid'";
					$qgsubfundname=$mysqli->query($gsubfundname);
					$shssubfundname=$qgsubfundname->fetch_assoc();
					$subfundname=$shssubfundname['sub_fund_name'];				}
		  
		  ?>
        <tr>
        	<td colspan="3">  <?php echo $fundname; ?> &nbsp;  <?php echo $subfundname; ?>    </td>
            <td align="right"> <?php echo $fees ?>/- </td>
        </tr>	
        <?php } ?>
        <tr>
          <td colspan="3"><b> Total Ammount </b></td>
          <?php
         $SQL = "SELECT SUM(borno_school_fee) As Ammount from borno_school_receipt where borno_school_memo='$memo'";
		$qaamont=$mysqli->query($SQL);			
		$shqaamont=$qaamont->fetch_assoc();	
		
          ?>
          <td align="right"><b><?php echo $shqaamont['Ammount']; ?>/-</b></td>
        </tr>
        
    </table>
   <?php } ?> 

</br>
<table  border="" cellspacing="0" cellpadding="0" style="color:#000; margin-left:50px" > 
       
   <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Download Payment History" onClick="return contalt_valid()" formtarget="_blank"></td>
  </tr>
      
                        </table>
                         </form>   
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>


</body>
</html>
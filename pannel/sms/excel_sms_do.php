<?php  error_reporting(0);
$server = 'localhost';
$user = 'bornosky_usborno';
$pass = 'Bangladesh`123';
$db_name = 'bornosky_borno18';
//$connReal = mysql_connect($server,$user,$pass) or die(mysql_error());

$con = mysqli_connect($server, $user, $pass, $db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require('PHPExcel/PHPExcel.php'); 
require('PHPExcel/PHPExcel/IOFactory.php'); 
//$schId=$_POST['schId'];

$schId=122;

$excel = $_FILES['excel']['tmp_name'];


//           $sqls = "DELETE FROM `excel_sms`";  
//           if (mysqli_query($con,$sqls)){

           
        
//   } 



 if(!empty($excel)){
 $objPHPExcel = PHPExcel_IOFactory::load($excel);  
 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
 {  
      $highestRow = $worksheet->getHighestRow(); 
      //echo $highestRow;
      for ($row=2; $row<=$highestRow; $row++)  
      {  
            
          $RollNo = $worksheet->getCellByColumnAndRow(0,$row)->getValue();  
          $StudentID = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $StudentName = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $ClassName = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $Shift = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $StdSection = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
          $StdBranch = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
          $Version = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
          $DueAmount = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
          $ContactNo = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
          $StdSession = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
          
        
          $sql = "INSERT INTO `excel_sms`(`school_id`,`RollNo`, `StudentID`, `StudentName`, `ClassName`, `Shift`, `StdSection`, `StdBranch`, `Version`, `DueAmount`, `ContactNo`, `StdSession`,`empty`)values('$schId','$RollNo', '$StudentID','$StudentName','$ClassName','$Shift','$StdSection','$StdBranch','$Version','$DueAmount','$ContactNo','$StdSession','')";  
          if (mysqli_query($con,$sql)){

        
  }  





     }  
}  





 } 
  $sqls = mysqli_query($con,"SELECT * FROM `excel_sms`"); 
foreach($sqls as $result){
   $id= $result[id];
}
if(empty($id)){
    
?>
<h1>sorry Your format is not correct , for back <a href="excel_sms.php">click here</a> </h1>
<?php
    
}else{
    
     ?>
     
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Borno Sky</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Meta -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    <script language="javascript">
		function callpage()
		{
		 document.frmart.action="excel_sms_do.php";
		 document.frmart.submit();
		}
	</script>

 
	
</head>
<body>
<div class="main">
	<div class="left_fixed">
		<div class="logo_top">
		  <a href="index.php"><img src="images/indiv/sms.jpg" height="80px" width="120px"></a>
			<!--<a href=""><img src="images/sms/in09.jpg" height="80px" width="120px"></a>-->
		</div>
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="send_excel_sms.php" method="post" enctype="multipart/form-data">
					<center>
						<table>
							<tbody>
							<tr>
								<td>Data:</td>
								<td><?php echo date('d.m.Y'); ?></td>
							</tr>
							<tr>
								<td>Sms Type:</td>                               
								<td>									
                                <select Style="margin-left: 6px;" name="smstype" id="smstype"  onChange="callpage();">
                                <option value="">--Select--</option>

                                <option value="Static" <?php if($_POST['smstype']=='Static') {echo "selected"; } ?>> Static </option>
                                 <option value="Dynamic" <?php if($_POST['smstype']=='Dynamic') {echo "selected"; } ?>> Dynamic </option>
                                <?php  ?>
                              </select>
								</td>
							</tr>
							<?php                                       
					        $smstype=$_POST['smstype'];
						if($smstype=="Dynamic"){ 
                                    ?>
                             
							<tr>
								<td> <?php
                                if(empty($_REQUEST['a1'])){
                                $_REQUEST['a1']=null;
                                } ?> <input type="text" id="a1" onChange="callpage();" name="a1" value="<?php echo $_REQUEST['a1'] ?>" </td>
								<td >
                                   <select Style="margin-left: 6px;" name="1st" id="1st" onChange="callpage();">
                                <option value="">--Select--</option>
                                <option value="RollNo" <?php if($_POST['1st']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['1st']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['1st']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['1st']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['1st']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['1st']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['1st']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['1st']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['1st']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['1st']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['1st']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                       
                              </select>
                             <?php
                                if(empty($_REQUEST['a2'])){
                                $_REQUEST['a2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="a2" id="a2" value="<?php echo $_REQUEST['a2'] ?>"></td>
                                  
                              
                             	</tr>
                             	
							<tr>
							    
							
								<td> <?php
                                if(empty($_REQUEST['b1'])){
                                $_REQUEST['b1']=null;
                                } ?> <input type="text" id="b1" onChange="callpage();" name="b1" value="<?php echo $_REQUEST['b1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="2nd" id="2nd" onChange="callpage();">
                                <option value="">--Select--</option>
                                 <option value="RollNo" <?php if($_POST['2nd']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['2nd']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['2nd']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['2nd']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['2nd']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['2nd']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['2nd']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['2nd']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['2nd']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['2nd']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['2nd']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                 </select>
                              	<?php
                                if(empty($_REQUEST['b2'])){
                                $_REQUEST['b2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="b2" value="<?php echo $_REQUEST['b2'] ?>"></td>
							<tr>
							
							<td> <?php
                                if(empty($_REQUEST['c1'])){
                                $_REQUEST['c1']=null;
                                } ?> <input type="text" id="c1" onChange="callpage();" name="c1" value="<?php echo $_REQUEST['c1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="3rd" id="3rd" onChange="callpage();">
                                <option value="">--Select--</option>
                               <option value="RollNo" <?php if($_POST['3rd']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['3rd']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['3rd']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['3rd']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['3rd']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['3rd']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['3rd']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['3rd']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['3rd']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['3rd']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['3rd']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                             </select>
                              	<?php
                                if(empty($_REQUEST['c2'])){
                                $_REQUEST['c2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="c2" value="<?php echo $_REQUEST['c2'] ?>"></td></tr>
							<tr>
							
							 <td> <?php
                                if(empty($_REQUEST['d1'])){
                                $_REQUEST['d1']=null;
                                } ?> <input type="text" id="d1" onChange="callpage();" name="d1" value="<?php echo $_REQUEST['d1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="4th" id="4th" onChange="callpage();">
                                <option value="">--Select--</option>
                                <option value="RollNo" <?php if($_POST['4th']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['4th']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['4th']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['4th']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['4th']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['4th']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['4th']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['4th']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['4th']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['4th']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['4th']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                             </select>
                              	<?php
                                if(empty($_REQUEST['d2'])){
                                $_REQUEST['d2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="d2" value="<?php echo $_REQUEST['d2'] ?>"></td>
								</tr>
								<tr>
							<td> <?php
                                if(empty($_REQUEST['e1'])){
                                $_REQUEST['e1']=null;
                                } ?> <input type="text" id="e1" onChange="callpage();" name="e1" value="<?php echo $_REQUEST['e1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="5th" id="5th" onChange="callpage();">
                                <option value="">--Select--</option>
                                 <option value="RollNo" <?php if($_POST['5th']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['5th']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['5th']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['5th']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['5th']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['5th']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['5th']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['5th']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['5th']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['5th']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['5th']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                             </select>
                              	<?php
                                if(empty($_REQUEST['e2'])){
                                $_REQUEST['e2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="e2" value="<?php echo $_REQUEST['e2'] ?>"></td></tr>
							<tr>
							
							<td> <?php
                                if(empty($_REQUEST['f1'])){
                                $_REQUEST['f1']=null;
                                } ?> <input type="text" id="f1" onChange="callpage();" name="f1" value="<?php echo $_REQUEST['f1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="6th" id="6th" onChange="callpage();">
                                        <option value="">--Select--</option>
                                <option value="RollNo" <?php if($_POST['6th']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['6th']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['6th']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['6th']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['6th']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['6th']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['6th']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['6th']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['6th']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['6th']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['6th']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                              </select>
                              	<?php
                                if(empty($_REQUEST['f2'])){
                                $_REQUEST['f2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="f2" value="<?php echo $_REQUEST['f2'] ?>"></td>	</tr>
							<tr>
						
							<td> <?php
                                if(empty($_REQUEST['g1'])){
                                $_REQUEST['g1']=null;
                                } ?> <input type="text" id="g1" onChange="callpage();" name="g1" value="<?php echo $_REQUEST['g1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="7th" id="7th" onChange="callpage();">
                                        <option value="">--Select--</option>
                                <option value="RollNo" <?php if($_POST['7th']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['7th']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['7th']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['7th']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['7th']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['7th']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['7th']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['7th']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['7th']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['7th']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['7th']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                              </select>
                              	<?php
                                if(empty($_REQUEST['g2'])){
                                $_REQUEST['g2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="g2" value="<?php echo $_REQUEST['g2'] ?>"></td>	</tr>
							<tr>
							
							<td> <?php
                                if(empty($_REQUEST['h1'])){
                                $_REQUEST['h1']=null;
                                } ?> <input type="text" id="h1" onChange="callpage();" name="h1" value="<?php echo $_REQUEST['h1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="8th" id="8th" onChange="callpage();">
                                <option value="">--Select--</option>
                               <option value="RollNo" <?php if($_POST['8th']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['8th']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['8th']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['8th']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['8th']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['8th']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['8th']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['8th']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['8th']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['8th']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['8th']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                              </select>
                              	<?php
                                if(empty($_REQUEST['h2'])){
                                $_REQUEST['h2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="h2" value="<?php echo $_REQUEST['h2'] ?>"></td>	</tr>
							<tr>
								
							<td> <?php
                                if(empty($_REQUEST['i1'])){
                                $_REQUEST['i1']=null;
                                } ?> <input type="text" id="i1" onChange="callpage();" name="i1" value="<?php echo $_REQUEST['i1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="9th" id="9th" onChange="callpage();">
                                <option value="">--Select--</option>
                                <option value="RollNo" <?php if($_POST['9th']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['9th']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['8th']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['9th']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['9th']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['9th']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['9th']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['9th']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['9th']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['9th']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['9th']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                             </select>
                              	<?php
                                if(empty($_REQUEST['i2'])){
                                $_REQUEST['i2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="i2" value="<?php echo $_REQUEST['i2'] ?>"></td></tr>
							<tr>
							
							<td> <?php
                                if(empty($_REQUEST['j1'])){
                                $_REQUEST['j1']=null;
                                } ?> <input type="text" id="j1" onChange="callpage();" name="j1" value="<?php echo $_REQUEST['j1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="10th" id="10th" onChange="callpage();">
                                <option value="">--Select--</option>
                                <option value="RollNo" <?php if($_POST['10th']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['10th']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['10th']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['10th']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['10th']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['10th']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['10th']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['10th']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['10th']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['10th']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['10th']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                              </select>
                              		<?php
                                if(empty($_REQUEST['j2'])){
                                $_REQUEST['j2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="j2" value="<?php echo $_REQUEST['j2'] ?>"></td></tr>
							<tr>
								
							<td> <?php
                                if(empty($_REQUEST['k1'])){
                                $_REQUEST['k1']=null;
                                } ?> <input type="text" id="k1" onChange="callpage();" name="k1" value="<?php echo $_REQUEST['k1'] ?>" </td>
								<td>
                                   <select Style="margin-left: 6px;" name="11th" id="11th" onChange="callpage();">
                                <option value="">--Select--</option>
                               <option value="RollNo" <?php if($_POST['11th']=='RollNo') {echo "selected"; } ?>>RollNo</option>
                                <option value="StudentID" <?php if($_POST['11th']=='StudentID') {echo "selected"; } ?>>StudentID</option>
                                <option value="StudentName" <?php if($_POST['11th']=='StudentName') {echo "selected"; } ?>>StudentName</option>
                                <option value="ClassName" <?php if($_POST['11th']=='ClassName') {echo "selected"; } ?>>ClassName</option>
                                <option value="Shift" <?php if($_POST['11th']=='Shift') {echo "selected"; } ?>>Shift</option>
                                <option value="StdSection" <?php if($_POST['11th']=='StdSection') {echo "selected"; } ?>>StdSection</option>
                                <option value="StdBranch" <?php if($_POST['11th']=='StdBranch') {echo "selected"; } ?>>StdBranch</option>
                                <option value="Version"  <?php if($_POST['11th']=='Version') {echo "selected"; } ?>>Version</option>
                                <option value="DueAmount"  <?php if($_POST['11th']=='DueAmount') {echo "selected"; } ?>>DueAmount</option>
                                <option value="ContactNo"  <?php if($_POST['11th']=='ContactNo') {echo "selected"; } ?>>ContactNo</option>
                                <option value="StdSession" <?php if($_POST['11th']=='StdSession') {echo "selected"; } ?>>StdSession</option>
                                              </select>		<?php
                                if(empty($_REQUEST['k2'])){
                                $_REQUEST['k2']=null;
                                } ?> 
                              	<input style="width: 248px;" type="text" name="k2" value="<?php echo $_REQUEST['k2'] ?>">
                              	</td>
							</tr>
							 <?php  
							 }
							?>

							<!--<tr>-->
							<!--	<td></td>-->
							<!--	<td>-->
								
         
       <!--                 <textarea Style="width: 260px;" name="message" cols="45" rows="3" id="message" onKeyDown="textCounter(document.myForm.message,document.myForm.remLen1,)" onKeyUp="textCounter(document.myForm.message,document.myForm.remLen1)"></textarea>-->
							<!--	</td>-->
							<!--</tr>-->
							</tbody>
						</table>
					</center>
				<center><input type="submit" value="Send">
					  <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
                      <input type="hidden" name="avlSMS" id="avlSMS" value="<?php echo $avlSMS; ?>" />
					</center>
				</form> 
                
                <br><br>
				

			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

<script>
$("#checkAll").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>


 
</body>
</html>


    <?php
    
   
}
 

    

?>


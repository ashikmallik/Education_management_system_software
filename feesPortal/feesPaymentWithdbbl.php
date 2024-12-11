<?php 
ob_start();
	include('../connection.php');
	session_start();
	$studentid=$_SESSION['studentid'];
//	$branchid=$_SESSION['branchid'];
		if($studentid== "")
	{
	   $message = 'Student ID doesnot Exist.';
                                
                                echo "<SCRIPT> 
                                alert('$message')
                                window.location.replace('index.php');
                                </SCRIPT>";
	}
	
						
	$gststdinfoname="select * from borno_student_info where borno_student_info_id = '$studentid'";
					$qgststdinfoname=$mysqli->query($gststdinfoname);
			    	$shggststdinfoname=$qgststdinfoname->fetch_assoc();
			    	
			    	$session = trim($shggststdinfoname['borno_school_session']);
			   	    $class_id = $shggststdinfoname['borno_school_class_id'];
	
	$gettcinfo = "SELECT * FROM `student_fees` WHERE `fees_head_id` = 12 AND `due_amount` > 0 AND `student_id` ='$studentid'";
		$qgettcinfo=$mysqli->query($gettcinfo);
			    	$shqgettcinfo=$qgettcinfo->fetch_assoc();
			    	$student_id1 = $shqgettcinfo['student_id'];
			    	
			    	
?>
<html>
<head>
    <title>amarEskul</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		if(document.frmcontent.termsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.termsess.focus();
			return (false);
		}
						
	}
function callpage()
	{
	 document.frmcontent.action="feesPaymentWithdbbl.php";
	 document.frmcontent.submit();
	}
</script> 

<script>
function myFunction() {
  var z = 0;

  var x = document.getElementById("prvdue");
  
  
 var y = document.getElementById("totalammount");
   if(x == null){
      x = 0 ;
      console.log(x);
   }
   else{
    x= parseInt(document.getElementById("prvdue").value);
    console.log(x);
   }
    if(y == null){
      y = 0 ;
   }
   else{
    y= parseInt(document.getElementById("totalammount").value);
   }
 var z = x + y;
  document.getElementById("totaldues").innerHTML = z;
  
}
window.onload = myFunction;
</script>

<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
            <div class="row">
                <div class="col-md-12 login-form-1">
                    <h3>Fees Portal</h3>
                    <!--<h5 style="text-align: center;color: red;margin-top: 3%;">***প্রবেশপত্র পেতে আপনাকে পরীক্ষার ফি সহ মে মাস পর্যন্ত টিউশন ফি দিতে হবে***</h5>-->
                    <form name="frmcontent" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                ID :
                            </leble>
                            </div>
                            <div class="col-md-8" >
                             <leble class="form-control" style="margin-left: -9%;">
                                <?php echo $shggststdinfoname['borno_student_info_id']; ?>
                            </leble>
                       </div>
                        </div>
                         </div>
                         <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Name :
                            </leble>
                            </div>
                            <div class="col-md-8">
                             <leble class="form-control" style="margin-left: -9%;">
                                <?php echo $shggststdinfoname['borno_school_student_name']; ?>
                            </leble>
                       </div>
                        </div>
                         </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control" style="width: 135%; margin-top: 10%;">
                                Session :
                            </leble>
                            </div>
                            <div class="col-md-8">
                             <leble class="form-control" style=" margin-top: 4%;">
                                <?php echo $shggststdinfoname['borno_school_session']; ?>
                            </leble>
                       </div>
                        </div>
                         </div>
                        <div class="col-md-4">
                            <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control" style="width: 147%;margin-left: -10%; margin-top: 10%;">
                                Fiscal Year :
                            </leble>
                            </div>
                            <div class="col-md-8">
                    

                      <select name="fiscalyearid" id="fiscalyearid" onchange="callpage();" class="form-control" style=" margin-top: 4%;" >
                      <option value="">--Select--</option>
                            <?php
                           // echo $session;
                          // $getfiscalid = ""
                           
                          
                              $getfiscalyear = "SELECT * FROM `fiscal_year` WHERE trim(`session`) ='$session' ORDER BY `fiscal_year_id`"; 
                    
                            	
		$qgetfiscalyear=$mysqli->query($getfiscalyear);
			    	
			    		while($shqgetfiscalyear=$qgetfiscalyear->fetch_assoc()){ $sl++;
			  // $fiscalYearid =  $shqgetfiscalyear ['fiscal_year_id'];
			   ?>
			   <option value=" <?php echo $shqgetfiscalyear['fiscal_year_id']; ?>" <?php if($shqgetfiscalyear['fiscal_year_id']==$_POST['fiscalyearid']) { echo "selected"; }  ?>> <?php echo $shqgetfiscalyear['fiscal_year_name']; ?></option>
      <?php } ?>
      </select>

                       </div>
                        </div>
                         </div>
                    <?php 
                     $fiscalyearid= $_POST['fiscalyearid'];
                    ?>               
                        </div>
                        

  
                        <!--<div class="form-group">-->
                        <!--    <input type="submit" class="btnSubmit" value="Login" />-->
                        <!--</div>-->
                      
                    </form>
                              <hr> 
                    <div class="row">
                        <div class="col-md-8">          
                   <form action="make_transaction.php" method="post" enctype="multipart/form-data" >
                       <div class="row">
            <!--<div class="col-sm-12" style="text-align: left;"><table><tr><td><strong>Selected Card : </strong></td><td>&nbsp;</td><td><div id="cardType" style="text-align: left; color: blue; font-weight:bold;">Rocket</div></td></tr></table></div>-->
                                    </div>
                <div class="row">
								
										
					<!--<div class="col-sm-2">-->
     <!--                   <div class="radio" style="text-align: left;">-->
     <!--                   <label style="font-size: 12px;">-->
     <!--                   <input type="radio" value="6" name="optcard" id="optcard">-->
     <!--                   <img alt="Rocket" src="dbbl_img/dbbl-mb.png" style="width:40px; height:25px;" /> -->
     <!--                           <br/>Rocket-->
     <!--                   </label>-->
     <!--                   </div>-->
     <!--               </div>-->
   
                </div>
                        <div class="form-group">
            <table class="form-table" style="border: 1px solid #005067;width: 90%;">
                              <tr style="background-color: #005067; color: #fff;">
                               <td align="center" >Sl</td>
                               <td align="center" >Head Name</td>
                               <td align="center" >Month And Year</td>
                               <td align="center">Due Amount</td>
                               <td align="center">Net Amount</td>
                              </tr>
                                <?php
                                
                      $gststdinfos="select * from borno_student_info where borno_student_info_id = '$studentid'";
					$qgststdinfos=$mysqli->query($gststdinfos);
			    	$shqgststdinfos=$qgststdinfos->fetch_assoc();
			    	
			    	$branchid = $shqgststdinfos['borno_school_branch_id'];          
                        $fiscalyeardeatilsid =  $_POST['fiscalyeardeatilsid'];
                        $classid = $shqgststdinfos['borno_school_class_id']; 
                                  
                        if($session=='2021' OR $session=='2020')  {     
                            
                            if($session=='2021'){
                            $gtduelist="SELECT `month_name`,`head_name`,`due_amount`,sf.`fees_head_id` FROM `student_fees` AS sf INNER JOIN fees_head AS fh ON fh.`head_id` = sf.`fees_head_id` AND fh.`branch_id` = $branchid AND fh.`class_id` =$classid AND `stsess` = '2021' WHERE `due_amount` >0 AND `student_id` ='$studentid' AND `stsess` = '2021' ";
                            }
                            else{
                                $gtduelist="SELECT `month_name`,`head_name`,`due_amount`,sf.`fees_head_id` FROM `student_fees` AS sf INNER JOIN fees_head AS fh ON fh.`head_id` = sf.`fees_head_id` AND fh.`branch_id` = $branchid AND fh.`class_id` =$classid AND `stsess` = '2020' WHERE `due_amount` >0 AND `student_id` ='$studentid' AND `stsess` = '2020' ";
                            }
                            
  		
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
                            
                          ?>
<tr>
    <td width="10%;" align="center" style="border: 1px solid #005067;"><?php echo $sl; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['head_name']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['month_name']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>
        <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>

  </tr>
                              
      
  <?php 

    
  }
  if($session=='2021'){
    $gttoaldue="SELECT SUM(`due_amount`) as totaldue FROM `student_fees`  WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND `session` = '2021'";
  }
  else{
      $gttoaldue="SELECT SUM(`due_amount`) as totaldue FROM `student_fees`  WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND `session` = '2020'";
  }
       $qgttoaldue=$mysqli->query($gttoaldue);
       $shqgttoaldue=$qgttoaldue->fetch_assoc();
       
       $totaldue = $shqgttoaldue['totaldue'];
       $totalammount =  20;
                        
                        }
                        
    else if($session=='2020-21')  {     
                            
                         
                            $gtduelist="SELECT `month_name`,`head_name`,`due_amount`,sf.`fees_head_id` FROM `student_fees` AS sf INNER JOIN fees_head AS fh ON fh.`head_id` = sf.`fees_head_id` AND fh.`branch_id` = $branchid AND fh.`class_id` =$classid AND `stsess` = '$session' WHERE `due_amount` >0 AND `student_id` ='$studentid' AND `stsess` = '$session' ";

                            
  		
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
                            
                          ?>
<tr>
    <td width="10%;" align="center" style="border: 1px solid #005067;"><?php echo $sl; ?></td>
    <td width="15%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['head_name']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['month_name']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>
         <?php 
         
      if($shgtduelist['fees_head_id'] == 4){
    ?>
        <td width="20%;" align="center" style="border: 1px solid #005067;"><input type ="text" readonly name="prvdue" id="prvdue" oninput="myFunction()" value="<?php echo $shgtduelist['due_amount']; ?>" style="width: 98px;text-align: center;" /></td>
    <?php 
      }
      else 
      {
    ?>
        <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>
      <?php } ?>
  </tr>
                              
      
  <?php 

    
  }

    $gttoaldue="SELECT SUM(`due_amount`) as totaldue FROM `student_fees`  WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND `session` = '$session'  AND `fees_head_id` NOT IN ('4')";

       $qgttoaldue=$mysqli->query($gttoaldue);
       $shqgttoaldue=$qgttoaldue->fetch_assoc();
       
       $totaldue = $shqgttoaldue['totaldue'];
       $totalammount = $totaldue+ 20;
                        
                        } 
    else if($session=='2022' AND $classid ==1 )  {     
                            
                         
                            $gtduelist="SELECT `month_name`,`head_name`,`due_amount`,sf.`fees_head_id` FROM `student_fees` AS sf INNER JOIN fees_head AS fh ON fh.`head_id` = sf.`fees_head_id` AND fh.`branch_id` = $branchid AND fh.`class_id` =$classid AND `stsess` = '$session' WHERE `due_amount` >0 AND `student_id` ='$studentid' AND `stsess` = '$session' ";

                            
  		
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
                            
                          ?>
<tr>
    <td width="10%;" align="center" style="border: 1px solid #005067;"><?php echo $sl; ?></td>
    <td width="15%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['head_name']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['month_name']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>
         <?php 
      if($shgtduelist['fees_head_id'] == 4){
    ?>
        <td width="20%;" align="center" style="border: 1px solid #005067;"><input type ="text" readonly name="prvdue" id="prvdue" oninput="myFunction()" value="<?php echo $shgtduelist['due_amount']; ?>" style="width: 98px;text-align: center;" /></td>
    <?php 
      }
      else 
      {
    ?>
        <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>
      <?php } ?>
  </tr>
                              
      
  <?php 

    
  }

    $gttoaldue="SELECT SUM(`due_amount`) as totaldue FROM `student_fees`  WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND `session` = '$session'  AND `fees_head_id` NOT IN ('4')";

       $qgttoaldue=$mysqli->query($gttoaldue);
       $shqgttoaldue=$qgttoaldue->fetch_assoc();
       
       $totaldue = $shqgttoaldue['totaldue'];
       $totalammount = $totaldue+ 20;
                        
                        }  
	  else{
	      if ($branchid == 3){
	   if($session=='2021-22'){
	    $gtduelist="SELECT DISTINCT `month_name`,`year`,`head_name`,`due_amount`,sf.`fees_head_id` FROM `student_fees` AS sf INNER JOIN fees_head AS fh ON fh.`head_id` = sf.`fees_head_id` AND fh.`branch_id` = $branchid AND fh.`class_id`<=$classid AND trim(`stsess`) = '$session'  WHERE `due_amount` > 0 
  		AND `student_id` ='$studentid' AND  sf.`fiscal_year_id`<='$fiscalyearid' ORDER BY sf.`fees_head_id`,`fiscal_year_details_id` ASC"; // AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid'
	   }
	   else{
	     $gtduelist="SELECT DISTINCT `month_name`,`year`,`head_name`,`due_amount`,sf.`fees_head_id` FROM `student_fees` AS sf INNER JOIN fees_head AS fh ON fh.`head_id` = sf.`fees_head_id` AND fh.`branch_id` = $branchid AND fh.`class_id`<=$classid AND trim(`stsess`) = '$session'  WHERE `due_amount` > 0 
  		AND `student_id` ='$studentid'AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid' AND  sf.`fiscal_year_id`='$fiscalyearid' ORDER BY sf.`fees_head_id`,`fiscal_year_details_id` ASC"; 
	   }

	      }else{
  		$gtduelist="SELECT DISTINCT sf.`fees_head_id`,`month_name`,`year`,`head_name`,`due_amount` FROM `student_fees` AS sf LEFT JOIN fees_head AS fh ON fh.`head_id` = sf.`fees_head_id` AND fh.`branch_id` = $branchid AND fh.`class_id` <=$classid AND trim(`stsess`) <= '$session'  WHERE `due_amount` > 0 
  		AND `student_id` ='$studentid'AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid' AND  sf.`fiscal_year_id`<='$fiscalyearid' ORDER BY sf.`fees_head_id`,`fiscal_year_details_id` ASC "; //AND trim(`stsess`) = '$session'
	      }
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
  ?>
<tr>
    <td width="10%;" align="center" style="border: 1px solid #005067;"><?php echo $sl; ?></td>
    <td width="15px;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['head_name']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php if(!empty($shgtduelist['month_name'])){ echo $shgtduelist['month_name']."'".$shgtduelist['year'];}elseif(!empty($shgtduelist['year'])){echo $shgtduelist['year'];}else{echo"-";} ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>

        <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>
  </tr>
                              
      
  <?php 
    
  }
  if ($branchid == 3){
      if($session=='2021-22'){
  $gttoaldue="SELECT SUM(`due_amount`) as totaldue FROM `student_fees`  WHERE `due_amount` > 0 AND `student_id` ='$studentid'  
  AND `fiscal_year_id` <='$fiscalyearid' AND `fees_head_id` NOT IN ('4')"; //AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid'
      }
      else{
         $gttoaldue="SELECT SUM(`due_amount`) as totaldue FROM `student_fees`  WHERE `due_amount` > 0 AND `student_id` ='$studentid'AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid' 
  AND `fiscal_year_id` ='$fiscalyearid' AND `fees_head_id` NOT IN ('4')"; 
      }
  }
  else{
        $gttoaldue="SELECT SUM(`due_amount`) as totaldue FROM `student_fees`  WHERE `due_amount` > 0 AND `student_id` ='$studentid'AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid' 
  AND `fiscal_year_id` <='$fiscalyearid' AND `fees_head_id` NOT IN ('4')";
  }
       $qgttoaldue=$mysqli->query($gttoaldue);
       $shqgttoaldue=$qgttoaldue->fetch_assoc();
       
       $totaldue = $shqgttoaldue['totaldue'];
       $totalammount = $totaldue; //+ 20;
	  }  
  
  
  	
			  
			  if($branchid == 2){
			      $submername = 'MMSC-Basabo_School';
            	  $submerid = '000599002240002';
            	  $terminalid = '59905342';
			  } 
			  else if($branchid == 3){
			      $submername = 'MMSC-Motijheel_College';
            	  $submerid = '000599002240003';
            	  $terminalid = '59905343';
			  }
			  else if($branchid == 1){
			      $submername = 'MMSC-School_Motijheel';
            	  $submerid = '000599002240001';
            	  $terminalid = '59905341';
			  }
  ?>     
  <!--<tr>-->
  <!--    <td width="10%;" align="center" style="border: 1px solid #005067;"></td>-->
  <!--        <td width="20%;" align="center" style="border: 1px solid #005067;"></td>-->
  <!--  <td width="20%;" align="center" style="border: 1px solid #005067;"></td>-->
  <!--  <td width="20%;" align="center" style="border: 1px solid #005067;">Bank Charge</td>-->
  <!--      <td width="20%;" align="center" style="border: 1px solid #005067;">20 </td>-->
  <!--</tr>-->
  <tr>
      <td width="10%;" align="center" style="border: 1px solid #005067;"></td>
          <td width="20%;" align="center" style="border: 1px solid #005067;"></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;">Total Amount</td>
        <td width="20%;" align="center" style="border: 1px solid #005067;"><label name="totaldues" id="totaldues"></label> </td>
  </tr>
                            </table>
                        </div>
                       
                        <div>
                            <input type ="hidden" name="totalammount" id="totalammount" value="<?php echo $totalammount; ?>" /> 
                            <input type ="hidden" name="submername" id="submername" value="<?php echo $submername; ?>" />
                            <input type ="hidden" name="submerid" id="submerid" value="<?php echo $submerid; ?>" />
                            <input type ="hidden" name="terminalid" id="terminalid" value="<?php echo $terminalid; ?>" />
                            <input type ="hidden" name="fiscalyeardeatilsid" id="fiscalyeardeatilsid" value="<?php echo $fiscalyeardeatilsid; ?>" />
                            <input type ="hidden" name="fiscalyearid" id="fiscalyearid" value="<?php echo $fiscalyearid; ?>" />
                            <input type ="hidden" name="studentid" id="studentid" value="<?php echo $studentid; ?>" />
                            <input type ="hidden" name="branchid" id="branchid" value="<?php echo $branchid; ?>" />
                            <input type ="hidden" name="classid" id="classid" value="<?php echo $classid; ?>" />
                            
                         <input type ="hidden" name="bankcharge" id="bankcharge" value="20" />
                         <input type ="hidden" name="card" id="card" value="6" />
                         
                         <?php //if($totaldue!= 0 ) { ?>
                            <!--<input type="submit" class="btn btn-primary" name="pay" id="pay" value="Pay Now" />-->
                            <?php 
                            //} ?>
                        </div>
                      
                    </form>
                     </div>
 <div class ="col-md-4">
      <table width="500" border="1" cellspacing="0" cellpadding="0" style="margin-left: -40%; margin-top: 21%;">
              <th style="background-color: #005067; color: #fff;">Payment History</th> 
              <th style="background-color: #005067; color: #fff;"></th>
              <th style="background-color: #005067; color: #fff;"></th>
              <th style="background-color: #005067; color: #fff;"></th>
              <th style="background-color: #005067; color: #fff;"></th>
         <tr>
          
           <td align="center" style="background-color:#fad390;">Date</td>
           <td align="center" style="background-color:#f6b93b;">Memo</td>
           <td align="center" style="background-color:#6a89cc;">Amount</td>
           <td align="center" style="background-color:#6a89cc;">Status</td>
           <td align="center" style="background-color:#6a89cc;">Print</td>
           
           
         </tr>
    <?php  
         $gtpaidlist="SELECT *,SUM(`receive_amount`)AS receive_amount FROM `collection_details` WHERE `receive_amount` > 0 AND `student_id` ='$studentid' GROUP BY `money_receipt_no` ORDER BY `details_id` ASC";
  		
		$sl=0;
		$qgtpaidlist=$mysqli->query($gtpaidlist);
		while($sqgtpaidlist=$qgtpaidlist->fetch_assoc()){
		
		$sl++;
  
  ?>
<tr>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $sqgtpaidlist['receive_date']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $sqgtpaidlist['money_receipt_no']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $sqgtpaidlist['receive_amount']; ?></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;">Paid</td>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><a href="download_memo_half.php?memo=<?php echo $sqgtpaidlist['money_receipt_no'];?>" target="_blank">Print</a></td>
  </tr>
                              
      
  <?php 
    
  }
  ?>
     </table>
     </div>  
                     </div>
                            </div>
                        </div>
                             

                </div>
                
                
            </div>
        </div>
</html>
<?php 
ob_start();
	include('../connection.php');
// 	session_start();
 	$studentid=$_REQUEST['studentid'];
// //	$branchid=$_SESSION['branchid'];



	
	
						
	$gststdinfoname="SELECT * FROM `student_addmission` where `user_id` = '$studentid' AND `is_paid` = 1 ";
					$qgststdinfoname=$mysqli->query($gststdinfoname);
			    	$shggststdinfoname=$qgststdinfoname->fetch_assoc();
			    	
			    	$session = trim($shggststdinfoname['session']);
			    	$branch_id = $shggststdinfoname['branch_id'];
			    	$newstuent_id = $shggststdinfoname['student_id'];
			    	$fiscalyeardeatilsid = $shggststdinfoname['fiscal_year_details_id'];
			    	$fiscalyearid = $shggststdinfoname['fiscal_year_id'];
			    	$paid = $shggststdinfoname['is_paid'];
			    	$group = $shggststdinfoname['student_group'];
			    
			    if(!empty($newstuent_id)){	
			    	
			    if($branch_id == 1){
			        $branch = "Motijheel";
			    }
			    else{
			        $branch = "Basabo";
			    }
			    }else{
			        $newstuent_id = $studentid; 
			        $branch = "College";
			    }
	
			 if($group == 1){
			     $stgroup = "Science";
			 }   
			 else if($group == 2){
			     $stgroup = "Business Studies";
			 }
			 else if($group == 3){
			     $stgroup = "Humanities";
			 }
			 else{
			     $stgroup = "N/A";
			 }
			    	
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
                        <div class="row" >
                         <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                               User ID :
                            </leble>
                            </div>
                            <div class="col-md-8" >
                             <leble class="form-control" style="margin-left: -9%;">
                                <?php echo $shggststdinfoname['user_id']; ?>
                            </leble>
                       </div>
                        </div>
                         </div>
                         <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-6">
                            <leble class="form-control">
                                Admission Branch :
                            </leble>
                            </div>
                            <div class="col-md-6">
                             <leble class="form-control" style="margin-left: -9%;">
                                <?php echo $branch; ?>
                            </leble>
                       </div>
                        </div>
                         </div>
                        </div>
                        <div class="row">
                       <!--  <div class="col-md-6">-->
                       <!--     <div class="row">-->
                       <!--     <div class="col-md-4">-->
                       <!--     <leble class="form-control" style="margin-top: 10%;">-->
                       <!--        Student ID :-->
                       <!--     </leble>-->
                       <!--     </div>-->
                       <!--     <div class="col-md-8" >-->
                       <!--      <leble class="form-control" style="margin-left: -9%; margin-top: 4%;">-->
                       <!--         <?php echo $shggststdinfoname['student_id']; ?>-->
                       <!--     </leble>-->
                       <!--</div>-->
                       <!-- </div>-->
                       <!--  </div>-->
                         <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control" style="margin-top: 10%;">
                                Name :
                            </leble>
                            </div>
                            <div class="col-md-8">
                             <leble class="form-control" style="margin-left: -9%;margin-top: 4%;">
                                <?php echo $shggststdinfoname['student_name']; ?>
                            </leble>
                       </div>
                        </div>
                         </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control" style=" margin-top: 10%;">
                                Session :
                            </leble>
                            </div>
                            <div class="col-md-8">
                             <leble class="form-control" style="margin-left: -9%; margin-top: 4%;">
                                <?php echo $shggststdinfoname['session']; ?>
                            </leble>
                       </div>
                        </div>
                         </div>
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control" style="margin-top: 10%;">
                                Group :
                            </leble>
                            </div>
                            <div class="col-md-8">
                             <leble class="form-control" style="margin-left: -9%;margin-top: 4%;">
                                <?php echo $stgroup; ?>
                            </leble>
                       </div>
                        </div>
                         </div>
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
            <div class="col-sm-12" style="text-align: left;"><table><tr><td><strong>Selected Card : </strong></td><td>&nbsp;</td><td><div id="cardType" style="text-align: left; color: blue; font-weight:bold;">Rocket</div></td></tr></table></div>
                                    </div>
                <div class="row">
								
										
					<div class="col-sm-2">
                        <div class="radio" style="text-align: left;">
                        <label style="font-size: 12px;">
                        <input type="radio" value="6" name="optcard" id="optcard">
                        <img alt="Rocket" src="dbbl_img/dbbl-mb.png" style="width:40px; height:25px;" /> 
                                <br/>Rocket
                        </label>
                        </div>
                    </div>
   
                </div>
                        <div class="form-group">
            <table class="form-table" style="border: 1px solid #005067;width: 90%;">
                              <tr style="background-color: #005067; color: #fff;">
                               <td align="center" >Sl</td>
                               <td align="center" >Head Name</td>
                               <td align="center">Due Amount</td>
                              </tr>
                                <?php
                                
                      $gststdinfos="SELECT * FROM `student_addmission` where `user_id` = '$studentid'";
					$qgststdinfos=$mysqli->query($gststdinfos);
			    	$shqgststdinfos=$qgststdinfos->fetch_assoc();
			    	
			    	$branchid = $shqgststdinfos['branch_id'];          
                        
                        $classid = $shqgststdinfos['class_id']; 
                                  

  		$gtduelist="SELECT * FROM `student_addmission` where `user_id` = '$studentid'";
  		
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
  ?>
<tr>
    <td width="10%;" align="center" style="border: 1px solid #005067;"><?php echo $sl; ?></td>
    <?php if($branchid == 3){ ?>
    <td width="15px;" align="center" style="border: 1px solid #005067;"><?php echo "Session Fee";?></td>
    <?php } 
    else {
    ?>
    <td width="15px;" align="center" style="border: 1px solid #005067;"><?php echo "Session Fee and Tution Fee";?></td>
        <?php } 
 
    ?>
    <td width="20%;" align="center" style="border: 1px solid #005067;"><?php echo $shgtduelist['due_amount']; ?></td>

  </tr>
                              
      
  <?php 
    
  
  $gttoaldue="SELECT * FROM `student_addmission` where `user_id` = '$studentid'";
       $qgttoaldue=$mysqli->query($gttoaldue);
       $shqgttoaldue=$qgttoaldue->fetch_assoc();
       
       $totaldue = $shqgttoaldue['due_amount'];
       $totalammount = $totaldue + 20;
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
  <tr>
      <td width="10%;" align="center" style="border: 1px solid #005067;"></td>
    <td width="20%;" align="center" style="border: 1px solid #005067;">Bank Charge</td>
        <td width="20%;" align="center" style="border: 1px solid #005067;">20 </td>
  </tr>
  <tr>
      <td width="10%;" align="center" style="border: 1px solid #005067;"></td>
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
                            <input type ="hidden" name="studentid" id="studentid" value="<?php echo $newstuent_id; ?>" />
                            <input type ="hidden" name="branchid" id="branchid" value="<?php echo $branchid; ?>" />
                            <input type ="hidden" name="fiscalyeardeatilsid" id="fiscalyeardeatilsid" value="<?php echo $fiscalyeardeatilsid; ?>" />
                            <input type ="hidden" name="fiscalyearid" id="fiscalyearid" value="<?php echo $fiscalyearid; ?>" />
                            
                         <input type ="hidden" name="bankcharge" id="bankcharge" value="20" />
                         <input type ="hidden" name="card" id="card" value="6" />
                         
                         <?php if($paid == 0 ) { ?>
                            <input type="submit" class="btn btn-primary" name="pay" id="pay" value="Pay Now" />
                            <?php 
                            } ?>
                        </div>
                      
                    </form>
                     </div>
 <div class ="col-md-4">
      <table width="500" border="1" cellspacing="0" cellpadding="0" style="margin-left: -40%; margin-top: 41%;">
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
         $gtpaidlist="SELECT *,SUM(`receive_amount`)AS receive_amount FROM `collection_details` WHERE `receive_amount` > 0 AND `student_id` ='$newstuent_id' GROUP BY `money_receipt_no`";
  		
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
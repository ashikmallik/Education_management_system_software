<?php require_once('fees_sett_top.php');
//$schId=1;
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Student Transection]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Meta tag -->
    
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
     <link rel="stylesheet" href="../student/datCss/jquery-ui.css">
    <link rel="stylesheet" href="../student/datCss/jquery-ui1.css">
    <link rel="stylesheet" href="../student/datCss/style.css">
    <script src="../student/datCss/jquery-1.12.4.js"></script>
    <script src="../student/datCss/jquery-ui.js"></script>
    <script src="../student/datCss/jquery-ui1.js"></script>
    
        <script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
	
  } );
  </script>    
    
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    	<script type="text/javascript">
    	$(document).ready(function(){
    		$(".check").change(function(){
    			if($(this).is(':checked')) {
                    $(this).closest('tr').find('.textVal').val($(this).val());
                } else {
                    $(this).closest('tr').find('.textVal').val('');
                }

                var total = 0;
                $(".textVal").each(function(i,j){
                    if(!isNaN(parseFloat($(this).val()))) {
                        total += parseFloat($(this).val());
                    }
                });
                $('#totalDiv').html(total);
    		});
    	});
    	</script>
        
        
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
	 document.frmcontent.action="fees_collection.php";
	 document.frmcontent.submit();
	}	
	</script>
    

</head>
<body>
 
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
               <h3 style="font-size:25px">Fees Collection
               
               				
				<?php
				
                	if($_SESSION['userid1']!="") {			?>
				
                
                [ <span style="color:#0FF"> User Name : <?php echo $_SESSION['username']; ?></span> ]
                
                <?php } else { echo ""; }?>
               
               </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

         <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                    

                    
                  <h2>[ Total SMS : <?php echo $finalTotalSms; ?> ] ! [ Available SMS : <?php echo $avlSMS; ?> ]

                </h2></div>
                <div class="form">
              
        <form name="frmcontent" action="fees_collection_do.php" method="post" enctype="multipart/form-data">

       
         <table width="691" border="1" cellspacing="0" cellpadding="0" style="text-indent:10px; margin-top:-35px; margin-left: 16%;">
 

                <tr>
                  <td colspan="4" align="center" style="color:#006">                        
				  <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
			else if($msg==3) { echo "Please Wait 5 minintue for this student"; }
    
 ?></td>
                </tr>
                <tr>
                    <td width="127">Memo No *</td>
                    <td width="182"><input type="text" disabled size="17" name="memo" id="memo" value="<?php
        	$msg=$_GET['msg'];
			$msg1=$_GET['msg1'];
			if($msg==1) { echo $msg1; }
			
					?>"></td>
              <td colspan="2"> <a href="download_memo_half.php?memo=<?php echo $msg1;?>" target="_blank">Print Money Receipt</a> </td>  
              </tr>                    
                             
                            
                            
        <tr>
    <td>Session *</td>
    <td><select name="stsess1" id="stsess1" onchange="callpage();" style="width:150px">
      <option value="">--Select--</option>
      <?php
					$data1="select * from borno_student_info where borno_school_id='$schId' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess1'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
     <td width="156">Select  Shift *</td>
     
    <td width="216"><select name="shiftId1" id="shiftId1" onchange="callpage();" style="width:150px">
      <option value="">--Select--</option>
      <?php
					$studClass=$_REQUEST['studClass1'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId1']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>            
                       
  <tr>
    <td>Select  Class *</td>
    
    <td ><select name="studClass1" id="studClass1" onchange="callpage();" style="width:150px">
      <option value="">--Select--</option>
        <?php                                       
	$getClassId="select * from borno_school_set_class where borno_school_id='$schId'  order by class_order";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
				
		$getfClassId=$shgetClassId['borno_school_class_id']; 
        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
        <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_REQUEST['studClass1']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
        <?php } ?>
    </select></td>
     <td>Select Section *</td>
   
    <td><select name="section1" id="section1" onchange="callpage();" style="width:150px">
      <option value="">--Select--</option>
      <?php
					$studClass=$_REQUEST['studClass1'];
					$shiftId=$_REQUEST['shiftId1'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass'  AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section1']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr> 
  

  <tr>
    <?php
                    $stsess=trim($_REQUEST['stsess1']);
        	        $studClass=$_REQUEST['studClass1'];
					$shiftId=$_REQUEST['shiftId1'];
					$section=$_REQUEST['section1'];
					$rollno=$_REQUEST['roll1'];
					
					if($stsess!="" and ($studClass!="")  and ($shiftId!="") and ($section!="") and ($rollno!=""))
					
					
					
					{
					
					$gststdinfoname="select * from borno_student_info where borno_school_class_id='$studClass'  AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll=$rollno";
					$qgststdinfoname=$mysqli->query($gststdinfoname);
			    	$shggststdinfoname=$qgststdinfoname->fetch_assoc();
			        
			       $sid = $shggststdinfoname ['borno_student_info_id']; 
					} else { echo ""; }
			    	 
?>
  <td>Student Name :</td>
    
    <td ><input type="text" disabled id="name" name="name" value="<?php echo $shggststdinfoname['borno_school_student_name']; ?>" size="27"></td>			
    
    <td>Select Roll No.*</td>
    
    
    <td ><select name="roll1" id="roll1" onchange="callpage();" style="width:150px">
      <option value="">--Select--</option>
      <?php
                    $stsess=trim($_REQUEST['stsess1']);
        	        $studClass=$_REQUEST['studClass1'];
					$shiftId=$_REQUEST['shiftId1'];
					$section=$_REQUEST['section1'];
					
					$gststdinfo="select * from borno_student_info where borno_school_class_id='$studClass'  AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND  	borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll ";
					$qgststdinfo=$mysqli->query($gststdinfo);
					while($shggststdinfo=$qgststdinfo->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggststdinfo['borno_school_roll']; ?>" <?php if($shggststdinfo['borno_school_roll']==$_REQUEST['roll1']) { echo "selected"; }  ?>> <?php echo $shggststdinfo['borno_school_roll']; ?></option>
      <?php } ?>
      </select></td>  
  </tr>
   <tr >
					
         <?php
		date_default_timezone_set('Asia/Dhaka');	
		$cdate=date('Y-m-d');
		?>
        <td class="">Select Date * </td>
        <td><input type="date" name="datepicker" id="datepicker" value="<?php echo $cdate; ?>"></td>
    </tr>
    </table>
                    
                    
    <br>
    
    <div class="row">
   <div class ="col-md-8"> 
    <table width="800" border="1" style="border: 1px solid #005067; margin-left: 2%;">
                              <tr style="background-color: #005067; color: #fff;">
                               <td align="center">Head Name</td>
                               <td align="center">Month Name</td>
                               <td align="center">Due Amount</td>
                               <td align="center">Remarks</td>
                              </tr>
                                <?php
                   
                   
    $gettotalamount="SELECT sum(`due_amount`) AS due_amount FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$sid' GROUP BY `student_id`";   
    
    $qgettotalamount=$mysqli->query($gettotalamount);
    $sqgettotalamount=$qgettotalamount->fetch_assoc();                               
	  
  		$gtduelist="SELECT `month_name`,`head_name`,`due_amount` FROM `student_fees` AS sf INNER JOIN fees_head AS fh ON fh.`fees_head_id` = sf.`fees_head_id` WHERE `due_amount` > 0 AND `student_id` ='$sid'";
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
  ?>
  <tr>
    <td width="20%;" align="center"><?php echo $shgtduelist['head_name']; ?></td>
    <td width="20%;" align="center"><?php echo $shgtduelist['month_name']; ?></td>
    <td width="20%;" align="center"><?php echo $shgtduelist['due_amount']; ?></td>
        <td>
          
      </td>
  </tr>
  <?php } ?> 
  
  <tr>
          <td>
          
      </td>
      <td align="right" >
          Total Due
      </td>
      <td align="center">
          <?php echo $sqgettotalamount['due_amount']; ?>

      </td>
        <td>
          
      </td>
  </tr>  
    <tr>
          <td>
          
      </td>
      <td align="right" >
         Total Receive
      </td>
      <td align="center">
          <input type="text" id="totalReceive" name="totalReceive" style="text-align: center;" value="<?php echo $sqgettotalamount['due_amount']; ?>">
           <input type="hidden" id="sid" name="sid" value="<?php echo $sid;?>">
           <input type="hidden" id="totaldue" name="totaldue" value="<?echo $sqgettotalamount['due_amount'];?>">
      </td>
        <td>
          <input type="text" id="remarks" name="remarks" size="34">
      </td>
  </tr>
    <tr>
      <td>
          
      </td>
      <td align="right" >
          
      </td>
      <td align="center">
          <input type="submit" name="button" id="button" value="Receive">
      </td>
 
  </tr> 
  
                            
    </table>                
    </div> 
    <div class ="col-md-4">
      <table width="350" border="1" cellspacing="0" cellpadding="0" style="margin-left: 2%;">
              <th style="background-color: #005067; color: #fff;">Payment History</th> 
              <th style="background-color: #005067; color: #fff;"></th>
              <th style="background-color: #005067; color: #fff;"></th>
              <th style="background-color: #005067; color: #fff;"></th>
         <tr>
          
           <td align="center" style="background-color:#fad390;">Date</td>
           <td align="center" style="background-color:#f6b93b;">Memo</td>
           <td align="center" style="background-color:#6a89cc;">Amount</td>
           <td align="center" style="background-color:#b8e994;">Month</td>
           
         </tr>
     </table>
     </div>
    </div>                
                         
          
                    
                 </form>  

                      
  
                    
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
    
    
    
</div>
   <!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> 
                    
                    <script type="text/javascript">
                    
                    $('.form-group').on('input','.prc',function(){
                        var totalSum = 0;
                        $('.form-group .prc').each(function(){
                            var inputVal = $(this).val();
                            if($.isNumeric(inputVal)){
                                totalSum += parseFloat(inputVal);
                            }
                        });
                            $('#result').val(totalSum);
                    });
                    
                    </script>
                    -->
      <script>
$("#checkAll").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
      $(".check").trigger('change');
});
</script>                   
                    
</body>
</html>
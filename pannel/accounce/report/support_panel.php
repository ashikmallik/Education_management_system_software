<?php require_once('report_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Support]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
<style>    
tr:nth-child(even) {background-color: #dbebf3;}
</style>
    
</head>
<body>
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
	 document.frmcontent.action="fees_head_list.php";
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
                <h3> Support Panel </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Issue List</h2></div>
                <div class="form">
                    <center>
        <form name="frmcontent" action="" method="post" enctype="multipart/form-data">
                        
     
                        <br>
                            <table width="1200" border="1" style="border: 1px solid #005067;">
                              <tr style="background-color: #005067; color: #fff;">
                                  <td align="center">Ticket No</td>
                                <td align="center">Category</td>
                               <td align="center">Subject</td>
                               <td align="center">Student ID</td>
                               <td align="center">Contact</td>
                               <td align="center">Attachment</td>
                               <td align="center">Priority</td>
                               <td align="center">Status</td>
                                <td align="center">Action</td>
                              </tr>
                                <?php
                                
                                    

	  
  		$gtfeeshead="SELECT * FROM `student_support_ticket` ORDER BY `id` DESC";
		$sl=0;
		$qgtfeeshead=$mysqli->query($gtfeeshead);
		while($shgtfeeshead=$qgtfeeshead->fetch_assoc()){
		
		$sl++;
  
  ?>
                             <tr>
    <td width="10%;" align="center"><?php echo $shgtfeeshead['ticket_id']; ?></td>
    <td width="10%;" align="center"><?php echo $shgtfeeshead['category']; ?></td>
    <td width="30%;" align="center"><?php echo $shgtfeeshead['problem_titel']; ?></td>
    <td width="10%;" align="center"><?php echo $shgtfeeshead['student_id']; ?></td>
    <td width="10%;" align="center"><?php echo $shgtfeeshead['phone_no']; ?></td>
    <td width="10%;" align="center"><a href="../../../support_file/<?php echo $shgtfeeshead['attached_file']; ?>"><?php echo $shgtfeeshead['attached_file']; ?></a></td>
    <td width="10%;" align="center"><?php echo $shgtfeeshead['priroty']; ?></td>
     <td width="10%;" align="center"><?php if($shgtfeeshead['status'] == 1){echo "Solved";}elseif($shgtfeeshead['status'] == 2){echo "Rejected";} else{echo "Pending";} ?></td>
    <td align="center" width="10%;">
        <?php if($shgtfeeshead['status'] == 0){ ?>
        <a href="support_do.php?id=<?php echo $shgtfeeshead['id'];?>&status=1">Solved</a>
        <a href="support_do.php?id=<?php echo $shgtfeeshead['id'];?>&status=2">Rejected</a>
        <?php } ?>
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
<script type="text/javascript" src="../../academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>
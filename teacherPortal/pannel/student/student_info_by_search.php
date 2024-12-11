<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Student Pannel</title>
     <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
      <link rel="stylesheet" href="datCss/jquery-ui.css">
    <link rel="stylesheet" href="datCss/jquery-ui1.css">
    <link rel="stylesheet" href="datCss/style.css">
    <script src="datCss/jquery-1.12.4.js"></script>
    <script src="datCss/jquery-ui.js"></script>
    <script src="datCss/jquery-ui1.js"></script>
    <style>
        * {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  /*width: 100%;*/
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  /*width: 100%;*/
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
    </style>
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <div class="top_part_menu">
            <h3>Student   Panel</h3>
            <ul>
                <?php
               		require_once('leftmenu.php');
			   ?>                 
            </ul>
        </div>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Student Panel</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

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
		
		if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		
		if(document.frmcontent.stuName.value=="")
		{
			alert("Please Enter Student Name");
			document.frmcontent.stuName.focus();
			return (false);
		}
		
		if(document.frmcontent.stuFname.value=="")
		{
			alert("Please Enter Student Father Name");
			document.frmcontent.stuFname.focus();
			return (false);
		}
		
		if(document.frmcontent.stuaddress.value=="")
		{
			alert("Please Enter Student Address");
			document.frmcontent.stuaddress.focus();
			return (false);
		}
		
		if(document.frmcontent.stuphone.value=="")
		{
			alert("Please Enter Phone for SMS");
			document.frmcontent.stuphone.focus();
			return (false);
		}
		
		if(document.frmcontent.datepicker.value=="")
		{
			alert("Please Enter Date of Birth");
			document.frmcontent.datepicker.focus();
			return (false);
		}
		
		if(document.frmcontent.religion.value=="")
		{
			alert("Please Select Religion");
			document.frmcontent.religion.focus();
			return (false);
		}
		
		if(document.frmcontent.sturoll.value=="")
		{
			alert("Please Enter Student Roll");
			document.frmcontent.sturoll.focus();
			return (false);
		}
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="student_info_by_search.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>

<form action="" method="post">
  <div class="container">
    <h1>Search</h1>

    <hr>
  
    <label for="email"><b>ID</b></label>
    <input type="text" placeholder="Enter id" name="id" id="email" >

    <label for="psw"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="psw">

    <label for="psw-repeat"><b>Phone Number</b></label>
    <input type="text" placeholder="Phone Number" name="Phone_number" id="psw-repeat" >
 
    <hr>
    

    <button type="submit" class="registerbtn">Search</button>
  </div>
  

</form>







    <table id="customers">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Class</th>
    <th>Section</th>
    <th>Roll</th>
    <th>Phone Number</th>
    <th>Session</th>
     <th>Status</th>
    <th>Action</th>
  </tr>

      <?php
      if(empty($_POST['id'])){
          $_POST['id']=null;
      }else{
         $id= $_POST['id']; 
      }
       if(empty($_POST['name'])){
          $_POST['name']=null;
      }else{
         $name= $_POST['name']; 
      }
       if(empty($_POST['Phone_number'])){
         $_POST['Phone_number']=null;
      }else{
        $Phone_number= $_POST['Phone_number'];
      }
      
      
      if($id!=null OR $name!=null OR $Phone_number!=null){
      
      $all_data= mysqli_query($mysqli, "SELECT * FROM borno_student_info where borno_student_info_id LIKE '%$id%' and borno_school_phone LIKE '%$Phone_number%' and borno_school_student_name LIKE '%$name%'");
      
      foreach($all_data as $data){
          
         $session = $data['borno_school_session'];
          
      ?>
        <tr>
    <td><?php echo $data['borno_student_info_id'];  ?></td>
    <td><?php echo $data['borno_school_student_name'];  ?></td>
    <td><?php $class_id=$data['borno_school_class_id']; $all_data2= mysqli_query($mysqli, "SELECT * FROM borno_school_class where borno_school_class_id='$class_id'");
      
      foreach($all_data2 as $data2){ echo $data2['borno_school_class_name'];  } ?></td>
      
      <td><?php $section_id=$data['borno_school_section_id']; $all_data3= mysqli_query($mysqli, "SELECT * FROM borno_school_section where borno_school_section_id='$section_id' AND year ='$session'");
      
      foreach($all_data3 as $data3){ echo $data3['borno_school_section_name'];  } ?></td>
      <td><?php echo $data['borno_school_roll'];  ?></td>
    <td><?php echo $data['borno_school_phone'];  ?></td>
    <td><?php echo $data['borno_school_session'];  ?></td>
    <td><?php if ($data['borno_student_status']==1 ){
        echo "Active";
    }
    else{
        echo "Inactive";
    }?></td>
    <td>
        <a href="edit_student.php?studId=<?php echo $data['borno_student_info_id']; ?>"><img src="../images/b_edit.png" width="16" height="16"></a>
        <?php if ($data['borno_student_status']!=1 ){ ?>
        <a href="inactive_student.php?studId=<?php echo $data['borno_student_info_id']; ?>&status=1"><img src="../images/active.png" width="16" height="16"></a>
        <?php } else { ?>
        <a href="inactive_student.php?studId=<?php echo $data['borno_student_info_id']; ?>&status=0"><img src="../images/inact.jpg" width="20" height="20"></a>
        <?php } ?>
        </td>
    </tr>
    <?php } }?>
  
</table>
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>
<?php 
include('../connection.php');

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
	 document.frmcontent.action="index.php";
	 document.frmcontent.submit();
	}
</script> 

<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
            <div class="row">
                <div class="col-md-12 login-form-2">
                    <h3>Result Portal</h3>
                    <form name="frmcontent" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Branch :
                            </leble>
                            </div>
                            <div class="col-md-8">
                           <select name="studBranch" id="studBranch" class="form-control" onchange="callpage();">
    <option value="">--Select--</option>
        <?php                                       
$getBranchId="SELECT * FROM `borno_school_branch`";
		
		
		$qgetBranchId=$mysqli->query($getBranchId);
		while($shgetBranchId=$qgetBranchId->fetch_assoc()){
				
		
                                    
                                    ?>
                                <option value=" <?php echo $shgetBranchId['borno_school_branch_id']; ?>" <?php if($shgetBranchId['borno_school_branch_id']==$_POST['studBranch']) { echo "selected"; }  ?>> <?php echo $shgetBranchId['borno_school_branch_name']; ?></option>
                                <?php } ?>
                              </select>
    </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Class :
                            </leble>
                            </div>
                            <div class="col-md-8">
                                   <select name="studClass" id="studClass" onchange="callpage();" class="form-control">
    <option value="">--Select--</option>
        <?php      
        
        $branchId = $_POST['studBranch'];
$getClassId="select * from borno_school_set_class where borno_school_id='1'AND borno_school_branch_id = '$branchId' ";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
				
		$getfClassId=$shgetClassId['borno_school_class_id']; 
        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                              </select>
    </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Shift :
                            </leble>
                            </div>
                            <div class="col-md-8">
            <select name="shiftId1" id="shiftId1" onchange="callpage();" class="form-control">
      <option value="">--Select--</option>
      <?php
					$studClass=$_REQUEST['studClass'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId1']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select>
    </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Section :
                            </leble>
                            </div>
                            <div class="col-md-8">
   <select name="section1" id="section1" onchange="callpage();" class="form-control">
      <option value="">--Select--</option>
      <?php
					$studClass=$_REQUEST['studClass'];
					$shiftId=$_REQUEST['shiftId1'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass'  AND borno_school_id='1' AND borno_school_shift_id='$shiftId' AND borno_school_branch_id = '$branchId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section1']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
    </select>
    </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Session :
                            </leble>
                            </div>
                            <div class="col-md-8">
                            <select name="stsess1" id="stsess1" class="form-control" onchange="callpage();" >
      <option value="">--Select--</option>
      <?php
					$data1="select * from borno_student_info where borno_school_id='1' AND borno_school_class_id='$studClass' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess1'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select>
    </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Term :
                            </leble>
                            </div>
                            <div class="col-md-8">
                            <select name="selTerm" id="selTerm" class="form-control" onchange="callpage();">
      <option value="">--Select--</option>
	  <?php
	  		$stsess=trim($_REQUEST['stsess1']);
			$schexterm="select * from borno_result_add_term where borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_id='1'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$_REQUEST['selTerm']) { echo "selected"; } ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
        
      <?php } ?>  
        
      </select>
    </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Department :
                            </leble>
                            </div>
                            <div class="col-md-8">
                            <select name="dept" id="dept" class="form-control" onchange="callpage();" >
      
      <option value=""> None </option>
      <option value="1" <?php if($_POST['dept']==1) { echo "selected"; } ?>> Science </option>
      <option value="3" <?php if($_POST['dept']==3) { echo "selected"; } ?>> Humanities </option>
      <option value="2" <?php if($_POST['dept']==2) { echo "selected"; } ?>> Business Studies </option>
    </select>
    </div>
                        </div>
                <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Exam year :
                            </leble>
                            </div>
                            <div class="col-md-8">
                            <select name="styear" id="styear" class="form-control" onchange="callpage();" >
                            <option value="2021" <?php if($_POST['styear']==2021) { echo "selected"; } ?> > 2021 </option>
                            <option value="2022" <?php if($_POST['styear']==2022) { echo "selected"; } ?> > 2022 </option>
                           <option value="2023" <?php if($_POST['styear']==2023) { echo "selected"; } ?> > 2023 </option>
    </select>
    </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Roll :
                            </leble>
                            </div>
                            <div class="col-md-8">
            <select name="roll1" id="roll1" onchange="callpage();" class="form-control" >
      <option value="">--Select--</option>
      <?php
                    $stsess=trim($_REQUEST['stsess1']);
        	        $studClass=$_REQUEST['studClass'];
					$shiftId=$_REQUEST['shiftId1'];
					$section=$_REQUEST['section1'];
					
					$gststdinfo="select * from borno_student_info where borno_school_class_id='$studClass'  AND borno_school_id='1' AND borno_school_shift_id='$shiftId' AND borno_school_branch_id = '$branchId' AND  	borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll ";
					$qgststdinfo=$mysqli->query($gststdinfo);
					while($shggststdinfo=$qgststdinfo->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggststdinfo['borno_school_roll']; ?>" <?php if($shggststdinfo['borno_school_roll']==$_REQUEST['roll1']) { echo "selected"; }  ?>> <?php echo $shggststdinfo['borno_school_roll']; ?></option>
      <?php } ?>
      </select>
    </div>
                        </div>
  
                        <!--<div class="form-group">-->
                        <!--    <input type="submit" class="btnSubmit" value="Login" />-->
                        <!--</div>-->
                      
                    </form>
                                            
                        
                       
                  <?php
                    $stsess=trim($_REQUEST['stsess1']);
        	        $studClass=$_REQUEST['studClass'];
					$shiftId=$_REQUEST['shiftId1'];
					$section=$_REQUEST['section1'];
					$selTerm=$_REQUEST['selTerm'];
					$styear=$_POST['styear'];
					$dept=$_POST['dept'];
					$rollno=$_REQUEST['roll1'];
					
					if($stsess!="" and ($studClass!="")  and ($shiftId!="") and ($section!="") and ($rollno!=""))
					
					
					
					{
					
					$gststdinfoname="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id = '$branchId'  AND borno_school_id='1' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll=$rollno";
					$qgststdinfoname=$mysqli->query($gststdinfoname);
			    	$shggststdinfoname=$qgststdinfoname->fetch_assoc();
					} else { echo ""; }
			    	 
?>     

                        <div class="form-group">
                            <?php if($selTerm == 62 OR $selTerm == 64){ ?>
                            <a class="btnSubmit" href="download_progress_report05.php?schoolId=1&stbranch=<?php echo $branchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $dept; ?>&styear=<?php echo $styear; ?>&roll=<?php echo $rollno; ?>" target="_blank">Show Progress Report</a>
                          <?php } ?>
                        </div>
  <!--  <div class="row">-->
  <!--                  <div class="col-md-4">-->
  <!--                          <leble class="form-control">-->
  <!--                              Name :-->
  <!--                          </leble>-->
  <!--                          </div>-->
  <!--                          <div class="col-md-8">-->
  <!--       <input type="text" disabled id="name" name="name" value="<?php echo $shggststdinfoname['borno_school_student_name']; ?>" class="form-control" size="27">-->
  <!--                          </div>-->
  <!--                      </div>-->
  <!--      <div class="row">-->
  <!--                  <div class="col-md-4">-->
  <!--                          <leble class="form-control">-->
  <!--                              Student ID :-->
  <!--                          </leble>-->
  <!--                          </div>-->
  <!--                          <div class="col-md-8">-->
  <!--<input type="text" disabled id="sudentid" name="sudentid" value="<?php echo $shggststdinfoname['borno_student_info_id']; ?>" class="form-control" size="27"> -->
  <!--                          </div>-->
  <!--                      </div>-->
                             

                </div>
                
                <!--<div class="col-md-6 login-form-2">-->
                <!--    <h3>Login for Payment</h3>-->
                <!--    <form action="login_action.php" method="post" enctype="multipart/form-data" >-->
                <!--        <div class="form-group">-->
                <!--            <input type="text" id="sid" name="sid" class="form-control" placeholder="Student ID *" value=""/>-->
                <!--            <input type="hidden" id="branchid" name="branchid" value="<?php echo $branchId; ?>"/>-->
                <!--        </div>-->
                       
                <!--        <div class="form-group">-->
                <!--            <input type="submit" class="btnSubmit" value="Login" />-->
                <!--        </div>-->
                      
                <!--    </form>-->
                <!--</div>-->
            </div>
        </div>
</html>
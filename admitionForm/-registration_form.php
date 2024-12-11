<?php
error_reporting(0);
//ob_start();


//echo $sl;


?>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin Zone</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="../assets/images/logo.jpg">

    <!-- page css -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">
    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/media.css">

</head>

<body>
    <script language="javascript">
    	function callpage()
	{
	 document.frmcontent.action="registration_form.php";
	 document.frmcontent.submit();
	}
	
	function myfunc(){
	    
	    var a = document.getElementsByName('chk');
	    var newvar = 0;
	    var count;
	    for(count= 0; count<a.length; count++){
	        
	        
	        
	        if(a[count].checked == true){
	       console.log(a[count].checked);     
	       console.log(a.length);        
	        newvar = newvar+1;
	        }
	    }
	    if(newvar > 3){
	        document.getElementById('notvalid').innerHTML = "** Please select only three **"
	        return false;
	    }
	    
	}
	
	
	
	</script>
    <div class="app">
        <div class="layout">

            <div class="page-container">
                

                <!-- Content Wrapper START -->

                    <!----------------Content Start----------------->
                   
 <div class="row">
                        <div class="col-lg-8" style="margin-left: 15%;">
                           
                          
                            <div class="fessPayment">
                         <h4 style="margin-left: 28%;color: mediumvioletred;font-weight: bold;">Azimpur Government Girls' School And College</h4>
                         <h5 style="margin-left: 38%;color: darkgreen;font-weight: bold;">49/E,Azimpur, Dhaka-1205</h5>
                         <h6 style="margin-left: 35%;color: red;">Website: www.aggsc.edu.bd, EIIN:108163</h6>
                                

<div class="modal-content">

		      	<!-- Modal Header -->
		      	<!--<div class="modal-header">-->
			      <!--  <h4 class="modal-title"></h4>-->
			      <!--  <button type="button" class="close" data-bs-dismiss="modal">&times;</button>-->
		      	<!--</div>-->

		      	<!-- Modal body -->
		      	<div class="modal-body">
		        	<form action="registration_store.php" method="post" enctype="multipart/form-data" name="frmcontent">
		        	                        <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Group</label>
                                              <div class="col-sm-8">
                                         <select name="group" id="group" class="form-control" onChange="callpage();" required  >
                                                <option value="">Select Gruop</option>
                                                <option value="Science" <?php if("Science" == $_REQUEST['group'] ){ echo "selected"; }  ?>>Science</option>
                                                <option value="Business Studies" <?php if("Business Studies" == $_REQUEST['group'] ){ echo "selected"; }  ?>>Business Studies</option>
                                                <option value="Humanities" <?php if("Humanities" == $_REQUEST['group'] ){ echo "selected"; }  ?>>Humanities</option>
                                                
                                            </select>
                                              </div>
                                <?php 
                                include('db_contection.php');
$group = $_REQUEST['group'];
//echo $group;

                                
                                
                                ?>              
                                            </div>
  
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Name</label>
                                              <div class="col-sm-8">
                                        <input type="text" id="std_name" name="std_name" class="form-control"size="27" placeholder="input your name" required>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Name(Bangla)</label>
                                              <div class="col-sm-8">
                                        <input type="text" id="std_name_b" name="std_name_b" class="form-control"size="27" placeholder="input your name(bangla)" required>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Blood Group(Optional)</label>
                                              <div class="col-sm-8">
                                        <input type="text" id="blood_group" name="blood_group" class="form-control"size="27" placeholder="input your Blood Group">
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Date of Birth</label>
                                              <div class="col-sm-8">
                                        <input type="text" id="birth_date" name="birth_date" class="form-control"size="27" placeholder="input your Date of Birth" required>
                                              </div>
                                            </div>
                            
                                    <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">SSC Group</label>
                                              <div class="col-sm-8">
                                                     <select name="ssc_group" id="ssc_group" class="form-control" placeholder="input Annual Income" required  >
                                                        <option value="">Select Gruop</option>
                                                        <option value="Science">Science</option>
                                                        <option value="Business Studies">Business Studies</option>
                                                        <option value="Humanities">Humanities</option>
                                                        
                                                    </select>
                                              </div>
                                            </div>
                                      <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">SSC Board</label>
                                              <div class="col-sm-8">
                                                  <select name="ssc_board" id="ssc_board" class="form-control" required  >
                                                        <option value="">Select Board</option>
                                                        <option value="Dhaka">Dhaka</option>
                                                        <option value="Rajshahi">Rajshahi</option>
                                                        <option value="Comilla">Comilla</option>
                                                        <option value="Jessore">Jessore</option>
                                        <option value="Chittagong">Chittagong</option>
                                         <option value="Mymensingh">Mymensingh</option>
                                                        <option value="Barisal">Barisal</option>
                                                        <option value="Sylhet">Sylhet</option>
                                                        <option value="Dinajpur">Dinajpur</option>
                                                        <option value="Madrasah">Madrasah</option>
                                                <option value="B.T.E.B">B.T.E.B</option>
                                       <option value="B.O.U">B.O.U</option>                 
                                                    </select>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">SSC Year</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="ssc_year" name="ssc_year"  class="form-control"size="27"  placeholder="input SSC Year" required >
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">SSC Reg. No.</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="ssc_rg_no" name="ssc_rg_no"  class="form-control"size="27" placeholder="input SSC Reg. No." required >
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Student's Phone</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="std_phone" name="std_phone"  class="form-control"size="27" placeholder="input Student's Phone" required >
                                              </div>
                                            </div>
                                            
                                           <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Home District</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="district" name="district"  class="form-control"size="27" placeholder="input Home District" required >
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Present Address</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="present_address" name="present_address"  class="form-control"size="27" required >
                                              </div>
                                            </div>
                                    
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Permanent Address</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="permanent_address" name="permanent_address"  class="form-control"size="27" placeholder="input Permanent Address" required >
                                              </div>
                                            </div>
                                            
                                          <div class="form-group row">
                                              
                                              
                                                  <label  class="col-sm-3 col-form-label">Main Subjects</label>
                                                  <div class="col-sm-8">
                                                  <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Bangla(101,102)" name="bangla">
                                                  <label  class="form-check-label" for="inlineCheckbox1" >Bangla(101,102)</label>
                                                  </div>

                                                  <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="English(107,108)" name="english" >
                                                  <label  class="form-check-label">English(107,108)</label>
                                                  </div>

                                                  <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="ICT(275)" name="ict">
                                                  <label  class="form-check-label">ICT(275)</label>
                                                </div>
                                              </div>
                                            </div>
                                            
                                         <?php 
                                         
                                         if($_REQUEST['group'] == "Humanities"){ ?>
                                         <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Elective Subjects</label>
                                            
                                              <div class="col-sm-8 form-check">
                                                  
                                                  <div class="form-check form-check-inline">
                                                      <input class="form-check-input" type="checkbox" name="chk" onclick="return myfunc()">
                                                  <label  class="form-check-label">A)&nbsp;</label>
                                                  <select name="elective_subject1" id="elective_subject1" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Islamic History(267,268)">Islamic History(267,268)</option>
                                                        <option value="Logic(121,122)">Logic(121,122)</option>
                                                        
                                                    </select>
                                                  
                                                  </div>
                                                  
                                                  <div class="form-check form-check-inline">
                                                     <input class="form-check-input" type="checkbox" name="chk" onclick="return myfunc()">
                                                  <label  class="form-check-label">B)&nbsp;</label>
                                                  <select name="elective_subject2" id="elective_subject2" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Social Work(271,272)">Social Work(271,272)</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                      <input class="form-check-input" type="checkbox" name="chk" onclick="return myfunc()">
                                                  <label  class="form-check-label">C)&nbsp;</label>
                                                    <select name="elective_subject3" id="elective_subject3" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Geography(125,126)">Geography(125,126)</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="chk" onclick="return myfunc()">
                                                  <label  class="form-check-label">D)&nbsp;</label>
                                                   <select name="elective_subject4" id="elective_subject4" class="form-control">
                                            <option value="">Select</option>
                                                        <option value="Economics(109,110)">Economics(109,110)</option>
                                                        <option value="Civics(269,270)">Civics(269,270)</option>
                                                        
                                                    </select>
                                                  </div>                                          
                                                  

                                                 <div>
                                                     <span id="notvalid" style="color : red;"></span>
                                                 </div>
     
                                                
                                              </div>
                                               <span>
                                                  <p style="color : red; margin-top: -8%;">Select any three</p>
                                              </span>
                                            </div>
                                            <div class="form-group row mb-4">
                                              <label  class="col-sm-3 col-form-label">4th Subjects</label>
                                              <div class="col-sm-8">
                                                  <div class="form-check form-check-inline">
                                                    <select name="forth_sub" id="forth_sub" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Home Science(273,274)">Home Science(273,274)</option>
                                                        <option value="Psychology(123,124)">Psychology(123,124)</option>
                                                    </select>
                                                  </div>
       
                                              </div>
                                            </div>
                                         
                                        <?php }
                                        if($_REQUEST['group'] == "Science"){
                                        ?>   
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Elective Subjects</label>
                                              <div class="col-sm-8 form-check">
                                                  
                                                 <div class="form-check form-check-inline">
                                                  <label  class="form-check-label">A)&nbsp;</label>
                                                  <select name="elective_subject1" id="elective_subject1" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Physics(174,175)">Physics(174,175)</option>
                                                        
                                                    </select>
                                                  
                                                  </div>
                                                  
                                                  <div class="form-check form-check-inline">
                                                     
                                                  <label  class="form-check-label">B)&nbsp;</label>
                                                  <select name="elective_subject2" id="elective_subject2" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Chemistry(176,177)">Chemistry(176,177)</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                      
                                                  <label  class="form-check-label">C)&nbsp;</label>
                                                    <select name="elective_subject3" id="elective_subject3" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Biology(178,179)">Biology(178,179)</option>
                                                        <option value="Higher Math(265,266)">Higher Math(265,266)</option>
                                                    </select>
                                                  </div>

                                                
                                              </div>
                                              <span>
                                                  <p style="color : red; margin-top: -8%;">Select any three</p>
                                              </span>
                                            </div>
                                            <div class="form-group row mb-4">
                                              <label  class="col-sm-3 col-form-label">4th Subjects</label>
                                              <div class="col-sm-8">
                                              <div class="form-check form-check-inline">
                                    <select name="forth_sub" id="forth_sub" class="form-control" required>
                                        <option value="">Select</option>
                                    <option value="Biology(178,179)">Biology(178,179)</option>
                                        <option value="Higher Math(265,266)">Higher Math(265,266)</option>
                                                    </select>
                                              </div>
                                            </div>
                                            </div>
                                      <?php }
                                        if($_REQUEST['group'] == "Business Studies"){
                                        ?> 
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Elective Subjects</label>
                                              <div class="col-sm-8 form-check">
                                                  <div class="form-check form-check-inline">
                                                 <div class="form-check form-check-inline">
                                                  <label  class="form-check-label">A)&nbsp;</label>
                                                  <select name="elective_subject1" id="elective_subject1" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Business Organization & Management(277,278)">Business Organization & Management(277,278)</option>
                                                        
                                                    </select>
                                                  
                                                  </div>
                                                  
                                                  <div class="form-check form-check-inline">
                                                     
                                                  <label  class="form-check-label">B)&nbsp;</label>
                                                  <select name="elective_subject2" id="elective_subject2" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Accounting(253,254)">Accounting(253,254)</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                      
                                                  <label  class="form-check-label">C)&nbsp;</label>
                                                    <select name="elective_subject3" id="elective_subject3" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Production Management & Marketing(286,287)">Production Management & Marketing(286,287)</option>
                                                       
                                                    </select>
                                                  </div>
                                                  </div>
                        
                                                
                                              </div>
                                            <span>
                                                  <p style="color : red; margin-top: -8%;">Select any three</p>
                                              </span>  
                                            </div>
                                            <div class="form-group row mb-4">
                                              <label  class="col-sm-3 col-form-label">4th Subjects</label>
                                           
                                         <div class="col-sm-8">
                                              <div class="form-check form-check-inline">
                                                    <select name="forth_sub" id="forth_sub" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Statistics(129,130)">Statistics(129,130)</option>
                                                        
                                                    </select>
                                              </div>
                                            </div>

                                         
                                            </div>
                                            <?php } ?>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Legal Guardian</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="legalguardian" name="legalguardian"  class="form-control"size="27" placeholder="input Legal Guardian" required >
                                              </div>
                                            </div>
                                            
                                                  <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">SSC GPA(With 4th Sub)</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="ssc_gpa" name="ssc_gpa"  class="form-control"size="27" placeholder="input SSC GPA(With 4th Sub)" required >
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">SSC Roll No</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="ssc_roll" name="ssc_roll"  class="form-control"size="27" placeholder="input SSC Roll No" required >
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Vaccine</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="vaccine" name="vaccine"  class="form-control"size="27" placeholder="input SSC Vaccine" required >
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Religion</label>
                                              <div class="col-sm-8">
                                                     <select name="religion" id="Religion" class="form-control" required  >
                                                        <option value="">Select Religion</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Christian">Christian</option>
                                                        <option value="Bhadda">Bhadda</option>
                                                    </select>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Birth Reg. No.</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="bath_reg_no" name="bath_reg_no"  class="form-control"size="27" placeholder="input Birth Reg. No." required >
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Merit Position</label>
                                              <div class="col-sm-8">
                                               <input type="text" id="merit" name="merit"  class="form-control"size="27" placeholder="input Quota" required >
                                              </div>
                                             </div>
                                            
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Quota</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="quota" name="quota"  class="form-control"size="27" placeholder="input Quota" required >
                                              </div>
                                            </div>
                                            
                                                  <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Father's Name</label>
                                              <div class="col-sm-8">
                                    <input type="text" id="fname" name="fname" class="form-control"size="27" placeholder="input your Father's Name" required >
                                              </div>
                                            </div>
                                      <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Mobile No.</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="fmobile" name="fmobile"  class="form-control"size="27" placeholder="input Mobile No" required >
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">NID</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="f_nid" name="f_nid"  class="form-control"size="27" placeholder="input NID" required >
                                              </div>
                                            </div>
                                            
                                        <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Occupation</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="foccupation" name="foccupation"  class="form-control"size="27" placeholder="input Occupation" required >
                                              </div>
                                            </div>
                                            
                                            
                                    <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Annual Income</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="annual_income" name="annual_income"  class="form-control"size="27" placeholder="input Annual Income" required >
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Mother's Name</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="mother_name" name="mother_name"  class="form-control"size="27" placeholder="input Mother's Name" required >
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Mobile Number</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="mother_mobile" name="mother_mobile"  class="form-control"size="27" placeholder="input Mobile Number" required >
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">NID</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="mother_nid" name="mother_nid"  class="form-control"size="27" placeholder="input NID" required >
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Occupation</label>
                                              <div class="col-sm-8">
                                                  <input type="text" id="mother_occupation" name="mother_occupation"  class="form-control"size="27" placeholder="input Occupation" required >
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label">Student Image</label>
                                              <div class="col-sm-8">
                                                  <input type="file" name="student_image" id="student_image">
                                                  <span>
                                                  <p style="color : red;">max size 2MB</p>
                                              </span>
                                              </div>
                                              
                                            </div>
                                            
                                      
                                
                                     <div class="col-sm-8 float-right">
					  	            <button type="submit" class="btn btn-primary mt-1"name="add" style="margin-left:-72px" >Submit</button>
					  	            </div>
					  	        
					</form>


		      	</div>

		    </div>
                                   <!---Request Modal---->
                                   <!-- The Modal -->
	
                                   
                                  
                                  <!---Reques Modal---->
                                  
                                  
                            </div>
                           
                        </div>
                    </div>
                  
                    <!----------------Content Start---------------->
                </div>


            </div>

        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>


</body>



</html>
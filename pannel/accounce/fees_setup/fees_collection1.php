<?php require_once('fees_sett_top.php');

$id = $_POST['id'];


?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Fees Setup]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    

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
                <h3> Fees Setup </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> <?php echo $id; ?> Fees Collection</h2></div>
                <div class="form">
                   
        <form name="frmcontent" action="" method="post" enctype="multipart/form-data">
        <div> 
        <center>
        <table border="1" cellspacing="1" cellpadding="0" >
         
  <tr style="background-color: #75cbd6;">
    <td class="" >Student Name *:
    
     <input type="text" name="autocomplete" id="autocomplete" placeholder="Student Name..."  >
    </td>
        

        
    <td>
        <?php
		date_default_timezone_set('Asia/Dhaka');	
		$cdate=date('Y-m-d');
		?>
        <td class="">Select Date *:
        <input type="date" name="datepicker" id="datepicker" value="<?php echo $cdate; ?>"></td>
    </td>
  </tr>
  </table>
  </center>
  </div>
  <br>
  <div class= "row">
      <div class = "col-md-4" style="margin-left: 5%;margin-top: 4%;">
          
          <table style="border:1px #000 solid; margin-top:-35px;" >
              <th>Student Info</th>
                 <tr>
                              <td class=""></td>
                              <td><img src="studentphoto/<?php echo $shgtstudent['borno_school_photo']; ?>" width="65" height="65"  style="margin-right: 8px; margin-bottom: 8px;"></td>
                            </tr>
              <tr>
                  <td>ID 
                      <input type="text" name="sid" id="sid" readonly style="margin-left: 36px;">
                  </td>
                  
                 
              </tr>
                            <tr>
                  <td>Name 
                      <input type="text" name="sName" id="sName"readonly style="margin-left: 13px;">
                  </td>
              </tr>
              </tr>
                            <tr>
                  <td>Class 
                      <input type="text" name="" id=""readonly  style="margin-left: 15px;">
                  </td>
              </tr>
              </tr>
                            <tr>
                  <td>Section 
                      <input type="text" name="" id=""readonly   style="margin-left: 4px;">
                  </td>
              </tr>
              </tr>
                            <tr>
                  <td>Shift 
                      <input type="text" name="" id=""readonly    style="margin-left: 22px;">
                  </td>
              </tr>
              </tr>
                            <tr>
                  <td>Session 
                      <input type="text" name="" id=""readonly>
                  </td>
              </tr>
              
          </table>
          
          
          
      </div>
      <div class = "col-md-8">
          
      </div>
      
  </div>
  
  
  

       </form>   
                        
                        
                
                  
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
 <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "getStudent.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                        
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#autocomplete').val(ui.item.label); // display the selected text
               // $('#').val(ui.item.value); // save selected id to input

                var Sid = ui.item.value;
                console.log(Sid);
                get_studentInfo(Sid);
                //get_studentId(Sid); 
                return false;
        
            },

        });


    });

 function get_studentInfo(id){
 $.ajax({
              url:"getStudentInfo.php",
              method:"POST",
              data:{id:id},
              success:function(data){ 
                           
            // alert(data);
             var info = data.split("##");
             
             var Name = info[0];
             var Id = info[1];
             
             $("#sName").val(Name);
             $("#sid").val(Id);
              }              
          });
 }
 
//   function get_studentId(id){
//  $.ajax({
//               url:"fees_collection.php",
//               method:"POST",
//               data:{id:id},
//         //       success:function(data){ 
                           
//         //     // alert(data);
//         //      var info = data.split("##");
             
//         //      var Name = info[0];
//         //      var Id = info[1];
             
//         //   //  $("#sName").val(Name);
//         //   //  $("#sid").val(Id);
//         //       }              
//           });
//  }

    </script>
<!--<script type="text/javascript" src="../../academic/assets/js/jquery-3.2.1.min.js"></script>-->
</body>
</html>
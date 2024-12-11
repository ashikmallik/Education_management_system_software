<?php require_once('result_top.php'); ?>
    <li><a href="../index.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Home</a></li>
    <?php if($userid == "Amir"){ ?>
    <li><a href="assignment.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Assignment</a></li>
    <li><a href="download_csv.php"><i class="fa fa-user" aria-hidden="true"></i> Download CSV </a></li>
   <li><a href="upload_marks.php"><i class="fa fa-cog" aria-hidden="true"></i> Upload Marks (CSV) </a></li>
   <li><a href="marks_entry.php"><i class="fa fa-cog" aria-hidden="true"></i> Marks Entry </a></li>
   <li><a href="edit_marks.php"><i class="fa fa-cog" aria-hidden="true"></i> Edit Marks </a></li>
      <li><a href="student_update_mark_table.php"><i class="fa fa-cog" aria-hidden="true"></i> Student update on mark table </a></li>
   <?php } ?>
   
     <?php if($userid == "Fahad"){ ?>
   <li><a href="marks_entry.php"><i class="fa fa-cog" aria-hidden="true"></i> Marks Entry </a></li>
   <li><a href="edit_marks.php"><i class="fa fa-cog" aria-hidden="true"></i> Edit Marks </a></li>
   <?php } ?>
 
 
   <li><a href="marks_entry.php"><i class="fa fa-cog" aria-hidden="true"></i> Marks Entry </a></li>
   <li><a href="edit_marks.php"><i class="fa fa-cog" aria-hidden="true"></i> Edit Marks </a></li>
   


   
     <li><a href="set_merit.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Merit Section</a></li> 

     
   <li><a href="set_merit_shift.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Merit Shift</a></li>
   <li><a href="set_merit_class.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Merit Class</a></li> 
      <li><a href="set_fail.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Fail</a></li>
     

     <!-- 
   <li><a href="set_merit9_10.php"><i class="fa fa-cog" aria-hidden="true"></i> Process  9 & 10 Step-1  </a></li>   
     <li><a href="set_merit9_101.php"><i class="fa fa-cog" aria-hidden="true"></i> Process  9 & 10 Step-2  </a></li>   
     <li><a href="set_merit9_1002.php"><i class="fa fa-cog" aria-hidden="true"></i> Process  9 & 10 Step-3  </a></li> 
      <li><a href="set_fail.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Fail </a></li>
  -->
    <?php
  if($schId==51 or $schId==78 or $schId==81 or $schId==19 or $schId==101){ ?>
	  
	<li><a href="tabulation_sheet.php"><i class="fa fa-cog" aria-hidden="true"></i> Tabulation Sheet</a></li>  
	  <?php }
	  else {?>
	 <li><a href="tabulation_sheet_ngghs.php"><i class="fa fa-cog" aria-hidden="true"></i> Tabulation Sheet </a></li>
<?php } ?>    
    
   
       <?php
  if($schId==69 or $schId==91 or $schId==101){ ?>
	  
    <li><a href="merit_list_ngghs.php"><i class="fa fa-cog" aria-hidden="true"></i> Merit List </a></li>
    <li><a href="fail_list_ngghs.php"><i class="fa fa-cog" aria-hidden="true"></i> Fail List </a></li> 
	  <?php }
	  
	  else {?>
    <li><a href="merit_list.php"><i class="fa fa-cog" aria-hidden="true"></i> Merit List </a></li>
    <li><a href="fail_list.php"><i class="fa fa-cog" aria-hidden="true"></i> Fail List </a></li>
<?php } ?> 
  
      <li><a href="progress_report.php"><i class="fa fa-cog" aria-hidden="true"></i> Progress Report </a></li>
    
    
   <!--<li><a href="Plucked_list.php"><i class="fa fa-cog" aria-hidden="true"></i> Plucked List </a></li>    -->
   <!--<li><a href="merit_summary.php"><i class="fa fa-cog" aria-hidden="true"></i> Summary List </a></li>-->
     
   <!-- 
    <li><a href="add_slider.html"><i class="fa fa-picture-o" aria-hidden="true"></i>Add Slider</a></li>
    <li><a href="bibornoni.html"><i class="fa fa-info-circle" aria-hidden="true"></i>Biboroni</a></li>
    <li><a href="add_gallery.html"><i class="fa fa-file-image-o" aria-hidden="true"></i>Add Gallery</a></li>
    <li><a href="manaje_gallery.html"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Manage Gallery</a></li>
    <li><a href="add_corner.html"><i class="fa fa-file-word-o" aria-hidden="true"></i>Add Corner</a></li>
    <li><a href="manaje_corner.html"><i class="fa fa-cloud-download" aria-hidden="true"></i>Manage Corner</a></li>
    <li><a href="add_file.html"><i class="fa fa-file-o" aria-hidden="true"></i>Add File</a></li>
    <li><a href="add_notice.html"><i class="fa fa-bell" aria-hidden="true"></i>Add Notice</a></li>
    <li><a href="manaje_notice.html"><i class="fa fa-bell-o" aria-hidden="true"></i>Manage Notice</a></li>
    <li><a href="important_link.html"><i class="fa fa-link" aria-hidden="true"></i>Important Link</a></li>
    <li><a href="set_logo.html"><i class="fa fa-upload" aria-hidden="true"></i>Set Logo</a></li>
    <li><a href="bani_chirontoni.html"><i class="fa fa-bandcamp" aria-hidden="true"></i>Bani Chirontoni</a></li>-->
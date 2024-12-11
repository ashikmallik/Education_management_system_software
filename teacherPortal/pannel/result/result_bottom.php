  <?php require_once('result_top.php'); ?>
      <?php if($userid == "Amir"){ ?>
    <li><a href="process_result.php"><i class="fa fa-user" aria-hidden="true"></i> Process Avg. Result </a></li>
   <li><a href="set_avgmerit.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Avg. Merit</a></li>
   <li><a href="set_avgfail.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Avg. Fail </a></li>
   <?php }?>
  
   <?php if($schId==108){ ?>
    <li><a href="process_result_mainartek.php"><i class="fa fa-user" aria-hidden="true"></i> Process Avg. Result </a></li>
   <?php }else{ ?>
    <!--<li><a href="process_result.php"><i class="fa fa-user" aria-hidden="true"></i> Process Avg. Result </a></li>-->
   <?php
  }
  if($schId==69 or $schId==91 or $schId==101){ ?>
    
   <li><a href="set_avgmerit_ngghs.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Avg. Merit</a></li>
   <li><a href="set_avgfail_ngghs.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Avg. Fail </a></li>
<?php } else {?>
   <!--   <li><a href="set_avgmerit.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Avg. Merit</a></li>-->
   <!--<li><a href="set_avgfail.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Avg. Fail </a></li>-->
<?php } 
  if($schId==70){
?>
      <li><a href="set_gpaavgmerit_dakshin.php"><i class="fa fa-cog" aria-hidden="true"></i> Set GPA Avg. Merit</a></li>
<?php } else {
?>
      <!--<li><a href="set_gpaavgmerit.php"><i class="fa fa-cog" aria-hidden="true"></i> Set GPA Avg. Merit</a></li>-->
<?php } ?>      
      <!--<li><a href="set_group_avgmerit.php"><i class="fa fa-cog" aria-hidden="true"></i> Set Group Avg. Merit</a></li>-->

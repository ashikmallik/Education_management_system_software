<?php
$mysqli = new mysqli('localhost','root','','borno_eng');

    session_start();
	$schId=$_SESSION['schId'];


$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='shiftId1'){
    $branchId=$_POST['branchId1'];
	$studClass = $_POST['studClass1'];
	$shiftId=$_POST['shiftId1'];
    echo "<option selected disabled>Select Section</option>";
    $gtsection = $mysqli->query("select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'");
    while($shsection = $gtsection->fetch_assoc()){
        ?>
        <option value="<?php echo $shsection['borno_school_section_id'] ?>"><?php echo $shsection['borno_school_section_name'] ?></option>
        <?php
    }
} else if($page=='upo'){
    $dis = $_POST['iddis'];
    echo "<option selected disabled>Select Upozila</option>";
    $stmt = $mysqli->query("select * from upozila where dist_id='$dis'");
    while($row = $stmt->fetch_assoc()){
        ?>
        <option value="<?php echo $row['upo_id'] ?>"><?php echo $row['upo_name'] ?></option>
        <?php
    }
} else{
    echo "<option selected disabled>Select Branch</option>";
   echo  $stmt ="select * from borno_school_branch  where borno_school_id='$schId'";
	$qdata=$mysqli->query($stmt);
    while($showdata=$qdata->fetch_assoc()){
        ?>
        <option value="<?php echo $showdata['borno_school_branch_id'] ?>"><?php echo $showdata['borno_school_branch_name'] ?></option>
        <?php
    }
}
?>
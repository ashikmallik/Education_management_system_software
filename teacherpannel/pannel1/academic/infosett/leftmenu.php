<div class="top_part_menu">
            <h3>Information Settings</h3>
            <ul>
                <li><a href="../index.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Home</a></li>                
                <li><a href="information_pannel.php"><i class="fa fa-user" aria-hidden="true"></i>Admin Profile</a></li>
                
                <?php
                                	if($_SESSION['userid1']=="") {			?>
                
                <li><a href="add_user.php"><i class="fa fa-user" aria-hidden="true"></i>Add User</a></li>
                <li><a href="manage_user.php"><i class="fa fa-user" aria-hidden="true"></i>Manage User</a></li>
                
                <?php } ?>
                
                
                <li><a href="add_branch.php"><i class="fa fa-cog" aria-hidden="true"></i>Add Branch</a></li>
                <li><a href="set_inst_class.php"><i class="fa fa-bandcamp" aria-hidden="true"></i>Set Class</a></li>
                <li><a href="school_class_list.php"><i class="fa fa-bandcamp" aria-hidden="true"></i>Class List</a></li>
                <li><a href="add_section.php"><i class="fa fa-picture-o" aria-hidden="true"></i>Add Section</a></li>
                <li><a href="manage_section.php"><i class="fa fa-info-circle" aria-hidden="true"></i>Manage Section</a></li>  
                <li><a href="change_logo.php"><i class="fa fa-info-circle" aria-hidden="true"></i>Add Logo</a></li>  
                <li><a href="change_password.php"><i class="fa fa-cog" aria-hidden="true"></i>Change Password</a></li>           
            </ul>
        </div>
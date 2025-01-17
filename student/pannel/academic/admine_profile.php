<?php require_once('academic_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <div class="top_part_menu">
            <h3>Admin Panel</h3>
            <ul>
                <li><a href="change_password.html"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Change Password</a></li>
                <li><a href="admine_profile.html" class="active"><i class="fa fa-user" aria-hidden="true"></i>Admin Profile</a></li>
                <li><a href="color_setting.html"><i class="fa fa-cog" aria-hidden="true"></i>Color Setting</a></li>
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
                <li><a href="bani_chirontoni.html"><i class="fa fa-bandcamp" aria-hidden="true"></i>Bani Chirontoni</a></li>
            </ul>
        </div>
        <div class="fixed_logo">
            <a href=""><img src="assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Admin Panel</h3>
            </div>
            <div class="log_out">
                <a href=""><img src="assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Admin Profile</h2></div>
                <div class="form">
                    <center>
                    <form>
                        <table>
                            <tr>
                                <td class="text_table">Institute Name (Eng.)</td>
                                <td><input type="text" name=""></td>
                            </tr>
                             <tr>
                                <td class="text_table">Institute Name (Ban.)</td>
                                <td><input type="text" name=""></td>
                            </tr>
                             <tr>
                                <td class="text_table">Font Size English</td>
                                <td><input type="text" name=""></td>
                            </tr>
                             <tr>
                                <td class="text_table">Font Size Bangla</td>
                                <td><input type="text" name=""></td>
                            </tr>
                             <tr>
                                <td class="text_table">Address</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">Zip/Postcode</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">City</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">Country</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">Telephone</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">Mobile No.</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">Headmaster Email</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">Login ID</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">Show Govt. Logo</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td class="text_table">Show Company Name</td>
                                <td><input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Save"></center></td>
                            </tr>
                        </table>
                    </form>
                    </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>
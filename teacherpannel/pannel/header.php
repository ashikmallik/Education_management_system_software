                
                
                <div class="header" style ="background: #f1f6f7;height: 102px;">
                    <div class="logo logo-dark">
                        <a href="">
                            <img src="assets/images/logo.jpg" alt="assets/images/nophoto.jpg"  style="margin-top: 3%;width: 32%;">
                            <img class="logo-fold" src="assets/images/logo.jpg" alt="assets/images/nophoto.jpg">
                        </a>
                    </div>
                    <div class="logo logo-white">
                        <a href="">
                            <img src="assets/images/logo.jpg" alt="assets/images/nophoto.jpg">
                            <img class="logo-fold" src="assets/images/logo.jpg" alt="assets/images/nophoto.jpg">
                        </a>
                    </div>
                    <div class="nav-wrap">
                        <ul class="nav-left">
                            <li class="desktop-toggle">
                                <a href="javascript:void(0);">
                                    <img src="assets/images/logo/humbarger.png" alt="">
                                </a>
                            </li>
                            <li class="mobile-toggle">
                                <a href="javascript:void(0);">
                                    <img src="assets/images/logo/humbarger.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a class="scholnameDestop" style="font-weight: bold;">
                                    <?php echo $schname; ?>
                                </a>
                                <a class="scholnameMobil" href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                    <img src="assets/images/logo.jpg" alt="">
                               </a>

                            </li>
                            <li>
                                <a class="scholnameMobil" style="margin-left: -18%;text-wrap: balance;font-size: 16px;font-weight: bold;">
                                    <?php echo $schname; ?>
                                </a>
                            </li>
                        </ul>
                        
                        <ul class="nav-right">
                            <!-- <li class="">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                    <i class="anticon anticon-appstore">setting</i>
                                </a>
                            </li> -->

    
                            <!--<li class="dropdown dropdown-animated scale-left text-center">-->
                            <!--    <div class="pointer avatarmobil" data-toggle="dropdown">-->
                            <!--        <div class="avatar avatar-image avatar-imageTop m-h-10 m-r-15">-->
                            <!--            <img src="assets/images/logo/humbarger.png"  alt="">-->
                            <!--        </div>-->
                            <!--        <div class="avatorname">-->
                            <!--            <p class="m-b-0 text-dark font-weight-semibold" style="font-size: 12px;"><?php  ?></p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="p-b-15 p-t-20 dropdown-menu pop-profile">-->
                            <!--        <a href="#" class="dropdown-item d-block p-h-15 p-v-10" data-toggle="modal" data-target=".bd-example-modal-lgChangepass">-->
                                        <!--<div class="d-flex align-items-center justify-content-between">-->
                                        <!--    <div>-->
                                        <!--        <img src="../assets/images/Icon/Changepassword.svg" alt="">-->
                                        <!--        <span class="m-l-10">Change Password</span>-->
                                        <!--    </div>-->
                                        <!--    <i class="anticon font-size-10 anticon-right"></i>-->
                                        <!--</div>-->
                            <!--        </a>-->
                            <!--        <a href="logout.php" class="dropdown-item d-block p-h-15 p-v-10">-->
                            <!--            <div class="d-flex align-items-center justify-content-between">-->
                            <!--                <div>-->
                            <!--                    <img src="assets/images/Icon/logout.svg" alt="">-->
                            <!--                    <span class="m-l-10">Logout</span>-->
                            <!--                </div>-->
                            <!--                <i class="anticon font-size-10 anticon-right"></i>-->
                            <!--            </div>-->
                            <!--        </a>-->
                                   
                            <!--    </div>-->
                            <!--</li>-->
                           
                        </ul>
                    </div>
                    
                </div>    
                <!-- Header END -->
     <!---------------Change password--------------->
     <div class="modal fade bd-example-modal-lgChangepass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modalPassword">
                <div class="passwordHead">
                    <p style="margin-bottom: -3px;">An asterisk (<span class="Madatory">*</span>) indicates mandatory fields.</p>
                    <p>Current password and new password cannot be same.</p>
                </div>
              <div class="passwordmainBody">
                <div class="modal-header changepassHead">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Enter Current Password <span class="Madatory">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Enter New Password <span class="Madatory">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Confirm New Password<span class="Madatory">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Enter Name" required>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer passwordFooter">
                    <button type="button" class="btn btn-secondary pPortalclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>
              </div>
            </div>
          </div>
    </div>
      <!-----Change password---->
                <!---Header Mobile-->
                <!--<div class="header headermobil mt-5">-->
                    
                    <!--<div class="nav-wrap">-->
                    <!--    <ul class="nav-leftMobil">-->
                    <!--        <li class="navSchool">-->
                    <!--            <a class="scholnameMobilNav" href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">-->
                    <!--                <?php echo $schname; ?>-->
                    <!--            </a>-->
                                
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--    <ul class="nav-right">-->
                            <!--<li class="dropdown dropdown-animated scale-left text-center">-->
                            <!--    <div class="pointer" data-toggle="dropdown">-->
                            <!--        <div class="avatar avatar-image avatar-imageTop">-->
                            <!--            <img src="../../pannel/academic/student/studentphoto/<?php echo $shgtstudent['borno_school_photo']; ?>"  alt="../../pannel/academic/student/studentphoto/nophoto.jpg">-->
                            <!--        </div>-->
                                    <!-- <div class="avatar avatar-image avatar-imageTop ">
                            <!--            <img src="../../pannel/academic/student/studentphoto"  alt="">-->
                            <!--        </div> -->
                            <!--    </div>-->
                            <!--    <div class="p-b-15 p-t-20 dropdown-menu pop-profile">-->
                            <!--        <a href="#" class="dropdown-item d-block p-h-15 p-v-10" data-toggle="modal" data-target=".bd-example-modal-lgChangepass">-->
                            <!--            <div class="d-flex align-items-center justify-content-between">-->
                                            <!--<div>-->
                                            <!--    <img src="../assets/images/Icon/Changepassword.svg" alt="">-->
                                            <!--    <span class="m-l-10">Change Password</span>-->
                                            <!--</div>-->
                            <!--                <i class="anticon font-size-10 anticon-right"></i>-->
                            <!--            </div>-->
                            <!--        </a>-->
                            <!--        <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">-->
                            <!--            <div class="d-flex align-items-center justify-content-between">-->
                            <!--                <div>-->
                            <!--                    <img src="assets/images/Icon/logout.svg" alt="">-->
                            <!--                    <span class="m-l-10">Logout</span>-->
                            <!--                </div>-->
                            <!--                <i class="anticon font-size-10 anticon-right"></i>-->
                            <!--            </div>-->
                            <!--        </a>-->
                                   
                            <!--    </div>-->
                            <!--</li>-->
                            
                    <!--    </ul>-->
                    <!--</div>-->
                <!--</div>  -->
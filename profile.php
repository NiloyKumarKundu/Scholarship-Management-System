<?php include './header.php' ?>

<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <!-- <div class="breadcrumb-item"> -->
                    <li class="text-secondary" style="margin-top: 0.4em; margin-right: 1em;">
                        <h6>Want to be a moderator?</h6>
                    </li>
                <!-- </div> -->
                <li class="breadcrumb-item">
                        <button class="btn btn-sm btn-success"><a href="#" style="color: #fff;">Apply Now!</a></button>
                </li>

                <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li> -->
            </ol>
        </nav>

        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="./ProPic/avatar7.png" alt="" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>John Doe</h4>
                                <p class="text-secondary mb-1">Full Stack Developer</p>
                                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                <button class="btn btn-primary"><a href="./update-profile-pic.php" style="color: #fff;">Update Profile Picture</a></button>
                                <button class="btn btn-outline-primary">Edit Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>Website</h6>
                            <span class="text-secondary"><a href="#">https://bootdey.com</a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                </svg>Github</h6>
                            <span class="text-secondary"><a href="#">@username</a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                </svg>Twitter</h6>
                            <span class="text-secondary"><a href="#">@username</a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>Instagram</h6>
                            <span class="text-secondary"><a href="#">@username</a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>Facebook</h6>
                            <span class="text-secondary"><a href="#">@username</a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Kenneth Valdez
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                fip@jukmuh.al
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                (239) 816-9029
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Bay Area, San Francisco, CA
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Date of Birth</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                23 July, 1999
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row gutters-sm">
                    <div class="col-sm-7 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Other Informations</i></h6>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <small class="mb-0">Gender</small>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <small class="mb-0">Male</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <small class="mb-0">Country</small>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <small class="mb-0">Bangladesh</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <small class="mb-0">Nationality</small>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <small class="mb-0">Bangladeshi</small>
                                    </div>
                                </div>
                                <br>
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Educational Status</i></h6>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <small class="mb-0">School</small>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <small class="mb-0">Biggan School</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <small class="mb-0">College</small>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <small class="mb-0">New Govt. Degree College</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <small class="mb-0">University</small>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <small class="mb-0">UIU</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 mb-3">
                        <div class="card h-50">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Interested Category</i></h6>
                                <div class="row">
                                    <div class="col text-secondary">
                                        <!-- <div class="alert alert-secondary" role="alert">
                                            This is a secondary alert—check it out!
                                        </div> -->
                                        <small class="badge badge-pill badge-light">CSE</small>
                                        <small class="badge badge-pill badge-light">EEE</small>
                                        <small class="badge badge-pill badge-light">BBA</small>
                                        <small class="badge badge-pill badge-light">Music</small>
                                        <small class="badge badge-pill badge-light">Civil</small>
                                        <small class="badge badge-pill badge-light">Category 6 </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card h-50">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Account</i></h6>
                                <small class="mb-0">To experience the amazing premium features...</small>
                                <a href="#" class="btn btn-success btn-sm btn-block" role="button">Upgrade Now!</a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php include './footer.php' ?>
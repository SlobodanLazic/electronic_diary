<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-footer">
                    <a href="#">Read All New Messages</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="<?php echo URLROOT . '/users/admin'; ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>


            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="#">Insert User</a>
                    </li>
                    <li>
                        <a href="#">Edit User</a>
                    </li>
                    <li>
                        <a href="#">Delete User</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i>Students <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo1" class="collapse">
                    <li>
                        <a href="<?php echo URLROOT . '/students'; ?>">All Students</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT . '/students/insert'; ?>">Insert Student</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i>Notifications <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo2" class="collapse">
                    <li>
                        <a href="#">Make Notification</a>
                    </li>
                    <li>
                        <a href="#">Edit Notification</a>
                    </li>
                    <li>
                        <a href="#">Delete Notification</a>
                    </li>

                </ul>

            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i>Subjects <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo3" class="collapse">
                    <li>
                        <a href="#">Insert Subject</a>
                    </li>
                    <li>
                        <a href="#">Edit Subject</a>
                    </li>
                    <li>
                        <a href="#">Delete Subject</a>
                    </li>

                </ul>

            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-arrows-v"></i> Class Schedules <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo4" class="collapse">
                    <li>
                        <a href="#">Insert Schedule</a>
                    </li>
                    <li>
                        <a href="#">Edit Schedule</a>
                    </li>
                    <li>
                        <a href="#">Delete Schedule</a>
                    </li>

                </ul>

            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-arrows-v"></i>School Classes <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo5" class="collapse">
                    <li>
                        <a href="#">Insert Class</a>
                    </li>
                    <li>
                        <a href="#">Edit Class</a>
                    </li>
                    <li>
                        <a href="#">Delete Class</a>
                    </li>

                </ul>

            </li>

        </ul>

    </div>

    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <?php flash('register_success'); ?>
                    <h2>Insert User</h2>
                    <p>Please fill out this form to insert user</p>
                    <form action="<?php echo URLROOT; ?>/users/insert" method="post">
                        <div class="form-group">
                            <label for="name">Name: <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['name']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['name_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['email_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['password_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['confirm_password']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['confirm_password_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="user_role">User Role <sup>*</sup></label>
                            <select name="user_role" id="user_role_dropdown_menu" class="form-control form-control-lg <?php echo (!empty($data['user_role_err'])) ? 'is-invalid' : '' ?>">
                                <option value='' selected>.....Select a role.....</option>
                                <?php
                                $users = new Users();
                                foreach ($users->GetUserRoles() as $id_user_role => $name) :
                                    ?>
                                    <option value='<?php echo $id_user_role; ?>'><?php print($name); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="invalid-feedback text-danger"><?php echo $data['user_role_err']; ?></span>
                        </div>
<<<<<<< HEAD
                        <div class="form-group hidden">
                            <label for="student_first_name">Student first name: <sup>*</sup></label>
                            <input type="text" name="student_first_name" class="form-control form-control-lg ">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <div class="form-group hidden">
                            <label for="student_last_name">Student last name: <sup>*</sup></label>
                            <input type="text" name="student_last_name" class="form-control form-control-lg ">
                            <span class="invalid-feedback text-danger"></span>
=======
                        <div class="form-group">
                            <label for="first_name">Student First Name: <sup>*</sup></label>
                            <input type="text" name="first_name" class="form-control form-control-lg <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['first_name']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['first_name_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Student Last Name: <sup>*</sup></label>
                            <input type="text" name="last_name" class="form-control form-control-lg <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['last_name']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['last_name_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="id_school_class">Student Class<sup>*</sup></label>
                            <select name="id_school_class" id="id_school_class" class="form-control form-control-lg <?php echo (!empty($data['id_school_class_err'])) ? 'is-invalid' : '' ?>">
                                <option value='' selected>.....Select a class.....</option>
                                <?php foreach ($data['classes'] as $class) : ?>

                                    <?php echo "<option value=\"$class->id_school_class\">$class->name</option>"; ?>

                                <?php endforeach; ?>

                            </select>
                            <span class="invalid-feedback text-danger"><?php echo $data['id_school_class_err']; ?></span>
>>>>>>> 6ab34b042fc244160417341c850bb5efe26f0b65
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Insert" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<<<<<<< HEAD
<script>
    selectElement = document.getElementById("user_role_dropdown_menu");
    OptionElements = selectElement.options;
    
    selectElement.onchange = function () {
        for (let i = 0; i < OptionElements.length; i++) {
            if(OptionElements[i].value == 4) {
            
                var hiddenElement = document.getElementsByClassName('hidden');
                console.log(hiddenElement);
                hiddenElement[0].classList.remove('hidden');
            } 
        }   
    }   
</script>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
=======

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
>>>>>>> 6ab34b042fc244160417341c850bb5efe26f0b65

<?php require APPROOT . '/views/inc/admin/header.php'; ?>

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
                            <select name="user_role" id="user_role" class="form-control form-control-lg <?php echo (!empty($data['user_role_err'])) ? 'is-invalid' : '' ?>">
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
                        <div id="student">
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
                            </div>
                        </div>
                        <div id="teacher">
                            <div class="form-group">
                                <label for="id_school_class">Class<sup>*</sup></label>
                                <select name="id_teacher_class" id="id_teacher_class" class="form-control form-control-lg <?php echo (!empty($data['id_school_class_err'])) ? 'is-invalid' : '' ?>">
                                    <option value='' selected>.....Select a class.....</option>
                                    <?php foreach ($data['classes'] as $class) : ?>

                                        <?php echo "<option value=\"$class->id_school_class\">$class->name</option>"; ?>

                                    <?php endforeach; ?>

                                </select>
                                <span class="invalid-feedback text-danger"><?php echo $data['id_school_class_err']; ?></span>
                            </div>
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

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
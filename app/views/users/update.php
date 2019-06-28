<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Users
                </h1>
                <?php flash('user_message') ?>
                <?php flash('user_updated_msg') ?>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Update User</h2>
                    <p>Please fill out this form to update user</p>
                    <form action="<?php echo URLROOT; ?>/users/update" method="post">
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
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Update" class="btn btn-primary btn-block">
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
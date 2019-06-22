<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Delete Users
                </h1>
                <?php flash('user_message') ?>
                <?php flash('user_deleted_msg') ?>

                <div class="table-responsive">
                    <table class="table table-striped">

                        <thead>

                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>User Role</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $users = new Users();

                        foreach ($users->GetAllUsersAndAllRoles() as $user) : ?>

                            <tbody>

                                <tr>
                                    <td><?php echo($user->username); ?></td>
                                    <td><?php print($user->email); ?></td>
                                    <td><?php printf($user->name); ?></td>
                                    <td>
                                        <form action="<?php echo URLROOT . '/users/delete/'; ?>" method="POST">
                                            <input class="hidden" name="id_user" type="text" value="<?php echo $user->id_user; ?>">
                                            <input type="submit" value="Delete" class="btn btn-dark btn-block">
                                        </form>
                                    </td>
                                </tr>

                            </tbody>

                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
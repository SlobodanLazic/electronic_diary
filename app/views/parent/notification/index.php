<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                  Notifications
                </h1>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo URLROOT . "/notifications/insert" ?>">Insert subject</a>
                <?php flash('notification_message') ?>
                <?php flash('notification_updated') ?>
                <?php flash('notification_deleted_msg') ?>
            </div>
        </div>
        <!-- /.row -->
        
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>

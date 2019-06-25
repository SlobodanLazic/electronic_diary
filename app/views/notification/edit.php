<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Notification
                </h1>

                <div class="card card-body bg-light mt-5">

                    <form action="<?php echo URLROOT; ?>/notification/edit" method="post">
                        <div class="form-group">
                                <textarea name="notification_content" id="notification_content" cols="100" rows="15">
                                        <?php foreach ($data['notification'] as $notification) : ?>

                                        <?php echo $notification->notification_content; ?>

                                        <?php endforeach; ?> 

                                </textarea>
                         
                        </div>
                  
                       

                    </form>
                </div>
                         
                          










                </div>


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Students</h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo URLROOT; ?>/users/gupdate/<?php echo $data['student']->id_student; ?>" method="post">
                        <div class="form-group">
                            <label>Subject Name:</label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['subject']->name; ?>">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <input type="hidden" id="id_subject" name="id_subject" value="<?php echo $data['subject']->id_subject; ?>">

                        <input type="submit" class="btn btn-success" value="Update">
                    </form>
                </div><!-- CARD-BODY END -->
            </div> <!-- /.CARD SHADOW -->

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/teacher/footer.php'; ?>
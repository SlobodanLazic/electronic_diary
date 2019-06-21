<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Insert Subject
                </h1>

                <div class="card card-body bg-light mt-5">

                    <form action="<?php echo URLROOT; ?>/subjects/insert" method="post">
                        <div class="form-group">
                            <label>Subject Name:</label>
                            <input for="name" type="text" value="Create subject">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <input type="hidden" id="id_subject" name="id_subject" value="<?php echo $data['subject']->id_subject; ?>">

                        <input type="submit" class="btn btn-success" value="Insert">
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
<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update
                </h1>

                <div class="card card-body bg-light mt-5">


                    <form action="<?php echo URLROOT; ?>/schedules/update/<?php echo $data['schedule']->id_schedules; ?>" method="post">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control form-control-lg" value="<?php echo $data['schedule']->subject_name; ?>">
                            <input type="hidden" id="id_schedule" name="id_schedule" value="<?php echo $data['schedule']->id_schedules; ?>">
                            <span class="invalid-feedback text-danger"></span>
                        </div>

                        <input type="submit" class="btn btn-success" value="Update">
                    </form>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php require APPROOT . '/views/inc/admin/footer.php'; ?>
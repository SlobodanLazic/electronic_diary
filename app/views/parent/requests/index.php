<?php require APPROOT . '/views/inc/parent/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">
        
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <?php flash('request_success'); ?>
                    <div class="table-responsive">
                    <table class="table table-bordered dataTable text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>                        
                                </tr>
                            </thead>
                                <?php foreach ($data['students'] as $student) : ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $student->id_student; ?>
                                        </td>
                                        <td>
                                            <?php echo $student->first_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $student->last_name; ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                    </table>
                    </div>
                    <h2>Send Request to Attend To Open Door Meeting</h2>
                    <p>Please fill out this form to send request</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="time">Time: <sup>*</sup></label>
                            <input type="time" name="time" id="time" class="form-control form-control-lg">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="date">Date: <sup>*</sup></label>
                            <input type="date" name="date" id="date" class="form-control form-control-lg">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" id="request-open-door" value="Request" class="btn btn-primary btn-block">
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

<?php require APPROOT . '/views/inc/parent/footer.php'; ?>

<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Student
                </h1>

                <div class="card card-body bg-light mt-5">


                    <form action="<?php echo URLROOT; ?>/classes/update/<?php echo $data['classes']->id_school_class; ?>" method="post">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classes']->name; ?>">
                            <input type="hidden" id="id_school_class" name="id_school_class" value="<?php echo $data['classes']->id_school_class; ?>">
                            <span class="invalid-feedback text-danger"></span>
                        </div>

                        <input type="submit" class="btn btn-success" value="Update">
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
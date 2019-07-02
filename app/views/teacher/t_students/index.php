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
                <div class="table-responsive">
                    <div class="dataTables_wrapper dt-bootstrap4">
                        <table class="table table-bordered dataTable text-center">

                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Options</th>
                                    <th>Grade status</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            ID
                                        </td>
                                        <td>
                                            First name
                                        </td>
                                        <td>
                                            Last name
                                        </td>
                                        <td class="buttons-pos">
                                                <a href="#" class="btn btn-success btn-icon-split m1">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit </span>
                                                </a>
                                            <form action="<?php echo URLROOT . "/t_students/delete" ?>" method="post">
                                                <a href="#" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>
                                            </form>
                                        </td>
                                        <td>
                                            Status
                                        </td>
                                        </form>
                                    </tr>
                                </tbody>
                        </table>
                </div><!-- bt4 end -->
                </div><!-- table responsive end -->
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
<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Classes
                </h1>
                <?php flash('student_message') ?>
                <?php flash('student_updated') ?>
                <?php flash('student_deleted_msg') ?>
                <!-- 
                <form action="" method="post">

                    <div class="form-group">
                        <label>Select class:</label>
                        <select name='id_class' class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">


                            <?php foreach ($data['classes'] as $class) : ?>

                                    <?php echo "<option value=\"$class->id_school_class\">$class->name</option>"; ?>

                            <?php endforeach; ?>

                        </select>

                        <input type="submit" class="btn btn-success" value="Show">

                    </div>

                </form> -->

                <table class="table table-striped">

                    <thead>

                        <tr>
                            <th></th>
                            <th>Class</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <?php $i = 0; ?>

                    <?php foreach ($data['classes'] as $class) : ?>

                        <tbody>

                            <tr>




                                <?php echo '<td>' . ++$i . '</td><td>' . $class->name . '</td><td>'

                                    . '<a href =' . URLROOT . "/classes/edit/" . $class->id_school_class . '>Edit</a>' . '</td><td>' ?>


                                <form action="<?php echo URLROOT . "/classes/delete/" . $class->id_school_class ?>" method="POST">

                                    <input type="submit" name="delete" value="Delete">

                                </form>


                            </tr>

                        </tbody>

                    <?php endforeach; ?>

                </table>






            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Students
                </h1>
                <?php flash('student_message') ?>
                <?php flash('student_updated') ?>
                <?php flash('student_deleted_msg') ?>

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

                </form>

                <table class="table table-striped">

                    <thead>

                        <tr>
                            <th></th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Class</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <?php $i = 0; ?>

                    <?php foreach ($data['students'] as $student) : ?>

                        <tbody>

                            <tr>

                                <?php

                                $postClass =  1;

                                if (isset($_POST['id_class'])) {

                                    $postClass = htmlspecialchars($_POST['id_class']);
                                }

                                if ($student->id_school_class != (int)$postClass) {

                                    continue;
                                }

                                ?>


                                <?php echo '<td>' . ++$i . '</td><td>' . $student->first_name . '</td><td>' . $student->last_name . '</td><td>'

                                    . $student->name . '</td><td>' . '<a href =' . URLROOT . "/students/edit/" . $student->id_student . '>Edit</a>' . '</td><td>' ?>

                                <form action="<?php echo URLROOT . "/students/delete/" . $student->id_student ?>" method="POST">

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
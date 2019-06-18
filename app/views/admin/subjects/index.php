<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<?php require APPROOT . '/views/inc/admin/navigation.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Subjects
                </h1>
                <?php flash('subjects_message') ?>
                <?php flash('subjects_updated') ?>
                <?php flash('subjects_deleted_msg') ?>


                <table class="table table-striped">

                    <thead>

                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Option</th>
                        </tr>
                    </thead>

                    <?php $i = 0; ?>
                    <?php foreach ($data['subjects'] as $subject) : ?>
                    <tbody>
                        <tr>
                        <?php echo '
                        <td>' . ++$i . '</td>
                        
                        <td>' . $subject->name ?> </td>
                        <td><a href="#">Edit</a>
                        <a href="#">Delete</a>
                        </td>

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
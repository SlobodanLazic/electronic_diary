<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/navigation.php'; ?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Subjects
                </h1>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="edit.php">Insert subject</a>
                <?php flash('subject_message') ?>
                <?php flash('subject_updated') ?>
                <?php flash('subject_deleted_msg') ?>
            </div>
        </div>
        <!-- /.row -->
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <!-- php subjects -->
    <?php $i = 0; ?>
    <?php foreach ($data['subjects'] as $subject) : ?>
  <tbody>
    <tr>
      <?php 
      echo '
        <td>' . ++$i . '</td>
        <td>' . $subject->name . '</td>
        <td><a href=' . URLROOT . "/subjects/edit/" . $subject->id_subject . '>Edit</a>
        '?>
        <form action="<?php echo URLROOT . "/subjects/delete/" . $subject->id_subject ?>" method="POST">

        <input type="submit" name="delete" value="Delete">

    </form></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
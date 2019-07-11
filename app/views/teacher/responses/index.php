<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Content Row -->
    <div class="row">


      <table class="table table-striped">

        <thead>

          <tr>
            <th></th>
            <th>Parent Name</th>
            <th>Meeting Time</th>
            <th colspan="2">Status</th>
          </tr>
        </thead>

        <?php $i = 0; ?>

        <?php foreach ($data['meetings'] as $meeting) : ?>

          <tbody>

            <tr>

              <?php echo '<td>' . ++$i . '</td><td>' . $meeting->username . '</td><td>' . $meeting->meetings . '</td>'; ?>

              <td><button id='aprove' value='1' class="btn btn-success" type="submit" onclick="aprove()">Accept</button></td>

              <td><button id='denny' value='0' class="btn btn-danger" type="submit" onclick="un_aprove()">Denny</button></td>

            </tr>

          </tbody>

        <?php endforeach; ?>

      </table>


      <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

  <?php require APPROOT . '/views/inc/teacher/footer.php'; ?>
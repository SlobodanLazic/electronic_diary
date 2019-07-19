<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Content Row -->
    <div class="row">


      <table id="tabela1" class="table table-striped">

        <thead>

          <tr>
            <th></th>
            <th>Parent Name</th>
            <th>Meeting Time</th>
            <th></th>
            <th>Status</th>
          </tr>
        </thead>

        <?php $i = 0; ?>

        <?php foreach ($data['meetings'] as $meeting) : ?>

          <tbody>
            <?php if($meeting->meetings_status != 1) { ?>
            <tr id="<?php echo $meeting->id_meetings; ?>">


              <?php echo '<td>' . ++$i . '</td><td>' . $meeting->username . '</td><td>' . $meeting->meetings . '</td>'; ?>
               <?php if($meeting->meetings_status == 0) {?>
              <td id="ab<?php echo $meeting->id_meetings; ?>"><button id='aprove' class="btn btn-success" type="button" onclick="aprove(<?php echo $meeting->id_meetings; ?>, 2, this)">Accept</button></td>

              <td id="db<?php echo $meeting->id_meetings; ?>"><button id='denny' class="btn btn-danger" type="button" onclick="aprove(<?php echo $meeting->id_meetings; ?>, 1,this)">Denny</button></td>
               <?php } else { ?>

                <td></td><td><span class='text-success text-center'>Success</span></td>
               <?php } ?>
            </tr>
               <?php } ?>
          </tbody>

        <?php endforeach; ?>

      </table>


      <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

  <?php require APPROOT . '/views/inc/teacher/footer.php'; ?>
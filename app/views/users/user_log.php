<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div class="container-mess">
    <div class="container">
       <h2 class="text-dark">Logs</h2> 
    </div>
    <div class="row">
        
      <?php foreach($data['logs'] as $log) : ?>
        
        <div class='col-lg-2 border-bottom pb-1'>
          USERNAME:
          <br> 
          <b><?php echo $log->username; ?></b>
        </div>
        <div class='col-lg-4 border-bottom pb-1'>
          EMAIL:
          <br>  
          <b><?php echo $log->email; ?></b>
        </div>
        <div class='col-lg-3 border-bottom pb-1'>
          TIME OF LOGIN:
          <br> 
          <b><?php echo $log->login_time; ?></b>
        </div>
        <div class='col-lg-3 border-bottom pb-1'>
          TIME OF LOGOUT:
          <br> 
          <b class="logout-time"><?php echo $log->logout_time; ?></b>
        </div>
      
      <?php endforeach; ?>

    </div>
</div>

<?php require APPROOT . '/views/inc/admin/footer.php'; ?> 
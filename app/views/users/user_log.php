<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div class="container-mess">
    <div class="container">
       <h2 class="text-dark">Logs</h2> 
    </div>
    <div class="row">
           <?php foreach($data['logs'] as $log) 
           {
                echo "<div class='col-lg-3 border-bottom pb-1'>USERNAME:
                        <br> 
                        <b>".$log->username."</b>
                      </div>";
                echo "<div class='col-lg-3 border-bottom pb-1'>EMAIL:
                        <br>  
                        <b>".$log->email."</b>
                      </div>"; 
                echo "<div class='col-lg-3 border-bottom pb-1'>TIME OF LOGIN:
                         <br> 
                         <b>".$log->login_time."</b>
                      </div>";
                echo "<div class='col-lg-3 border-bottom pb-1'>TIME OF LOGOUT:
                         <br> 
                        <b>".$log->logout_time."</b>
                      </div>";
           }

           ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/teacher/footer.php'; ?> 
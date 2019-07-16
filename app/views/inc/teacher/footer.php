<audio class="ring" id="ring">
         <source src="<?php echo URLROOT . "/public/music/msg_ton.mp3" ?>" type="audio/mpeg">
</audio>
  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="<?php echo URLROOT; ?>/js/dashboard/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo URLROOT; ?>/js/dashboard/bootstrap.min.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo URLROOT; ?>/css/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URLROOT; ?>/css/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo URLROOT; ?>/css/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo URLROOT; ?>/js/dashboard/sb-admin.js"></script>

  <script src="<?php echo URLROOT; ?>/js/teacher/response.js"></script>

<!-- Detect new Notification and Message  -->
<script>
  
      function ringMSG()
     {
       var ring = document.getElementById('ring'); 
       ring.play();
     }
       

      function notification_message()
      {
        var new_message = document.getElementById('new_message');
        
        var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if(this.responseText > 0 ) {
           new_message.innerHTML =  this.responseText;
          } 
          else
           {
            new_message.innerHTML = ""; 
            }
        }
        };
 
        xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/notification", true);
        
        xmlhttp.send();
   
      }


     $d = setInterval(notification_message, 1000); 

</script>

  </body>

  </html>
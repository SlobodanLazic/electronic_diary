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
     /*
      var notification = document.getElementById("new_notification")
      var message = document.getElementById("new_message")


      function message_query() {
            
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              if(this.message_number > 0) {
               message.innerHTML = this.messages_number;
              } else {
                message.innerHTML = "";
              }
         }
        };
          xhttp.open("GET", "", true);
          xhttp.send();  

       }

      setTimeout(message_query,3000); 
      */

       

      function notification_message()
      {
        var new_message = document.getElementById('new_message');
        
        var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           
           new_message.innerHTML =  this.responseText;
           
           
           }
        };
       xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/notification", true);
       xmlhttp.send();
       

      }
      notification_message(); 
     $d = setTimeout(notification_message,1000); 
</script>

  </body>

  </html>
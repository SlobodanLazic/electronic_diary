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


<!-- Detect new Notification and Message  -->
<script>
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
          xhttp.open("GET", "<?php echo URLROOT . '/messages/query_messages'; ?>", true);
          xhttp.send();  

       }

      setTimeout(message_query,3000); 
      
</script>

  </body>

  </html>
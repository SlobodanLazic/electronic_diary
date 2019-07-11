<?php require APPROOT . '/views/inc/teacher/header.php'; ?>



<div class="container-mess">
<!-- <h3 class=" text-center">Messaging</h3> -->
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <!-- <h4>Recent</h4>  -->
              <h4>Messaging</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
              <?php foreach($data['parents'] as $parent) { ?>
            <div class="chat_list" >
              <div class="chat_people" onclick='readMessages(<?php echo $parent->id_user; ?>)'>
                <div class="chat_img"> <img src="<?php echo URLROOT . "/images/parenticon.png" ?>" alt="sunil"> </div>
                <div class="chat_ib">
                  <?php echo "<h5> $parent->username "; ?><span class="chat_date">Date</span></h5>
                 
                </div>
              </div>
            </div> <?php } ?>
          </div>
        </div>
        <div class="mesgs">
        <input type="hidden" id="to_id" value=''>
          <div class="msg_history" id="messages">
          </div>
          <div id="type_msg" class="type_msg">
            <div class="input_msg_write">
              <input type="text" onkeypress="keySend(event)" id="message" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button" onClick="sendMessage()"><i class="fas fa-paper-plane" aria-hidden="true" ></i></button>
            </div>
          </div>
        </div>
      </div>
      
    </div></div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<script>
     var messages = document.getElementById('messages'); 
     var id_user = document.getElementById('to_id').value;
     var msg;
       

     function sendMessage()
     {  
        id_user = document.getElementById('to_id').value;
        var message = document.getElementById('message').value;
         if(message == "" || message == null) {
          document.getElementById('message').focus(); 
         } else {
        var new_message = document.createElement("div"),
            outgoing = document.createElement("div"),
            par = document.createElement('p'),
            date = document.createElement('span');

        new_message.className = 'outgoing_msg message';
        outgoing.className = 'sent_msg';
        date.className = 'time_date';

        new_message.appendChild(outgoing);
        outgoing.appendChild(par);
        outgoing.appendChild(date);

        var d = new Date();
        
        

        var datetext = document.createTextNode(''); 

        date.appendChild(datetext);

        var text = document.createTextNode(message); 

        par.appendChild(text); 

       document.getElementById('message').value = ""; 

        messages.appendChild(new_message);

        var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                
                 }
                };
              xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/new_message?id=" + id_user + "&message_content=" + message, true);
              xmlhttp.send();
              messages.scrollTop = messages.scrollHeight;
     } //end if 

     }

     function readMessages(id)
     {
         document.getElementById('to_id').value = id; 

         document.getElementById('type_msg').style.display='block'; 
         
         var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                 messages.innerHTML = this.responseText;
                 }
                };
              xmlhttp.open("GET", "<?php echo URLROOT; ?> /messages/get_all?id=" + id, true);
              xmlhttp.send();


        messages.scrollTop = messages.scrollHeight;
        msg = setInterval(queryMessager, 2000); 
        


     }

     function queryMessager()
    {
      var id = document.getElementById('to_id').value; 
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           if(this.responseText != "") {  
           var new_dir = document.createElement("div");
           new_dir.innerHTML =  this.responseText;
           messages.appendChild(new_dir);
          
           }
           scroll();
           }
        };
       xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/get_msg?id=" + id, true);
       xmlhttp.send();
       
       
    }

    function keySend(event)
    {
      var key = event.keyCode;
      if(key == 13) {
        sendMessage(); 
       }
    }

     function scroll()
     {
       messages.scrollTop = messages.scrollHeight;
       return;
     }
     
   
</script>

<?php require APPROOT . '/views/inc/teacher/footer.php'; ?> 
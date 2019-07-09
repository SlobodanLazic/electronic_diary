<?php require APPROOT . '/views/inc/teacher/header.php'; ?>



<div class="container-mess">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
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
              <div class="chat_people">
                <div class="chat_img"> <img src="<?php echo URLROOT . "/images/parenticon.png" ?>" alt="sunil"> </div>
                <div class="chat_ib">
                  <?php echo "<h5 onclick='readMessages($parent->id_user)'> $parent->username "; ?><span class="chat_date">Date</span></h5>
                 
                </div>
              </div>
            </div> <?php } ?>
          </div>
        </div>
        <div class="mesgs">
        <input type="hidden" id="to_id" value='39'>
          <div class="msg_history" id="messages">
           
          <div class="incoming_msg">
              <div class="incoming_msg_img"> 
                <img src="<?php echo URLROOT . "/images/parenticon.png" ?>" alt="sunil"> 
              </div>
              <div class="received_msg message">
                <div class="received_withd_msg">
                  <p>Message mess asd messMessage mess asd messMessage mess asd messMessage mess asd mess</p>
                  <span class="time_date">Date</span>
                </div>
              </div>
            </div>
            
            <div class="outgoing_msg message">
              <div class="sent_msg">
                <p>Message mess asd messMessage mess asd messMessage mess asd messMessage mess asd messMessage mess asd mess</p>
                <span class="time_date">Date</span> 
              </div>
            </div>

          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" id="message" class="write_msg" placeholder="Type a message" />
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

        var datetext = document.createTextNode('Date'); 

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
     } //end if 

     }

     function readMessages(id)
     {
         document.getElementById('to_id').value = id; 
         
         var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                 messages.innerHTML = this.responseText;
                 }
                };
              xmlhttp.open("GET", "<?php echo URLROOT; ?> /messages/get_all?id=" + id, true);
              xmlhttp.send();
        
     }

     function queryMessager() 
     {
         var id = document.getElementById('to_id').value

         var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                 messages = messages + this.responseText;
                 }
                };
              xmlhttp.open("GET", "<?php echo URLROOT; ?> /messages/get_msg?id=" + id, true);
              xmlhttp.send();
     }
     
   
</script>

<?php require APPROOT . '/views/inc/teacher/footer.php'; ?> 
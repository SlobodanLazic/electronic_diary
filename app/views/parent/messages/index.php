<?php require APPROOT . '/views/inc/parent/header.php'; ?>



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
              <?php foreach($data['teacher'] as $parent) { ?>
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

      <audio class="ring" id="ring">
         <source src="<?php echo URLROOT . "/public/music/msg_ton.mp3" ?>" type="audio/mpeg">
      </audio>
      
    </div></div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<?php require APPROOT . '/views/inc/parent/footer.php'; ?> 
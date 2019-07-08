<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">
         <div class="container">
             <h2>Messager</h2>
         </div>
        
        <div class="container border">
            <div class="row">
               <!-- Users -->
               <div class="col-lg-4 p-1">
                    


               <h3>Parents</h3>

                <?php foreach($data['parents'] as $parent){
                    
                    echo "<p onClick($parent->id_user)>$parent->username</p>";

                } ?>


               </div>

               <!-- Message -->

               <div class="col-lg-8 p-1">
                    <input type="hidden" id="to_id" value='34'>
                    <div id="messages" class="container-fluid position-relative" style="Height:60vh">
                    <div class="bg-success message">
                          <span class="t_span">10:33</span>  <!-- Vreme nek bude tamno sive boje i float centar -->
                        </div>   
                       <div class="bg-success message">
                          <span class="m_span">Ovo je poruka!!!</span>  <!-- poruke da idu levo i desno i razlicitih boja...   -->
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-10">
                                <textarea id="message" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <div class="col-lg-2">
                            <button type="button" class="btn btn-success m-2" onClick="sendMessage()">Send</button>
                            </div>
                        </div>
                    </div>
               </div>
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
        var message = document.getElementById('message').value;

        var new_message = document.createElement("div"); 

        new_message.className = 'bg-success message m-1';

        var text = document.createTextNode(message); 

        new_message.appendChild(text); 

       document.getElementById('message').value = ""; 

        messages.appendChild(new_message);
     }


     function readMessages(id)
     {
         id_user = id; 
         
         var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                 messages.innerHTML = this.responseText;
                 }
                };
              xmlhttp.open("GET", "<?php echo URLROOT; ?> message/get_all?id_user=" + id_user, true);
              xmlhttp.send();
        
     }

</script>

<?php require APPROOT . '/views/inc/teacher/footer.php'; ?> 
<?php require APPROOT . '/views/inc/admin/header.php'; ?>

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
                    <input type="hidden" id="to_user" value='34'>
                    <div id="messages" class="container-fluid position-relative" style="Height:60vh">
                       <div class="bg-success message">
                         Ovo je poruka 
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

<?php require APPROOT . '/views/inc/admin/footer.php'; ?> 
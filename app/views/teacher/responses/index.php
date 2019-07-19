<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

  <div class="container-fluid">
           <div class="container">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add open door
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New open door</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="form-group"></div>
      </div>

      <div class="modal-footer">
        <button type="button" onclick="hidenBG()" class="btn btn-secondary">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>

    </div>
  </div>
</div>

           </div>
<hr>
           <div class="row">
               <div class="col-1 p-1"></div>
               <div class="col-5 p-1"><b>Name</b></div>
               <div class="col-2 p-1"><b>Time</b></div>
               <div class="col-4 p-1"><b>Status</b></div>

           </div>
    

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->


  <?php require APPROOT . '/views/inc/teacher/footer.php'; ?>
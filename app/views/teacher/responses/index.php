<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

  <div class="container-fluid">
           <div class="container">

<!-- Button trigger modal -->
<button type="button" id="add_open_door" class="btn btn-primary">
 Add open door
</button>

<!-- Modal -->
<div class="modal fade show" id="exampleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New open door</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
           <div class="col">
            <label for="input_data">Select data:</label>
            <input class="form-control" type="date" id="input_data" value="" min="<?php echo Data("Y/m/d")?>">
           </div>
           <div class="col">
            <label for="input_time">Select time:</label>
            <input class="form-control" type="time" id="input_time" value="">
           </div>
           <div class="col">
              <label for="input_nr">Number of parents at the meeting</label>
              <select class="form-control" id="input_nr">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
           </div>
         </div>
      </div>

      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary">Close</button>
        <button type="button" id="" class="btn btn-primary">Add</button>
      </div>

    </div>
  </div>
</div>
<!-- //////////////////////////////////////// -->
           </div>
<hr>
           <div id="show_consultation" class="row">
               <div class="col-1 p-1"></div>
               <div class="col-5 p-1"><b>Name</b></div>
               <div class="col-2 p-1"><b>Time and Data</b></div>
               <div class="col-4 p-1"><b>Status</b></div>
           </div>
           
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->



  <?php require APPROOT . '/views/inc/teacher/footer.php'; ?>
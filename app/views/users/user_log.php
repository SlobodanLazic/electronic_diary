<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div class="container-mess">
    <div class="container">
       <h2 class="text-dark">Logs</h2> 
    </div>
    <div class="row" id="log-row-data">
    </div>
</div>

<?php require APPROOT . '/views/inc/admin/footer.php'; ?> 
<!-- Ajax call for users log page -->
<script src="<?php echo URLROOT; ?>/js/admin/user_log.js"></script>
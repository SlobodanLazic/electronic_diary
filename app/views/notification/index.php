<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php

foreach($data['message']  as $message){
    echo $message->notification_content.'<br>';
}
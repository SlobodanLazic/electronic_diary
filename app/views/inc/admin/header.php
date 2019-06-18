<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URLROOT; ?>/css/admin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URLROOT; ?>/css/admin/sb-admin.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?php echo URLROOT; ?>/font-awesome_admin/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<<<<<<< HEAD
    
    <!-- Loading page without refresh with AJAX -->
    <script >
        function LoadPageUsingAjax() {
        var xhttp = new XMLHttpRequest();

        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXobject("Microsoft.XMLHTTP");
        }

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("load_content_by_ajax").innerHTML = xhttp.responseText;

            }
        };

        xhttp.open("POST", "../users/insert.php", true);
        console.log('entered here');
        
    }
    </script>
=======
>>>>>>> users_crud
</head>

<body>

    <div id="wrapper">
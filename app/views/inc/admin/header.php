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
    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.js"></script>

    <!-- Routing in AngularJS -->
    <script>
        var app = angular.module("myApp", ["ngRoute"]); 
			
			app.config(function($routeProvider) {
				$routeProvider
				.when("/", {
					templateUrl : "<?php echo URLROOT ?>/users/register"
                })
                .when("/test", {
                    templateUrl : "../test.html"
                })
			});
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper" ng-app="myApp">
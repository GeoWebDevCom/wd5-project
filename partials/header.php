<?php include __DIR__ . '/../includes/bootstrap.php';?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>IMG</title>

    <!-- Bootstrap -->
    <link href="assets/css/main.min.css" rel="stylesheet">

    <!-- Source Code Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:300,400" rel="stylesheet">



</head>

<body>

<div class="page-wrap">
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand" href="index.php">Timeless Photo <span class="glyphicon glyphicon-hourglass logo" aria-hidden="true"></span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (isLoggedIn()) { ?>
                            <li><a href="upload.php">Upload</a></li>
                            <li><a href="mgmt.php">My Images</a></li>
                            <li><a href="<?php echo APP_HOST?>/?logout=true">Log out</a></li>
                        <?php }else { ?>
                            <li><a href="registration.php">Register</a></li>
                            <li><a href="login.php">Login</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="container">
<?php

session_start();

include __DIR__ . '/config.php';
include __DIR__ . '/functions.php';

if(isset($_GET['logout'])) {
    logOutSession();
}

date_default_timezone_set('America/New_York');

$db = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD );

$registration_errors = processRegistrationForm();
$login_errors = processLogInForm();
$upload_errors = processUploadForm();
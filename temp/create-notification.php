<?php 
session_start() ;
require "6-dbconnection.php";
require "Notification.php";

$_SESSION['student'] = true;
$conn = connDB();



if (  $_SERVER['REQUEST_METHOD'] == "POST" ){
    $notification = $_POST['notification'];
    Notification::create( $conn , $notification );
}


$noticies = Notification::getNotifications( $conn );




?>

<!-- Create Notification for Teacher -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="notification"  placeholder="Send Notification">
        <input type="submit">
    </form>

    <hr>

    <?php foreach ( $noticies as $notice ) : ?>
         <tr>
            <td> <?= $notice['id']  ?> </td>
            <td> <?= $notice['notification']  ?> </td>
            <td> <?= ( $notice['status'] == 0 ) ? "inactive" : "active"; ?> </td>
         </tr>   
    <?php endforeach ; ?>
</body>
</html>








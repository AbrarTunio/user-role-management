<?php session_start() ;
require "6-dbconnection.php";
require "Notification.php";

$_SESSION['teacher'] = true;
$conn = connDB();

if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
    $notificationId = $_POST['id'];
    echo $notificationId;
    $status = $_POST['status'];
    echo $status;
    Notification::udpateStatus( $conn , $notificationId , $status );
} 
$noticies = Notification::getNotifications( $conn );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid;
            text-align: left;
            width: 40%;
        }
        td , th {
            border: 1px solid;
            border-collapse: collapse ;
        }
    </style>
</head>
<body>
<hr>
<table >
<tr>
    <th>ID</th>
    <th>Notification</th>
    <th>Status</th>
</tr>

<?php foreach ( $noticies as $notice ) : ?>
     <tr>
        <td> <?= $notice['id']  ?> </td>
        <td> <?= $notice['notification']  ?> </td>
        <td> <form action="" method="post">
            <input type="text" name="id" value="<?= $notice['id'] ?>"  hidden>
            <select name="status" id="">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            <input type="submit">
        </form> </td>
     </tr>   
<?php endforeach ; ?>

</table>

</body>
</html>
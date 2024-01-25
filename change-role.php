<?php 
session_start();
require "includes/header.php"; 
require "classes/Database.php"; 
require "classes/User.php"; 

if ( !$_SESSION['is_logged_in'] ){
    header( "Location: logout.php" );
    exit();
}

if ( $_SESSION['role'] != 'admin' ){
    header("Location: index.php");
    exit();
}

$database = new Database();
$conn = $database->connDb(); 

if (  $_SERVER['REQUEST_METHOD'] == 'POST' ){

    $id = $_GET['id'];
    $user = User::getById( $conn , $id );

    $role_id = intval( $_POST['role_id']);
    if ( $role_id == 0 ){
        $role_id = NULL;
    }

    $status = intval( $_POST['status']);

    echo $role_id; 

    if (User::updateStatusAndRole( $conn , $role_id , $status , $id )){
        header("Location: admin.php?error='One Record Updated!'");
    }else{
        header("Location: admin.php?error='Something Went Wrong!'");
    }; 
}

<?php

class Notification 
{

    public static function create( $conn , $notification ){
        $query = "INSERT INTO notifications ( notification , status ) VALUES (? , ?)";
        $status = 0;
        $result =  mysqli_prepare( $conn , $query );
        mysqli_stmt_bind_param( $result , 'si' , $notification , $status );
        mysqli_stmt_execute( $result );    
    }

    public static function getNotifications( $conn ){
        $query = "SELECT * FROM notifications";
        $result =  mysqli_query( $conn , $query );
        return mysqli_fetch_all( $result , MYSQLI_ASSOC );
    }

    public static function udpateStatus( $conn , $notificationId , $status ){
        $query = "UPDATE notifications SET status = ? WHERE id = ?";
        $stmt =  mysqli_prepare( $conn , $query );
        mysqli_stmt_bind_param( $stmt , 'ii' , $status , $notificationId );
        mysqli_stmt_execute( $stmt );
    }

}
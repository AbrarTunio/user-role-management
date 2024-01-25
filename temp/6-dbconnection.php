<?php 


function connDB(){
    $conn = mysqli_connect( 'localhost' , 'root' , '' , "fyp_projects"      );

    // if ( mysqli_connect_error(  )  ){
    //     return mysqli_connect_error(  );
    // }
    
    if ( $conn ) {
        return $conn;
    } else {
        return false;
    }

}

    
<?php 

//declaration of function

function greetings(  ){

    $result = "Greetings from techTIME";

    return $result;

}


function greetByName( $name , $msg ) {

    echo $name . " " . $msg; 

}

// Calling of function
// echo  greetings();
$output = greetings();

greetByName( 'Abrar' , $output   );



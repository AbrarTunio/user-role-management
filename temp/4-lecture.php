<?php 

    $names = ['Abrar' , 'Abid' , 'Nizam' , 'TIME' , 'TECHTIME'];

    // foreach ( $names as $name    ){
    //     echo "<hr> $name ";
    // }

    // $count = count( $names ); 
    // $end = 0;   
    // while( $count > $end     ){
    //     echo ( "<hr>". $names[$end] );
    //     $end++;        
    // }

    // for ( /*initialization*/   ;  /*condition*/  ; /* dosometing to end it */  ){
    //     //something will happen
    // };

    for ( $idx = 0 ; $idx < count( $names ) ; $idx++ ){
        echo $names[$idx] . "<hr>";
    }



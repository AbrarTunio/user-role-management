<?php 

require "classes/Teachers.php";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // echo $_POST['gender'];
    // var_dump( $_POST['city']);
    // echo $_POST['city2'];
    // echo $_POST['city3'];

    // var_dump( $_POST['cities']);
    // echo Teacher::greet( "Nizam" );
    
    $n = $_POST['cities'];
    if ( !empty($n)  ){
        echo Teacher::greet( $n );
    }else {
        echo "Choose a city plz...";
    }

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <!-- <input type="radio" name="gender" value="male"  > Male
        <input type="radio" name="gender" value="female"> Female -->

        <!-- <input type="checkbox" name="city[]" value="nws" >Nawabshah
        <input type="checkbox" name="city[]" value="hyd" >Hydearbad
        <input type="checkbox" name="city[]" value="kchi">Karachi -->

        <select name="cities" id="">
            <option value="" selected>Choose city....</option>
            <option value="hyd">Hyderabad</option>
            <option value="nws">Nawabshah</option>
            <option value="kchi">Karachi</option>
        </select>

        <input type="submit" >

    </form>    


</body>
</html>
<?php
$title = $_GET['what'];
$description = "This is our first class 
                of php and we are learning from 
                scratch at " . $_GET['kahan'];

$condition = true;
$condition2 = 1;
if ( $condition ){
    //run some block of code
    echo "I am running because condition one is true";
}

if ( $condition2 ){
    //run some block of code
    echo "<hr>I found something in condition 2";
}else {
    echo "COndition 2 is false";
}

# *******************************
# LETS CREATE AN EXAMPLE
# *******************************

$restStatus = 'closed';

if ($restStatus == 'open'){
    $order = "Kerhai";
    if ( $order == 'biryani' ){
        echo "YOur briyani will be served in 30mins";
    }else if ( $order == 'Kerhai' ){
        echo "Kerhai is not served here";
    }else {
        echo "I do not know what your orderr is";
    }
}else {
    echo "Visit us after a while";
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
    <h1>Title : <?= $title ?> </h1>
    <p>Description: <?= $description ?> </p>
</body>
</html>
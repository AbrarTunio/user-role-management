<?php 

// Lets learn about arrays first.

// $name1 = "Abid";
// $name2 = "Nizamuddin";

// $names = [ "student1" => 'Abid' , 
//            "student2" => 'Nizamuddin' , 
//            "student3" => 'techTIME' ];

// echo $names['student1'];
// $_GET[ 'uname' ];
$depart1 = [
    "department" => "Electrical",
    "students" => 200,
    "teachers" => 5 
    ] ;
$depart2 = [
    "department" => "Software",
    "students" => 100,
    "teachers" => 3];
 $depart3 =   [
        "department" => "Telecom",
        "students" => 120,
        "teachers" => 4
    ]  ;


$university = [ "data1" => $depart1,  "data2" => $depart2 , 'data3' =>  $depart3  ];

echo $university['data2']['students'];           
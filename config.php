<?php

    $srvrname="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="myfolio";




$con= new mysqli($srvrname,$dbuser,$dbpass,$dbname);

if(!$con){
    echo"Database Error";
}
?>


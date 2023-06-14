<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname1="users";
$dbname2="proposaltemplates";

if(!$con1= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname1))
{
    die("failed to connect"); 
}

if(!$con2 = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname2))
{
    die("failed to connect"); 
}

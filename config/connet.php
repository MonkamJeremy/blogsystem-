<?php
require 'constants.php';
$conn = new mysqli($host,$user,$password,$database);

if(!$conn){
    die(mysqli_error($conn));
}


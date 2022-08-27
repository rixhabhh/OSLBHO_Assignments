<?php

require "connect.php";

$sql = "select * from usersdata";
$result = ($conn->query($sql));
//declare array to store the data of database
$row = []; 

if ($result->num_rows > 0) 
{
    // fetch all data from db into array 
    $row = $result->fetch_all(MYSQLI_ASSOC);  
}   

?>
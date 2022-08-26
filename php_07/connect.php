<?php

    $hName='localhost'; // host name

    $uName='root';   // database user name

    $password='Rishabh@12345';   // database password

    $dbName = "my_db"; // database name

    $conn= new mysqli($hName,$uName,$password,$dbName);

    // echo "holmolaa";

      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
      }
?>
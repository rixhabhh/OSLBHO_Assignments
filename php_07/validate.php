<?php

session_start();

require "connect.php";

if(isset($_POST['submit']))
    {
    $email=($_POST['email']);
    $password=($_POST['password']);
    // $email='abc@xyz.com';
    // $password="12345";


    // echo "imthere";

    $sql = "SELECT * FROM logindata WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) 
    {
       
        $_SESSION["favcolor"] = "green";
        $_SESSION["favanimal"] = "cat";
    
    $url = "welcome.php?";
    header("Location: $url");
    include ('welcome.php');

    }

     else 
    {
        
        echo"<script language='javascript'>
                alert('No data found');
      </script>
      ";
      
    }
    
    mysqli_close($conn);

}


?>
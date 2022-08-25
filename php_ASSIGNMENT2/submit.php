<?php

// $fname = $_GET['fname'];



$sql ="INSERT INTO users2(fname,email,phone,dob) VALUES ('$fname','$email','$phone','$dob')";
        if ($conn->query($sql) === TRUE) {
            $url = "welcome.php?fname=".$fname;
            header("Location: $url");
            include ('welcome.php');
            
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
           
          }



?>
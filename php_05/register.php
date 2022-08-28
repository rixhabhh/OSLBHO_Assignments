<?php
require "connect.php";



 if (isset($_POST['submit'])) {


 

  
  $fname=test_input($_POST['fname']);
  $lname=test_input($_POST['lname']);
  $email=$_POST['email'];
  $date=$_POST['dob'];
  $nation=test_input($_POST['nationality']);
 
   
   if (!empty($fname) &&!empty($lname) &&  //CHECKING IF ANY OR ALL THE FIELDS ARE EMPTY
   !empty($email) &&
   !empty($date)&&!empty($nation)) {

      

       $returning=true;

       if(strlen($lname)<4|| strlen($fname)<4 ){         //CHECKING LENGTH OF USERNAME
           $error1 = "Name must be 3 three charcter" ;
           
           $returning=false;
       }

       if(empty($dob)){
           $error2 = 'invalid date';
           $returning=false;
       }
      
       if( $returning){

        $sql ="INSERT INTO usersdata(Firstname,Lastname,Email,DOB,Nationality) VALUES ('$fname','$lname','$email','$date','$nation')";
        if ($conn->query($sql) === TRUE) {
      echo "success";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
           
       }

    
  

}

}




elseif (isset($_POST['edit'])) {


  $id = $_GET["id"];

  
  $fname=test_input($_POST['fname']);
  $lname=test_input($_POST['lname']);
  $email=$_POST['email'];
  $date=$_POST['dob'];
  $nation=test_input($_POST['nationality']);


  

  $req_err ="";
   $email_err = $dob_err = $phone_err = "";//declaring variables for error
  
  
  

   if($fname==""||strlen($fname)<3){
    if($fname==""||strlen($fname)<3||$lname==""||strlen($lname)<3){
    $req_err = "Name length must be greater than 3 characters";
    
  }
  else if(!preg_match ($pattern, $email)){
  $email_err = "Email is not valid.";
        
  }
   }


  $sql ="UPDATE usersdata SET 
  Firstname = '$fname' , Lastname = '$lname' , Nationality = '$nation' , Email = '$email' , dob = '$date' 
  WHERE id = '$id' ";



  if ($conn->query($sql) === TRUE) {
echo "success";
$url = "index.php?";
header("Location: $url");
// include ('index.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


}


else {


}
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
}
  ?>
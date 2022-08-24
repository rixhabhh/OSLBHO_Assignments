<?php


// include "index.php";

// if($_SERVER["REQUEST_METHOD"] == "POST"){  
    
    
    //Declaring and assigning the variables

    if(isset($_POST['submit'])){


    $fname=filter($_POST['fname']);
    $lname=filter($_POST['lname']);
    $uname=$_POST['uname'];
    $gender=filter($_POST['gender']);
    $email=$_POST['email'];
    $phone=filter($_POST['number']);
    $dob=$_POST['date'];
    $nationality=filter($_POST['nationality']);
    $image=$_POST['image'];

 


    if (!empty($fname) &&!empty($lname) &&  //CHECKING IF ANY OR ALL THE FIELDS ARE EMPTY
    !empty($uname) && !empty($gender) 
    &&!empty($phone) && !empty($email) 
    &&!empty($dob) && !empty($nationality) &&
    !empty($image)) {


     $req_err= "";
    //  $email_err = $imageErr = $phone_err="";
     if($fname==""||strlen($fname)<3||$lname==""||strlen($lname)<3||strlen($gender)<3||strlen($uname)<3||strlen($nationality)<3){
       
        echo  "length should be more than 3 characters";
        die();
     }
   
    if(!preg_match('/\.(jpg|png|jpeg)$/', $image)|| ($_FILES["image"]["size"] < 500)){
        echo 'invalid file format or invalid file size';
        die();
    }
   
    if(!preg_match('/^[0-9]{10}+$/', $phone)){
        echo "Please check your phone number";
        die();
    }
    
   
       

}

    


else{
    $alert='ERROR: Please fill all required fields!';
    //    $ur = "index.php?alert=".$error;
    //        header("Location: $ur");
    //     // die();
    //     die('Please fill all required fields!');

}
}

function filter($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
}

?>
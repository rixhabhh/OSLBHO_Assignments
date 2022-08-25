<?php
// require("connect.php");
if (isset($_POST['submit'])){
    $fname=filter($_POST['fname']);
    $phone=filter($_POST['number']);
    $email=$_POST['email'];
    $dob=$_POST['date'];

 
    

    if (!empty($fname) &&!empty($phone) &&  //CHECKING IF ANY OR ALL THE FIELDS ARE EMPTY
    !empty($email) &&
    !empty($dob)) {

       

        $returning=true;
        if($fname=='' || strlen($fname)<4){         //CHECKING LENGTH OF USERNAME
            $error1 = "full name must be 3 three charcter" ;
            
            $returning=false;
        }
          if(strlen($phone)<10 && is_integer((integer)$phone)){         //CHECKING PHONE 
            $error2 = ' invalid phone';
            
            $returning=false;
        }
        if(empty($dob)){
            $error3 = 'invalid date';
            $returning=false;
        }
       
        if( $returning){
            include ('connect.php');
        }

     
   

}



    // $nerror=$perror=null;


    // if($fname==""||strlen($fname)<3||!preg_match('/^[0-9]{11}+$/', $phone)){
    //     if($fname==""||strlen($fname)<3){
    //         $nerror="Please enter full Name <br> and Name-length must be of 3 character";
    //     }
    //     else if(!preg_match('/^[0-9]{11}/', $phone)){
    //         $perror="Please check phone number";
    //     }
    // }

    // $sql ="INSERT INTO users2(fname,email,phone,dob) VALUES ('$fname','$email','$phone','$dob')";
    // if ($conn->query($sql) === TRUE) {
    //     $url = "welcome.php?fname=".$fname;
    //     header("Location: $url");
        
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
       
    //   }
    


else{
    $error='Please fill all required fields!';
       $ur = "index.php?alert=".$error;
           header("Location: $ur");
        // die();
        die('Please fill all required fields!');

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
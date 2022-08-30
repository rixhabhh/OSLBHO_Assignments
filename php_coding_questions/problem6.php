<?php
include "config.php";

$user_details = [[
   'fname' => 'John',
   'lname' => 'doe',
   'mail' => 'John@abc.com',],
   [
   'fname' => 'Andy',
   'lname' => 'doe',
   'mail' => 'andy@abc.com',]
   ];
 
$user_details_2 = [[
   'fname' => 'John',
   'lname' => 'doe',
   'mail' => 'John@abc.com',],
   [
   'fname' => 'Andy',
   'lname' => 'doe',
   'mail' => 'andy@abc.com',]
   ];
   $user_details_2 = [[
   'fname' => 'Alex',
   'lname' => 'karev',
   'mail' => 'alex@abc.com',],
   [
   'fname' => 'Christina',
   'lname' => 'Yang',
   'mail' => 'yang@abc.com',]
   ];
$merge_array=(array_merge($user_details,$user_details_2));
 
$details = array_column($merge_array, 'mail');
$index = array_search('yang@abc.com',$details);
$data=$merge_array[$index];
// print_r($data);
// print_r($data[3]);
foreach($merge_array as $key => $value) 
      {
      //   echo $key . " : " . $value . "<br>";
    $firstname = $value['fname'];
   //  echo $firstname;
    $lastname = $value['lname'];
 $email=$value['mail'];
 echo $email;
      
if($email==$data['mail']){
   echo "not added";

  
}
else {
   $sql = "INSERT INTO question3(fname,lname,email) VALUES('$firstname','$lastname','$email')";
   mysqli_query($conn,$sql);
} 
      }
//     $sql = "INSERT INTO question(fname,lname,email) VALUES('$firstname','$lastname','$email')";
//     mysqli_query($conn,$sql);
 
//  if($sql){
//     echo"inserted";
//  }else{
//     echo "error";
//  }
 
 
?>


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

 // Insert record
// foreach($merge_array as $user=>$val){
// var_dump($merge_array);

//PROBLEM (e)(i) first part done
$keys = array_keys($merge_array);

    foreach($merge_array as $key => $value) 
      {
      //   echo $key . " : " . $value . "<br>";
    $firstname = $value['fname'];
   //  echo $firstname;
    $lastname = $value['lname'];
 $email=$value['mail'];
 
 
 $sql = "INSERT INTO question(fname,lname,email) VALUES('$firstname','$lastname','$email')";
   mysqli_query($conn,$sql);

// if($sql){
//    echo"inserted";
// }else{
//    echo "error";
// }


   //  echo "}<br>";




}

?>

//PROBLEM 5(B)




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

// var_dump($merge_array);

//PROBLEM (e) (ii)part using for loop

for($i=0;$i<sizeof($merge_array);$i++)      {
      //   echo $key . " : " . $value . "<br>";
    $firstname=$merge_array[$i]['fname'];
    // echo $firstname;
    $lastname = $merge_array[$i]['lname'];
 $email=$merge_array[$i]['mail'];
 
 $sql = "INSERT INTO question2(fname,lname,email) VALUES('$firstname','$lastname','$email')";
   mysqli_query($conn,$sql);

if($sql){
   echo"inserted";
}else{
   echo "error";
}






}

?>


<?php
// echo "hello";
include "connect.php"; // Using database connection file here
$id = $_GET["id"]; // get id through query string
$del = mysqli_query($conn,"delete from usersdata where id = '$id'"); // delete query
if(mysqli_query($conn,"delete from usersdata where id = '$id'"))
{
    // mysqli_close($db); // Close connection
    header("location:http://localhost/php_04/"); // redirects to all records page
    exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
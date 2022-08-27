<?php

	$id=$_GET["id"];

$query = "SELECT * FROM `usersdata` Where id = '$id'";
$result = $conn->query($query);
if ($result->num_rows > 0){
		while($rama = $result->fetch_assoc())
		{echo $rama["Firstname"];}
	}
	else {
		echo "0 results";
	}

$conn->close();

?>

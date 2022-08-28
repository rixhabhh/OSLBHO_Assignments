
<?php


if (isset($_POST['enter']) and isset($_POST['mail'])) {
if ($_POST['mail'] != "") 
{  
	
   $mail = filter_var($_POST['mail'] , FILTER_SANITIZE_EMAIL); 
 
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) 
		{  
                $result = "The mail you entered is not a valid email address.";
		} 
		else
		{
		include "connect.php";	
		
		$sql1 = 'SELECT email FROM newsletter WHERE email = "'.$mail.'"';
		$a= $conn->query($sql1);
            if ( $a->num_rows > 0) 
			{
			$result = "Your email is alredy registered.";
			}
			else
			{
				$sql = 'INSERT INTO newsletter SET email = "' . $mail . '"';
			if ($conn->query($sql) === TRUE) 
			{
				require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';
				require '/usr/share/php/libphp-phpmailer/src/SMTP.php';

				

//Declare the object of PHPMailer
$email = new PHPMailer\PHPMailer\PHPMailer();

//Set up necessary configuration to send email
$email->IsSMTP();
$email->SMTPAuth = true;
$email->SMTPSecure = 'ssl';
$email->Host = "smtp.gmail.com";
$email->Port = 465;

//Set the gmail address that will be used for sending email
$email->Username = "rishabh.vishwakarma@opensenselabs.com";

//Set the valid password for the gmail address
$email->Password = "Rishabh@12345";

//Set the sender email address
$email->SetFrom("rishabh.vishwakarma@opensenselabs.com");

//Set the receiver email address
$email->AddAddress ($mail);

//Set the subject
$email->Subject = "Testing Email";

//Set email content
$email->Body = "Hello! use PHPMailer to send email using PHP";

$email->addAttachment('dummy_newsletter.pdf');
if($email->Send()) {
	$result = "Your email has been successfully registered. Thanks for your interest";
} else {

	$result = "Your email has been successfully registered. You'll recieve our newsletter soon";		
			}
			}
} }
}
else 
{  
    $result = "Please enter your email address."; 
}
}
?>
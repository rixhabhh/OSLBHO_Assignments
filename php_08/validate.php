<?php
    if(isset($_POST['submit'])){

        if (empty($_POST['email']) || empty($_POST['user'])){
            
            $result = "These fields cannot be left empty";
                       
        }
        
        else{
           
            $name = $_POST['user'];

            $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL); 

            //Including cookies

            $cookieName = "cookie";
           

            setcookie("$cookieName", "$name", time()+120);

          
            
        
        }

    } 
     
?>
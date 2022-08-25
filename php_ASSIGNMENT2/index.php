
<?php

include 'register.php';

$alert = $_GET['alert'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .divider:after,
    .divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}


    </style>
</head>
<body>
    <section class="vh-100">
        <nav class="navbar navbar-light bg-dark">
            <a style="color:WHITE ;font-size: large;" class="navbar-brand" href="#">
              <img src="img.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
              DEV COMMUNITY
            </a>
          </nav>

          <?php echo "<h1>$alert</h1>" ;?>

        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            
              <form action="#" method="POST">
             

                <div class="form-outline mb-4">

                    <label class="form-label" for="form1Example23">Username</label>
                    <input type="text" name="fname" id="form1Example23" class="form-control form-control-lg" />
                    <span style='color:red'><?php echo $error1?></span>
                    
                  </div>


                <div class="form-outline mb-4">

                  <label class="form-label" for="form1Example13" required>Email address</label >
                  <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" />
                  
                </div>
      
                
               

                <div class="form-outline mb-4">

                    <label class="form-label" for="form1Example13">Phone Number</label>
                    <input type="number" name="number" id="form1Example13" class="form-control form-control-lg" />
                    <span style='color:red'><?php echo $error2?></span>
                    
                  </div>

                  <div class="form-outline mb-4">

                    <label class="form-label" for="form1Example13">Date of Birth</label>
                    <input type="date" name="date" id="form1Example13" class="form-control form-control-lg" />
                    <span style='color:red'><?php echo $error3?></span>
                    
                  </div>
      
                

                <div class="divider d-flex align-items-center my-4">
                    
                  </div>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
      
                <div class="divider d-flex align-items-center my-4">
                 
                </div>
      
               
      
              </form>
            </div>
          </div>
        </div>
      </section>
</body>
</html>


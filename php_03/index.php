<?php


include 'register.php';

// $alert = $_GET['alert'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>


  <!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">REGISTRATION FORM</h2>

            <h3 style="color: red";> <?php echo "$alert" ?></h3>


            <form action="#" method="POST">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="fname" id="form3Example1" class="form-control" placeholder="FIRST NAME"/>
                    
                  </div>
                  <span style='color:red'><?php echo $error?></span>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="lname" id="form3Example2" class="form-control" placeholder="LAST NAME"/>
                    
                  </div>
                  <span style='color:red'><?php echo $error1?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="uname" id="form3Example1" class="form-control" placeholder="USERNAME"/>
                    
                  </div>
                  <span style='color:red'><?php echo $error2?></span>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <!-- <input type="text" name="gender" id="form3Example2" class="form-control" placeholder="GENDER"/> -->
                    <label class="form-label">Gender</label><br>
                    <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                    <input type="radio" name="gender" value="other"> Other
                    
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="email" name="email" id="form3Example1" class="form-control" placeholder="EMAIL" required/>
                    
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="number" name="number" id="form3Example2" class="form-control" placeholder="PHONE"/>
                    
                  </div>
                  <span><?php echo "$error2" ?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="date" name="date" id="form3Example1" class="form-control" placeholder="DATE OF BIRTH"/>
                    
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="nationality" id="form3Example2" class="form-control" placeholder="NATIONALITY"/>
                    
                  </div>
                  <span style='color:red'><?php echo $error5?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="image" id="form3Example1" class="form-control" placeholder="PROFILE IMAGE"/>
                    <label class="form-label">Less than 50 KB</label>
                  </div>
                  <span style='color:red'><?php echo $error4?></span>

                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  
                  <input name="upload" type="file" class="form-control" id="customFile" />
                    
                  </div>
                </div>
              </div>

             

              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                Sign up
              </button>

              <!-- Register buttons -->
             
            </form>
           
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
</body>
</html>
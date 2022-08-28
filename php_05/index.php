<!DOCTYPE html>
<html lang="en">

<?php
// include "register.php";
// include "retrieve.php";
include "newsletter.php";

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .gradient-custom-2 {



}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
    </style>
</head>
<body>
<?php


?>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <!-- <div class="container py-5 h-100"> -->
  <span><h3 style="color:red";><?php echo $result;?></h3></span>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  
                  <h4 class="mt-1 mb-5 pb-1">Customer data entry form</h4>
                </div>

                <form  method="POST">
                  

                  <div class="form-outline mb-4">
                    <input type="text" name="fname" id="form2Example11" class="form-control"
                      placeholder="Firstname" required />
                      <span style='color:red'><?php echo $error1?></span>
                  </div>
                 

                  <div class="form-outline mb-4">
                    <input type="text" name="lname" id="form2Example11" class="form-control"
                      placeholder="Lastname" required />
                      <span style='color:red'><?php echo $error1?></span>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example11" class="form-control"
                      placeholder="Email" required/>
                      
                  </div>

                  <div class="form-outline mb-4">
                    <input type="date" name="dob" id="form2Example11" class="form-control"
                      placeholder="Date of Birth" />
                      <span style='color:red'><?php echo $error2?></span>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="nationality" id="form2Example11" class="form-control"
                      placeholder="Nationality"  />
                      
                  </div>

                  

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="submit" type="submit">Add To List</button>
                    
                  </div>

                

                 

                </form>
<vr>
              </div>
            </div>
            <div class="col-lg-6 d-flex flex-column align-items-center gradient-custom-2">
                
              <div class="text-black px-3 py-4 p-md-5 mx-md-4 align-items-center">
              <h4 class="mt-1 mb-5 pb-1">Customer data list</h4>
                
              <table class="table align-middle">
  <thead>
    <tr>
    <!-- <th scope="col">ID</th> -->
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Nationality</th>
      <th scope="col">Email</th>
      <th scope="col">DOB</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      
      <?php
               if(!empty($row))
               foreach($row as $rows)
              { 
            ?>
            <tr>
  
                <!-- <td><?php echo $rows['id']; ?></td> -->
                <td><?php echo $rows['Firstname']; ?></td>
                <td><?php echo $rows['Lastname']; ?></td>
                <td><?php echo $rows['Nationality'];?></td>
                <td><?php echo $rows['Email']; ?></td>
                <td><?php echo $rows['DOB'];?></td>
                <td><a href="edit.php?id=<?php echo $rows['id'];?>"><button name= "edit" type = "button">edit</button></a>
                <a href="delete.php?id=<?php echo $rows['id'];?>"><button name= "delete" type = "button">delete</button></a></td>
                

  
            </tr>
            <?php } ?>
        <button type="button" class="btn btn-link btn-sm px-3" data-ripple-color="dark">
          <i class="fas fa-times"></i>
        </button>
      </td>
    </tr>
   
  </tbody>
</table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="bg-light text-center">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Form -->
    <section class="">
      <form action="#" method="POST">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Sign up for our newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" name="mail" id="form5Example27" class="form-control" />
              <label class="form-label" for="form5Example27">Email address</label>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button name="enter" type="submit" class="btn btn-primary mb-4">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
     
    </section>
    <!-- Section: Form -->
  </div>

  <!-- Copyright -->
</footer>
  </div>

  
</section>
<?php   
    mysqli_close($conn);
?>
</body>
</html>
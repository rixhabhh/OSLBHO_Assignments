<?php
session_start();
if (!($_SESSION["favcolor"]) && !($_SESSION["favanimal"])){
    $url = "index.php?";
    header("Location: $url");
    include ('index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn/SignOut</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>
        .gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
</style>
</head>
<body>
<section class="vh-100 gradient-custom">
<nav class="navbar navbar-light bg-dark justify-content-between">

            <a style="color:WHITE ;font-size: large;" class="navbar-brand" href="#">
              <img src="img.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
              DEV COMMUNITY
            </a>
            <a href="logout.php"><button class="btn btn_light btn-outline-success btn-lg " type="submit">Logout</button></a>
          </nav>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h1>Hello User<br>We Welcome You To Our</br>Community</h1>

           

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
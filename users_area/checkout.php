<!--connect file-->
<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E commerce website </title>
  <!--bootstrap CSS link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer">

  <!-- css link file-->
  <link rel="stylesheet" href="style.css">
<style>
  body{
    background-color:pink;
  }
  .logo{
    height: 50px;
    width: 50px;
    
}
</style>


</head>

<body>
  <!-- navbar-->

  <!-- first chid-->
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="..\images\logo\f1.png" alt="#" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users_area/user_registration.php">Regiter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
          <form class="d-flex" action="search_product.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
            name="search_data">
          
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>

    <!-- second chid-->

    <nav class="navbar navbar-expand-lg navbar-Dark bg-secondary">
      <ul class="navbar-nav me-auto">
      <?php
         if(!isset($_SESSION['username'])){
          echo "  <li class='nav-item'>
          <a class='nav-link text-light' href='#'>Welcome Guest</a>
        </li>";
          }else{
            echo " <li class='nav-item'>
          <a class='nav-link text-light' href='#'>Welcome " . $_SESSION['username']."</a>
          </li>";
          }

       if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'> 
        <a class='nav-link text-light' href='./users_arer/user_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
        <a class='nav-link text-light' href='./users_area/logout.php'>Logout</a>
        </li>";
        }
        ?>
      </ul>
    </nav>

    <!-- third chid--->

    <div class="bg-light">
      <h3 class="text-center">YOUR OWN FASHION</h3>
      <p class="text-center">Communication is the Heart of e-commerce and community</p>
    </div>

    <!--fourth chid--->
    <div class="row  px-1">
      <div class="col-md-12">
        <!--display all product-->
        <div class="row">

        <?php
if(!isset($_SESSION['username'])){  
    include('user_login.php');  
}else{
  include('payment.php');
}
?>
    
</div>
<!--col end-->
      </div>
</div>
      <!----last chid footer-->
<?php include('../footer.php') ?> 
</div>
      <!--bootstrap js link-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>


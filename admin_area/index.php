<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>


<!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css file link -->
     <link rel="stylesheet" href="../style.css">
     <style>
  .admin_image{
    width: 100px;
    object-fit: contain;
}
body {
    background-color: pink !important;
    overflow-x:hidden;
}
.product_img{
    width: 100px;
    object-fit:contain;
}

</style>

</head>
<body>

<!--navbar for admin dashboard-->
<div class="container-fluid p-0">
                    <!-- 1st child-->

<nav class="navbar navbar-expand-lg navbar-light bg-info"> <!--../ admin folder se bhar aake select karne ke liye-->

        <div class="container-fluid ">
           <img src="../images/LOGOf.png" alt="#"class="logo"> 
    <nav class="navbar navbar-expand-lg navbar-light bg-info" style="width: 100%;">
    <nav class="navbar navbar-expand-lg navbar-light bg-info" style="width: 100%;">

                <ul class="navbar-nav" >
                <?php
// Start the session to check the session variable
// Check if the session variable is set
if (!isset($_SESSION['username'])) {
    // If the user is not logged in
    echo "<li class='nav-item'>
            <a class='nav-link text-light' href='#'>Welcome Guest</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link text-light' href='../admin_area/admin_login.php'>Login</a>
          </li>";
} else {
    // If the user is logged in
    echo "<li class='nav-item'>
            <a class='nav-link text-light' href='#'>Welcome " . $_SESSION['username'] . "</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link text-light' href='../admin_area/admin_logout.php'>Logout</a>
          </li>";
}
?>

            </ul>
           </nav>
        </div>
    </nav>
                                <!-- 2nd chid--->
                   <div class="bg-light">
 
                   <h3 class="text-center p-2">Manage details</h3>
                   </div>              
    
                                 <!--3rd child-->
                   <div class="row">
                    <div class="col-md-12 bg-secondary p-5 d-flex align-items-center">
                        <div class=px-3> <!--padding x-->
                           <a href="#"><img src="..\images\logo\f5.png"
                            alt="#" class="admin_image"></a>
                            <p class="text-light text-center">jitendra singh</p>
                        </div>
                        <!-- button*10>a.nav-link.text-light.bg-info.my-1  --- here my mean margin-->
                        <div class="button text-center d-flex flex-wrap justify-content-center">

                         <button class="m-2"><a href="insert_product.php" class="nav-link text-light bg-info">Insert Products</a></button>
                         <button class="m-2"><a href="index.php?view_products" class="nav-link text-light bg-info">View Products</a></button>
                         <button class="m-2"><a href="index.php?insert_category" class="nav-link text-light bg-info">Insert Categories</a></button>
                         <button class="m-2"><a href="index.php?view_categories" class="nav-link text-light bg-info">View Categories</a></button>
                         <button class="m-2"><a href="index.php?insert_brand" class="nav-link text-light bg-info">Insert Brand</a></button>
                         <button class="m-2"><a href="index.php?view_brands" class="nav-link text-light bg-info">View Brand</a></button>
                         <button class="m-2"><a href="" class="nav-link text-light bg-info">All Orders</a></button>
                         <button class="m-2"><a href="" class="nav-link text-light bg-info">All Payments</a></button>
                         <button class="m-2"><a href="" class="nav-link text-light bg-info">List Users</a></button>
                        </div>
                    </div> 
                 </div>
                 


                 <!--forth chid-->
       <div class="container my-3">
        <?php 
        if(isset($_GET['insert_category'])){
           include('insert_categories.php');
        }

        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
         }
         if(isset($_GET['view_products'])){
            include('view_products.php');
         }
         if(isset($_GET['edit_products'])){
            include('edit_products.php');
         }
         if(isset($_GET['delete_product'])){
            include('delete_product.php');
         }
         if(isset($_GET['view_categories'])){
            include('view_categories.php');
            }
         if(isset($_GET['view_brands'])){
            include('view_brands.php');
            } 
             
        ?>
       </div> 


    <!----last chid footer-->
    <?php include ('../footer.php'); ?>
<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
    

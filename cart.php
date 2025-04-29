<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E commerce website-Cart Details </title>
  <!--bootstrap CSS link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- css link file-->
  <link rel="stylesheet" href="style.css">
<style>
  body{
    background-color:light yellow;
  }
  .cart_img{
    width: 80px;
    height: 80px;
    object-fit:contain;
}

</style>


</head>

<body>
  <!-- navbar-->

  <!-- first chid-->
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src=".\images\logo\f1.png" alt="#" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users_area/user_registration.php">Regiter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_no(); ?></sup></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!--calling cart fuction-->
<?php
cart();
?>


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
        <a class='nav-link text-light' href='./users_area/user_login.php'>Login</a>
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

  <!---forth chid creating table for cart-->
  <div class="container">
    <div class="row">
      <form action="" method="POST">
        <table class="table table-bordered text-center">

<!--php code to display dynamic data-->
<?php
   global $con;
   $get_ip_add = getIPAddress();
   $total_price = 0;
   $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
   $result=mysqli_query($con,$cart_query);
   $result_count=mysqli_num_rows($result);
   if($result_count>0){
echo "            <thead>
            <tr>
                <th>Product Title</th>
                <th>Product Images</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th colspan='2'>Operations</th>
            </tr>
            </thead>
            <tbody>";



   while($row=mysqli_fetch_array($result)){
       $product_id=$row['product_id'];
       $select_products="select * from `products` where product_id='$product_id'";
       $result_products=mysqli_query($con,$select_products);
       while($row_product_price=mysqli_fetch_array($result_products)){   
           $product_price=array($row_product_price['product_price']);
           $product_table=$row_product_price['product_price'];
           $product_title=$row_product_price['product_title'];
           $product_image1=$row_product_price['product_image1'];
           $product_values=array_sum($product_price); //total price of product
           $total_price+=$product_values;

?>
              <tr>
                <td><?php echo $product_title?></td> 
                <td><img src="./images/<?php echo $product_image1?>" alt="#" class="cart_img"></td>
                <td><input type="text" name ="qty"class="form-input w-50"></td>
                <?php  
if(isset($_POST['Update_cart'])){
  if (!empty($_POST['qty'])) {
      $quantities = intval($_POST['qty']); // Ensure it's an integer
      $product_id = intval($product_id); // Ensure the product ID is valid

      $update_cart = "UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
      
      $result_products_quantity = mysqli_query($con, $update_cart);
      
      if ($result_products_quantity) {
          echo "<script>window.open('cart.php','_self')</script>";
      } else {
          echo "<script>alert('Failed to update cart. Please try again.')</script>";
      }
  } else {
      echo "<script>alert('Please enter a valid quantity.')</script>";
  }
}


                ?>
                <td><?php echo $product_table?>/-</td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id  ?>"></td>
                <td>
                   <!-- <button class="btn btn-primary px-3 py-2 mx-3
                    border-0 ">Update</button>-->
                    <input type="submit" value="Update Cart"
                    class="btn btn-primary px-3 py-2 mx-3 border-0"
                    name="Update_cart">
                   <!-- <button class="btn btn-danger px-3 py-2 mx-3
                border-0">Remove</button>-->
                <input type="submit" value="Remove Cart" class="btn btn-danger
                px-3 py-2 mx-3 border-0"name="remove_cart">

                </td></tr>
<?php   }}}
else{
  echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
}

?>
            </tbody>
        </table>
<!--subtotal-->
<div class="d-flex mb-5">
  <?php  

$get_ip_add = getIPAddress();

$cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
  echo "  <h4 class='px-3'>Subtotal:<strong class='text-dark'>$total_price/-
     </strong></h4>
    <input type='submit' value='Continue shopping' class='btn btn-info
    px-3 py-2 mx-3 border-0'name='continue_shopping'>
     <button class='bg-secondary px-3 py-2 
     border-0'><a href='./users_area/checkout.php'class='text-light text-decoration-none'>Checkout</a></button>";
}else{
  echo "<input type='submit' value='Continue shopping' class='btn btn-success
    px-3 py-2 mx-3 border-0'name='continue_shopping'>";
}
if(isset($_POST['continue_shopping'])){
  echo "<script>window.open('index.php','_self')</script>";
}

  ?>


</div>
    </div>
  </div>
  </form>
<!--function to remove item from cart-->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      echo "<script>window.open('cart.php','_self')</script>";
    }
  }
}
echo $remove_item= remove_cart_item();

?>
 
      <!----last chid footer-->

<?php include ('footer.php'); ?>
</div>
      <!--bootstrap js link-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
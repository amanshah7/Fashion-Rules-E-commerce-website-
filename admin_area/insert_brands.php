
<?php

include('../includes/connect.php'); 

if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];

    // Select the data from the database
    $select_query = "SELECT * FROM `brands` WHERE `brand_title` = '$brand_title'";
    $result_select = mysqli_query($con, $select_query);

    if(mysqli_num_rows($result_select) > 0){
        echo "<script>alert('Brand already exists');</script>";
    } else {
        // Insert the new category
        $insert_query = "insert into `brands` (brand_title) values ('$brand_title')";
        $result = mysqli_query($con, $insert_query);

        if($result){
            echo "<script>alert('Brand has been inserted successfully');</script>";
        }
    }
}
?>



                            <!---HTML code--->
                            
<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">   <!-- md denote margine-->
<div class="input-group w-90 mb-2 ">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i> </span>
  <input type="text" class="form-control" name="brand_title" placeholder="insert Brands" 
  aria-label="brands" aria-describedby="basic-addon1"> <!--aria label not imp-->
</div>

<div class="input-group w-10 mb-2 m-auto ">

  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand"
   value="Insert Brands">
   
</div>
</form>
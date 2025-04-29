<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){

    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

/*for image upload*/
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

// temp image name or path
    $temp1_image1=$_FILES['product_image1']['tmp_name'];
    $temp2_image2=$_FILES['product_image2']['tmp_name'];
    $temp3_image3=$_FILES['product_image3']['tmp_name']; 

// checking empty condition

if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' 
or  $product_brands=='' or  $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
    echo "<script>alert('Please fill all the fields')</script>";
    exit();
}else{
    //inserting data into database
    move_uploaded_file($temp1_image1,"./product_images/$product_image1");
    move_uploaded_file($temp2_image2,"./product_images/$product_image2");
    move_uploaded_file($temp3_image3,"./product_images/$product_image3");

// insert query
    $insert_product="insert into `products` (product_title,product_description,product_keywords, 
    category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) value ('$product_title', 
    '$product_description','$product_keywords','$product_category','$product_brands', 
    '$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
    $result_query=mysqli_query($con,$insert_product);
    if($result_query){
        echo "<script>alert('Product inserted successfully')</script>";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>

<!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css file link -->
     <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data"> <!--enctype attributes are used for file upload or non-text data like img, video-->
        <!--title-->    
        <div class="form outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label"> Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                 placeholder="Enter product title" autocomplete="off" required>
        </div>

        <!--description-->
        <div class="form outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                 placeholder="Enter product description" autocomplete="off" required>
        </div>
        <!--keywords--> 
        <div class="form outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label"> Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                 placeholder="Enter product keywords" autocomplete="off" required>
        </div>
        <!--categories-->
        <div class="form outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select">
                <option value=""> select a category</option>

                <!--php code for select query (fetch data from database) -->
                <?php
                    $select_query="Select * FROM categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'> $category_title</option>";
                    }
                ?>
            </select>
         </div>

         <!--brands--> 
        <div class="form outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class="form-select">
                <option value=""> select a Brand</option>
                
                <!--php code for select query (fetch data from database) -->
                <?php
                    $select_query="Select * FROM brands";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'> $brand_title</option>";
                    }
                ?>
            </select>
         </div>
         <!--Image 1-->
         <div class="form outline mb-4 w-50 m-auto">
                <label for="image1" class="form-label"> Product image 1</label>
                <input type="file" name="product_image1" id="" class="form-control" required>
            </div>

             <!--Image 2-->
         <div class="form outline mb-4 w-50 m-auto">
                <label for="image2" class="form-label"> Product image 2</label>
                <input type="file" name="product_image2" id="" class="form-control" required>
            </div>

             <!--Image 3-->
         <div class="form outline mb-4 w-50 m-auto">
                <label for="image3" class="form-label"> Product image 3</label>
                <input type="file" name="product_image3" id="" class="form-control" required>
            </div>
            <!--price-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label"> Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                 placeholder="Enter product price" autocomplete="off" required>
            </div>

            <div class="form outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" value="Insert Product" class="btn btn-primary mb-3 px-3">
         </div>
    </form>  
</div>

</body>
</html>
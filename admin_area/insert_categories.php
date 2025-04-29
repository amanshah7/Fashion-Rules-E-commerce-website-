
<?php

include('../includes/connect.php'); 

if(isset($_POST['insert_cat'])){
    $category_title = $_POST['cat_title'];

    // Select the data from the database
    $select_query = "SELECT * FROM `categories` WHERE `category_title` = '$category_title'";
    $result_select = mysqli_query($con, $select_query);

    if(mysqli_num_rows($result_select) > 0){
        echo "<script>alert('Category already exists');</script>";
    } else {
        // Insert the new category
        $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
        $result = mysqli_query($con, $insert_query);

        if($result){
            echo "<script>alert('Category has been inserted successfully');</script>";
        }
    }
}
?>



<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-44">   <!-- mb denote margine-->
<div class="input-group w-90 mb-2 ">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i> </span>
  <input type="text" class="form-control" name="cat_title" placeholder="insert categories" 
  aria-label="Username" aria-describedby="basic-addon1"> <!--aria label not imp-->
</div>

<div class="input-group w-10 mb-2 m-auto ">

  <input type="submit" class=" bg-info p-2 border-0" name="insert_cat"
   value="Insert categories">
  <!-- <button class=" bg-info px-2 my-3 border-0 ">Insert categories</button>-->
</div>
</form>
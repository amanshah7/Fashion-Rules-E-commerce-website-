<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    
<!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color:white;
            overflow :hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5 ">
                <img src="../images/admin regi.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action=""method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id ="username" name="username" 
                        placeholder="Enter your name" required="required"
                        class="form-control ">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id ="email" name="email" 
                        placeholder="Enter your email" required="required"
                        class="form-control ">
                        </div>
                        <div class="form-outline mb-4">
                        <label for="password" class="form-label">password</label>
                        <input type="password" id ="password" name="password" 
                        placeholder="Enter your password" required="required"
                        class="form-control ">
                        </div>
                        <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">confirm password</label>
                        <input type="password" id ="confirm_password" name="confirm_password" 
                        placeholder="Enter your confirm_password" required="required"
                        class="form-control ">
                        </div>
                        <div>
                            <input type="submit" class="bg-info py-2 px-3 border-0"
                            value="Register" name="admin_registration">
                            <p class="small fw-bold" mt-2 pt-1>Do you already  have an account? <a href="admin_login.php" class="link-danger">login</a></p>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- php code  -->
<?php

// Database connection
$con = mysqli_connect("localhost", "root", "", "mystore");
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['admin_registration'])) {
    $admin_name = $_POST['username']; 
    $admin_email = $_POST['email']; 
    $admin_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($admin_password !== $confirm_password) {
        echo "<script>alert('Password and Confirm Password do not match')</script>";
        exit();
    }

    // Hash password before storing
    $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name' OR admin_email = '$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Username or Email already exists')</script>";
    } else {
        // Insert new admin record
        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) 
                         VALUES ('$admin_name', '$admin_email', '$hashed_password')";

        // Debugging output
        echo "DEBUG: " . $insert_query;

        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Registration Successful')</script>";
        } else {
            echo "<script>alert('Registration Failed: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>

<?php
// Start the session at the beginning of the file
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "mystore");
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['admin_login'])) {
    $admin_name = $_POST['username'];
    $admin_password = $_POST['password'];

    // Query to fetch admin details from the database based on the username
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name = ?";
    $stmt = mysqli_prepare($con, $select_query);

    // Bind the parameter and execute the query
    mysqli_stmt_bind_param($stmt, 's', $admin_name);
    mysqli_stmt_execute($stmt);

    // Get the result of the query
    $result = mysqli_stmt_get_result($stmt);
    $row_count = mysqli_num_rows($result);

    // Check if the admin exists
    if ($row_count > 0) {
        // Fetch the data
        $row_data = mysqli_fetch_assoc($result);

        // Verify the password using password_verify (for hashed passwords)
        if (password_verify($admin_password, $row_data['admin_password'])) {
            // Store the session variable for the admin user
            $_SESSION['username'] = $admin_name;  // Set the session for the logged-in user

            // Redirect to the dashboard
            echo "<script>alert('Login Successful');</script>";
            echo "<script>window.open('index.php', '_self');</script>";
        } else {
            // Invalid password
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        // Username doesn't exist
        echo "<script>alert('Invalid username or password');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
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
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5 ">
                <img src="../images/admin login.jpg" alt="Admin login" class="img-fluid">
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
                        <label for="password" class="form-label">password</label>
                        <input type="password" id ="password" name="password" 
                        placeholder="Enter your password" required="required"
                        class="form-control ">
                        </div>
                       
                        <div>
                            <input type="submit" class="bg-info py-2 px-3 border-0"
                            value="Login" name="admin_login">
                            <p class="small fw-bold" mt-2 pt-1>don't you have an account? <a
                             href="admin_registration.php" class="link-danger">Register</a></p>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
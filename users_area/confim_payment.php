<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    //echo $order_id; 
    $select_data="Select * from `user_orders` where order_id='$order_id'";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="Insert into `user_payment` (order_id,invoice_number,amount,payment_mode)
    values($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);   
    if($result){
        echo "<h3 class='text-center text-light'> Payment Successful</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="Update `user_orders` set order_status='Complete' where order_id='$order_id'";
    $result_orders=mysqli_query($con,$update_orders);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment  page </title>
    <!--bootstrap CSS link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-secondary">
    <div class="container my-5">
    <h1 class="text-center text-light s">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" 
                value="<?php echo $invoice_number; ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount"
                 value="<?php echo $amount_due; ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mode" class="form-select w-50 m-auto">
                <option>Select Payment Mode</option>
                <option>UPI</option>
                <option>Netbanking</option>
                <option>Paypal</option>
                <option>Cash on Delivery</option>
                <option>Payoffline</option>
               </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info text-light py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
    
</body>
</html>
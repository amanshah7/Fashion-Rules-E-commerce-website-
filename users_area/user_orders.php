<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$user_name=$_SESSION['username'];
$get_user="Select * from `user_table` where user_name='$user_name' and user_id";
$result=mysqli_query($con,$get_user);
$row_fatch=mysqli_fetch_assoc($result);
$user_id=$row_fatch['user_id'];
$user_name=$row_fatch['user_name'];
//echo $user_id;
?>

<h3 class="class text-center">All My Order</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
        <th>Sl no.</th>
        <th>Amount Due</th>
        <th>Total product</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
$get_order_details = "SELECT * FROM user_orders WHERE user_id='$user_id'"; // Added quotes around $user_id
$result_orders = mysqli_query($con, $get_order_details);
$number=1;
while($row_orders=mysqli_fetch_array($result_orders)){
    $order_id=$row_orders['order_id'];
    $amount_due = $row_orders['amount_due'];
    $total_products = $row_orders['total_products'];
    $invoice_number = $row_orders['invoice_number'];
    $order_status = $row_orders['order_status'];
    if($order_status=='pending'){
        $order_status='Incomplete';
    }else{
        $order_status='Complete';
    }
    $order_date = $row_orders['order_date'];
   
    echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td> $order_status</td>";
            ?>
            <?php
            if($order_status=='Complete'){
                echo "<td>Paid</td>";
            }else{
                echo"<td> <a href='confim_payment.php?order_id=$order_id' class='text-light'>Confirm</a>
                </td> 
                 </tr> "; 
                }
        $number++;   
}
?>
    </tbody>
</table>
</body>
</html>

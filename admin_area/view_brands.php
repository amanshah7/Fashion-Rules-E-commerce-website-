<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr class="text-center">
        <th>Srno.</th>
        <th>Brand Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <thead>
        <tbody class="bg-secondary text-center text-light">

        <?php
        $seletec_cat="select * from  `brands`";
        $result=mysqli_query($con,$seletec_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
        ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $brand_title; ?></td>
                <td><a href=''class='text-light'><i
                 class='fa-solid fa-pen-to-square' ></a></td>
                <td><a href=''class='text-light'><i 
                class='fa-solid fa-trash' ></td>
            </tr>
            <?php
            }
            ?>

        </tbody>
</table>
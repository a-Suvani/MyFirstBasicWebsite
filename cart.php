<?php
// Include the 'config.php' file at the top of this page as you've done before.
@include 'config.php';

if (isset($_POST['update_update_btn'])) {
    $update_value = intval($_POST['update_quantity']); // Convert to integer to avoid SQL injection
    $update_id = intval($_POST['update_quantity_id']); // Convert to integer to avoid SQL injection

    // Update the quantity in the database
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
    
    if ($update_quantity_query) {
        header('location:cart.php');
        exit; // Add exit to stop further execution of the script after the header redirect
    } else {
        echo "Failed to update quantity: " . mysqli_error($conn);
    }
}

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn,"DELETE FROM `cart` WHERE id = '$id'");
    header('location:cart.php');
};

if(isset($_GET['delete_all'])){
    mysqli_query($conn,"DELETE FROM `cart`");
    header('location:cart.php');

}
$select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
$grand_total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="shopping-cart">
        <section>
            <h1 class="heading">Shopping cart</h1>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- ... Your other PHP code above ... -->

<tbody>
    <?php
    if (mysqli_num_rows($select_cart) > 0) {
        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $sub_total;
    ?>
            <tr>
                <td><img src="assets/image/cart/<?php echo $fetch_cart['image']; ?>" height="130" alt=""></td>
                <td><?php echo $fetch_cart['name']; ?></td>
                <td><?php echo $fetch_cart['price']; ?></td>
                <td>
                    <form action="" method="post">
                        <!-- Use a unique name for the product ID -->
                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                        <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                        <input type="submit" value="Update" name="update_update_btn">
                    </form>
                </td>
                <td><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                <td>
                    <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn">
                        <i class="fas fa-trash"></i>remove
                    </a>
                </td>
            </tr>
    <?php  
        }
    }
    ?>
    <tr class="table-bottom">
        <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
        <td colspan="3"> grand total </td>
        <td>$<?php echo $grand_total; ?>/-</td>
        <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"><i class="fas fa-trash"></i>delete all</a></td>
    </tr>
</tbody>
            </table>
           <div class="checkout-btn">
            <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
           </div>

        </section>
    </div>
    <script src="js/cart.js"></script>
</body>
</html>

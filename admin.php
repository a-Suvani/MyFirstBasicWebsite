
<?php
// Get the current URL
$current_url = $_SERVER['REQUEST_URI'];

// Check if the URL contains "/admin/" and replace it with "/private-area/"
$admin_dir = "private-area"; // Replace this with your desired custom admin directory name
$new_url = str_replace("/admin/", "/$admin_dir/", $current_url);

// Check if the URL has changed and redirect if necessary
if ($new_url !== $current_url) {
    header("Location: $new_url");
    exit();
}
?>
<?php
$host = "localhost";
$username = "suvani";
$password = "P@ssWorD!@#1";
$database = "shop_db";



// Create a new MySQLi object and establish a connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
echo "Connected to the database!";
?>

<!-- 
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "shop_db";

// // Create a new MySQLi object and establish a connection
// $conn = new mysqli($host, $username, $password, $database);

// // Check for connection errors
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// ?> -->
<!-- 
<?php


// Fetch users from the database
$sql = "SELECT * FROM user";
$result = $conn->query($sql);  // Use the variable $conn to execute the query

if (!$result) {
    die('Query failed: ' . $conn->error); // Use the variable $conn to get the error message
}

$users = $result->fetch_all(MYSQLI_ASSOC); // Use the variable $result to fetch all rows
?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <section>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .container {
            margin: 20px;
            display: flex;
            justify-content: center; /* Align table horizontally at the center */
        }

        h3 {
            margin-bottom: 10px;
        }

        table {
            width: 70%; /* Adjust the width as desired */
            border-collapse: collapse;
            border: 1px solid black;
            margin: 30px auto; /* Add vertical margin for separation */
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #ffe5d4;
        }

        tr:nth-child(odd) {
            background-color: #ffd5e7;
        }

        th:not(:last-child),
        td:not(:last-child) {
            border-right: 1px solid black; /* Add vertical line */
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .edit-btn,
        .delete-btn {
            padding: 8px 16px;
            border: none;
            background-color: #0062e3;
            color: #ffffff;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            background-color: dark
            pink
            ;
        }

        .message {
            display: inline-block;
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            margin-top: 10px;
        }

        .message i {
            margin-left: 5px;
            cursor: pointer;
        }

        body {
            font-family: Arial, sans-serif; /* Change to desired font */
        }

        /* Add responsive styles for edit and delete buttons */
        @media (max-width: 600px) {
            .edit-btn,
            .delete-btn {
                font-size: 12px;
                padding: 6px 12px;
            }
        }

        @media (max-width: 400px) {
            .edit-btn,
            .delete-btn {
                font-size: 10px;
                padding: 4px 8px;
            }
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h3>Registered Users</h3>
        <?php if (!empty($users)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo isset($user['role']) ? $user['role'] : 'N/A'; ?></td>
                            <td>
                                <div class="btn-container">
                                    <button class="edit-btn" onclick="editUser(<?php echo $user['id']; ?>)"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn" onclick="deleteUser(<?php echo $user['id']; ?>)"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
    </div>

    <script>
        function editUser(userId) {
            // Redirect to edit user page with the userId
            window.location.href = 'edit-user.php?id=' + userId;
        }

        function deleteUser(userId) {
            // Show confirmation dialog
            if (confirm('Are you sure you want to delete this user?')) {
                // Send AJAX request to delete the user
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete-user.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Refresh the page after deletion
                        window.location.reload();
                    }
                };
                xhr.send('id=' + userId);
            }
        }

        // Close message
        function closeMessage() {
            var message = document.querySelector('.message');
            message.style.display = 'none';
        }
    </script>

    <?php if (isset($message) && !empty($message)): ?>
        <div class="message">
            <span><?php echo $message; ?></span>
            <i class="fas fa-times" onclick="closeMessage()"></i>
        </div>
    <?php endif; ?>
</body>
</section>

<section>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blank HTML Page</title>
</head>

<body>
<?php
include 'config.php';

$message = array(); // Initialize the message array

if (isset($_POST['add_product'])) {
    $p_name = $_POST['p-name'];
    $p_price = $_POST['p-price'];
    $p_image = $_FILES['p-image']['name'];
    $p_image_tmp_name = $_FILES['p-image']['tmp_name'];
    $p_image_folder = 'uploaded_img/' . $p_image;
    $p_image_folder_path = 'C:\xampp\htdocs\cw1-a-Suvani\assets\image\cart' . $p_image;

    $insert_query = mysqli_query($conn, "INSERT INTO `products` (name, price, image) VALUES ('$p_name', '$p_price', '$p_image')") or die('Query failed');

    if ($insert_query) {
        move_uploaded_file($p_image_tmp_name, $p_image_folder_path);
        $message[] = 'Product added successfully';
    } else {
        $message[] = 'Could not add the product';
    }
}


if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'C:\xampp\htdocs\cw1-a-Suvani\assets\image\cart' . $update_p_image;

    $update_query = mysqli_query($conn, "UPDATE `products` SET name ='$update_p_name',price = '$update_p_price',image = '$update_p_image' WHERE id = '$update_p_id'");

    if ($update_query) {
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[] = 'Product updated successfully';
    } else {
        $message[] = 'Product could not be updated';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<div class="message"><span>' . $msg . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
        }
    }
    ?>

    <div class="container">
        <section>
            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3>Add a new product</h3>
                <input type="text" name="p-name" placeholder="Enter the product name" class="box" required>
                <input type="number" name="p-price" placeholder="Enter the product price" class="box" required>
                <input type="file" name="p-image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                <input type="submit" value="Add the product" name="add_product" class="btn">
            </form>
        </section>
        <section class="display-product-table">
            <table>
                <thead>
                    <tr>
                        <th>Product image</th>
                        <th>Product name</th>
                        <th>Product price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($row = mysqli_fetch_assoc($select_products)) {
                            ?>
                            <tr>
                                <td><img src="assets/image/cart/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo '$' . $row['price'] . '/-'; ?></td>
                                <td>
                                    <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>No products added</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section class="edit-form-container">
            <?php    
            if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id");
    if ($delete_query) {
        header('location:admin.php');
        $message[] = 'Product has been deleted';
    } else {
        header('location:admin.php');
        $message[] = 'Product could not be deleted';
    }
}
       
            if (isset($_GET['edit'])) {
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
                if ($edit_query && mysqli_num_rows($edit_query) > 0) {
                    while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
            ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <img src="assets/image/cart/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                            <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                            <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                            <input type="file" class="box" required name="update_p_image" accept="image/png,image/jpg,img/jpeg">
                            <input type="submit" value="Update the product" name="update_product" class="btn">
                            <input type="reset" value="Cancel" id="close-edit" class="option-btn">
                        </form>

     <?php
                    }
                }
                echo "<script> document.querySelector('.edit-form-container').style.display = 'flex'; </script>";
            }
            ?>
        </section>


        <section class="edit-form-container">
    <?php
    if(isset($_GET['edit'])) { // Remove the semicolon here
        $edit_id = $_GET['edit'];
        $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
        if($edit_query && mysqli_num_rows($edit_query) > 0){
            while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <img src="assets/image/cart/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                    <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id'];?>">
                    <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name'];?>">
                    <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price'];?>">
                    <input type="file" class="box" required name="update_p_image" accept="image/png,image/jpg,img/jpeg">
                    <input type="submit" value="Update the product" name="update_product" class="btn">
                    <input type="reset" value="Cancel" id="close-edit" class="option-btn">
                </form>
        <?php
            };
        };
        echo "<script> document.querySelector('.edit-form-container').style.display = 'flex'; </script>";
    };
    ?>
</section>

        <?php
        ?>
        </section>
    <script src="script/cart.js"></script>
</body>
</html>
</body>

</html>
</section>
</html>
?>
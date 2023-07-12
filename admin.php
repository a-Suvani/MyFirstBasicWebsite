<?php
include 'config.php';

// Fetch users from the database
$sql = "SELECT * FROM shop_db.users";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
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

    .edit-btn,
    .delete-btn {
        padding: 8px 16px;
        margin-right: 5px;
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
        background-color: #004fa1;
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
                                <button class="edit-btn" onclick="editUser(<?php echo $user['id']; ?>)"><i class="fas fa-edit"></i> Edit</button>
                                <button class="delete-btn" onclick="deleteUser(<?php echo $user['id']; ?>)"><i class="fas fa-trash"></i> Delete</button>
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

</html>


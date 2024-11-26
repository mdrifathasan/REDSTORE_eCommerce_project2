<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ইউজারনেম দিয়ে ডেটাবেসে খোঁজা
    $query = "SELECT * FROM users1 WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // পাসওয়ার্ড যাচাই
        if (password_verify($password, $row['password'])) {
            // লগইন সফল
            $_SESSION['user_id'] = $row['id'];
            header("Location: account.php");
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}
?>

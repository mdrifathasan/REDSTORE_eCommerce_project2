<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // পাসওয়ার্ড হ্যাশ করা
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ডেটাবেসে নতুন ইউজার সেভ করা
    $query = "INSERT INTO users1 (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    if (mysqli_query($connection, $query)) {
        echo "User registered successfully";
        header("Location: account.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<?php
    session_start();

    include("config.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $query = mysqli_query($db, $sql);

    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $_SESSION["username"] = $username;
        $_SESSION["status_login"] = "true";
        
        header("Location: dashboard.php");
    }

    else {
        header("Location: index.php?pesan=gagal");
    }
?>
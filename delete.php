<?php
    $conn = mysqli_connect("localhost", "root", "", "tekrar");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "DELETE FROM `student` WHERE id = {$_POST['id']}";

        $conn->query($sql);

        header("Location: index.php");
        exit();

    }
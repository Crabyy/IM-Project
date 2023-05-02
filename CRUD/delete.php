<?php

    include 'crud.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM crud_users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result){
        header("location: ../crud.php");
    }
    else {
        die(mysqli_error($conn));
    }
}
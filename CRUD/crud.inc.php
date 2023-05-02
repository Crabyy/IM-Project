<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "im_project";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if (!$conn) {
        die(mysqli_error($conn));
    }

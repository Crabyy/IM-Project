<?php

if(isset($_POST["submit"])){

    $Username = $_POST["uName"];
    $pwd = $_POST["pwd"];

    require_once 'dbconfig.php';
    require_once 'dbfunc.php';

    if(emptyInputSignin($Username, $pwd) !== false){
        header("location: sign_In.php?error=emptyInput");
        exit();
       }
    
    signInUser($conn, $Username, $pwd);
}
else {
    header("location: sign_In.php?error=emptyInput");
    exit();
}
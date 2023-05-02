<?php
    if(isset($_POST["submit"])){

       $fName = $_POST["fName"];
       $lName = $_POST["lName"];
       $Username = $_POST["username"];
       $email = $_POST["email"];
       $pwd = $_POST["pwd"];
       $Cpwd = $_POST["Cpwd"];

       require_once 'dbconfig.php';
       require_once 'dbfunc.php';

       if(emptyInputSignup($fName, $lName, $Username, $email, $pwd, $Cpwd) !== false){
        header("location: sign_Up.php?error=emptyInput");
        exit();
       }
       if(invalidUsername($Username) !== false){
        header("location: sign_Up.php?error=invalidUsername");
        exit();
       }
       if(usernameExists($conn, $Username, $email) !== false){
        header("location: sign_Up.php?error=usernameExists");
        exit();
       }
       if(invalidEmail($email) !== false){
        header("location: sign_Up.php?error=invalidEmail");
        exit();
       }
       if(pwdMatch($pwd, $Cpwd) !== false){
        header("location: sign_Up.php?error=passwordDoesNotMatch");
        exit();
       }

       createUser($conn, $fName, $lName, $Username, $email, $pwd);

    }
    
    else{
        header("location: sign_Up.php");
        exit();
    }
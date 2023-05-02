<?php

// Sign Up

function emptyInputSignup($fName, $lName, $Username, $email, $pwd, $Cpwd) {
    $result = "";
    if(empty($fName) || empty($lName) || empty($Username) || empty($email) || empty($pwd) || empty($Cpwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUsername($Username) {
    $result = "";
    if(!preg_match("/^[a-zA-Z0-9]*$/", $Username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $Username, $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: sign_Up.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $Username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function invalidEmail($email) {
    $result = "";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $Cpwd) {
    $result = "";
    if($pwd !== $Cpwd){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function createUser($conn, $fName, $lName, $Username, $email, $pwd){
    $sql = "INSERT INTO users (fName, lName, username, email, password)
            VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: sign_Up.php?error=stmtFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $fName, $lName, $Username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: sign_Up.php?error=none");
    exit();

}

// Sign In

function emptyInputSignin($Username, $pwd) {
    $result = "";
    if(empty($Username) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function signInUser($conn, $Username, $pwd) {
    $usernameExist = usernameExists($conn, $Username, $Username);

    if($usernameExist === false){
        header("location: sign_In.php?error=wrongSignIn");
        exit();
    }

    $hashedpwd = $usernameExist["password"];
    $pwdChecker = password_verify($pwd, $hashedpwd);

    if($pwdChecker === false){
        header("location: sign_In.php?error=wrongSignIn");
        exit();
    }
    else if($pwdChecker === true){
        session_start();
        $_SESSION["id"] = $usernameExist["id"];
        $_SESSION["username"] = $usernameExist["username"];

        header("location: crud.php");
        exit();
    }
}

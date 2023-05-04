<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=" ">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/sign_Up.css">

    <title>Sign Up</title>
</head>
<body>

    <?php include 'navbar.php'; ?>

<div class="container">

    <h2>Sign Up</h2>

    <?php

    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyInput") {
            echo "<center><p>Please fill up all fields!</p></center>";
        }
        else if($_GET["error"] == "invalidUsername"){
            echo "<center><p>Please use a proper username!</p></center>";
        }
        else if($_GET["error"] == "invalidEmail"){
            echo "<center><p>Please use a proper Email!</p></center>";
        }
        else if($_GET["error"] == "passwordDoesNotMatch"){
            echo "<center><p>Both passwords don't match!</p></center>";
        }
        else if($_GET["error"] == "stmtError"){
            echo "<center><p>Something went wrong!</p></center>";
        }
        else if($_GET["error"] == "usernameExists"){
            echo "<center><p>This username/email is already taken!</p></center>";
        }
        else if($_GET["error"] == "none"){
            echo "<center><p>Congratulations! You successfully signed up, Welcome!</p></center>";
        }

    }
?>

    <form method="post" action="sign_Up.inc.php">

        <label>First Name:</label>
        <input type="text" id="firstname" name="fName">

        <label>Last Name:</label>
        <input type="text" id="lastname" name="lName">
        
        <label>Username:</label>
        <input type="text" id="username" name="username">

        <label>Email:</label>
        <input type="email" id="email" name="email">

        <label>Password:</label>
        <input type="password" id="password" name="pwd">

        <label>Confirm Password:</label>
        <input type="password" id="confirm-password" name="Cpwd">

        <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>
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

    <h1>Sign Up</h1>

    <?php

    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyInput") {
            echo "<p>Please fill up all fields!</p>";
        }
        else if($_GET["error"] == "invalidUsername"){
            echo "<p>Please use a proper username!</p>";
        }
        else if($_GET["error"] == "invalidEmail"){
            echo "<p>Please use a proper Email!</p>";
        }
        else if($_GET["error"] == "passwordDoesNotMatch"){
            echo "<p>Both passwords don't match!</p>";
        }
        else if($_GET["error"] == "stmtError"){
            echo "<p>Something went wrong!</p>";
        }
        else if($_GET["error"] == "usernameTaken"){
            echo "<p>This username is already taken!</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<p>Congratulations! You successfully signed up, Welcome!</p>";
        }

    }
?>

    <form method="post" action="sign_Up.inc.php">

        <label>First Name:</label>
        <input type="text" id="firstname" name="fName" placeholder="First Name">

        <label>Last Name:</label>
        <input type="text" id="lastname" name="lName" placeholder="Last Name">
        
        <label>Username:</label>
        <input type="text" id="username" name="username" placeholder="Username">

        <label>Email:</label>
        <input type="email" id="email" name="email" placeholder="Email">

        <label>Password:</label>
        <input type="password" id="password" name="pwd" placeholder="Password">

        <label>Confirm Password:</label>
        <input type="password" id="confirm-password" name="Cpwd" placeholder="Confirm Password">

        <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>
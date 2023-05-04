<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="css/sign_In.css">

    <title>Sign In</title>
</head>

<body>

    

    <form action="sign_In.inc.php" method="post">

        <h2>Sign In</h2>

        <?php

        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyInput") {
                echo "<center>Please input all the fields!</center>";
            }
            else if ($_GET["error"] == "wrongSignIn") {
                echo "<center>Incorrect Sign In!</center>";
            }
        }
        ?>
        <br><br>
        <label>Username:</label>
        <input type="text" name="uName" placeholder="Username/Email">

        <label>Password:</label>
        <input type="password" name="pwd" placeholder="Password">
        <br>

        <button type="submit" name="submit">Sign In</button>

        <h2 class="account"> Don't have an account?</h2>
        <a href="sign_Up.php">Sign Up now!</a>

    </form>

</body>

</html>
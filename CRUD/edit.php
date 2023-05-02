<?php

include '../dbconfig.php';

$fname = "";
$lname = "";
$uname = "";
$email = "";

$errorMessage = "";
$successMessage = "";

//Value to update the database
$id = $_GET['id'];

// $sql = "SELECT * FROM crud_users WHERE id = $id";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// $fname = $row['fName'];
// $lname = $row['lName'];
// $uname = $row['username'];
// $email = $row['email'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];

    do {
        if (empty($fname) || empty($lname) || empty($uname) || empty($email)) {
            $errorMessage = "All fields are required!";
            break;
        }
        if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
            $errorMessage = "Invalid username!";
            break;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = "Invalid email address!";
            break;
        }
        $query = "SELECT * FROM crud_users WHERE (username='$uname' OR email='$email') AND id <> $id";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            $errorMessage = "Username or email already exists!";
            break;
        }

        //function to add the account to the database
        $sql = "UPDATE crud_users SET
            fname = '$fname',
            lname = '$lname',
            username = '$uname',
            email = '$email'
            WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . mysqli_connect_error();
            break;
        }

        $successMessage = "Account is added successfully!";

        header("location: ../crud.php");
        exit();
    } while (false);
}  else {

    // Fetch the user record to display in the form
    $sql = "SELECT * FROM crud_users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $errorMessage = "Invalid Query: " . mysqli_connect_error();
    } else {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fName'];
        $lname = $row['lName'];
        $uname = $row['username'];
        $email = $row['email'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/create.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Create Account</title>
</head>

<body>
    <div class="container my-5">
        <h2>Create Account</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "<div  class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fname" placeholder="Enter First Name" value="<?php echo $fname; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" value="<?php echo $lname; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="uname" placeholder="Enter Username" value="<?php echo $uname; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                        <div class='row mb-3'>
                            <div class='offset-sm-3 col-sm-6'>
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>$successMessage</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            </div>
                        </div>
                    ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-danger" href="../crud.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
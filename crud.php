<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <title>CRUD</title>
</head>

<body>
    <div class="container">
        <h2>List of Accounts</h2>
        <a class="btn btn-primary" href="CRUD/create.php">+ Create Account</a>
        <a class="btn btn-danger" href="sign_In.php">Sign Out</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'dbconfig.php';

                $sql = "SELECT * FROM crud_users";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Invalid Query: " . mysqli_connect_error());
                    exit();
                }

                //read data from DB
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[fName]</td>
                                <td>$row[lName]</td>
                                <td>$row[username]</td>
                                <td>$row[email]</td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='CRUD/edit.php?id=$row[id]'>Edit</a>
                                        <a class='btn btn-danger btn-sm' href='CRUD/delete.php?id=$row[id]'>Delete</a>
                                    </td>
                            </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
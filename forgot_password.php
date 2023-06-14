<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $new_password = $_POST['new_password'];

    if (!empty($user_name) && !empty($new_password)) {
        // Update password in the database
        $query = "UPDATE signup SET password = '$new_password' WHERE user_name = '$user_name'";
        $result = mysqli_query($con1, $query);

        if ($result) {
            echo '<script>
                alert("Password updated successfully!");
                window.location.href = "login.php";
                </script>';
            exit;
        } else {
            echo '<script>
                alert("Failed to update password. Please try again.");
                window.history.back();
                </script>';
            exit;
        }
    } else {
        echo '<script>
            alert("Please fill in all the fields.");
            window.history.back();
            </script>';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        <?php include 'CSS/style.css'; ?>
    </style>
</head>

<body class="bg2">
    <div id="box" class="d-flex justify-content-center align-items-center vh-100">
        <form method="post" class="shadow inputSt p-3 formBg">
            <h1>Forgot Password</h1>

            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="user_name" required>

            <label class="form-label">New Password:</label>
            <input type="password" class="form-control" name="new_password" required>

            <br>
            <input type="submit" value="Update Password" class="btnbg btn">
            <br>
            <b></b>
            <a href="login.php" class="center" style="color: navy;">Back to Log In</a>
        </form>
    </div>
</body>

</html>

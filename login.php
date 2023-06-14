<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {

        // Read from database
        $query = "SELECT * FROM signup WHERE user_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con1, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password) {
                $_SESSION['user_id'] = $user_data['user_id'];
                $title = $user_data['Title'];

                if ($title === 'Student') {
                    header("Location: index.php");
                    die;
                } elseif ($title === 'Lecturer') {
                    header("Location: dashboard.php");
                    die;
                }
            } else {
                echo '<script>
                alert("The passwords do not match!");
                window.history.back();
                </script>';
            }
        } 

    } 
   
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        <?php include 'CSS/style.css'; ?>
    </style>
</head>

<body class="bg2">
    <div id="box" class="d-flex justify-content-center align-items-center vh-100">
        <form method="post" class="shadow inputSt p-3 formBg" >
            <h1> Log In</h1>

            <label class="form-label"> Email: </label>
            <input type="email" class="form-control" id="text" name="user_name" required>

            <label id="text" class="form-label">Password: </label>
            <input type="password" class="form-control" id="text" name="password" required>
            <br>
            <a href="forgot_password.php" class="center" style="color:red;">Forgot Password</a>

            <br>
            <input id="button" type="submit" value="Log In" class="btnbg btn">
            <br>
            <a href="signup.php" class="center" style="color:navy;">Create new account</a>
        </form>
    </div>
</body>

</html>

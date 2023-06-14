<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $PhoneNo = $_POST['PhoneNo'];
    $title = $_POST['title'];

    if (!empty($user_name) && !empty($password) && !empty($confirm_password)) {
        if ($password === $confirm_password) {
            // Save to database
            $user_id = random_num(20);

            $query = "INSERT INTO signup (user_id, Fname, Lname, user_name, PhoneNo, title, password) VALUES ('$user_id', '$Fname', '$Lname', '$user_name', '$PhoneNo', '$title', '$password')";

            mysqli_query($con1, $query);

            header("Location: login.php");
            die;
        } else {
            echo '<script>
            alert("The passwords do not match!");
            window.history.back();
            </script>';
        }
    } else {
        $error_message = "Please enter all the required information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style>
<?php include 'CSS/style.css'; ?>
</style>

</head>


<body class="bg2">

        <div id="box" class="d-flex justify-content-center align-items-center vh-100">
		<form method="post" class="shadow inputSt formBg">
        <h1> Sign Up</h1>

    <label class="form-label">First name: </label>
    <input id="text" type="text" class="form-control" name="Fname" required>



    <label class="form-label">Last name: </label>
    <input id="text" type="text" class="form-control" name="Lname" required >



    <label class="form-label"> Email: </label>
    <input id="text" type="email" class="form-control" name="user_name" required>



    <label class="form-label">Phone: </label>
    <input id="text" type= "tel" class="form-control" name="PhoneNo" required>

    Please choose your title: <br>
    <input type="radio" name="title" value="Student" >Student.<br>
    <input type="radio" name="title" value="Lecturer">Lecturer. <br>


    <label class="form-label">Password: </label>
    <input id="text" type= "password" class="form-control" name="password" required>

    <label class="form-label">Confirm password: </label>
    <input id="text" type= "password" class="form-control" name="confirm_password" required>
<br>
<input id="button" type="submit" value="Sign Up" class="btnbg btn">
<br>
    <a href="login.php" class="center" style="color:navy;"> Already have account</a>
</form>
    </div>
</body>
</html>
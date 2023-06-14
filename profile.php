<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $PhoneNo = $_POST['PhoneNo'];

    if (!empty($user_name) && !empty($password) && !empty($Fname) && !empty($Lname) && !empty($PhoneNo)) {
        // Save to database
        $user_id = $user_data['user_id'];
        $query = "UPDATE signup SET Fname='$Fname', Lname='$Lname', user_name='$user_name', PhoneNo='$PhoneNo', password='$password' WHERE user_id = $user_id";

        if (mysqli_query($con1, $query)) {
            // Update successful, redirect to profile page
            header("Location: profile.php");
            die;
        } else {
            // Display error message
            echo "Error: " . mysqli_error($con1);
        }
    } else {
        echo "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        <?php include 'CSS/style.css';?>

        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        * {
            padding: 0;
            margin: 0;
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <link rel="icon" href="css/logo.png" class="titleLogo">
</head>

<body class="bg">
    <nav>
        <img src="css/logo.png" class="logo">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="proposal.php">Proposal</a></li>
            <li><a href="Guidelines.php">Guidelines</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <img src="css/user.png"  class="user-pic" onclick="toggleMenu()">  

<div class="sub-menu-wrap" id="subMenu">
  <div class="sub-menu">
    <div class="user-info">
      <img src="css/user2.png" style="background: whitesmoke;">
      <h3><?php echo $user_data['Fname']; ?></h3>
    </div>
    <hr>
    
    <a href="profile.php" class="sub-menu-link">
      <img src="css/edit.png">
      <p>Edit Profile</p>
      <span></span>
    </a>

    <a href="logout.php" class="sub-menu-link">
      <img src="css/logout.png">
      <p>logout</p>
      <span></span>
    </a>
  </div>
</div> 
</nav>
    <br><br> <br>
    <div class="container">
        <div class="card" style="margin-bottom:5%">
            <div class="info">
                <span>Edit profile</span>
                <button id="savebutton">Edit</button>
            </div>
            <div class="forms" >
                <br> <br>
                <form method="POST">
                    <div class="inputs">
                        <span>First Name</span>
                        <input type="text" name="Fname" readonly value="<?php echo $user_data['Fname']; ?>">
                    </div>
                    <br>
                    <div class="inputs">
                        <span>Last Name</span>
                        <input type="text" name="Lname" readonly value="<?php echo $user_data['Lname']; ?>">
                    </div>
                    <br>
                    <div class="inputs">
                        <span>Email</span>
                        <input type="text" name="user_name" readonly value="<?php echo $user_data['user_name']; ?>">
                    </div>
                    <br>
                    <div class="inputs">
                        <span>Phone Number:</span>
                        <input type="text" name="PhoneNo" readonly value="<?php echo $user_data['PhoneNo']; ?>">
                    </div>
                    <br>
                    <div class="inputs">
                        <span>Password:</span>
                        <input type="password" name="password" readonly value="<?php echo $user_data['password']; ?>">
                    </div>
                    <br>
                    <input type="submit" onclick="myFunction()" value="Save" style="display: none; background:#000; color:white; width:80px; height:30px; font-size:large; border-radius:5px" id="saveBtn">
                </form>
            </div>
        </div>
    </div>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        };

        var savebutton = document.getElementById('savebutton');
        var readonly = true;
        var inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
        
        savebutton.addEventListener('click', function() {
            
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].toggleAttribute('readonly');
            }
            var saveBtn = document.getElementById('saveBtn');
            if (savebutton.innerHTML == "Edit") {
                savebutton.innerHTML = "Cancel";
                saveBtn.style.display = "inline";
            } else {
                savebutton.innerHTML = "Edit";
                saveBtn.style.display = "none";
            }
        });
        
        var myFunction = function() {
  alert("Changes are saved successfully");
};
    </script>
</body>

</html>
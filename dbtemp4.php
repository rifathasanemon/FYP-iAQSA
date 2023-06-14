<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con1);

// Retrieve all data from the database
$query = "SELECT * FROM template_4";
$result = mysqli_query($con2, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php
// Assuming you have a function to get the user data based on the logged-in user's ID
function getUserData() {
    $user_id = $_SESSION['user_id'];

    // Assuming you store the user ID in the session variable

    // Replace this with your own code to fetch user data from the database based on the user ID
    // Example code:
    include("connection.php");

    $query = "SELECT * FROM signup WHERE user_id = '$user_id'";
    $result = mysqli_query($con1, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
    } else {
        // Handle the case where user data is not found
        return null;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        <?php include 'CSS/style.css'; ?>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        table, th, td {
            border-collapse: collapse;
            background-color: whitesmoke;
            padding: 15px;
            border: 1px  #87858555 solid;
        }
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}
li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

    </style>
           <?php
        $user_data = getUserData(); // Assuming you have a function to fetch the user data
        ?>
</head>



<body class="bg1">
<nav>
<img src="css/logo.png" class="logo">   
<ul style="margin-left:40%;">
<li><a href="#" class="active">Dashboard</a></li>
<li><a href="aboutLect.php">About Us</a></li>
</ul>
<img src="css/user.png"  class="user-pic" onclick="toggleMenu()">  

<div class="sub-menu-wrap" id="subMenu">
  <div class="sub-menu">
    <div class="user-info">
      <img src="css/user2.png" style="background: whitesmoke;">
      <h3><?php echo $user_data['Fname']; ?></h3>
    </div>
    <hr>
    
    <a href="profileLect.php" class="sub-menu-link">
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
<br><br> <br><br>
<!--.....................................................................................-->

<div class="container mt-5">
        <caption style="position: center;">
    <strong><h2 class="strokeme" style="margin-top: 5%; color:white; outline: 3px solid #f0f0f0;">
    All step 4 Submissions:
</h2></strong>
</caption>
 <ul>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dashboard.php';" value="Step 1" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp2.php';" value="Step 2" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp3.php';" value="Step 3" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" class="active btn " value="Step 4" style="  background-color: whitesmoke; width:100px;border-radius: 15px 0 15px 0; "></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp5.php';" value="Step 5" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp6.php';" value="Step 6" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp7.php';" value="Step 7" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp8.php';" value="Step 8" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp9.php';" value="Step 9" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
</ul>
    <?php if (count($data) > 0) : ?>
        <table style=" margin-right:20%; margin-bottom:7%">
            <thead>
                <tr>
                <th>Student Name</th>
                    <th>RQ</th>
                    <th>IQ</th>
                    <th>I1</th>
                    <th>I2</th>
                    <th>I3</th>
                    <th>Subthemes</th>
                    <th>Themes</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                    <td><?php echo $row['Fname'], '&nbsp', $row['Lname']; ?></td>
                        <td><?php echo $row['RQ']; ?></td>
                        <td><?php echo $row['IQ']; ?></td>
                        <td><?php echo $row['I1']; ?></td>
                        <td><?php echo $row['I2']; ?></td>
                        <td><?php echo $row['I3']; ?></td>
                        <td><?php echo $row['subthemes']; ?></td>
                        <td><?php echo $row['themes']; ?></td>
                        <td>
                                <a href="mailto:<?php echo $row['user_name']; ?>?subject=Feedback%20for%20Step%204">
                                    <button id="fd" class="btn btn-primary" >Feedback</button>
                                </a>
                            </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No data available.</p>
    <?php endif; ?>
</body>

</html>
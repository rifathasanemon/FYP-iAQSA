<?php
session_start();

include("connection.php");
include("functions.php");

// Retrieve all data from the template_1 table
$query = "SELECT * FROM template_1";
$result_template_1 = mysqli_query($con2, $query);
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
    All step 1 Submissions:
</h2></strong>
</caption>
 <ul>
<li><input type="button" class="active btn " value="Step 1" style="  background-color: whitesmoke; width:100px;border-radius: 15px 0 15px 0; "></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp2.php';" value="Step 2" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp3.php';" value="Step 3" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp4.php';" value="Step 4" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp5.php';" value="Step 5" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp6.php';" value="Step 6" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp7.php';" value="Step 7" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp8.php';" value="Step 8" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
<li><input type="button" id="fd" class="btn btn-primary" onclick ="window.location.href='dbtemp9.php';" value="Step 9" style=" width:100px;border-radius: 15px 0 15px 0;"></li>
</ul>
        <?php if (mysqli_num_rows($result_template_1) > 0) : ?>
          <table style=" margin-right:20%; margin-bottom:7%">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Issue</th>
                        <th>Central Phenomenon</th>
                        <th>Purpose Statement</th>
                        <th>Central Research Question</th>
                        <th>Research Questions</th>
                        <th>Interview Questions</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($template = mysqli_fetch_assoc($result_template_1)) : ?>
                        <tr>
                            <td><?php echo $template['Fname'], '&nbsp', $template['Lname']; ?></td>
                            <td><?php echo $template['Issue']; ?></td>
                            <td><?php echo $template['Central_Phenomenon']; ?></td>
                            <td><?php echo $template['Purpose_Statement']; ?></td>
                            <td><?php echo $template['CRQ']; ?></td>
                            <td><?php echo $template['RQs']; ?></td>
                            <td><?php echo $template['IQs']; ?></td>
                            <td>
                                <a href="mailto:<?php echo $template['user_name']; ?>?subject=Feedback%20for%20Step%201">
                                    <button id="fd" class="btn btn-primary" >Feedback</button>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No submissions are found.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-gqau/DAajrACfSJIKb1X7+Ic9ETdXHk1VMXX2BASpUrLDRkmP27R3AsyHLq8efoY" crossorigin="anonymous"></script>
    <script>
  let subMenu = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

</script>
</body>

</html>
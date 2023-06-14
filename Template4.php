<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con1);


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_id=$user_data['user_id'];
    $user_name=$user_data['user_name'];
    $Fname = $user_data['Fname'];
    $Lname = $user_data['Lname'];
    $RQ = $_POST['RQ'];
    $IQ = $_POST['IQ'];
    $I1 = $_POST['I1'];
    $I2 = $_POST['I2'];
    $I3 = $_POST['I3'];
    $subthemes =$_POST['subthemes'];
    $themes =$_POST['themes'];


    if(!empty($RQ) && !empty($IQ)&& !empty($I1) && !empty($I2) && !empty($I3)&& !empty($subthemes)&& !empty($themes))
    {

        //save to database        
        $query = "insert into template_4 (user_id, user_name, Fname, Lname, RQ, IQ, I1, I2, I3, subthemes, themes) values ('$user_id', '$user_name', '$Fname', '$Lname', '$RQ', '$IQ', '$I1', '$I2', '$I3', '$subthemes', '$themes')";

        mysqli_query($con2, $query);

        // Display alert after successful form submission
        echo '<script>
            alert("Form submitted successfully!");
            window.location.href = "proposal.php";
        </script>';        die;
    }else
    {
        echo "You are required to fill all fields.";
    }
}
?>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
  <?php include 'CSS/style.css'; ?>
  </style>
  <style type="text/css">

</style>
<link rel = "icon" href ="css/logo.png" class="titleLogo">
</head>


<body class="bg">
<nav>
<img src="css/logo.png" class="logo">   
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="search.php">Search</a></li>
<li><a class="active" href="proposal.php">Proposal</a></li>
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
<br><br> <br><br><br><br>
<!--.....................................................................................-->
<div class="container">
        <div class="form-container">
        <label style="margin-left: 65%; margin-bottom:2%;">
                    <input class="btn" type= "button" onclick ="window.location.href='proposal.php';" value="back" style="background-color: rgb(105, 105, 105); color:whitesmoke; width:100px">
                </label>
<form class="form-style-4 form-container" style="margin-left: 30%; margin-bottom:5%;" action="" method="post">
<caption>
    <p style=" color:white;">
Step 4 to submit the form to the lecturar you must fill up all the fields:</p> <p style="color:whitesmoke"><br> 
NOTE: in case you didn't understand any of the questions refere to guidelines for an example.</p>
  <hr style="  border-top: 1px dashed black;"><br>
</caption>
<label for="field1">
<span>Research question:</span><textarea name="RQ" onkeyup="adjust_textarea(this)" required="true"></textarea>
</label>
<label for="field2">
<span>What is the interview question?</span><textarea name="IQ" onkeyup="adjust_textarea(this)" required="true"></textarea>
</label>
<label for="field3">
<span>Who is informant 1?</span><textarea name="I1" onkeyup="adjust_textarea(this)" required="true"></textarea>
</label>
<label for="field3">
<span>Who is informant 2?</span><textarea name="I2" onkeyup="adjust_textarea(this)"></textarea>
</label>
<label for="field3">
<span>Who is informant 3?</span><textarea name="I3" onkeyup="adjust_textarea(this)"></textarea>
</label>
<label for="field4">
<span>determine the subthemes:</span><textarea name="subthemes" onkeyup="adjust_textarea(this)" required="true"></textarea>
</label>
<label for="field4">
<span>determine the themes:</span><textarea name="themes" onkeyup="adjust_textarea(this)" required="true"></textarea>
</label>
<label>
<span> </span><input type="submit" value="Submit" style="margin-left: 43%;" />
</label><br>

</form>
    <!--....................................................................................-->
<script>
  let subMenu = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
};

//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
</body>
</html>
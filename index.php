<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con1);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <style>
  <?php include 'CSS/style.css';?>
  
table{
  margin: auto;
margin-bottom: 10%;
}
table, th, td {
  border: none;
  border-radius: 0px 15px 15px 0px;
  color:#ddd;
  margin-top: 10%;
}
</style>
<link rel = "icon" href ="css/logo.png" class="titleLogo">
</head>


<body class="bg">
<nav>
<img src="css/logo.png" class="logo">   
<ul>
<li><a class="active" href="#home">Home</a></li>
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

<table>
  <colgroup>
    <col id="col1">
    <col id="col2">
  </colgroup>
  <tr>
    <th><a href="search.php"><img id="search" src="css/search.jpg" alt="search"></th></a>
    <th><a href="search.php">
      <h3 class="txt">Search</h3> <hr>
      <br> <br>
      <p class="txt">The search page will help you in searching for the right and most authentic references.</p>
      <br> <br>
    </th>
  </tr></a>
  <tr>
    <td><a href="proposal.php"><img id="prop" src="css/proposal.jpg" alt="proposal"></a></td>
    <td><a href="proposal.php">
    <h3 class="txt">Proposal</h3> <hr>
    <br> <br>
    <strong><p class="txt">The proposal page will help you in writing your proposal in the right way.</p></strong>
<br> <br>
</a></td>
  </tr></a>
</table>

<script>
  let subMenu = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}
</script>
</body>
</html>
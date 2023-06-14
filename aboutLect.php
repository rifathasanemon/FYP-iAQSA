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
    <title>About Us</title>
    <style>
      <?php include 'css/style.css'; ?>
      table, th, td {
  border: 2px;
  border-radius: 20px 20px 20px 20px;
  text-align: center;
}
img {
  border-radius: 20px;
}
table, tr, th, p{
  font-size:  15px;
}
</style>
<link rel = "icon" href ="css/logo.png" class="titleLogo">
</head>


<body class="bg1">
<nav>
<img src="css/logo.png" class="logo">   
<ul style="margin-left:40%;">
<li><a href="Dashboard.php">Dashboard</a></li>
<li><a href="#" class="active">About Us</a></li>
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
<div class="about-section ">
  <h1 style="font-size:  27px;">About Us</h1> <br>
  <p>This is a FYP project about creating an islamic qualitative research website that helps researchers in guiding them through the whole process.</p><br>
  <h1 style="text-align:center; font-size:  27px;">Our Team</h1>
</div>

<table style="color:white; background-color:rgba(98, 96, 96, 0.877); width:35%; margin-left:15%;  animation: mymove 3s; animation-fill-mode: forwards;">
  <tr>
    <th style="width: 200px"><img src="css/amnahformal.jpeg" alt="Amnah" style="width: 150px; margin-right:35%; text-align: center;" ></th>
    <th style="width: 300px;   text-align: center;">
    <h4 style="font-size:  16px;">Amnah Salah Majzob Abdelmaged</h4>
        <p class="titleabt">Developer & Data scientist</p><br>
        <p>student in IIUM KICT.</p><br>
        <p>Moonuseonly@gmail.com</p><br>
    </th>
  </tr>
</table>

<table style="color:white; background-color:rgba(98, 96, 96, 0.877); width:35%; margin-left:50%; animation: mymove 5s; animation-fill-mode: forwards;">
  <tr>
  <th style="width: 300px">
  <h4 style="font-size:  16px;">Emon hassan</h4>
        <p class="titleabt">Developer & Data scientist</p><br>
        <p>student in IIUM KICT.</p><br>
        <p>emon24721@gmail.com</p><br>
    </th>
    <th><img src="css/emonformal.jpg" alt="emon" style="width: 170px; margin-left:25%;"></th>
  </tr>
</table>

<table style="color:white; background-color:rgba(98, 96, 96, 0.877); width:35%; margin-left:15%;  animation: mymove 7s; animation-fill-mode: forwards;">
  <tr>
    <th><img src="css/iium.png" alt="Norsaremah" style="width: 200px; margin-left:-10%;"></th>
    <th style="width: 300px">
    <h4 style="font-size:  17px;">Assoc.Prof.Dr. Norsaremah Salleh</h4>
        <p class="titleabt">suppervisor</p><br>
        <p>coordinated all aspects of a project.</p><br>
        <p>norsaremah@iium.edu.my</p><br>
    </th>
  </tr>
</table>

<table style="color:white; background-color:rgba(98, 96, 96, 0.877); width:35%; margin-left:50%; margin-bottom: 5%; animation: mymove 9s; animation-fill-mode: forwards;">
  <tr>
  <th style="width: 300px">
  <h4 style="font-size:  15px;">Prof. Dr.Ismail bin Sheikh Ahmed</h4>
        <p class="titleabt">Authorizing party</p><br>
        <p>All sources were authorized by profitionals in IIUM.</p><br>
        <p>webmaster@iium.edu.my</p><br>
    </th>
    <th><img src="css/iium.png" alt="Ismail" style="width: 200px;"></th>
  </tr>
</table>
<!--..........................................................................................................................-->


<script>
  let subMenu = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

</script>
</body>
</html>
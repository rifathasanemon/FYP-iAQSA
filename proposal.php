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
    <title>Proposal</title>
    <style type="text/css">
  <?php include 'CSS/style.css';?>
  
table{
margin: auto;
margin-bottom: 10%;
}
table, td {
  background-color:rgba(0, 0, 0, 0.588);
  width: 1000px;
  border: 10px black;
  border-collapse:separate;

}
table, th, td {
  border: 2px solid black;
  border-radius: 0px 20px 20px 0px;
}
table tr th img{
  width:200px; 
  height:150px;
}
#col2{
  width: 30%;
}
p{
  color: white;
}


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

<!--.....................................................................................-->
<table style="  border: 10px white;">
  <caption>
    <strong><h2 class="strokeme" style="margin-top: 15%; color:white; outline: 3px solid #f0f0f0;">
  choose the step you want to fill:</h2></strong>
</caption>
  <tr>
    <th>
    <a href="Template1.php"><img src="css/template1.jpg" alt="template1"></a>
    </th>
    <a><th style="border:none;"><a href="Template1.php"><p>Step 1: Qualitative Research Proposal. </p></a></th>

    <th>
    <a href="Template2.php"><img src="css/template2.png" alt="template2">
  </a>
    </th>
    <th style="border:none;"><a href="Template2.php"><p>Step 2: Interview Transcription. </p></a></th>
  </tr>

<tr>
    <th>
    <a href="Template3.php"><img src="css/template3.png" alt="template3">
  </a>
    </th>
    <th style="border:none;"><a href="Template3.php"><p>Step 3: A 7-column-template tabling the key points of the transcription into main ideas. </p></a></th>

    <th>
    <a href="Template4.php"><img src="css/template4.jpg" alt="template4">
  </a>
    </th>
    <th style="border:none;"><a href="Template4.php"><p>Step 4: change the main ideas into themes. </p></a></th>
  </tr>

  <tr>
    <th>
    <a href="Template5.php"><img src="css/template5.jpg" alt="template5">
  </a>
    </th>
    
    <th style="border:none;"><a href="Template5.php"><p>Step 5: Inter-rater Reliability Agreement. </p></a></th>

    <th>
    <a href="Template6.php"><img src="css/template6.jpg" alt="template6">
  </a>
    </th>
    <th style="border:none;"><a href="Template6.php"><p>Step 6: Calculation of Inter-rater Agreement. </p></a></th>
</tr>
<tr>
    <th >
    <a href="Template7.php"><img src="css/template7.jpg" alt="template7">
  </a>
    </th>
    <th style="border:none;"><a href="Template7.php"><p>Step 7: Interview Protocol. </p></a></th>

    <th >
    <a href="Template8.php"><img src="css/template8.png" alt="template8">
  </a>
    </th>
    <th style="border:none;"><a href="Template8.php"><p>Step 8: Consent To Serve As A Participant For This Qualitative. </p></a></th>
</tr>
<tr>
    <th>
    <a href="Template9.php"><img src="css/template9.jpg" alt="template9">
  </a>
    </th>
    <th style="border:none;"><a href="Template9.php"><p>Step 9: Informed Consent Form. </p></a></th>
  </tr>
</table>
<!--....................................................................................-->

<script>
  let subMenu = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>
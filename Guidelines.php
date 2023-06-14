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
    <title>Guidelines</title>
    <style>
  <?php include 'CSS/style.css';?>
  
  
  table{
margin: auto;
margin-bottom: 10%;
}
table, td {
  background-color:rgba(0, 0, 0, 0.588);
  width: 1000px;
  border-collapse:separate;

}
table, th, td {
  border-radius: 0px 20px 20px 0px;
}
table tr th img{
  width:200px; 
  height:150px;
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
<li><a href="proposal.php">Proposal</a></li>
<li><a class="active" href="#Guidelines">Guidelines</a></li>
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
<table>
  <caption>
    <p class="strokeme" style="margin-top: 15%; font-size:27px; color:white; outline: 3px solid #f0f0f0;">Welcome to the Guidelines page. <br>In this page we are providing you with solved examples of the templates used in the proposal.</p>
  <hr><br>
</caption>
  <tr>
    <th>
    <a target="_blank" href="css/template1.jpg">
    <img src="css/template1.jpg" alt="template1">
  </a>
    </th>
    <th>    <a target="_blank" href="css/template1.jpg">
<p>Sample of Step 1: Qualitative Research Proposal. </p>  </a>
</th>
 
    <th>
    <a target="_blank" href="css/template2.png">
    <img src="css/template2.png" alt="template2">
  </a>
    </th>
    <th>
    <a target="_blank" href="css/template2.png">
<p>Sample of Step 2: Interview Transcription. </p></a></th>
  </tr>

  
  <tr>
    <th>
    <a target="_blank" href="css/template3.png">
    <img src="css/template3.png" alt="template3">
  </a>
    </th>
    <th>    <a target="_blank" href="css/template3.png">
<p>Sample of Step 3: A 7-column-template tabling the key points of the transcription into main ideas. </p>  </a>
</th>

    <th>
    <a target="_blank" href="css/template4.jpg">
    <img src="css/template4.jpg" alt="template4">
  </a>
    </th>
    <th>    <a target="_blank" href="css/template4.jpg">
<p>Sample of Step 4: change the main ideas into themes. </p>  </a>
</th>
  </tr>

  
  <tr>
    <th>
    <a target="_blank" href="css/template5.jpg">
    <img src="css/template5.jpg" alt="template5">
  </a>
    </th>
    <th>    <a target="_blank" href="css/template5.jpg">
<p>Sample of Step 5: Inter-rater Reliability Agreement. </p>  </a>
</th>

    <th>
    <a target="_blank" href="css/template6.jpg">
    <img src="css/template6.jpg" alt="template6">
  </a>
    </th>
    <th>    <a target="_blank" href="css/template6.jpg">
<p>Sample of Step 6: Calculation of Inter-rater Agreement. </p>  </a>
</th>
  </tr>

  
  <tr>
    <th>
    <a target="_blank" href="css/template7.jpg">
    <img src="css/template7.jpg" alt="template7">
  </a>
    </th>
    <th>    <a target="_blank" href="css/template7.jpg">
<p>Sample of Step 7: Interview Protocol. </p>  </a>
</th>

    <th>
    <a target="_blank" href="css/template8.png">
    <img src="css/template8.png" alt="template8">
  </a>
    </th>
    <th>    <a target="_blank" href="css/template8.png">
<p>Sample of Step 8: Consent To Serve As A Participant For This Qualitative. </p>  </a>
</th>
  </tr>

  <tr>
    <th>
    <a target="_blank" href="css/template9.jpg">
    <img src="css/template9.jpg" alt="template9">
  </a>
    </th>
    <th>    <a target="_blank" href="css/template9.jpg">
<p>Sample of Step 9: Informed Consent Form. </p>  </a>
</th>
  </tr>
</table>

<script>
  let subMenu = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}
</script>
</body>
</html>
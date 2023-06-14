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
    $Fname=$user_data['Fname'];
    $Lname=$user_data['Lname'];
    $noAgreement1 = $_POST['noAgreement1'];
    $noResponse1 = $_POST['noResponse1'];
    $noAgreement2 = $_POST['noAgreement2'];
    $noResponse2 = $_POST['noResponse2'];




    if(!empty($noAgreement1) && !empty($noResponse1) && !empty($noAgreement2) && !empty($noResponse2))
    {

        //save to database        
        $query = "insert into template_6 (user_id, user_name, Fname, Lname, noAgreement1, noResponse1, noAgreement2, noResponse2) values ('$user_id' , '$user_name','$Fname', '$Lname', '$noAgreement1', '$noResponse1','$noAgreement2', '$noResponse2')";

        mysqli_query($con2, $query);

        // Display alert after successful form submission
        echo '<script>
            alert("Form submitted successfully!");
            window.location.href = "proposal.php";
        </script>';
                die;
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
    <title>Step 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
  <?php include 'CSS/style.css'; ?>
  
.form-style{
	width: 600px;
	font-size: 16px;
	background: #151515a7;
	padding: 30px 30px 15px 30px;
	border: 5px solid #0a0a0a89;
}
.form-style input[type=submit],
.form-style input[type=button],
.form-style label
{
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 16px;
	color: #fff;

}
.form-style label {
	display:block;
	margin-bottom: 10px;
}
.form-style label > span{
	display: inline-block;
	width: 500px;
}


.form-style input[type=submit],
.form-style input[type=button]{
	background: rgb(248, 245, 245);
	border: none;
	padding: 8px 10px 8px 10px;
	border-radius: 5px;
	color: black;
}
.form-style input[type=submit]:hover,
.form-style input[type=button]:hover{
background: #565758;
}
input{
  border-radius: 5px;
}

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
<form class="form-style form-container" style="margin-left: 30%; margin-bottom:5%; " action="" method="post">
<caption>
    <p style=" color:white;">
    This is step 6 it will help you to calculate Percentage (%) of Agreement</p> <p style="color:whitesmoke"><br> NOTE: in case you didn't understand how to fill the form refere to guidelines for an example.</p>
  <hr style="  border-top: 1px dashed black;">
</caption>
<TABLE style="color:whitesmoke; margin-left:30%">
    <tr>
    <td><label>Number of agreement:</label></td>
    <td><input type="number" id="agreement1" name="noAgreement1" min="0" max="999" value=""></td>
    </tr>
<br>
    <tr>
    <td><label>Number of Responses:</label></td>
    <td><input type="number" id="Responses1" name="noResponse1" min="0" max="999" value=""></td>
    </tr>
    <br>
    <tr>
    <td><label>Number of agreement:</label></td>
    <td><input type="number" id="agreement2" name="noAgreement2" min="0" max="999" value=""></td>
    </tr>
<br>
    <tr>
    <td><label>Number of Responses:</label></td>
    <td><input type="number" id="Responses2" name="noResponse2" min="0" max="999" value=""></td>
    </tr>
    <tr>
</table>
    <br>
    <input type="button" value="Calculate"
        onclick="calculator()" style="margin-left:42%">

    <hr>
    <label><div id="inter_rater1" name="inter_rater1" style="height: 50px; width: 100%; margin-left:30%">
</div></label>
    <label id="inter_rater2" name="inter_rater2" style="height: 50px; width: 100%; margin-left:30%"></label>
    <label id="average" name="average" style="height: 50px; width: 100%; margin-left:30%"></label>
<label>
<span> </span><span> </span><input type="submit" value="Submit" style="margin-left: 43%;" />
</label><br>

</form>



    <script type="text/javascript">

        function calculator()
        {
            var interrater1=(document.getElementById('agreement1').value/document.getElementById('Responses1').value)*100;
            var interrater2=(document.getElementById('agreement2').value/document.getElementById('Responses2').value)*100;
            var totalagree=parseInt(document.getElementById('agreement1').value)+parseInt(document.getElementById('agreement2').value);
            var totalresp=parseInt(document.getElementById('Responses1').value)+parseInt(document.getElementById('Responses2').value);
            var average=(totalagree/totalresp)*100;

            var display1=document.getElementById('inter_rater1');
            var display2=document.getElementById('inter_rater2');
            var display3=document.getElementById('average');


            display1.innerHTML='Inter-rater 1: ' +interrater1.toFixed(1)+'%';
            display2.innerHTML='Inter-rater 2: ' +interrater2.toFixed(1)+'%';
            display3.innerHTML='Average: ' +average.toFixed(1)+'%';

        }
    </script>
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
document.addEventListener('focusout', function(event){
    presentagae()
});
 
function presentagae() {
  let inter1Agree = document.getElementById("inter1Agree");
  let inter1Resp = document.getElementById("inter1Resp");
  let result = document.getElementById("result");
  inter1Resp = inter1Resp.value
  inter1Agree= inter1Agree.value
    
  if(inter1Resp>0 && inter1Agree>0){
     let tp = (inter1Agree/inter1Resp)*100;
     result.value=tp.toFixed(2);
  }else{
    result.value=""
    }
 }
</script>
</body>
</html>
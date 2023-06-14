<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con1);

if (isset($_POST['submit'])) {
    $user_id=$user_data['user_id'];
    $pdf_file = $_FILES['pdf_file'];

    // Check if file was uploaded without errors
    if ($pdf_file['error'] === UPLOAD_ERR_OK) {
        $filename = $pdf_file['name'];
        $filetype = $pdf_file['type'];
        $filedata = file_get_contents($pdf_file['tmp_name']);

        // Get the user ID from the user_data
        $Fname = $user_data['Fname'];
        $Lname = $user_data['Lname'];
        $user_name = $user_data['user_name'];


        // Prepare the SQL statement to insert the file into the template9 table
        $stmt = $con2->prepare("INSERT INTO template9 (user_id, Fname, Lname, user_name, filename, filetype, filedata) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $user_id, $Fname, $Lname, $user_name, $filename, $filetype, $filedata);
        $stmt->execute();
        $stmt->close();

        // Display alert after successful form submission
        echo '<script>
            alert("Form uploaded successfully!");
            window.location.href = "proposal.php";
        </script>';
        exit();
    } else {
        echo "Error uploading file. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
  <?php include 'CSS/style.css'; ?>
    </style>
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
<form class="form-style-4 form-container" action="" method="post" enctype="multipart/form-data" style="margin-left: 30%; margin-bottom:5%;">
<h3>Upload File</h3>

                <label for="file">
                    <span>Click "<a href="Template9.pdf" download="Template9.pdf" style="direction:none; color:lightblue;"><strong>Template9.pdf</strong></a>" to download the template.</span>
                </label>
                <br>
                <label for="file">
                    <span>
                        <input type="file" id="file" name="pdf_file">
                    </span>
                </label>
                <br><br>
                <label>
                    <span></span>
                    <input type="submit" name="submit" value="Submit" style="margin-left: 44%;">
                </label>
                <br>
            </form>
        </div>
    </div>
<!--.....................................................................................-->
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



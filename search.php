<?php
session_start();

include("connection.php");
include("functions.php");

// Check user authentication
$user_data = check_login($con1);

// Initialize variables
$searchResults = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get search keywords from the form
  $keyword1 = $_POST['keyword1'];
  $keyword2 = $_POST['keyword2'];
  $keyword3 = $_POST['keyword3'];
  $keyword4 = $_POST['keyword4'];
  $keyword5 = $_POST['keyword5'];

  // Create an array of keywords
  $keywords = array($keyword1, $keyword2, $keyword3, $keyword4, $keyword5);
  $searchKeywords = array_filter($keywords); // Remove empty keywords

  // Check if any search keywords are provided
  if (!empty($searchKeywords)) {
    // Prepare the SQL query
    $sql = "SELECT * FROM links WHERE ";
    $conditions = [];
    $params = [];
    foreach ($searchKeywords as $index => $keyword) {
      $conditions[] = "title LIKE ?";
      $params[] = "%" . $keyword . "%";
    }
    $sql .= implode(" OR ", $conditions);

    // Execute the SQL query
    $stmt = $con1->prepare($sql);
    if ($stmt) {
      $stmt->bind_param(str_repeat("s", count($searchKeywords)), ...$params);
      $stmt->execute();

      // Get the search results
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
      }

      $stmt->close();
    } else {
      // Handle SQL query error
      echo "Error: " . $con1->error;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
  <style>
    <?php include 'CSS/style.css';?>
  </style>
  <link rel="icon" href="css/logo.png" class="titleLogo">
</head>
<body class="bg">
  <nav>
    <img src="css/logo.png" class="logo">   
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a class="active" href="search.php">Search</a></li>
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
          <p>Logout</p>
          <span></span>
        </a>
      </div>
    </div> 
  </nav>
  <br><br> <br>

  <div class="container mt-5">
    <caption>
      <strong><h2 class="strokeme" style="width:600px; margin-left:30%; color:white; outline: 3px solid #f0f0f0;">Search:</h2></strong>
    </caption>
    <form class="form-style-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="margin: auto; margin-bottom: 10%;">
      <label for="keyword1">Keyword 1:</label>
      <input type="text" id="keyword1" name="keyword1" required><br><br>
      <label for="keyword2">Keyword 2:</label>
      <input type="text" id="keyword2" name="keyword2" required><br><br>
      <label for="keyword3">Keyword 3:</label>
      <input type="text" id="keyword3" name="keyword3" required><br><br>
      <label for="keyword4">Keyword 4:</label>
      <input type="text" id="keyword4" name="keyword4" ><br><br>
      <label for="keyword5">Keyword 5:</label>
      <input type="text" id="keyword5" name="keyword5" ><br><br>

      <input type="submit" value="Search"><br><br><br>

      <?php if (!empty($searchResults)): ?>
        <h3>Search Results</h3><br><br>
        <ul>
          <?php foreach ($searchResults as $result): ?>
            <li>
              <u style="color: aliceblue;">
                <a style="color:whitesmoke; position:center" href="<?php echo $result['url']; ?>">
                  <?php echo $result['title']; ?>
                </a>
              </u>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>No results found.</h3>
      <?php endif; ?>
    </form>
  </div>
  <br>


  <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
      subMenu.classList.toggle("open-menu");
    }
  </script>
</body>
</html>

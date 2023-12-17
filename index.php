<?php
    //include auth.php file on all secure pages
include("auth.php");
?>
<!doctype html>
<html>
<head>
    <title>Welcom Home</title>
</head>
<body>
<div class="form">
    <p>Welcom <?php echo $_SESSION['username'];?></p>
    <p>This is secure area.</p>
    <p><a href="dashboard.php">Dashboard</a></p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>

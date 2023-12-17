<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<?php
    require("db.php");
    if (isset($_POST['username'])) {
        // removes backslashes
        $username = stripcslashes($_REQUEST['username']);
        // escapes spcial characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT * FROM `users` WHERE username = '$username' and password='" .
            md5($password) . "'";
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            //redirect user to index.php
            header("Location: index.php");
            exit();

        } else {
            echo "<div>
<h3>Username/password is incorrect </h3>
<br> Click here to <a href='login.php'>Login</a>
</div>";

        }
    }
    else{
        ?>

        <div class="form">
            <h2>Login</h2>
            <form action="" method="post" name="login">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required/>
                <input type="submit" name="submit" value="login">
            </form>
            <p>Not registered yet ? <a href="registration.php">Register Here</a></p>
        </div>

<?php
    }
?>
</body>
</html>
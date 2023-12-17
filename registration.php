<!DOCTYPE html>
<html>
<head>
    <title> Registration </title>

</head>
<body>
    <?php
    require ('db.php');
    if (isset($_REQUEST['username']))
    {
        //remove backslashes
        $username = stripcslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con,$username);
        $email =stripcslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);
        $password = stripcslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $trn_date = date("Y-m-d H:i:s");
        $query = "Insert into `users` (username,password,email,trn_date) VALUES ('$username','".md5($password)."','$email','$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<h3>YOu are registered successfully.</h3> <br> Click here to  <a href='login.php'> Login </a>";
        }
    }
        else{
            ?>
<div class="form">
    <h1>Registration Form</h1>
    <form name="Registration" action="" method="post">
        <input type="text" name="username" placeholder="Username" required/>
        <input type="email" name="email" placeholder="Email" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <input type="submit" name="submit" value="submit" required/>

    </form>

</div>

    <?php
    }
    ?>
</body>
</html>
<?php

require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>
        <script>
            alert("Opps! plz Enter Your Username and Pswd again..");
            window.open('index.php', '_self');
        </script> <?php
                } else {
                    $data = mysqli_fetch_assoc($run);
                    $id = $data['u_id'];    //fetch id value of user
                    $email = $data['email'];
                    $_SESSION['uid'] = $id;   //now we can use it until session destroy
                    $_SESSION['emm'] = $email;
                    ?>
        <script>
            alert("WELCOME 👋");
            window.open('home/home.php', '_self');
            // changes made here
        </script> <?php

                }
            }
                    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/i.jpg');
            background-repeat: no-repeat;
            background-size: 750px,750px;
        }
        p{
            background-color: #d2dae2;
            border-radius: 10px;
            padding:20px;
        }
        .row{
            padding-left:300px;
        }
    </style>
</head>

<body>
    <h1 align='center' style="margin: 15px; color:#c0392b;font-weight: bold;font-family:'Arial'">Need For Speed Courier Service</h1>
    <hr />
    <P align='center' style="font-weight: bold;color:#2f3542;font-size:30px;font-family:'Arial'">The Fastest Courier Service Ever</P>
    <div>
        <h5><a href="admin/adminlogin.php" style="float: right; margin-right:40px; color:blue; margin-top:0px">AdminLogin</a></h5>
    </div>
    <div class="container" style="margin-top: 60px; width:50%;">
        <div class="row">
            <div class="col-md-12">
                <strong><h2 style="color: #b71540;">Login</h2></strong>
                <p style="color:#e84118;">Please Fill Your ⮯⮯</p>
                <!-- <?php echo $error; ?> -->
                <form action="" method="post">
                    <div class="form-group">
                        <strong><label>Email Address</label></strong>
                        <input type="email" name="email" class="form-control" placeholder="Enter username/emailId" required />
                    </div>
                    <div class="form-group">
                       <strong> <label>Password</label></strong>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="SignIn" />
                        <!-- <button type="button" onclick="window.location='resetpswd.php';" class="btn btn-danger" style="cursor:pointer">Reset Password</button> -->
                    </div>
                    <p style="color: #e84118;">Don't have an account?⮞➤ <a href="register.php">Register here</a>.</p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
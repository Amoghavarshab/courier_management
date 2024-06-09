<!-- admin logIn page and login logic -->
<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <style>
        body {
            /*background-image: url('images/ss.avif');*/
            background-color: steelblue;
            color: #fff;
            font-family: 'Muli', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            margin: 0;
        }
        table
        {
           padding-bottom: 300px;
        }
    </style>
</head>
<body>
    <h3><a href="../index.php" style="float: right; margin-right:50px; color:#1e272e">BackToHome</a></h3><br>
    <h1 align='center' style="color: #f5f6fa;font-size:60px">Admin Login</h1>
    <h2 align='center' style="color: #212121;font-weight: bold;font-size:30 px;">Welcome Admin</h2>
    <form action="adminlogin.php" method="POST" style="margin: auto;">
        <table align="center">
            <tr>
                <td><strong>Email_ID:</strong></td>
                <td><input type="email" name="uname" require></td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
                <td><strong>Password:</strong></td>
                <td><input type="password" name="pass" require></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login" style="cursor: pointer;"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>
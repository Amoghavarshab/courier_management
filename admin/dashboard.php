<!-- admin dashbord page with options for admin -->

<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
}else{
    header('location: ../login.php');
}

?>

<?php
include('head.php');
?>

<style>
    body {
        background-image: url('../images/del.jpg');
        image-orientation: flip;
        /* background-size: auto; */
        background-size: 100% 105%;
        background-color: whitesmoke;
        }
        .admintitle{
            background-color: #227093;
        }
</style>

<div class="admintitle">
    <div>
    <h5 ><a href="../index.php" style="float: left; margin-left:20px; color:aliceblue;font-family:verdana;">LoginAsUser</a></h5>
    <h5 ><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;font-family:verdana;">LogOut</a></h5>
    </div>
    <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #f9829b;font-family:verdana;">Welcome To Admin Dashbord</h1>
</div>
<div align="center" style="margin-top:240px;">
<form style="position: centre ;color:#2C3A47;font-weight:bold;font-size:50px;font-family:verdana;">
    
    <!-- <a href="insertdata.php">Insert Data</a><br><br> -->

    <!-- <a href="updatedata.php">Update Data</a><br><br> -->

    <a href="deletedata.php">Delete Data</a><br><br>

    <a href="deleteusers.php">Delete Users</a><br><br>

    <a href="./get_log.php">Users Log</a><br><br>
</form>

</div>
</body>
</html>
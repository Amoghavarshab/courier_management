<!-- when admin click delete user link, it displays all users with delete option -->
<?php
session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}

?>

<?php
include('head.php');
?>

<div class="admintitle">
    <div>
        <h5><a href="dashboard.php" style="float: left; margin-left:20px; color:aliceblue;font-family:verdana;">BackToDashboard</a></h5>
        <h5><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;font-family:verdana;">LogOut</a></h5>
    </div>
    <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #f9829b;font-family:verdana;">Showing All Users</h1>
</div>
<div style="overflow-x:auto;">
    <table width='80%' border="1px solid" style="margin-left: auto; margin-right:auto;margin-top:30px; font-weight:bold;border-collapse: separate;">
        <tr style="background-color: #ffb142; color: black;">
            <th>No.</th>
            <th>Users Name</th>
            <th>Email Id</th>
            <th>Action</th>
        </tr>
        <?php

        include('../dbconnection.php');

        $qry = "SELECT * FROM `users`"; //AND `name` LIKE '%name%'
        $run = mysqli_query($dbcon, $qry);

        if (mysqli_num_rows($run) < 1) {
            echo "<tr><td colspan='6'>There is no Data in Database</td></tr>";
        } else {
            $count = 0;
            while ($data = mysqli_fetch_assoc($run)) {
                $count++;
        ?>
                <tr align="center" style="background-color: #f7f1e3">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><a href="usersdeleted.php?emm=<?php echo $data['email']; ?>">DeleteUser</a></td>
                </tr>
                <style>
                    body {
                        background-color: aliceblue;
                    }
                    .admintitle{
                        background-color: #227093;
                    }
                </style>
        <?php
            }
        }



        ?>

    </table>
</div>
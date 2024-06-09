<!-- when admin click show log link, it displays all users with log option -->

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
        <h5><a href="dashboard.php" style="float: left; margin-left:20px; color:aliceblue;">BackToDashboard</a></h5>
        <h5><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;">LogOut</a></h5>
    </div>
    <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #f9829b;">Showing All Users</h1>
</div>
<div style="overflow-x:auto;">
    <table width='80%' border="1px solid" style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold; border-collapse: separate ;">
        <tr style="background-color: indigo;">
            <th>No.</th>
            <th>User Name</th>
            <th>User ID</th>
            <th>Email ID</th>
            <th>Action </th>
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
                <tr align="center" style="background-color: #f7f1e3" >
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['u_id']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><h3><a href="get_log.php" ?uid=<?php echo $data['u_id']; ?>>User Log</a></h3></td>
                </tr>
                <style>
                    body {
                        background-color: aliceblue;
                    }
                </style>
        <?php
            }
        }
        ?>

    </table>
</div>
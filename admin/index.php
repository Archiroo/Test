<?php
include('../config/header.php');
?>
<div class="main">
    <div class="container">
        <h2 class="heading">Dashboard</h2>
        <div class="row">
            <div class="col">
                <?php
                    $sql1 = "SELECT * FROM db_user";
                    $res1 = mysqli_query($con, $sql1);
                    $count1 = mysqli_num_rows($res1);
                ?>
                <h2><?php echo $count1 ?></h2>
                <h4>Admin</h4>
            </div>
            <div class="col">
                <?php
                    $sql2 = "SELECT * FROM db_office";
                    $res2 = mysqli_query($con, $sql2);
                    $count2 = mysqli_num_rows($res2);
                ?>
                <h2><?php echo $count2 ?></h2>
                <h4>Office</h4>
            </div>
            <div class="col">
                <?php
                    $sql3 = "SELECT * FROM db_employees";
                    $res3 = mysqli_query($con, $sql3);
                    $count3 = mysqli_num_rows($res3);
                ?>
                <h2><?php echo $count3?></h2>
                <h4>Employees</h4>
            </div>
        </div>
    </div>
</div>

<?php
include('../config/footer.php');
?>
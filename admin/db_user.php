<?php
include('../config/header.php');
?>
<div class="main">
    <div class="container">
        <h2 class="heading">Manage User</h2>
        <a href="<?php echo SITEURL; ?>admin/add_user.php" class="btn btn-add">Add user</a>
        <table class="table align-middle">
            <tr>
                <th class="col-md-1">STT</th>
                <th class="col-md-3.5">Họ Tên</th>
                <th class="col-md-3.5">Email</th>
                <th class="col-md-2">Sửa</th>
                <th class="col-md-2">Xóa</th>
            </tr>
            <?php
                $sql = "SELECT * FROM db_user";
                $res = mysqli_query($con, $sql);
                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);
                    $stt = 1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $usesr_id = $row['user_id'];
                            $name = $row['user_name'];
                            $email = $row['user_email'];
            ?>
                           <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td>
                                    <a href="add_user.php?user_id=<?php echo $usesr_id; ?>">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="delete_user.php?user_id=<?php echo $usesr_id?>">
                                        <i class="fas fa-times delete"></i>
                                    </a>
                                </td>
                           </tr>
                           <?php
                        }
                    }
                    else{

                    }
                }
            ?>
    
        </table>
    </div>
</div>

<?php
include('../config/footer.php');
?>
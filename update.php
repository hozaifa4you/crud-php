<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php
    if (isset($_POST['showbtn'])) {
        $con = mysqli_connect('localhost', 'root', '', 'crud') or die('Database connection failed!');

        $stu_id = $_POST['sid'];

        $sql = "SELECT * FROM students WHERE s_id = '{$stu_id}'";
        $result =   mysqli_query($con, $sql) or die('Query unsuccessful.');
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
                <form class="post-form" action="updatedata.php" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="hidden" name="sid" value="<?php echo $row['s_id']; ?>" />
                        <input type="text" name="sname" value="<?php echo $row['s_name']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="saddress" value="<?php echo $row['s_address']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <?php
                        $sql1 = 'SELECT * FROM student_classes';
                        $result1 = mysqli_query($con, $sql1) or die('Query 1 failed!');
                        if (mysqli_num_rows($result1) > 0) {
                            echo '<select name="sclass">';
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                if ($row['s_class'] == $row1['c_id']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                                echo "<option {$selected} value='{$row1['c_id']}'>{$row1['c_name']}</option>";
                            }
                        }
                        echo '</select>';
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="sphone" value="<?php echo $row['s_phone']; ?>" />
                    </div>
                    <input class="submit" type="submit" value="Update" />
                </form>
    <?php }
        }
    } ?>
</div>
</div>
</body>

</html>
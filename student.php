<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/index.php?
 */
require 'admin/config.php';
require 'header.php';
?>

<?php 
if (empty($_SESSION['userdata'])) {
    echo "<script>alert('need to login first');</script>";
    echo "<script>window.location='index.php';</script>";
}
?>
<h2><center>Test avilable for you</center></h2>    
<table border=1px; align=center;>
            <tr><th>Test Name</th><th>Test action</th></tr>
            <?php
            $sql='SELECT * FROM test';
            $res=$con->query($sql);
            while ($row=$res->fetch_assoc()) {?>
              <tr>
              <td><?php echo $row['testname'];?></td>
              <td> <a href="tst.php?id=<?php echo $row['test_id'];?>">
              START TEST</a>
              </td>
              </tr>
        <?php 
            };
        ?>
    </html>
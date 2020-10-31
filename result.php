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
global $id;
$mr=1;
$yousecured=0;
$id=$_REQUEST['id'];
if (empty($_SESSION['userdata'])) {
    echo "<script>alert('login first')</script>";
    header('location:index.php');
}
$session=$_SESSION['sessionid'];
$a="SELECT * from answer where `test_id`='$id' && `sessionid`='$session'";
$result=mysqli_query($con, $a);
while ($rows=mysqli_fetch_assoc($result)) {
    if ($rows['userans']==$rows['crtans']) {
            $yousecured=$yousecured+$mr;
    }    
}
echo '<p>Your score out of 10 is'.$yousecured.'</p>';
?>
<?php require 'footer.php';?>
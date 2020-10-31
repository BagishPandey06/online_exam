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
global $id,$your_score;
$id=$_REQUEST['id'];
if (empty($_SESSION['userdata'])) {
    echo "<script>alert('login first')</script>";
    header('location:index.php');
}
$session=$_SESSION['sessionid'];
$sql="select * from answer where `test_id`=$id && `sessionid`=$session";
$result=$con->query($sql);
$count=num_rows($result);
if ($count>0) {
    while ($rows=$result->fetch_assoc()) {
       
        if ($rows['userans']==$rows['crtans']) {
            $your_score=$your_score+$mr;
        } 
    }
}
echo '<p>Your score out of 10 is'.$your_score.'</p>';
?>
<?php require 'footer.php';?>
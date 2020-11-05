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
global $id,$nopage,$tp,$sp,$qt,$opt1,$opt2,$opt3,$opt4,$ans,$userans,$Ans;
$id=$_REQUEST['id'];
$page=1;

if (empty($_SESSION['userdata'])) {
    echo "<script>alert('login first')</script>";
    header('location:index.php');
}
$session=$_SESSION['sessionid'];
if (isset($_GET['page'])) {
        $page=$_GET['page'];
        $page = mysqli_real_escape_string($con, $page);
        $page = htmlentities($page);
} else {
        $page=1;
}
    $nopage=1;
    $sp=($page-1)*$nopage;
if (isset($_POST['submit'])) {
        $qid=isset($_POST['quesid'])?$_POST['quesid']:'';
        $qt=isset($_POST['ques'])?$_POST['ques']:'';
        $opt1=isset($_POST['opt1'])?$_POST['opt1']:'';
        $opt2=isset($_POST['opt2'])?$_POST['opt2']:'';
        $opt3=isset($_POST['opt3'])?$_POST['opt3']:'';
        $opt4=isset($_POST['opt4'])?$_POST['opt4']:'';
        $ans=isset($_POST['ans'])?$_POST['ans']:'';
        $userans=$_POST['select'];
    $sql="INSERT into answer 
    (`id`,`sessionid`, `test_id`, 
    `que_id`,`question`,`opt1`, `opt2`,`opt3`,
    `opt4`,`crtans`,`userans`) 
    VALUES 
    ('".$_SESSION['userdata']['id']."','".$session."',
    '".$id."','".$qid."','".$qt."', 
    '".$opt1."','".$opt2."','".$opt3."',
    '".$opt4."','".$ans."','".$userans."')";
    if ($con-> query($sql) === true) {
        
    } else {
        $errors= array('input' => 'form', 'msg'=> $con->error);
    }
}
    $s="SELECT * from ques where `test_id`='".$id."'";
    $r=$con->query($s);
    $count=$r->num_rows;
    $tp=ceil($count/$nopage);
if ($page>$tp) {
    header("location:result.php?id=$id");   
}
$sql="SELECT * from ques where `test_id`='".$id."' limit $sp,$nopage ";
$result=$con->query($sql);
if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
        $qid=$row['que_id'];
        $qt=$row['question'];
        $opt1=$row['opt1'];
        $opt2=$row['opt2'];
        $opt3=$row['opt3'];
        $opt4=$row['opt4'];
        $ans=$row['crtans'];
?>
<form action="tst.php?page=<?php echo ($page+1);?>&id=<?php echo$id;?>" method=POST>
      <p>Q.<?php echo $qt;?></p>
      <p>
      <input type="hidden" name="quesid" value="<?php echo $qid;?>">
      <input type="hidden" name="ques"   value="<?php echo $qt;?>">
      <input type="hidden" name="opt1"   value="<?php echo $opt1;?>">
      <input type="hidden" name="opt2"   value="<?php echo $opt2;?>">
      <input type="hidden" name="opt3"   value="<?php echo $opt3;?>">
      <input type="hidden" name="opt4"   value="<?php echo $opt4;?>">
      <input type="hidden" name="ans"    value="<?php echo $ans;?>">
      <input type="hidden" name="select" value="0">

    <?php
        $sql2="SELECT * from answer where `sessionid`='".$session."' &&
       question='".$qt."'";
        $r=$con->query($sql2);
    if (mysqli_num_rows($r)>0) {
        while ($ro=$r->fetch_assoc()) {
                $Ans=$ro['userans'];
        }
    }
    ?>
    <input type="radio" name="select" value="1" id="opt1" <?php if ($Ans==1) :?>
    checked<?php endif;?>><?php echo $opt1;?><br>
    <input type="radio" name="select" value="2" id="opt2" <?php if ($Ans==2) :?>
    checked<?php endif;?>><?php echo $opt2;?><br>
    <input type="radio" name="select" value="3" id='opt3' <?php if ($Ans==3) :?>
    checked<?php endif?>><?php echo $opt3;?><br>
    <input type="radio" name="select" value="4" id="opt4" <?php if ($Ans==4) :?>
    checked<?php endif;?>><?php echo $opt4;?><br>
        <?php if ($page ==1) :?>
        <input  type="submit" name="submit" value="Next">
        <?php endif; ?>
        <?php if ($page>1 && $page!=$tp) :?>
        <a  href='tst.php?page=<?php echo $page-1;?>&id=<?php echo $id?>'>
        Previous</a>
        <input  type="submit" name="submit" value="Next">
        <?php endif ?>
        <?php if ($page>1 && $page==$tp) :?>
         <a  href='tst.php?page=<?php echo $page-1;?>&id=<?php echo $id;?>'>
        Previous</a>
        <input  type="submit" name="submit" value="get result">
        <?php endif;?>
                </p>
</form>
                <?php 
    };
};
        ?>
    <?php
    require "footer.php";
    ?>
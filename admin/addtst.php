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
 require 'config.php';
 require 'header.php';
 $error=array();
 $message='';
if (isset($_POST['submit'])) {
    $testname=isset($_POST['testname'])?$_POST['testname']:'';
    $sql="select * from test where (`testname`='$testname');";

    $res=mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
   
        $row = mysqli_fetch_assoc($res);
        if ($testname==$row['testname']) {
            $error=array('input'=>'testname','msg'=>'testname already exsist');
        } 
    }
    if (sizeof($error) == 0) {
        $sql = 'INSERT INTO test(`testname`) 
                VALUES ("'.$testname.'")';
        if ($con->query($sql) === true) {
            $error=array('input'=>'form','msg'=>'data inserted');
        } else {
            $error=array('input'=>'form','msg'=>$con->error);
        }

    }
     $con->close();
}
?>

<div id="error">
    <?php if(sizeof($error) >0 ) :?>
  <ul>
    <?php foreach($error as $errors):?>
  <li>
<?php echo $error['msg']; break?>
  </li>
    <?php endforeach;?>
  </ul>
    <?php endif; ?>
  </div>
<form action="" method="post">
<p>
<label for="username">Test-name:<br>
<input type="text"name="testname"required>
</label>
</p>
<p>
<input type="submit" name="submit" class="btn"value="SUBMIT">
</p>
</form>
<?php require 'footer.php';?>
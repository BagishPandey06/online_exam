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
 $id=$_REQUEST["id"];
 $result =  "SELECT * FROM ques WHERE `que_id`=$id";
  $res = $con->query($result);
while ($ab = $res->fetch_assoc()) {
        $test_id = $ab['test_id'];
        $question = $ab['question'];
        $opt1 = $ab['opt1'];
        $opt2=$ab['opt2'];
        $opt3=$ab['opt3'];
        $opt4=$ab['opt4'];
        $crtans = $ab['crtans'];

}
if (isset($_POST['submit'])) {
    $que=isset($_POST['que'])?$_POST['que']:'';
    $opt1=isset($_POST['opt1'])?$_POST['opt1']:'';
    $opt2=isset($_POST['opt2'])?$_POST['opt2']:'';
    $opt3=isset($_POST['opt3'])?$_POST['opt3']:'';
    $opt4=isset($_POST['opt4'])?$_POST['opt4']:'';
    $correct=isset($_POST['correct'])?$_POST['correct']:'';
    if (sizeof($error) == 0) {
        $sql = "UPDATE ques SET `question`='$que',`opt1`='$opt1'
        ,`opt2`='$opt2',`opt3`='$opt3',`opt4`='$opt4',`crtans`='$correct'
        WHERE `que_id`=$id";
        if ($con->query($sql) === true) {
            $error=array('input'=>'form','msg'=>'data inserted');
            header('refresh:1');
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
<label for="question">Enter-question:<br>
<textarea name="que" required><?php echo $question;?></textarea>
</label>
</p>
<p>
<label for="option1">option1:<br>
<input type="text"name="opt1" value="<?php echo $opt1;?>"required>
</label>
</p>
<p>
<label for="option2">option2:<br>
<input type="text"name="opt2"value="<?php echo $opt2;?>"required>
</label>
</p>
<p>
<label for="option3">option3:<br>
<input type="text"name="opt3"value="<?php echo $opt3;?>"required>
</label>
</p>
<p>
<label for="option4">option4:<br>
<input type="text"name="opt4"value="<?php echo $opt4;?>"required>
</label>
</p>
<p>
    <label for="options">Select corect answer no:<br>
    <select name="correct" required>
                 <option value="<?php echo $crtans;?>"><?php echo $crtans;?></option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
    </select>
</label>
    </p><br>
<p>
<input type="submit" name="submit" class="btn"value="update">
</p>
</form>
<?php require 'footer.php';?>
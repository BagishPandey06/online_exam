<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/
 */
 require 'config.php';
 require 'header.php';
 $error=array();
 $message='';
if (isset($_POST['submit'])) {
    $testid=isset($_POST['testid'])?$_POST['testid']:'';
    $que=isset($_POST['que'])?$_POST['que']:'';
    $opt1=isset($_POST['opt1'])?$_POST['opt1']:'';
    $opt2=isset($_POST['opt2'])?$_POST['opt2']:'';
    $opt3=isset($_POST['opt3'])?$_POST['opt3']:'';
    $opt4=isset($_POST['opt4'])?$_POST['opt4']:'';
    $correct=isset($_POST['correct'])?$_POST['correct']:'';
    if (sizeof($error) == 0) {
        $sql = 'INSERT INTO 
        ques(`test_id`,`question`,`opt1`,`opt2`,`opt3`,`opt4`,`crtans`) 
        VALUES ("'.$testid.'","'.$que.'","'.$opt1.'"
        ,"'.$opt2.'","'.$opt3.'","'.$opt4.'","'.$correct.'")';
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
    <label for="testname">Select Test-name:<br>
    <select name="testid">
    <?php 
    require 'config.php';
    $sql="select * from test";
                 $r=mysqli_query($con, $sql);
    while ($row=mysqli_fetch_array($r)) { ?>
                 
                  <option value=" <?php echo $row["test_id"];?>">
                <?php echo $row["testname"];?></option>
                <?php  
    }
                        ?>
    </select>
</label>
    </p>
<p>
<label for="question">Enter-question:<br>
<textarea name="que" required></textarea>
</label>
</p>
<p>
<label for="option1">option1:<br>
<input type="text"name="opt1"required>
</label>
</p>
<p>
<label for="option2">option2:<br>
<input type="text"name="opt2"required>
</label>
</p>
<p>
<label for="option3">option3:<br>
<input type="text"name="opt3"required>
</label>
</p>
<p>
<label for="option4">option4:<br>
<input type="text"name="opt4"required>
</label>
</p>
<p>
    <label for="options">Select corect answer no:<br>
    <select name="correct" required>
                 <option value="correctanswer">correctanswer</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
    </select>
</label>
    </p>
<p>
<input type="submit" name="submit" class="btn"value="SUBMIT">
</p>
</form>
<?php require 'footer.php';?>
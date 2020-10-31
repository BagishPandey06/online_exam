<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/register.php?
 */
require 'config.php';
$error=array();
$message='';
if (isset($_POST['submit'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    $repassword=isset($_POST['repassword'])?$_POST['repassword']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';
    if ($password != $repassword) {
        $error=array('input'=>'password','msg'=>'password doesnt match1');
    }



    $sql="select * from user where (username='$username' or email='$email');";

    $res=mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
   
        $row = mysqli_fetch_assoc($res);
        if ($username==$row['username']) {
            $error=array('input'=>'username','msg'=>'Username already exsist');
        } elseif ($email==$row['email']) {
            $error=array('input'=>'email','msg'=>'Email already exsist');
        }
    }



    if (sizeof($error) == 0) {
        $sql = 'INSERT INTO user(`username`,`password`,`email`) 
                VALUES ("'.$username.'", "'.$password.'", "'.$email.'")';
        if ($con->query($sql) === true) {
            $error=array('input'=>'form','msg'=>'data inserted');
            
        } else {
            $error=array('input'=>'form','msg'=>$con->error);
        }

    }
     $con->close();
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Register
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="wrapper">
            <div id="signup-form">
                <div id="error">
                    <?php if(sizeof($error) >0 ) :?>
                        <ul>
                            <?php foreach($error as $errors):?>
                                <li>
                                    <?php echo $error['msg']; break?>
                                </li>
                                <?php 
                            endforeach;?>
                            </ul>
                            <?php 
                    endif; ?>
                    </div>
                    <h2>Sign Up</h2>
                    <form action="" method="POST">
                        <p>
                            <label for="username">Username:<br>
                            <input type="text"name="username"required>
                        </label>
                    </p>
                    <p>
                        <label for="password">Password:<br>
                        <input type="password"name="password"required>
                    </label>
                </p>
                <p>
                    <label for="repassword">Re-Password:<br>
                    <input type="password"name="repassword"required>
                </label>
            </p>
            <p>
                <label for="email">Email:<br>
                <input type="email" name="email" required></label>
            </p>
            <p>
                <input type="submit" name="submit" class="btn"value="SUBMIT">
            <br><a href="../index.php"> <button class="btn">login
            </button></a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
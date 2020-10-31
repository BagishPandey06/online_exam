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
session_start();
$error=array();
$message='';
if (isset($_POST['submit'])) {
    $password=isset($_POST['password'])?$_POST['password']:'';
    $username=isset($_POST['username'])?$_POST['username']:'';
     
    if (sizeof($error) == 0) {
        $sql='select * from user where 
        (`password`="'.$password.'" AND `username`="'.$username.'")';
        $res=$con->query($sql);
        if ($res->num_rows>0) {
            while ($row=$res->fetch_assoc()) {
                 $_SESSION["userdata"]=array
                ('username'=>$row['username'],'id'=>$row['id']);
                $r=$row["role"];
                if ($r== 'user') {
                    $_SESSION['sessionid']=uniqid();
                    header('Location: student.php');
                } elseif ($r=='admin') {
                    header('Location: admin/index.php');
                }
            }
        } else {
            $error=array('input'=>'form','msg'=>"login details are wrong");  
        }
        $con->close();
    }
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>
                Login
            </title>
            <link rel="stylesheet" type="text/css" href="admin/style.css">
        </head>
        <body>
            <div id="wrapper">
                <div id="login-form">
                    <h1>ONLINE TEST</h1>
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
                        <h2>Login</h2>
                        <form action="" method="POST">
                            <p>
                                <label for="username">Username:<br>
                                <input type="username" name="username" required>
                            </label>
                        </p>
                        <p>
                            <label for="password">Password:<br>
                            <input type="password" name="password" required></label>
                        </p><br>
                        <p>
                        <input type="submit"name="submit"class="btn"value="Submit">
                    </p>
                </form>
                you need to <a  class="btn" href="admin/signup.php">sign in</a>first
            </div>
        </div>
    </body>
    </html>
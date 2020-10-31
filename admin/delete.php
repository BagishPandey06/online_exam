<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/delete.php
 */
require 'config.php';
$error=array();
$message='';

if (($id=$_REQUEST['tid'])>0) {
    $sql = "DELETE FROM test WHERE `test_id`=$id";
    if ($con->query($sql) === true) {
        $error=array('input'=>'form','message'=>'Data Deleted Succesfully'); 
        header('Location: test.php');
    } else {
        $error=array('input'=>'form','message'=>$con->error); 
    }
} elseif (($id=$_REQUEST['qid'])>0) {
    $sql = "DELETE FROM ques WHERE `que_id`=$id";
    if ($con->query($sql) === true) {
        $error=array('input'=>'form','message'=>'Data Deleted Succesfully'); 
        header('Location: question.php');
    } else {
        $error=array('input'=>'form','message'=>$con->error); 
    }
} elseif (($id=$_REQUEST['uid'])>0) {
    $sql = "DELETE FROM user WHERE `id`=$id";
    if ($con->query($sql) === true) {
        $error=array('input'=>'form','message'=>'Data Deleted Succesfully'); 
        header('Location: user.php');
    } else {
        $error=array('input'=>'form','message'=>$con->error); 
    }
}
$con->close();

?>
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
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            ADMIN
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="wrapper">
    <h1>ONLINE-TEST</h1>
        <ul>
            <li class="dropdown">
                <a  class="dropbtn"href="test.php" >SHOW-TEST</a>
                <div class="dropdown-content">
                  <a href="addtst.php">ADD-TEST</a>
                </div>
            </li>
            <li class="dropdown">
                <a  class="dropbtn" href="question.php">SHOW-QUESTIONS</a>
                <div class="dropdown-content">
                  <a href="addque.php">ADD-QUESTIONS</a>
                </div>
            </li>
            <li class="dropdown">
                <a  class="dropbtn" href="user.php">SHOW-USER</a>
            </li>
            <li id="j">
        <?php
        if (!empty($_SESSION['userdata'])) {
            echo '<a href="logout.php">logout</a>';
        } else {
            echo '<a href="../index.php">login</a>';
        } 
        ?>
        </li>
        </ul>
        <div><center><h1>ADMIN PANNEL</h1></center></div>
     
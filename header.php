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
            user
        </title>
        <link rel="stylesheet" type="text/css" href="admin/style.css">
    </head>
    <body>
      
    <h1>ONLINE-TEST</h1>
        <ul>
            <li id="j" class="dropdown">
        <?php
        if (!empty($_SESSION['userdata'])) {
            echo '<a href="admin/logout.php">logout</a>';
        } else {
            echo '<a href="/index.php">login</a>';
        } 
        ?>
        </li>
        </ul>
        <div><center><h1>welcome</h1></center></div>
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
?>
<?php
$a='SELECT * FROM test';
$r=mysqli_query($con, $a);
$ro=mysqli_num_rows($r);
if ($ro>0) {
?>
    <table>
 <tr><th>test_id</th><th class="ga">testname</th><th class="ga">questions</th>
 <th colspan="2">ACTION</th></tr>
                <?php
                $sql="select * from test";
                $r=mysqli_query($con, $sql);
                while ($row=mysqli_fetch_array($r)) {   
                    ?>
            <tr>        
            <td><?php echo $row["test_id"];?></td>
            <td class="ga"><?php echo $row["testname"];?></td>
            <td class="ga"><?php echo $row["question"];?></td>
            <td class="ga"> <a href='edit.php?id=<?php echo $row["test_id"];?>'>
            <button>edit</button></a></td>
            <td> <a href='delete.php?tid=<?php echo $row["test_id"];?>'>
            <button>delete</button></a></td>
            </tr>
            <?php
   
                }
            ?>              
            </table>
            
<?php 
} else {
    echo '<h1>please add test</h1>';
}
?>

<?php
require 'footer.php';?>
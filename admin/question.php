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
$a='SELECT * FROM ques';
$r=mysqli_query($con, $a);
$ro=mysqli_num_rows($r);
if ($ro>0) {
?>
    <table>
 <tr><th>question_id</th><th class="ga">question</th>
 <th colspan="2">ACTION</th></tr>
                <?php
                $sql="select * from ques";
                $r=mysqli_query($con, $sql);
                while ($row=mysqli_fetch_array($r)) {   
                    ?>
            <tr> 
            <td><?php echo $row["que_id"];?></td>       
            <td class="ga"><?php echo $row["question"];?></td>
            <td class="ga"> <a href='editque.php?id=<?php echo $row["que_id"];?>'>
            <button>edit</button></a></td>
            <td> <a href='delete.php?qid=<?php echo $row["que_id"];?>'>
            <button>delete</button></a></td>
            </tr>
            <?php
   
                }
            ?>              
            </table>
<?php 
} else {
    echo '<h1>please add question</h1>';
}
?>
<?php
require 'footer.php';?>
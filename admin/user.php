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
$a='SELECT * FROM user';
$r=mysqli_query($con, $a);
$ro=mysqli_num_rows($r);
if ($ro>0) {
?>
<div id="tab">
    <table>
        <tr><th>id</th><th class="ga">username</th><th class="ga">mail</th>
        <th colspan="2">ACTION</th></tr>
        <?php
        $sql="select * from user";
        $r=mysqli_query($con, $sql);
        while ($row=mysqli_fetch_array($r)) {   
                    ?>
                    <tr>
                        <td><?php echo $row["id"];?></td>       
                        <td class="ga"><?php echo $row["username"];?></td>
                        <td class="ga"><?php echo $row["email"];?></td>
                        <td> <a href='delete.php?uid=<?php echo $row["id"];?>'>
                        <button>delete</button></a></td>
                    </tr>
                    <?php 
        }; 
                    ?>
                    </table>
    </div>
                <?php 
} else {
    echo '<h1>please add question</h1>';
}
?>

<?php require 'footer.php';?>
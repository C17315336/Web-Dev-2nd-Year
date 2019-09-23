<html>
    <body>
        <?php
        require_once "db.php";
        if ( isset($_POST['delete']) && isset($_POST['id']) ) {
        $id = mysqli_real_escape_string($db,$_POST['id']);
        $sql = "DELETE FROM Product WHERE id = $id";
        echo "<pre>\n$sql\n</pre>\n";
        mysqli_query($db,$sql);
        echo 'Success - <a href="index.php">Continue...</a>'; return;
        }
        $id = mysqli_real_escape_string($db,$_GET['id']);
        $result = mysqli_query($db,"SELECT PName,id FROM Product WHERE id='$id'");
        $row = mysqli_fetch_row($result);
        echo "<p>Confirm: Deleting $row[0]</p>\n";
        echo('<form method="post"><input type="hidden" ');
        echo('name="id" value="'.htmlentities($row[1]).'">'."\n");
        echo('<input type="submit" value="Delete" name="delete">');
        echo('<a href="index.php">Cancel</a>'); echo("\n</form>\n");
        ?>
    </body>
</html>
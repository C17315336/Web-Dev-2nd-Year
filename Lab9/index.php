<html>
    <body>
        <table><tr><th>Product</th><th>Description</th><th>Price</th><th>Stock</th></tr>
        <?php 
        require_once "db.php";
        echo '<table border="1">'."\n";
        $result = mysqli_query($db, "SELECT id, PName, Description, Price, Stock FROM Product");
        while ( $row = mysqli_fetch_row($result) ) {
        echo "<tr><td>";
        echo(htmlentities($row[1]));
        echo("</td><td>");
        echo(htmlentities($row[2]));
        echo("</td><td>");
        echo("€".htmlentities($row[3]));
        echo("</td><td>");
        echo(htmlentities($row[4]));
        echo("</td><td>\n");
        echo('<a href="edit.php?id='.htmlentities($row[0]).'">Edit</a> / ');
        echo('<a href="delete.php?id='.htmlentities($row[0]).'">Delete</a>');
        echo("</td></tr>\n");
        }
        ?>
        </table>
        <a href="add.php">Add New</a> 
    </body>
</html>
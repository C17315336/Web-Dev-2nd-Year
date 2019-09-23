<html>
    <body>
       <?php
        
            echo $_GET['usr_time'];

            if ($_GET['usr_time'] < "12:00") {
               echo "Good Morning !";
            } else {
                echo "Good Evening!";
            }
        
        ?>

    </body>
</html>
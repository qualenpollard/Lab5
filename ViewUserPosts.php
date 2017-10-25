<html>
    <head>
        <title>EECS 448:View User Post</title>
        <link rel="stylesheet" href="CreateUser.css">
    </head>

    <body>
        <?php
            echo "<h1>Make Post</h1>
            <div class='indexcard'>
                <a href='Index.html'>Main Page</a> |
                <a href='ViewUsers.php'>View Users</a> |
                <a href='CreateUser.html'>Create User</a> |
                <a href='CreatePost.html'>Make Post</a>
            </div>";
            //Create Connection
            $mysqli = new mysqli("mysql.eecs.ku.edu", "qpollard", "Honey", "qpollard");

            //Check Connection
            if ($mysqli->connect_error) {
                printf("Connection failed: " . $mysqli->connect_error);
                exit();
            }

            $sql = "SELECT * FROM Users";
            $result = $mysqli->query($sql);

            echo "<div class='card'>
                    <h2>View Posts</h2>
                    <form action='PostTable.php' method='post'>
                        <select name='user_id'>";

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['user_id'] ."'>" . $row['user_id'] ."</option>";
            }
            echo "</select><br>
                  <input type='submit' value='See Posts'>
                  </form>
                  </div>";
            $result->free();

        /* close connection */
        $mysqli->close();
        ?>
    </body>
</html>

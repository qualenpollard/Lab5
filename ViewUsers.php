<html>
    <head>
        <title>EECS 448:View Users</title>
        <link rel="stylesheet" href="CreateUser.css">
    </head>

    <body>
        <?php
            //Create Connection
            $mysqli = new mysqli("mysql.eecs.ku.edu", "qpollard", "Honey", "qpollard");

            //Check Connection
            if ($mysqli->connect_error) {
                printf("Connection failed: " . $mysqli->connect_error);
                exit();
            }

            $sql = "SELECT * FROM Users";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                echo "<h1>Users</h1>
                      <div class='indexcard'>
                      <a href='Index.html'>Main Page</a> |
                      <a href='CreateUser.html'>Create User</a> |
                      <a href='CreatePost.html'>Make Post</a> |
                      <a href='ViewUserPosts.php'>View Posts</a>
                      </div>";

                echo "<table class='viewtable'>
                      <tr><th>Username</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["user_id"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            /* close connection */
            $mysqli->close();
        ?>
    </body>
</html>

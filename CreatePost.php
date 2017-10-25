<html>
    <head>
        <title>EECS 448:Make Post</title>
        <link rel="stylesheet" href="CreateUser.css">
    </head>

    <body>
        <?php
            $username = $_POST["username"];
            $userpost = $_POST["userpost"];

            //Create Connection
            $mysqli = new mysqli("mysql.eecs.ku.edu", "qpollard", "Honey", "qpollard");

            //Check Connection
            if ($mysqli->connect_error) {
                printf("Connection failed: " . $mysqli->connect_error);
                exit();
            }

            //Check if user is in database
            $existinguser = "SELECT user_id FROM Users WHERE user_id='$username'";

            if($taken = $mysqli->query($existinguser)){
                $rows = mysqli_num_rows($taken);
                if(mysqli_num_rows($taken) > 0){
                    $query = "INSERT INTO Posts (content, author_id)
                              VALUES ('{$userpost}', '{$username}')";

                    if ($mysqli->query($query) === TRUE) {
                        echo "<h1>Make a Post</h1>
                              <div class='indexcard'>
                              <a href='Index.html'>Main Page</a> |
                              <a href='ViewUsers.php'>View Users</a> |
                              <a href='CreateUser.html'>Create User</a> |
                              <a href='CreatePost.html'>Make Post</a> |
                              <a href='ViewUserPosts.php'>View Posts</a>
                              </div>";

                        echo "<div class='post_success'>" . $username. "'s post saved!<br><br>";
                    } else {
                        echo "Error: " . $query . "<br>" . $mysqli->error;
                    }
                } else {
                    echo "<h1>Make a Post</h1>
                          <div class='indexcard'>
                          <a href='Index.html'>Main Page</a> |
                          <a href='ViewUsers.php'>View Users</a> |
                          <a href='CreateUser.html'>Create User</a> |
                          <a href='CreatePost.html'>Make Post</a> |
                          <a href='ViewUserPosts.php'>View Posts</a>
                          </div>";

                    echo "<div class='post_fail'>" . $username. " doesn't exist!<br><br>";

                    //Free result set
                    $result->free();
                }
            }

            /* close connection */
            $mysqli->close();
        ?>
    </body>
</html>

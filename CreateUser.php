<html>
    <head>
        <title>EECS 448:Create User</title>
        <link rel="stylesheet" href="CreateUser.css">
    </head>

    <body>
        <?php
            $username = $_POST["username"];

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
                if(mysqli_num_rows($taken) >0){
                    echo "<h1>Create User</h1>
                          <div class='indexcard'>
                          <a href='Index.html'>Main Page</a> |
                          <a href='ViewUsers.php'>View Users</a> |
                          <a href='CreatePost.html'>Make Post</a> |
                          <a href='ViewUserPosts.php'>View Posts</a>
                          </div>";

                    echo "<div class='post_fail'>" . $username. " already exists!<br><br>";

                } else {
                    $query = "INSERT INTO Users (user_id)
                              VALUES ('{$username}')";

                    if ($mysqli->query($query) === TRUE) {
                        echo "<h1>Create User</h1>
                              <div class='indexcard'>
                              <a href='Index.html'>Main Page</a> |
                              <a href='ViewUsers.php'>View Users</a> |
                              <a href='CreatePost.html'>Make Post</a> |
                              <a href='ViewUserPosts.php'>View Posts</a>
                              </div>";

                        echo "<div class='post_success'>New user created successfully!<br><br>";
                    } else {
                         echo "Error: " . $query . "<br>" . $mysqli->error;
                    }

                    //Free result set
                    $result->free();
                }
            }

            /* close connection */
            $mysqli->close();
        ?>
    </body>
</html>

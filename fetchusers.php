      <?php
        $connection = mysqli_connect("localhost", "navoday", "redhat");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
            echo('connection to db failed');
            echo($connection);
            }

            // Selecting Database
            $db = mysqli_select_db($connection, "abc");
            // SQL query to fetch information of registerd users and finds user match.
            $query = mysqli_query($connection, "select username from login;");
            $rows = mysqli_num_rows($query);
            if ($rows > 0) {
                while ($user = $query->fetch_assoc()) {
                    echo("<li>$user['username']</li>");
                }
            }
            else{
                echo("No Users @ ABC Consulting");
            }
            mysqli_close($connection);
      ?>
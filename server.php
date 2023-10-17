<html>
        <style>
            .menu {
                    text-align: center;
                    margin: auto;
                    width: 300px;
                    border: 1px solid black;
                    padding: 20px;
                }
        </style>
    <body>

        <?php

            include("conn.php");
            
            $sql = "SELECT id, name, username, password FROM users";
            $result = $conn->query($sql); 
            
            session_start();
            
            // retrieve data from login form input fields
            $formUsername = $_GET['name'];
            $formPassword = $_GET['pwd'];

            if (isset($_SESSION['username'])){
                    // $name = isset($_SESSION['name']) ? $_SESSION['name'] : $_SESSION['username'];
                    echo "Welcome ".$_SESSION['name'];
            } else {
                while($row = $result->fetch_assoc()) {
                    if ($row['username'] == $formUsername && $row['password'] == $formPassword){
                        // store user details in a session
                        $_SESSION['username'] = $formUsername;
                        $_SESSION['name'] = $row['name'];
    
                        // if checkbox checked save username and password in cookies
                        if(isset($_GET["check"])){
                            setCookie('username', $formUsername);
                            setCookie('password', $formPassword);
                        }

                        echo "<script>location.href='products.php'</script>";
                        return;
                    }
                }

                // if username and password didn't match
                echo "Incorrect details<br>";
                echo "<a href='login.php'>login</a>";
            }

            

     
        ?>

        <div class="menu">
            <a href="home.php">Home</a><br>
            <a href="products.php">Products</a><br>
            <a href="logout.php">logout</a>
        </div>

    </body>
</html>
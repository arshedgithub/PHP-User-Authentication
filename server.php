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

            $username = "user";
            $password = "1234";

            session_start();

            if (isset($_SESSION['user'])){
                    echo "Welcome ".$username;
            } else {
                if ($_GET['name'] == $username && $_GET['pwd'] == $password){
                    $_SESSION['user'] = $username;
                    echo "Welcome ".$username;
                    if($_GET["check"]){
                        setCookie('username', $username);
                        setCookie('password', $password);
                    }
                } else {
                    echo "Incorrect details<br>";
                    echo "<a href='login.php'>login</a>";
                }
            }
        ?>
        <div class="menu">
            <a href="home.php">Home</a><br>
            <a href="products.php">Products</a><br>
            <a href="logout.php">logout</a>
        </div>
    </body>
</html>
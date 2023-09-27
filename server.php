<html>
    <body>
        
        <?php 
            $username = "user";
            $password = "1234";

            session_start();

            if (isset($_SESSION["user"])) {
                echo "Welcome ". $_GET["name"]."<br>";
                echo "You are logged in<br>";
                echo "<a href='logout.php'>logout</a>";
            } else {
                if ($_GET["name"]==$username && $_GET["pwd"]==$password) {
                    if ($_GET["check"]){
                        setCookie("username",$username);
                        setCookie("password",$password);
                    }
                    $_SESSION["user"] = $username;
                    echo "Welcome ". $_GET["name"]."<br>";
                    echo "You are logged in<br>";
                    echo "<a href='logout.php'>logout</a>";
                } else {
                    echo "Incorrect login details";
                }
            }
        ?>
        <div>
            <a href="products.php">Products</a>
        </div>
    </body>
</html>
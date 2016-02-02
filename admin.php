<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {                
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
}

echo "HELLO ADMIN!</br>";
echo "<form action='admin.php' method='POST'>";
echo "<input type='submit' value='LOGOUT'>";
?>

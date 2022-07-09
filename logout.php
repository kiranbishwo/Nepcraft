
<?php

include "connect.php";

session_start();

session_unset();
// to distroyee cookie
// setcookie('emailcookie','', time() -86400);
// setcookie('passcookie','', time() -86400);

session_destroy();

header('Location:http://localhost/nepcraft/login.php');

?>

<!-- destroying the dession -->
<?php
    session_start();
    session_destroy();
?>

<!-- Redirection to index page(login/register) -->
<?php
    header("Location: "."http://localhost/HostelManagementSystem/index.php");
    die();
?>



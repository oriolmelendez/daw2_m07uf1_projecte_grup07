<?php
    ob_start();
    session_start();
    $_SESSION["seccio"] = $_POST["seccio"];
    
    header('Location: main_user.php');
    ob_end_flush();
    exit;
?>
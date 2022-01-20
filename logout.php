<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    setcookie(session_name(), "", time() - 60*60*24, "/"); 
    header('Location: ./index.php');
?>
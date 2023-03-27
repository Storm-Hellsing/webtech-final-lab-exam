<?php

    session_start();
    session_destroy();
    setcookie('user_name', $userName, time() - 1, '/');
    setcookie('user_email', $userEmail, time() - 1, '/');
    setcookie('user_account', $userAccount, time() - 1, '/');
    header('location: ../views/signin.php');
    
?>
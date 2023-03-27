<?php

    session_start();
    require_once('../models/sql_user_all.php');

    if(isset($_REQUEST['submit']))
    {
        $userEmail = $_REQUEST['email'];
        $userPassword = $_REQUEST['password'];
        $user = ['email' => $userEmail, 'password' => $userPassword];
        $foundUser = signin_sql($user);

        if($userEmail == "" || $userPassword == "")
        {
            header('location: ../views/signin.php?msg=nullInputs');
        }
        elseif(!$foundUser)
        {
            header('location: ../views/signin.php?msg=userNotFound');
        }
        else
        {
            $connected = getconnection();
            $sql = "SELECT user_id, user_name, user_account_type FROM `user_all` WHERE user_email='{$userEmail}'";
            
            $result = mysqli_query($connected, $sql);
            $count = mysqli_num_rows($result);

            if($count == 1)
            {
                $row = mysqli_fetch_assoc($result);
                $userID = $row['user_id'];
                $userName = $row['user_name'];
                $userAccount = $row['user_account_type'];

                $_SESSION['userID'] = $userID;
                if(isset($_REQUEST['keep_me_signed_in']) && $_REQUEST['keep_me_signed_in'] == 'on')
                {
                    setcookie('user_name', $userName, time() +  2628288, '/');
                    setcookie('user_email', $userEmail, time() + 2628288, '/');
                    setcookie('user_account', $userAccount, time() + 2628288, '/');
                }
                else
                {
                    setcookie('user_name', $userName, time() + 900, '/');
                    setcookie('user_email', $userEmail, time() + 900, '/');
                    setcookie('user_account', $userAccount, time() + 900, '/');
                }
            }
            header('location: ../views/homepage.php');
        }
    }
    else
    {
        header('location: ../views/signin.php');
    }

?>
<?php

    session_start();
    require_once('../models/sql_user_all.php');
    require_once('../models/validations.php');

    if(isset($_REQUEST['submit']))
    {
        $userName = $_REQUEST['username'];
        $userEmail = $_REQUEST['email'];
        $userPassword = $_REQUEST['password'];
        $userRetypePassword = $_REQUEST['retypepassword'];
        $accountType = "Project Manager";
        $validEmail = validateEmail($userEmail);
        $validPassword = validatePassword($userPassword);

        if($userName == "" || $userEmail == "" || $userPassword == "" || $userRetypePassword == "")
        {
            header('location: ../views/signup.php?msg=nullInputs');
        }
        elseif($validEmail == 0)
        {
            header('location: ../views/signup.php?msg=invalidEmail');
        }
        elseif($validPassword == 0)
        {
            header('location: ../views/signup.php?msg=invalidPassword');
        }
        elseif($userPassword != $userRetypePassword)
        {
            header('location: ../views/signup.php?msg=mismatchPass');
        }
        else
        {
            $userID = generateProjectManagerCode();
            $user = ['userID' => $userID ,'username'=> $userName, 'email'=> $userEmail, 'password'=> $userPassword, 'account' => $accountType];
            $status = signup_sql($user);

            if($status)
            {
                header('location: ../views/signin.php?msg=signupSuccess');
            }
            else
            {
                header('location: ../views/signup.php?msg=signupFailed');
            }
        }
    }
    else
    {
        header('location: ../views/signup.php');
    }

?>
<?php

    require_once('db_integration.php');

    function signup_sql($user)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $connected = getconnection();
        $sql = "INSERT INTO `user_all`(`user_id`, `user_name`, `user_email`, `user_password`, `user_joining_date`, `user_joining_time`, `user_account_type`) 
                VALUES ('{$user['userID']}','{$user['username']}','{$user['email']}','{$user['password']}','{$date}','{$time}','{$user['account']}')";
        
        $result = mysqli_query($connected, $sql);

        return $result;
    }

    function signin_sql($user)
    {
        $connected = getconnection();
        $sql = "SELECT * FROM `user_all` WHERE user_email='{$user['email']}' AND user_password='{$user['password']}' AND user_account_type='Project Manager'";
        
        $result = mysqli_query($connected, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

?>
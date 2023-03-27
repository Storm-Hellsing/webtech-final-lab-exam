<?php

function getconnection()
{
    $localhost = "127.0.0.1";
    $username = "root";
    $userpass = "";
    $dbname = "prd_management_system";

    return mysqli_connect($localhost, $username, $userpass, $dbname);
}

?>
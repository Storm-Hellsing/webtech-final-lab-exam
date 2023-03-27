<?php

    session_start();
    
    if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_account']))
    {
        $userName = $_COOKIE['user_name'];

?>

<html>
    <head>
        <title>Home</title>
    </head>

    <body>
        <h1 align="center">MechTech</h1>
        <h2 align="center">Greetings, <?php echo $userName ?> </h2> <br/>
        <form align="center" menthod="POST" action="" enctype="">
            <table align="center">
                <tr>
                    <th width="350px"><a href="prd_management_menu.php">Manage PRD</a></th>
                    <th width="350px">Settings</th>
                    <th width="350px">Profile</th>
                    <th width="350px"><a href="../controllers/logout.php">Logout</a></th>
                </tr>
            </table>
        </form>
    </body>
</html>


<?php

    }
    else
    {
        header('location: ../views/signin.php');
    }

?>
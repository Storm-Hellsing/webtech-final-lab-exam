<?php

    session_start();
    
    if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_account']))
    {

?>

<html>
    <head>
        <title>Manage PRD</title>
    </head>

    <body>
        <h1 align="center">PRD Engine</h1>
        <form align="center" menthod="POST" action="" enctype="">
            <table align="center">
                <tr>
                    <th width="350px"><a href="create_project.php">Create Project</a></th>
                    <th width="350px"><a href="add_feature.php">Add Features</a></th>
                    <th width="350px"><a href="include_specifications.php">Include Specifications</a></th>
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
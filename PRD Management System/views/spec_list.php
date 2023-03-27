<?php

    session_start();

    if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_account']))
    {
        require_once("../models/sql_project_all.php");
        require_once("../models/sql_feature_all.php");
        require_once("../models/sql_spec_all.php");

?>

<html>
    <head>
        <title>Spec List</title>
    </head>

    <body>
            <fieldset>
                <legend>Spec List</legend>
                <table align="center" border="1">
                <tr align="center">
                        <th width ="250px">Spec ID</th>
                        <th width ="250px">Spec Name</th>
                        <th width ="250px">Spec Description</th>
                        <th width ="250px">Assigned with Feature</th>
                        <th width ="250px" colspan="2">Action</th>
                 </tr>

                <?php

                    $result = view_spec_sql();

                    if($result)
                    {
                        while($row = mysqli_fetch_assoc($result)):
                     
                    

                ?>
                 <tr align="center">
                        <th width ="250px"><?php echo $row['specification_id']; ?></th>
                        <th width ="250px"><?php echo $row['specification_name']; ?></th>
                        <th width ="250px"><?php echo $row['specification_description']; ?></th>
                        <th width ="250px"><?php echo $row['feature_id']; ?></th>
                        <th width ="250px">
                            <form action="../controllers/delete_specification_check.php" method="GET">
                            <input type="hidden" name="specification_id" value="<?php echo $row['specification_id']; ?>">
                            <input type="submit" name="delete" value="Delete">
                            </form>
                        </th>
                        <th width ="250px">
                            <form method="Get" action="update_specification.php">
                            <input type="hidden" name="specification_id" value="<?php echo $row['specification_id']; ?>">
                            <input type="submit" name="update" value="Update">
                            </form>
                        </th>
                 </tr>
                <?php 

                endwhile;
                }

                ?>
                </table>
                <br/>
                <br/>

                <?php
                    
                    if(isset($_REQUEST['msg']))
                    {
                        if($_REQUEST['msg'] == 'delSuccess')
                        {
                            echo("<b>Deleted</b>");
                        }
                        elseif($_REQUEST['msg'] == 'specSuccess')
                        {
                            echo("<b>Specification has been updated into the feature.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'spectFailed')
                        {
                            echo("<b>Specification update failed. Please try again.</b>");
                        }
                    }

                ?>
            </fieldset>
    </body>
</html>

<?php

    }
    else
    {
        header('location: ../views/signin.php');
    }

?>
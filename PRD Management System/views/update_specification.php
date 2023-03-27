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
        <title>Specifications</title>
    </head>

    <body>
        <form align="center" menthod="POST" action="../controllers/update_specification_check.php" enctype="">
        <h1 align="center">Update Specs</h1>
            <fieldset>
            <?php 
            $specId = $_REQUEST['specification_id'];
            echo "Spec ID: ".$specId; 
            setcookie('spec_id', $specId, time() + 300, '/');
            ?>
                <legend>Specifications Panel</legend>
                <table align="center">
                    <tr align="left">
                        <th align="right">
                            <label for="addspecification">Specification:</label>
                        </th>
                        
                        <th>
                            <input type="text" name="addspecification" id="addspecification" value="">
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="description">Spec Description:</label> <br/>
                        </th>

                        <th>
                            <textarea name="description" id="description" cols="30" rows="5"></textarea>
                        </th>
                    </tr>
                </table>
                <br/>
                <input type="submit" name="submit" value="Assign Specification"/>
                <br/> <br/>
                <a href="spec_list.php">View Spec List</a>
                <br/> <br/>
                <?php
                    
                    if(isset($_REQUEST['msg']))
                    {
                        if($_REQUEST['msg'] == 'nullInputs')
                        {
                            echo("<b>Please fillup every field.</b>");
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
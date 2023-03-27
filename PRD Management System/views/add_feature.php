<?php

    session_start();

    if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_account']))
    {
        require_once("../models/sql_project_all.php");

?>

<html>
    <head>
        <title>Add Features</title>
    </head>

    <body>
        <h1 align="center">Add Features</h1>
        <form align="center" menthod="POST" action="../controllers/add_feature_check.php" enctype="">
            <table align="center">
                <tr>
                    <th width="350px"><a href="prd_management_menu.php">PRD Menu</a></th>
                    <th width="350px">Update Features</th>
                    <th width="350px">Delete Features</th>
                </tr>
            </table>
            <br/>
            <fieldset>
                <legend>Assign Features</legend>
                <table align="center">
                    <tr align="left">
                        <th align="right">
                            <label for="selectproject">Select Project:</label>
                        </th>

                        <th>
                            <?php

                            $status = populate_projectname_sql();
                            
                            if($status)
                            {
                                if (mysqli_num_rows($status) >= 0) 
                                {

                            ?>
                            <select name="selectproject">
                                <option value="">Select Project</option>
                                <?php

                                    while($row = mysqli_fetch_assoc($status)) 
                                    {

                                ?>
                                <option value="<?php echo $row["project_name"]; ?>"> <?php echo $row["project_name"]; ?></option>
                                <?php

                                    }
                                ?>
                            </select>
                            <?php

                                }
                            }

                            ?>
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="featurename">Feature Name:</label>
                        </th>
                        <th>
                            <input type="text" name="featurename" id="featurename" value=""/>
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="description">Feature Description:</label> <br/>
                        </th>

                        <th>
                            <textarea name="description" id="description" cols="30" rows="5"></textarea>
                        </th>
                    </tr>
                </table>
                <br/>
                <input type="submit" name="submit" value="Create"/>
                <br/><br/>

                <?php
                    
                    if(isset($_REQUEST['msg']))
                    {
                        if($_REQUEST['msg'] == 'nullInputs')
                        {
                            echo("<b>Please fillup every field.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'featureSuccess')
                        {
                            echo("<b>Feature has been added into the project.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'featureFailed')
                        {
                            echo("<b>Feature creation failed. Please try again.</b>");
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
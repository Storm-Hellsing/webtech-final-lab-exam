<?php

    session_start();

    if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_account']))
    {
        require_once("../models/sql_project_all.php");
        require_once("../models/sql_feature_all.php");

?>

<html>
    <head>
        <title>Specifications</title>
    </head>

    <body>
        <form align="center" menthod="POST" action="../controllers/include_specification_check.php" enctype="">
            <fieldset>
                <legend>Specifications Panel</legend>
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
                            <?php

                            $status = populate_featurename_sql();
                            
                            if($status)
                            {
                                if (mysqli_num_rows($status) >= 0) 
                                {

                            ?>
                            <label for="selectfeature">Select Feature:</label>
                        </th>

                        <th>
                            <select name="selectfeature">
                                 <option value="">Select Feature</option>
                                 <?php

                                    while($row = mysqli_fetch_assoc($status)) 
                                    {

                                ?>
                                <option value="<?php echo $row["feature_name"]; ?>"> <?php echo $row["feature_name"]; ?></option>
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
                            echo("<b>Specification has been assigned into the feature.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'spectFailed')
                        {
                            echo("<b>Specification creation failed. Please try again.</b>");
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
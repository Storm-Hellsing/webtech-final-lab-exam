<?php

    session_start();

    if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_account']))
    {

?>

<html>
    <head>
        <title>Create Project</title>
    </head>

    <body>
        <h1 align="center">Create Project</h1>
        <form align="center" menthod="POST" action="../controllers/create_project_check.php" enctype="">
            <table align="center">
                <tr>
                    <th width="350px"><a href="prd_management_menu.php">PRD Menu</a></th>
                    <th width="350px">Update Projects</th>
                    <th width="350px">Delete Users</th>
                </tr>
            </table>
            <br/>
            <fieldset>
                <legend>Assign Project</legend>
                <table align="center">
                    <tr align="left">
                        <th align="right">
                            <label for="projectname">Project Name:</label>
                        </th>
                        <th>
                            <input type="text" name="projectname" id="projectname" value=""/>
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="project_start_date">Start Date:</label>
                        </th>

                        <th>
                            <input type="date" name="project_start_date" id="project_start_date" value=""/>
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="project_end_date">End Date:</label>
                        </th>

                        <th>
                            <input type="date" name="project_end_date" id="project_end_date" value=""/>
                        </th>
                    </tr>

                    <tr align="left">
                        <th align="right">
                            <label for="description">Project Description:</label> <br/>
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
                        elseif($_REQUEST['msg'] == 'projectSuccess')
                        {
                            echo("<b>Project has been created.</b>");
                        }
                        elseif($_REQUEST['msg'] == 'projectFailed')
                        {
                            echo("<b>Project creation failed. Please try again.</b>");
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
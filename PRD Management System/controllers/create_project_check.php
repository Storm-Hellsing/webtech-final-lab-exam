<?php

    session_start();
    require_once("../models/sql_project_all.php");
    require_once("../models/validations.php");

    if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_account']))
    {
        $projectName = $_REQUEST['projectname'];
        $project_start_date = $_REQUEST['project_start_date'];
        $project_end_date = $_REQUEST['project_end_date'];
        $projectDescription = $_REQUEST['description'];

        if($projectName == "" || $project_start_date == "" || $project_end_date == "" )
        {
            header('location: ../views/create_project.php?msg=nullInputs');
        }
        else
        {
            $projectID = generateProjectCode();
            $project = ['projectID' => $projectID ,'projectname'=> $projectName, 'description' => $projectDescription, 'startdate'=> $project_start_date, 'enddate'=> $project_end_date];
            $status = insert_project_sql($project);

            if($status)
            {
                header('location: ../views/create_project.php?msg=projectSuccess');
            }
            else
            {
                header('location: ../views/create_project.php?msg=projectFailed');
            }
        }
    }
    else
    {
        header('location: ../views/signin.php');
    }

?>
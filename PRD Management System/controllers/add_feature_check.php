<?php

    session_start();
    require_once("../models/sql_project_all.php");
    require_once("../models/validations.php");
    require_once("../models/sql_feature_all.php");

    if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_account']))
    {
        $projectName = $_REQUEST['selectproject'];
        $featureName = $_REQUEST['featurename'];
        $featureDescription = $_REQUEST['description'];

        if($projectName == "" || $featureName == "" || $featureDescription == "" )
        {
            header('location: ../views/add_feature.php?msg=nullInputs');
        }
        else
        {   
            $project = ['project_name' => $projectName];
            $found = find_project_sql($project);
            if($found)
            {
                $row = mysqli_fetch_assoc($found);
                $projectID = $row['project_id'];
                $featureID = generateFeatureCode();
                $feature = ['featureID' => $featureID ,'featurename'=> $featureName, 'description' => $featureDescription, 'projectID' => $projectID];
                $status = insert_feature_sql($feature);

                if($status)
                {
                    header('location: ../views/add_feature.php?msg=featureSuccess');
                }
                else
                {
                    header('location: ../views/add_feature.php?msg=featureFailed');
                }
            }
        }
    }
    else
    {
        header('location: ../views/signin.php');
    }

?>
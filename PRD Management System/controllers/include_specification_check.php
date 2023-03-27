<?php

    session_start();
    require_once("../models/sql_project_all.php");
    require_once("../models/validations.php");
    require_once("../models/sql_spec_all.php");

    if(isset($_REQUEST['submit']))
    {
        $projectName = $_REQUEST['selectproject'];
        $featureName = $_REQUEST['selectfeature'];
        $specName = $_REQUEST['addspecification'];
        $specDescription = $_REQUEST['description'];

        if($projectName == "" || $featureName == "" || $specName == "" || $specDescription == "")
        {
            header('location: ../views/include_specifications.php?msg=nullInputs');
        }
        else
        {
            $feature = ['feature_name' => $featureName];
            $found = find_feature_sql($feature);

            if($found)
            {
                $row = mysqli_fetch_assoc($found);
                $featureID = $row['feature_id'];
                $spedID = generateSpecCode();
                $spec = ['spec_id' => $spedID ,'spec_name'=> $specName, 'description' => $specDescription, 'feature_id'=> $featureID];
                $status = insert_spec_sql($spec);

                if($status)
                {
                    header('location: ../views/include_specifications.php?msg=specSuccess');
                }
                else
                {
                    header('location: ../views/include_specifications.php?msg=spectFailed');
                }
            }
        }
    }
    else
    {
        header('location: ../views/include_specifications.php');
    }

?>
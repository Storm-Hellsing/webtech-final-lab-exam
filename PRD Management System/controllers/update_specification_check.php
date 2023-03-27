<?php

    session_start();
    require_once("../models/sql_project_all.php");
    require_once("../models/validations.php");
    require_once("../models/sql_spec_all.php");

    if(isset($_REQUEST['submit']) && $_COOKIE['spec_id'])
    {
        $specName = $_REQUEST['addspecification'];
        $specid = $_COOKIE['spec_id'];
        $specDescription = $_REQUEST['description'];

        if($specName == "" || $specDescription == "")
        {
            header('location: ../views/update_specification.php?msg=nullInputs');
        }
        else
        {
            $feature = ['feature_name' => $featureName];
            $found = find_feature_sql($feature);

            if($found)
            {
                $row = mysqli_fetch_assoc($found);
                $featureID = $row['feature_id'];
                $specID = ['spec_name'=> $specName, 'description' => $specDescription, 'spec_id'=> $specid];
                $status = update_spec_sql($specID);

                if($status)
                {
                    header('location: ../views/spec_list.php?msg=specSuccess');
                }
                else
                {
                    header('location: ../views/spec_list.php?msg=spectFailed');
                }
            }
        }
    }
    else
    {
        header('location: ../views/update_specification.php');
    }

?>
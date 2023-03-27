<?php

    if(isset($_REQUEST['delete']))
    {

        require_once("../models/sql_project_all.php");
        require_once("../models/sql_feature_all.php");
        require_once("../models/sql_spec_all.php");

        $specID = $_REQUEST['specification_id'];

        $result = delete_spec_sql($specID);

        if($result)
        {
            header('location: ../views/spec_list.php?msg=delSuccess');
        }


    }
    else
    {
        header('location: ../views/spec_list.php');
    }

?>
<?php

    require_once('db_integration.php');

    function insert_feature_sql($feature)
    {
        $connected = getconnection();
        $sql = "INSERT INTO `feature_all`(`feature_id`, `feature_name`, `feature_description`, `project_id`) 
                VALUES ('{$feature['featureID']}','{$feature['featurename']}','{$feature['description']}','{$feature['projectID']}')";
        
        $result = mysqli_query($connected, $sql);

        return $result;
    }

    function find_project_sql($project)
    {
        $connected = getconnection();
        $sql = "SELECT project_id FROM `project_all` WHERE project_name='{$project['project_name']}'";
        
        $result = mysqli_query($connected, $sql);
        
        return $result;
    }

    function populate_featurename_sql()
    {
        $connected = getconnection();
        $sql = "SELECT feature_name FROM `feature_all`";
        
        $result = mysqli_query($connected, $sql);
        
        return $result;
    }

?>
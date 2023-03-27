<?php

    require_once('db_integration.php');

    function insert_spec_sql($spec)
    {
        $connected = getconnection();
        $sql = "INSERT INTO `specification_all`(`specification_id`, `specification_name`, `specification_description`, `feature_id`) 
                VALUES ('{$spec['spec_id']}','{$spec['spec_name']}','{$spec['description']}','{$spec['feature_id']}')";
        
        $result = mysqli_query($connected, $sql);

        return $result;
    }

    /*function find_project_sql($project)
    {
        $connected = getconnection();
        $sql = "SELECT project_id FROM `project_all` WHERE project_name='{$project['project_name']}'";
        
        $result = mysqli_query($connected, $sql);
        
        return $result;
    }*/

    function find_feature_sql($feature)
    {
        $connected = getconnection();
        $sql = "SELECT feature_id FROM `feature_all` WHERE feature_name='{$feature['feature_name']}'";
        
        $result = mysqli_query($connected, $sql);
        
        return $result;
    }

    function view_spec_sql()
    {
        $connected = getconnection();
        $sql = "SELECT * FROM `specification_all`";
        
        $result = mysqli_query($connected, $sql);
        
        return $result;
    }


    function delete_spec_sql($specID)
    {
        $connected = getconnection();
        $sql = "DELETE FROM `specification_all` WHERE specification_id='{$specID}'";
        
        $result = mysqli_query($connected, $sql);
        
        return $result;
    }

    function update_spec_sql($specID)
    {
        $connected = getconnection();
        $sql = "UPDATE `specification_all` SET `specification_name`='{$specID['spec_name']}',`specification_description`='{$specID['description']}' WHERE specification_id='{$specID['specID']}'";
        
        $result = mysqli_query($connected, $sql);
        
        return $result;
    }

?>
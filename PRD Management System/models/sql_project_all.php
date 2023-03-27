<?php

    require_once('db_integration.php');

    function insert_project_sql($project)
    {
        $connected = getconnection();
        $sql = "INSERT INTO `project_all`(`project_id`, `project_name`, `project_description`, `project_start_date`, `project_end_date`) 
                VALUES ('{$project['projectID']}','{$project['projectname']}','{$project['description']}','{$project['startdate']}','{$project['enddate']}')";
        
        $result = mysqli_query($connected, $sql);

        return $result;
    }

    function populate_projectname_sql()
    {
        $connected = getconnection();
        $sql = "SELECT project_name FROM `project_all`";
        
        $result = mysqli_query($connected, $sql);
        
        return $result;
    }

?>
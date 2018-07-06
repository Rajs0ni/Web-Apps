<?php
    //Header

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Task.php';

    //Instantiate DB & Connect

    $database = new Database();
    $db = $database->connect();

    //Instantiate task object

    $task = new Task($db);

    //Task query
    $result = $task->read();
    //Get row count
    $num = $result->rowCount();

    // Check if any task
    if($num > 0)
    {
        //Task array
        $tasks_arr = array();
        $tasks_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $task_item = array(
                'id' => $id,
                'title' => $title,
                'task' => html_entity_decode($task),
                'date_created' => $date_created,
                'completion_date' => $completion_date 
            );
            //Push to 'data'
            array_push($tasks_arr['data'],$task_item);
        }
        // Turn to JSON
        echo json_encode($tasks_arr);
    }
    else
    {   //No Task
        echo json_encode(
            array('message' => 'No Tasks Found')
        );
    }
?>
<?php
    //Header

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:PUT');
    header('Access-Control-Allow-Headers:
            Access-Control-Allow-Headers,
            Access-Control-Allow-Origin,
            Access-Control-Allow-Methods,
            Content-Typ,
            Authorization, X-Requested-with');

    include_once '../../config/Database.php';
    include_once '../../models/Task.php';

    //Instantiate DB & Connect

    $database = new Database();
    $db = $database->connect();

    //Instantiate task object

    $task = new Task($db);

    //Get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    
    //Set ID to update
    $task->id = $data->id;

    $task->title = $data->title;
    $task->task = $data->task;
    $task->date_created = $data->date_created;
    $task->completion_date = $data->completion_date;

    //Update task
    if($task->update()){
        echo json_encode(
            array('message' => 'Task updated')
        );
    }else
    {
        echo json_encode(
            array('message' => 'Task not updated')
        );
    }
?>
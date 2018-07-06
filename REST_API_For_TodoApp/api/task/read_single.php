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

    //Get ID
    $task->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get task
    $task->read_single();

    // Create array
    $task_arr = array(
        'id' => $task->id,
        'title' => $task->title,
        'task' => $task->task,
        'date_created' => $task->date_created,
        'completion_date' => $task->completion_date
    );

    //Make JSON
    print_r(json_encode($task_arr));
?>
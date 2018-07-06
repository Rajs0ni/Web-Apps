<?php
    class Task{
        private $conn;
        private $table = 'todos';

        //properties
        public $id;
        public $title;
        public $task;
        public $date_created;
        public $completion_date;

        // Constructor with DB
        public function __construct($db)
        {
            $this->conn = $db;
        }
        //Get Tasks
        public function read()
        {
            // Create query
            $query = 'SELECT id, title, task, date_created, completion_date
                        FROM ' . $this->table; 
            
            //prepare statement
            
            $stmt = $this->conn->prepare($query);

            //Execute query
            $stmt->execute();
    
            return $stmt;
        }

        //Get Single Task
        public function read_single()
        {
            $query = 'SELECT id, title, task, date_created, completion_date
            FROM ' . $this->table .' WHERE id = :id LIMIT 1';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

             //Execute query
              $stmt->execute();

             $row = $stmt->fetch(PDO::FETCH_ASSOC);

             //Set properties
             $this->title = $row['title'];
             $this->task = $row['task'];
             $this->date_created = $row['date_created'];
             $this->completion_date = $row['completion_date'];

        }

        // Create Task
        public function create()
        {
            //create query
            $query = 'INSERT INTO '. $this->table . '
                    SET
                        title = :title ,
                        task = :task,
                        date_created = :date_created,
                        completion_date = :completion_date';
                        
                //Prepare Statement
                $stmt = $this->conn->prepare($query);

                //clean data
                $this->title = htmlspecialchars(strip_tags($this->title));
                $this->task = htmlspecialchars(strip_tags($this->task));
                $this->date_created = htmlspecialchars(strip_tags($this->date_created));
                $this->completion_date = htmlspecialchars(strip_tags($this->completion_date));

                //Bind Data
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':task', $this->task);
                $stmt->bindParam(':date_created', $this->date_created);
                $stmt->bindParam(':completion_date', $this->completion_date);

                //Execute query
                if($stmt->execute()){
                    return true;
                }

                //print error
                 printf("Error: %s.\n",$stmt->error);
                    return false;
        }

         // Update Task
         public function update()
         {
             //update query
             $query = 'UPDATE '. $this->table . '
                     SET
                         title = :title ,
                         task = :task,
                         date_created = :date_created,
                         completion_date = :completion_date
                    WHERE
                        id = :id';
                         
                 //Prepare Statement
                 $stmt = $this->conn->prepare($query);
 
                 //clean data
                 $this->title = htmlspecialchars(strip_tags($this->title));
                 $this->task = htmlspecialchars(strip_tags($this->task));
                 $this->date_created = htmlspecialchars(strip_tags($this->date_created));
                 $this->completion_date = htmlspecialchars(strip_tags($this->completion_date));
                 $this->id = htmlspecialchars(strip_tags($this->id));
 
                 //Bind Data
                 $stmt->bindParam(':title', $this->title);
                 $stmt->bindParam(':task', $this->task);
                 $stmt->bindParam(':date_created', $this->date_created);
                 $stmt->bindParam(':completion_date', $this->completion_date);
                 $stmt->bindParam(':id', $this->id);
 
                 //Execute query
                 if($stmt->execute()){
                     return true;
                 }
 
                 //print error
                  printf("Error: %s.\n",$stmt->error);
                     return false;
         }

         //Delete Task
         public function delete()
         {
             //create query
             $query = 'DELETE FROM '.$this->table .' WHERE id = :id';
            
            //Prepare statement
            $stmt = $this->conn->prepare($query);
       
            //Bind ID
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            
            // Execute query
            $result = $stmt->execute();
            if($result){
                return true;
            }

            //print error
             printf("Error: %s.\n",$stmt->error);
                return false;
         }

      
 
    }
?>
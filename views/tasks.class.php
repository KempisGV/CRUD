<?php

include './models/tasks.class.php';

class TasksView extends Tasks{

    public function showTasks(){
        
        $json_array = $this->getTasks();
        
        print(json_encode($json_array));

    }

}

?>
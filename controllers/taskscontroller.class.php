<?php

class TasksController extends Tasks{

    public function createTask($title, $description){
                
        $this->setTask($this->getUID(), $title, $description);

    }
    
}

?>

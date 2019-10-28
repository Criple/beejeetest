<?php

namespace App\Models;

use App\Model as Model;


class Tasks extends Model
{

    public function getAllTasks($sortField = '', $sortDirection = '', $pagination = array())
    {
        $query = "select * from tasks";
        if (isset($sortField) && !empty($sortField)){
            $query .= " order by " . $sortField;
            if ($sortDirection == 'asc'){
                $query .= ' asc';
            }elseif ($sortDirection == 'desc'){
                $query .= ' desc';
            }else{
                $query .= ' asc';
            }
        }
        if (!empty($pagination)){
            $query .= ' LIMIT '.$pagination['start'].','.$pagination['kol'];
        }
        return $this->execute($query);
    }

    public function countTasks(){
        $query = "select count(*) as count_tasks from tasks";
        return $this->execute($query);
    }

    public function getTaskById($id){
        $query = "select * from tasks where id = $id";
        return $this->execute($query);
    }

    public function createTask($userName = '', $email = '', $taskText = '', $status = 1)
    {
        $query = "INSERT INTO tasks (`user_name`, `e_mail`, `task_text`, `status`) values ('$userName', '$email', '$taskText', $status)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute(array());
    }

    public function deleteTask($id)
    {
        $query = "DELETE FROM tasks WHERE ID = $id";
        return $this->execute($query);
    }

    public function updateTask($id, $userName = '', $email = '', $taskText = '', $status = true)
    {
        $query = "UPDATE tasks SET `user_name` = '$userName', `e_mail` = '$email', `task_text` = '$taskText', `status` = $status WHERE id = $id";
        return $this->execute($query);
    }

    public function updateTaskText($id, $taskText = '')
    {
        $query = "UPDATE tasks SET `task_text` = '$taskText', `isAdminEdited` = 1 WHERE id = $id";
        return $this->execute($query);
    }
    public function updateTaskStatus($id, $status = true)
    {
        $query = "UPDATE tasks SET `status` = $status WHERE id = $id";
        return $this->execute($query);
    }

}
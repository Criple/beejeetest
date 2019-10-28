<?php

namespace App\Controller;

use \App\Controller;

session_start();
class Home extends Controller
{

    public function index ()
    {
        if (isset($_POST['page']) && !empty($_POST['page'])){
            $page = $_POST['page'];
        }else{
            $page = 1;
        }
        $kol = 3;
        $start = ($page * $kol) - $kol;
        $pagination = array('page' => $page, 'start' => $start, 'kol' => $kol);
        $sortField = '';
        $sortDirection = '';
        if (isset($_GET) && !empty($_GET)){
            $sortField = $_GET['sortField'];
            $sortDirection = $_GET['sortDirection'];
        }
        $db = $this->model('Tasks');
        $params['Tasks'] = $db->getAllTasks($sortField, $sortDirection, $pagination);
        $total = $db->countTasks();
        $str_pag = ceil($total[0]['count_tasks'] / $kol);
        $params['str_pag'] = $str_pag;
        return $this->render('Home', $params);
    }

    public function newTask(){
        return $this->render('newtask');
    }

    public function newTaskApply(){
        $err['fields'] = array();
        if(isset($_POST) && !empty($_POST)) {
            $userName = $_POST['user_name'];
            $email = $_POST['e_mail'];
            $taskText = htmlspecialchars($_POST['newTaskText']);
            $status = $_POST['status'];

            if (empty($userName)) {
                $err['fields']['userName'] = 'Имя пользователя';
            }
            if (empty($email)) {
                $err['fields']['email'] = 'E-mail';
            }
            if (empty($taskText)) {
                $err['fields']['taskText'] = 'Текст задачи';
            }
            if (empty($status)) {
                $err['fields']['status'] = 'Статус';
            }
        }
        if (!empty($err['fields'])){
            $params = $err['fields'];
            return $this->render('newtask', $params);
        }else{
            $db = $this->model('Tasks');
            if($db->createTask($userName, $email, $taskText, $status)){
                $_SESSION['createdTask'] = true;
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
            }

        }
        return true;
    }

    public function edit(){
        $taskId = $_GET['task_id'];
        if ($taskId){
            $db = $this->model('Tasks');
            $params = $db->getTaskById($taskId);
            return $this->render('Edit', $params);
        }

    }

    public function editApply(){
        $taskText = $_POST['newTaskText'];
        $taskID = $_POST['taskID'];
        if ($taskText){
            $db = $this->model('Tasks');
            $db->updateTaskText($taskID, $taskText);
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
        }
        return true;

    }

    public function statusChange(){
        $taskID = $_POST['taskID'];
        if ($taskID){
            $db = $this->model('Tasks');
            $task = $db->getTaskById($taskID);

            if($task[0]['status'] == '1'){
                var_dump($db->updateTaskStatus($taskID, 0));
            }else{
                $db->updateTaskStatus($taskID, 1);
            }
        }
        return true;
    }

}
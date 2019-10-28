<?php

namespace App\Controller;

use \App\Controller;

session_start();
class Authorization extends Controller
{

    public function index ()
    {
        $params['auth_err'] = array();
        $db = $this->model('Users');
        $user = $db->getAdmUser();
        if (isset($_POST) && !empty($_POST)) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if (empty($login)) {
                $params['auth_err']['login'] = 'Не ввели Логин';
            }
            if (empty($password)) {
                $params['auth_err']['password'] = 'Не ввели Пароль';
            }

            if (empty($params['auth_err'])) {
                if ($_POST['login'] == $user[0]['user_name'] && $_POST['password'] == $user[0]['password']) {
                    $_SESSION['auth'] = true;
                    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
                    return false;
                } else {
                    $params['auth_err']['msg'] = 'Неверные логин или пароль!';

                }
            }
        }


        return $this->render('AuthForm', $params);

    }

    public function logout()
    {
        $_SESSION['auth'] = null;
        session_destroy();
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
    }

}
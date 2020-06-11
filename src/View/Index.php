<?php


namespace Hospital\View;

use Hospital\Domain\Models\Core\Employee;
use Hospital\View\Core\Handler;
use Hospital\View\Core\Page;

class Index extends Page implements Handler
{
    protected function __construct()
    {
        parent::__construct('index', "/", 'Please Login', "login.php", array(
            'css' => ['login.css'],
            'js' => []
        ));
    }

    public function handle_get($request)
    {

    }

    public function handle_post($request)
    {
        if (isset($request['submit-login'])) {
            list('email' => $email, 'password' => $password) = $request;
            self::handle_login($email, $password);
        }
    }

    public static function handle_login($email, $password)
    {
        $user = (new Employee)->get_by_email($email);
        if ($user->password === $password) {
            $_SESSION['user'] = $user;
            header('Location: /dashboard');
        } else {
            echo "Incorrect";
        }
    }
}
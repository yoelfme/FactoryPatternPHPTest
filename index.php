<?php 

session_start();
$_SESSION['user'] = [];
$_SESSION['user']['name'] = 'Yoel';

require ('User.php');
require ('Coffee.php');

class AuthenticationService
{
    private $sessionData;
    public function __construct(array $sessionData = array())
    {
        $this->sessionData = $sessionData;
    }

    public function user()
    {
        return new User($this->sessionData);   
    }
}

class Controller 
{
    private $auth;

    public function __construct(AuthenticationService $auth)
    {
        $this->auth = $auth;
    }

    public function action()
    {
        $user = $this->auth->user();
        $coffee = new Coffee();

        $message = $user->drink($coffee);

        require 'view.php';
    }
}

$auth = new AuthenticationService($_SESSION['user']);
$controller = new Controller($auth);

$controller->action();
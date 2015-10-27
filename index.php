<?php 

require ('User.php');
require ('Coffee.php');
require ('AuthenticationService.php');
require ('CoffeeMaker.php');
require ('BarTender.php');

interface BeverageMaker
{
    public function make();
}

class Controller 
{
    private $auth;

    public function __construct(AuthenticationService $auth)
    {
        $this->auth = $auth;
    }

    public function action(BeverageMaker $beverageMake)
    {
        $user = $this->auth->user();
        $beverage = $beverageMake->make();

        $message = $user->drink($beverage);

        require 'view.php';
    }
}

$auth = new AuthenticationService(['name' => 'Yoel']);

$controller = new Controller($auth);
$controller->action(new BarTender());
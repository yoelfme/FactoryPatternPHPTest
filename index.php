<?php 

require ('User.php');
require ('Coffee.php');

class Controller 
{
    public function action()
    {
        $user = new User(['name' => 'Yoel']);
        $coffee = new Coffee();

        $message = $user->drink($coffee);

        echo "<h1>$message</h1>";
    }
}

$controller = new Controller();

$controller->action();
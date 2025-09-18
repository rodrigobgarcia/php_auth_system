<?php

include "User.php";

class View 
{
    public array $users = [];

    public function addUser (User $user)
    {
        $this->users[] = $user;

    }

}

$view = new View();
$user1 = new User("1", "Joao", "jlinguica@liguica.com", "1234");
$view->addUser($user1);

print_r($view->users);

?>
<?php

class User {
    public $id;
    public $name;
    public $email;
    public $senha;

    public function __construct(string $id, string $name, string $email, string $senha)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->senha = $senha;
    }

}

?>
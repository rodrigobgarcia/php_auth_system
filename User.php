<?php

class User {
    public $id;
    public $name;
    public $email;
    public $senha;

    public function validateEmail ($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            echo "Email válido!";
        } else {
            echo "Email inválido!";
        }
    }

    public function validatePassword ($password)
    {
        if ($password.length < 8 and $password)
    }



//Validar se o e-mail é válido.
//Validar se a senha é forte (mín. 8 caracteres, ao menos 1 número e 1 maiúscula).
//Gerar hash seguro da senha com password_hash.
//Não permitir e-mails duplicados.
}

?>
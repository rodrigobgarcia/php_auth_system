<?php

class Validator
{

    public function validarEmail($email): array
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['status' => false, 'msg_erro' => 'Email inválido.' . PHP_EOL];
        }

        return ['status' => true, 'msg_erro' => 'E-mail válido.' . PHP_EOL];

    }

    public function validarSenha($password): array
    {
        if (strlen($password) && preg_match('/[0-9]/', $password) && preg_match('/[A-Z]/', $password)) {
            return ['status' => true, 'msg_erro' => 'Senha válida' . PHP_EOL];
        }

        return ['status' => false, 'msg_erro' => 'Senha inválida' . PHP_EOL];
    }


}
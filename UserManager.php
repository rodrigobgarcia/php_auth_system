<?php
require_once "Validator.php";
require_once "User.php";

class Service
{
    private array $userList = [];

    public Validator $validations;
    public function __construct()
    {
        $this->validations = new Validator();
    }


    public function cadastrar(Usuario $usuario): array
    {
        $email = $usuario->getEmail();
        $nome = $usuario->getNome();
        $senha = $usuario->getPassword();

        foreach ($this->userList as $user) {
            if ($user->getEmail() === $email) {
                return ['status' => false, 'msg_erro' => 'Email já está em uso.' . PHP_EOL];
            }
        }

        $resultadoEmail = $this->validations->validarEmail($email);
        if (!$resultadoEmail['status']) {
            return ['status' => false, 'msg_erro' => $resultadoEmail['msg_erro']];
        }

        $resultPassword = $this->validations->validarSenha($senha);
        if (!$resultPassword['status']) {
            return ['status' => false, 'msg_erro' => $resultPassword['msg_erro']];
        }

        $this->userList[] = $usuario;
        return ['status' => true, 'mensagem' => 'Usuário cadastrado com sucesso!', 'msg_erro' => 'Tudo certo.' . PHP_EOL];

    }

    public function login($email, $password): array
    {
        foreach ($this->userList as $user) {
            if ($user->getEmail() === $email) {
                if (password_verify($password, $user->getPassword())) {
                    return [
                        'status' => true,
                        'mensagem' => 'Login feito com sucesso.',
                        'msg_erro' => 'tudo certo.' . PHP_EOL
                    ];
                } else {
                    return [
                        'status' => false,
                        'mensagem' => 'Credenciais Inválidas' . PHP_EOL,
                        'msg_erro' => 'Login falhou' . PHP_EOL
                    ];
                }
            }
        }
        return [
            'status' => false,
            'mensagem' => 'Usuário não encontrado.' . PHP_EOL,
            'msg_erro' => 'Login falhou' . PHP_EOL
        ];
    }

    public function passwordReset($id, $password): array
    {
        $resultPassword = $this->validations->validarSenha($password);
        if (!$resultPassword['status']) {
            return ['status' => false, 'msg_erro' => $resultPassword['msg_erro']];
        }

        foreach ($this->userList as $user) {
            if ($user->getId() === $id) {
                $user->setPassword($password);
                return [
                    'status' => true,
                    'mensagem' => 'Senha alterada com sucesso.' . PHP_EOL,
                    'msg_erro' => 'tudo certo.' . PHP_EOL
                ];
            }

        }
        return [
            'status' => false,
            'mensagem' => 'Senha não alterada.' . PHP_EOL,
            'msg_erro' => 'Id não encontrado.' . PHP_EOL
        ];
    }
}

?>
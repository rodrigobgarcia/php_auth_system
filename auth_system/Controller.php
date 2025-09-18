<?php
require_once 'User.php';
require_once 'Validator.php';


class Controller
{
    private array $usersData;

    public function __construct(array $initialUsers)
    {
        $this->usersData = $initialUsers;
    }

    public function registerUser(string $name, string $email, string $password): array
    {
        if(!Validator::isValidEmail($email))
        {
            return['success' => false, 'message' => 'Email inválido'];
        }

        if(!Validator::isStrongPassword($password))
        {
            return['success' => false, 'message' => 'Senha não é forte'];
        }

        foreach ($this->usersData as $user)
        {
            if ($user['email']===$email)
            {
                return ['success' => false, 'message' => 'Email já existe'];
            }
        }

        $newUserId = count($this->usersData)>0 ? end($this->usersData)['id']+1:1;
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $this->usersData[] = [
            'id' => $newUserId,
            'name' =>$name,
            'email' =>$email,
            'password' => $hashedPassword
        ];

        return [
            'success' => true,
            'message' => 'Usuario Cadastrado com sucesso',
            'user' => new User ($newUserId, $name, $email, $hashedPassword)
        ];

    }

     public function loginUser(string $email, string $password): array
    {
        foreach ($this->usersData as $user) {
            if ($user['email'] === $email) {
                if (password_verify($password, $user['senha'])) {
                    return ['success' => true, 'message' => 'Login bem-sucedido.'];
                }
            }
        }
        return ['success' => false, 'message' => 'Credenciais inválidas.'];
    }

    public function resetPassword(int $id, string $newPassword): array
    {
        if (!Validator::isStrongPassword($newPassword)) {
            return ['success' => false, 'message' => 'A nova senha não é forte o suficiente.'];
        }

        foreach ($this->usersData as $key => $user) {
            if ($user['id'] === $id) {
                $this->usersData[$key]['senha'] = password_hash($newPassword, PASSWORD_BCRYPT);
                return ['success' => true, 'message' => 'Senha alterada com sucesso.'];
            }
        }
        return ['success' => false, 'message' => 'Usuário não encontrado.'];
    }

    public function getAllUsers(): array
    {
        return $this->usersData;
    }



}

//Validar se o e-mail é válido.
//Validar se a senha é forte (mín. 8 caracteres, ao menos 1 número e 1 maiúscula).
//Gerar hash seguro da senha com password_hash.
//Não permitir e-mails duplicados.


?>
<?php
require_once 'Controller.php';


$users = [
    [
        'id' => 1,
        'nome' => 'João Silva',
        'email' => 'joao@email.com',
        'senha' => password_hash('SenhaForte1', PASSWORD_BCRYPT)
    ],
];

$controller = new Controller($users);



$testeCadastro = $controller->registerUser('Maria Oliveira', 'maria@email.com', 'Senha123');
print_r($testeCadastro);
echo "\n";


$testeLogin = $controller->loginUser('joao@email.com', 'SenhaForte1');
print_r($testeLogin);
echo "\n";


$testeSenhaFraca = $controller->registerUser('Pedro', 'pedro@email.com', '123');
print_r($testeSenhaFraca);
echo "\n";


$testeEmailInvalido = $controller->registerUser('Ana', 'ana@@mail', 'Senha123');
print_r($testeEmailInvalido);
echo "\n";


$emailDuplicado = $controller->registerUser('Pedro', 'joao@email.com', 'Senha123');
print_r($emailDuplicado);
echo "\n";


$resetSenha = $controller->resetPassword(1, 'NovaSenhaSegura');
print_r($resetSenha);
echo "\n";


print_r($controller->getAllUsers());
?>
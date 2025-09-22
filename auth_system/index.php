<?php
require_once 'UserManager.php';
require_once 'User.php';
require_once 'Validator.php';

$service = new Service();


echo "<h1>Resultados do Testes</h1>";

// Caso de Uso 1
$useCase1 = new Usuario('1', 'Matheus Ze Ruela', 'matheus.mathmail', 'Mathildis2025');
$useCase1Result = $service->cadastrar($useCase1);
echo "<p><strong>Resultado do Caso 1:</strong> " . htmlspecialchars($useCase1Result['msg_erro']) . "</p>";

// Caso de Uso 2
$useCase2 = new Usuario('2', 'Nicolas Cage', 'Ncage@mail.com', 'IloceNicCage123');
$useCase2result = $service->cadastrar($useCase2);
echo "<p><strong>Resultado do Caso 2:</strong> " . htmlspecialchars($useCase2result['mensagem']) . "</p>";

// Caso de Uso 3
$useCase3 = new Usuario('3', 'Neymar', 'pernadepau@gmail.com', 'EuJogoMuitoMal2025');
$useCase3Cad = $service->cadastrar($useCase3);
$useCase3result = $service->login('pernadepau@gmail.com', 'EuJogoMuitoMal123');
echo "<p><strong>Resultado do Caso 3:</strong> " . htmlspecialchars($useCase3result['mensagem']) . "</p>";

// Caso de Uso 4
$useCase4 = $service->passwordReset('2', 'TrocaSenha188');
echo "<p><strong>Resultado do Caso 4:</strong> " . htmlspecialchars($useCase4['mensagem']) . "</p>";

// Caso de Uso 5
$useCase5 = new Usuario('2', 'Nicolas Camacho', 'Ncage@mail.com', 'IloveCoding123');
$useCase5result = $service->cadastrar($useCase5);
echo "<p><strong>Resultado do Caso 5:</strong> " . htmlspecialchars($useCase5result['msg_erro']) . "</p>";

?>
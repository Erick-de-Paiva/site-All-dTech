<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'conexao.php';

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Dados inválidos.']);
    exit;
}

try {
    $sqlVerifica = "SELECT id FROM usuarios WHERE cpf = :cpf OR email = :email OR login = :login";
    $stmtVerifica = $pdo->prepare($sqlVerifica);
    $stmtVerifica->execute([
        ':cpf' => $dados['cpf'],
        ':email' => $dados['email'],
        ':login' => $dados['login']
    ]);

    if ($stmtVerifica->rowCount() > 0) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'CPF, E-mail ou Login já cadastrados no sistema.']);
        exit;
    }

    $senhaHash = password_hash($dados['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, nasc, sexo, materno, cpf, email, celular, fixo, cep, rua, numero, complemento, login, senha) 
            VALUES (:nome, :nasc, :sexo, :materno, :cpf, :email, :celular, :fixo, :cep, :rua, :numero, :complemento, :login, :senha)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $dados['nome'],
        ':nasc' => $dados['nasc'],
        ':sexo' => $dados['sexo'],
        ':materno' => $dados['materno'],
        ':cpf' => $dados['cpf'],
        ':email' => $dados['email'],
        ':celular' => $dados['celular'],
        ':fixo' => $dados['fixo'],
        ':cep' => $dados['cep'],
        ':rua' => $dados['rua'],
        ':numero' => $dados['numero'],
        ':complemento' => $dados['complemento'] ?? '',
        ':login' => $dados['login'],
        ':senha' => $senhaHash
    ]);

    echo json_encode(['sucesso' => true, 'mensagem' => 'Cadastro realizado com sucesso!']);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro no servidor: ' . $e->getMessage()]);
}
?>

<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once 'conexao.php';

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados || empty($dados['login']) || empty($dados['senha'])) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos.']);
    exit;
}

try {
    $sql = "SELECT * FROM usuarios WHERE login = :login";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':login' => $dados['login']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($dados['senha'], $usuario['senha'])) {
        $_SESSION['usuario_logado'] = $usuario['login'];
        echo json_encode([
            'sucesso' => true, 
            'mensagem' => 'Login efetuado com sucesso!',
            'login' => $usuario['login']
        ]);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Login ou senha incorretos.']);
    }

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro no servidor: ' . $e->getMessage()]);
}
?>

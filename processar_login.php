<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

$host = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "all_dtech";

$conn = new mysqli($host, $usuario_db, $senha_db, $banco);
if ($conn->connect_error) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro de conexão com o banco de dados.']);
    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados || empty($dados['login']) || empty($dados['senha'])) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos.']);
    exit;
}

$login = trim($dados['login']);
$senha = $dados['senha'];

$sql = "SELECT id, login, senha, perfil, nome, cpf FROM usuarios WHERE login = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro na preparação da consulta.']);
    exit;
}

$stmt->bind_param("s", $login);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado && $resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($senha, $usuario['senha'])) {
        
        if ($usuario['login'] === 'master') {
            $_SESSION['usuario_logado'] = $usuario['login'];
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['perfil'] = 'master';

            try {
                $sqlLog = "INSERT INTO logs_acesso (usuario_id, nome_usuario, cpf_usuario, status_2fa) VALUES (?, ?, ?, ?)";
                $stmtLog = $conn->prepare($sqlLog);
                if ($stmtLog) {
                    $idUser = $usuario['id'];
                    $nomeUser = $usuario['nome'] ?? $usuario['login'];
                    $cpfUser = $usuario['cpf'] ?? '000.000.000-00';
                    $statusLog = 'Sucesso - Master Bypass Login';
                    $stmtLog->bind_param("isss", $idUser, $nomeUser, $cpfUser, $statusLog);
                    $stmtLog->execute();
                    $stmtLog->close();
                }
            } catch (Exception $e) {
                // Ignora erro de log para não travar o fluxo
            }

            echo json_encode([
                'sucesso' => true, 
                'mensagem' => 'Login master validado com sucesso!',
                'redirecionar' => 'index.php'
            ]);
            exit;
        }

        $_SESSION['temp_user_id'] = $usuario['id'];
        $_SESSION['temp_user_login'] = $usuario['login'];
        $_SESSION['temp_user_perfil'] = $usuario['perfil'] ?? 'comum'; 

        echo json_encode([
            'sucesso' => true, 
            'mensagem' => 'Login validado com sucesso!',
            'redirecionar' => '2fa.php'
        ]);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Login ou senha incorretos.']);
    }
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Login ou senha incorretos.']);
}

$stmt->close();
$conn->close();
?>

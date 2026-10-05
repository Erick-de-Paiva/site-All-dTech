<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['temp_user_id'])) {
    header("Location: login.html");
    exit;
}

$resposta_usuario = trim($_POST['resposta'] ?? '');

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $_SESSION['temp_user_id']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$resposta_correta = "";
switch ($_SESSION['tipo_pergunta']) {
    case 0: $resposta_correta = trim($usuario['materno']); break;
    case 1: $resposta_correta = trim($usuario['nasc']); break;
    case 2: $resposta_correta = trim($usuario['cep']); break;
}

function registarLog($pdo, $usuario, $status) {
    try {
        $sqlLog = "INSERT INTO logs_acesso (usuario_id, nome_usuario, cpf_usuario, status_2fa) VALUES (:id, :nome, :cpf, :status)";
        $stmtLog = $pdo->prepare($sqlLog);
        $stmtLog->execute([
            ':id' => $usuario['id'],
            ':nome' => $usuario['nome'] ?? $usuario['login'],
            ':cpf' => $usuario['cpf'] ?? '000.000.000-00',
            ':status' => $status
        ]);
    } catch (Exception $e) {
        // Ignora erro de log para não travar o fluxo principal
    }
}

if (strcasecmp($resposta_usuario, $resposta_correta) === 0) {
    // 2FA Sucesso! Promover sessão temporária a definitiva
    $_SESSION['usuario_logado'] = $usuario['login'];
    $_SESSION['user_id'] = $usuario['id'];
    $_SESSION['perfil'] = $usuario['perfil'];

    registarLog($pdo, $usuario, 'Sucesso - 2FA Aprovado');

    unset($_SESSION['temp_user_id'], $_SESSION['temp_user_login'], $_SESSION['temp_user_perfil'], $_SESSION['tipo_pergunta'], $_SESSION['tentativas_2fa']);

    header("Location: index.php");
    exit;

} else {
    $_SESSION['tentativas_2fa']++;

    if ($_SESSION['tentativas_2fa'] >= 3) {
        registarLog($pdo, $usuario, 'Falha - Bloqueado por 3 tentativas no 2FA');
        
        session_destroy();
        echo "<script>alert('3 tentativas sem sucesso! Favor realizar Login novamente.'); window.location.href='login.html';</script>";
        exit;
    } else {
        $restantes = 3 - $_SESSION['tentativas_2fa'];
        echo "<script>alert('Resposta incorreta! Você tem mais $restantes tentativa(s).'); window.location.href='2fa.php';</script>";
        exit;
    }
}
?>

<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['temp_user_id'])) {
    header("Location: login.html");
    exit;
}

if (!isset($_SESSION['tipo_pergunta'])) {
    $_SESSION['tipo_pergunta'] = rand(0, 2);
    $_SESSION['tentativas_2fa'] = 0;
}

$stmt = $pdo->prepare("SELECT materno, nasc, cep FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $_SESSION['temp_user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$texto_pergunta = "";
switch ($_SESSION['tipo_pergunta']) {
    case 0:
        $texto_pergunta = "Qual o nome da sua mãe?";
        break;
    case 1:
        $texto_pergunta = "Qual a sua data de nascimento? (AAAA-MM-DD)";
        break;
    case 2:
        $texto_pergunta = "Qual o CEP do seu endereço?";
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>All'Dtech - Verificação 2FA</title>
    <link rel="stylesheet" href="css/2fa.css">
</head>
<body>
    <div class="login-container">
        <h2>Verificação de Segurança (2FA)</h2>
        <p>Por favor, responda à pergunta abaixo para continuar:</p>
        
        <form action="processar_2fa.php" method="POST">
            <div class="form-group">
                <label><strong><?php echo $texto_pergunta; ?></strong></label>
                <input type="text" name="resposta" required placeholder="Digite sua resposta aqui...">
            </div>
            
            <button type="submit" class="btn-submit">Validar Resposta</button>
        </form>
        
        <div id="msgBox" class="msg"></div>
    </div>
</body>
</html>

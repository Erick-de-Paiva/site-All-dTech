<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}

$mensagem = "";
$tipo_alerta = "";
$erro_senha_atual = false;
$erro_nova_senha = false;

$host = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "all_dtech";

$conn = new mysqli($host, $usuario_db, $senha_db, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];
    $usuario = $_SESSION['usuario_logado'];

    if (empty($senha_atual) || empty($nova_senha) || empty($confirma_senha)) {
        $mensagem = "Por favor, preencha todos os campos.";
        $tipo_alerta = "erro";
    } elseif ($nova_senha !== $confirma_senha) {
        $mensagem = "A nova senha e a confirmação não coincidem.";
        $tipo_alerta = "erro";
        $erro_nova_senha = true;
    } elseif (strlen($nova_senha) !== 8 || !ctype_alpha($nova_senha)) {
        $mensagem = "A nova senha deve ter exatamente 8 caracteres alfabéticos.";
        $tipo_alerta = "erro";
        $erro_nova_senha = true;
    } else {
        $sql = "SELECT senha FROM usuarios WHERE login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $dados = $resultado->fetch_assoc();
            
            if (password_verify($senha_atual, $dados['senha']) || $senha_atual === $dados['senha']) {
                $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

                $update_sql = "UPDATE usuarios SET senha = ? WHERE login = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("ss", $nova_senha_hash, $usuario);

                if ($update_stmt->execute()) {
                    $mensagem = "Senha alterada com sucesso!";
                    $tipo_alerta = "sucesso";
                } else {
                    $mensagem = "Erro ao atualizar a senha no banco de dados.";
                    $tipo_alerta = "erro";
                }
                $update_stmt->close();
            } else {
                $mensagem = "A senha atual está incorreta.";
                $tipo_alerta = "erro";
                $erro_senha_atual = true;
            }
        } else {
            $mensagem = "Usuário não encontrado.";
            $tipo_alerta = "erro";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/alterar_senha.css">
    <title>Alterar Senha - ALL'DTech</title>
</head>

<body>

    <?php include 'components/header.php'; ?>

    <main class="main-container">
        <h1 class="titulo-secao">
            Alterar Senha
        </h1>

        <div class="form-card">
            <?php if (!empty($mensagem)): ?>
                <div class="alerta <?php echo $tipo_alerta; ?>">
                    <?php echo $mensagem; ?>
                </div>
            <?php endif; ?>

            <form action="alterar_senha.php" method="POST" class="auth-form">
                <div class="input-group">
                    <label for="senha_atual">Senha Atual</label>
                    <input type="password" id="senha_atual" name="senha_atual" required placeholder="Digite sua senha atual" class="<?php echo $erro_senha_atual ? 'input-erro' : ''; ?>">
                </div>

                <div class="input-group">
                    <label for="nova_senha">Nova Senha</label>
                    <input type="password" id="nova_senha" name="nova_senha" required placeholder="Digite a nova senha" class="<?php echo $erro_nova_senha ? 'input-erro' : ''; ?>">
                </div>

                <div class="input-group">
                    <label for="confirma_senha">Confirmar Nova Senha</label>
                    <input type="password" id="confirma_senha" name="confirma_senha" required placeholder="Confirme a nova senha" class="<?php echo $erro_nova_senha ? 'input-erro' : ''; ?>">
                </div>

                <button type="submit" class="btn-submit">Atualizar Senha</button>
            </form>
        </div>    
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/theme.js"></script>
</body>

</html>

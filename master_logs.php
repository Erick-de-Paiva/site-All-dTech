<?php
session_start();

if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== 'master' || (isset($_SESSION['perfil']) && $_SESSION['perfil'] !== 'master')) {
    header("Location: login.php");
    exit;
}

$host = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "all_dtech";

$conn = new mysqli($host, $usuario_db, $senha_db, $banco);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT id, usuario_id, nome_usuario, cpf_usuario, data_hora, status_2fa FROM logs_acesso ORDER BY data_hora DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Master - Logs de Acesso</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/master.css">
</head>
<body class="master-body">

    <?php include 'components/header.php'; ?>

    <div class="master-container">
         <h1 class="titulo-secao" style="color: #00d4ff; font-size: 3rem; margin-bottom: 45px; text-align: center; font-weight: 700; text-shadow: 0 0 12px rgba(0, 212, 255, 0.4);">Auditoria de Logs de Acesso</h1>

        <div class="nav-links">
            <a href="master_usuarios.php">👥 Consultar Usuários</a>
            <a href="master_logs.php" style="color: #aaa;">📋 Logs de Autenticação</a>
        </div>

        <div class="master-card">
            <table class="tabela-usuarios">
                <thead>
                    <tr>
                        <th>ID Log</th>
                        <th>ID Usuário</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data e Hora</th>
                        <th>Status / 2FA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultado && $resultado->num_rows > 0): ?>
                        <?php while ($log = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $log['id']; ?></td>
                                <td><?php echo $log['usuario_id']; ?></td>
                                <td><?php echo htmlspecialchars($log['nome_usuario']); ?></td>
                                <td><?php echo htmlspecialchars($log['cpf_usuario']); ?></td>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($log['data_hora'])); ?></td>
                                <td><span class="badge-status"><?php echo htmlspecialchars($log['status_2fa']); ?></span></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; color: #888; padding: 20px;">Nenhum registro de log encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/theme.js"></script>
</body>
</html>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== 'master') {
    header("Location: login.php?erro=acesso_negado");
    exit;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}

$host = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "all_dtech";

$conn = new mysqli($host, $usuario_db, $senha_db, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if (isset($_GET['excluir'])) {
    $id_excluir = $_GET['excluir'];
    $sql_del = "DELETE FROM usuarios WHERE id = ? AND login != 'master'";
    $stmt_del = $conn->prepare($sql_del);
    $stmt_del->bind_param("i", $id_excluir);
    $stmt_del->execute();
    $stmt_del->close();
    header("Location: master_usuarios.php");
    exit;
}

$pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : "";

if (!empty($pesquisa)) {
    $sql = "SELECT id, nome, login, email, cpf, data_cadastro FROM usuarios WHERE nome LIKE ?";
    $stmt = $conn->prepare($sql);
    $termo = "%" . $pesquisa . "%";
    $stmt->bind_param("s", $termo);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $sql = "SELECT id, nome, login, email, cpf, data_cadastro FROM usuarios";
    $resultado = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Master - Consulta de Usuários</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/master.css">
</head>
<body>

    <?php include 'components/header.php'; ?>

    <main class="master-container">
        <h1 class="titulo-secao" style="color: #00d4ff; font-size: 3rem; margin-bottom: 45px; text-align: center; font-weight: 700; text-shadow: 0 0 12px rgba(0, 212, 255, 0.4);">Painel Master - Gestão de Usuários</h1>
        
        <div class="nav-links">
            <a href="master_usuarios.php">👥 Consultar Usuários</a>
            <a href="master_logs.php" style="color: #aaa;">📋 Logs de Autenticação</a>
        </div>

        <div class="master-card">
            <form method="GET" class="search-form">
                <input type="text" name="pesquisa" placeholder="Pesquisar por parte do nome do usuário..." value="<?php echo htmlspecialchars($pesquisa); ?>">
                <button type="submit" class="btn-search">Pesquisar</button>
            </form>

            <div style="overflow-x: auto;">
                <table class="tabela-usuarios">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>E-mail</th>
                            <th>CPF</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultado && $resultado->num_rows > 0): ?>
                            <?php while($row = $resultado->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                                    <td><?php echo htmlspecialchars($row['login']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['cpf']); ?></td>
                                    <td>
                                        <a href="master_usuarios.php?excluir=<?php echo $row['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 20px; color: #888;">Nenhum usuário encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/theme.js"></script>
</body>
</html>
<?php 
if (isset($stmt)) $stmt->close();
$conn->close();
?>

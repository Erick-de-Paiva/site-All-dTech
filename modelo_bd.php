<?php
session_start();
if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Modelo do Banco de Dados</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modelo_bd.css">
</head>
<body>

    <?php include 'components/header.php'; ?>

    <div class="db-container">
        <h2>Modelo Entidade-Relacionamento (DER)</h2>
        <p>Abaixo está representada a modelagem do banco de dados utilizada para este sistema.</p>
        
        <div class="db-img-box">
            <img src="img/modelo_bd.png" alt="Modelo DER do Banco de Dados">
        </div>
        
        <br>
        <a href="index.php" class="btn-voltar">Voltar à Página Principal</a>
    </div>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/theme.js"></script>
</body>
</html>

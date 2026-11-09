<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ALL'DTech</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'components/header.php'; ?>

    <main class="main-container">
        <h1 class="titulo-secao">Acessar Sistema</h1>

        <div class="form-card">
            <div id="msgBox" class="msg"></div>

            <form onsubmit="entrar(event)" class="auth-form">
                <div class="input-group">
                    <label for="login">Login *</label>
                    <input type="text" id="login" required placeholder="Digite seu login">
                </div>

                <div class="input-group">
                    <label for="senha">Senha *</label>
                    <input type="password" id="senha" required placeholder="Digite sua senha">
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn-submit">Enviar</button>
                    <button type="reset" class="btn-secondary">Limpar</button>
                </div>
            </form>

            <p style="text-align:center; margin-top:20px; color: #ccc; font-size: 1.3rem">
                Novo usuário? <a href="cadastro.php" id="cad" style="color: #00bcd4; text-decoration: none; font-weight: 600;">Cadastre-se</a>
            </p>
        </div>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/cadastro.js" defer></script>
    <script src="js/theme.js"></script>
</body>
</html>

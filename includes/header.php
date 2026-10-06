<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
    <link rel="stylesheet" href="css/header.css">
</head>

<div class="barra">
    <a href="index.php">
        <img id="logo" src="img/logo-branca.png" alt="logo" width="200">
    </a>
    
    <div class="pesquisa">
        <input type="text" placeholder="Digite aqui...">
        <button>🔍</button>
    </div>

    <div class="header-tools">
        <button id="toggleTheme" class="theme-btn" title="Alternar Tema">☀️</button>
        <button id="fontBtn" class="font-btn" title="Ajustar Tamanho da Fonte">
            Aa <span id="fontScale">(1x)</span>
        </button>
    </div>

    <div class="user">
        <div class="header-user-info">
            <?php if (isset($_SESSION['usuario_logado'])): ?>
                <div class="user-logged-box">
                    <img id="loginIcon" src="img/login-branco.png" alt="Usuário" class="user-icon">
                    <span class="user-welcome">
                        Olá, <strong><?php echo htmlspecialchars($_SESSION['usuario_logado']); ?></strong>
                        <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'master'): ?>
                            <span class="user-master-tag">(Master)</span>
                        <?php endif; ?>
                    </span>
                    <a href="logout.php" class="logout-link">Sair</a>
                </div>
            <?php else: ?>
                <a href="login.php" class="login-btn">
                    <img id="loginIcon" src="img/login-branco.png" alt="Ícone Entrar" class="user-icon">
                    <span>Entrar</span>
                </a>
            <?php endif; ?>
        </div>
        
        <a href="#" class="cart">
            <img src="img/icons8-carrinho-de-compras-64.png" alt="carrinho" class="cart-icone">CARRINHO (0)
        </a>
    </div>
</div>

<nav class="menu">
    <ul>
        <li class="submenu-btn">
            <a href="#">☰</a>
            <ul class="submenu">
                <li class="subitem">
                    <a href="#">Hardware ></a>
                    <ul class="submenu2">
                        <li><a href="placa-video.php">Placa de video</a></li>
                        <li><a href="processador.php">Processador</a></li>
                    </ul>
                </li>
                <li class="subitem">
                    <a href="#">Monitor Gamer ></a>
                    <ul class="submenu2">
                        <li><a href="#">ACER</a></li>
                        <li><a href="#">LG</a></li>
                    </ul>
                </li>
                <li class="subitem">
                    <a href="#">Cadeira Gamer</a>
                    <ul class="submenu2">
                        <li><a href="#">Cadeira</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="index.php">HOME</a></li>
        <li><a href="produtos.php">PRODUTOS</a></li>
        <li><a href="quemsomos.php">QUEM SOMOS</a></li>
        <li><a href="cupons.php">CUPONS</a></li>
    </ul>
</nav>

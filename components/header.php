<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/carrinho.css">

<header class="header">
    <div class="barra">
        <a href="index.php">
            <img id="logo" src="img/logo-branca.png" alt="logo" width="200">
        </a>
        
        <div class="pesquisa-wrapper">
            <form class="pesquisa" action="pesquisa.php" method="GET">
                <input type="text" name="q" placeholder="Digite aqui..." value="<?php echo htmlspecialchars($_GET['q'] ?? ''); ?>" required>
                <button type="submit">🔍︎</button>
            </form>
        </div>

        <div class="header-right-group">
            <div class="header-tools">
                <button id="toggleTheme" class="theme-btn" title="Alternar Tema">☀️</button>
                <button id="fontBtn" class="font-btn" title="Ajustar Tamanho da Fonte">
                    Aa <span id="fontScale">(1x)</span>
                </button>
            </div>

            <div class="user">
                <div class="header-user-info">
                    <?php if (isset($_SESSION['usuario_logado'])): ?>
                        <details class="user-dropdown">
                            <summary class="user-logged-box">
                                <img id="loginIcon" src="img/login-branco.png" alt="Usuário" class="user-icon">
                                <span class="user-welcome">
                                    Olá, <strong><?php echo htmlspecialchars($_SESSION['usuario_logado']); ?></strong>
                                    <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'master'): ?>
                                        <span class="user-master-tag">(Master)</span>
                                    <?php endif; ?>
                                </span>
                                <span class="dropdown-arrow">▼</span>
                            </summary>
                            <ul class="user-menu-popup">
                               <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'master'): ?>
                                    <li><a href="master_usuarios.php">⚙️ Painel Usuários</a></li>
                                    <li><a href="master_logs.php">📊 Logs de Acesso</a></li>
                                <?php else: ?>
                                    <li><a href="alterar_senha.php">🔑 Alterar Senha</a></li>
                                <?php endif; ?>

                                <li><a href="logout.php" class="logout-link">🚪 Sair</a></li>
                            </ul>
                        </details>
                    <?php else: ?>
                        <a href="login.php" class="login-btn">
                            <img id="loginIcon" src="img/login-branco.png" alt="Ícone Entrar" class="user-icon">
                            <span>Entrar</span>
                        </a>
                    <?php endif; ?>
                </div>
                
                <a href="carrinho.php" class="cart">
                    <img src="img/icons8-carrinho-de-compras-64.png" alt="carrinho" class="cart-icone">CARRINHO (<span id="cartCount"><?php echo array_sum(array_column($_SESSION['carrinho'] ?? [], 'qtd')); ?></span>)
                </a>
            </div>
        </div>
    </div>

    <nav class="menu">
        <ul>
            <li class="submenu-btn" id="menuHamburguer">
                <details class="menu-details" name="menu-principal">
                    <summary class="hamburguer-icon">☰</summary>
                    <ul class="submenu">
                        <li class="subitem">
                            <details class="sub-details" name="submenu-hardware">
                                <summary>Hardware ></summary>
                                <ul class="submenu2">
                                    <li><a href="placa-video.php">Placa de video</a></li>
                                    <li><a href="processador.php">Processador</a></li>
                                </ul>
                            </details>
                        </li>
                        <li class="subitem">
                            <details class="sub-details" name="submenu-hardware">
                                <summary>Monitor Gamer ></summary>
                                <ul class="submenu2">
                                    <li><a href="#">ACER</a></li>
                                    <li><a href="#">LG</a></li>
                                </ul>
                            </details>
                        </li>
                        <li class="subitem">
                            <details class="sub-details" name="submenu-hardware">
                                <summary>Cadeira Gamer</summary>
                                <ul class="submenu2">
                                    <li><a href="#">Cadeira</a></li>
                                </ul>
                            </details>
                        </li>
                    </ul>
                </details>
            </li>
            <li><a href="index.php">HOME</a></li>
            <li><a href="produtos.php">PRODUTOS</a></li>
            <li><a href="quemsomos.php">QUEM SOMOS</a></li>
            <li><a href="cupons.php">CUPONS</a></li>
        </ul>
    </nav>
</header>

<script src="js/menu.js"></script>
<script src="js/carrinho.js"></script>

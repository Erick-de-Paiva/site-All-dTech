<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="barra">
    <a href="index.php">
        <img id="logo" src="img/logo-branca.png" alt="logo" width="200">
    </a>
    
    <div class="pesquisa">
        <input type="text" placeholder="Digite aqui...">
        <button>🔍</button>
    </div>

    <button id="toggleTheme" class="theme-btn">🌞</button>
    <button id="fontBtn" class="font-btn">🔍</button>

    <div class="user">
        <div class="header-user-info" style="color: white; display: inline-block; vertical-align: middle; margin-right: 15px;">
            <?php if (isset($_SESSION['usuario_logado'])): ?>
                Logado como: <strong><?php echo htmlspecialchars($_SESSION['usuario_logado']); ?></strong>
                <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'master'): ?>
                    <span style="color: #ffc107; font-size: 12px; margin-left: 5px;">(Master)</span>
                <?php endif; ?>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="logout.php" style="color:white; text-decoration: underline;">Sair</a>
            <?php else: ?>
                <a href="login.php" class="Login" style="color: white; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                    <img id="loginIcon" src="img/login-branco.png" alt="" class="user-icon" style="width: 40px; height: 40px;"> Entrar
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

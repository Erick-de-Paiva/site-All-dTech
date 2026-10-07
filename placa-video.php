<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All'Dtech - Placas de Vídeo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
</head>

<body onload="carregarUsuario()">

    <header class="header">
        <?php include 'components/header.php'; ?>
    </header>

    <main class="catalogo-main">
        <section class="promo">
            <div class="section-header">
                <h2>🔥 AMD 🔥</h2>
            </div>

            <div class="prodt">
                <div class="prodt-card">
                    <img src="img/rx 7600.webp" alt="rx7600" class="card-img">
                    <p class="prodt-nome">RX 7600</p>
                    <p class="valor-novo">R$ 2.899,90 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <img src="img/rx570.jpeg" alt="rx570" class="card-img">
                    <p class="prodt-nome">RX 570</p>
                    <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p> 
                </div>

                <div class="prodt-card">
                    <img src="img/rx550.webp" alt="rx550" class="card-img">
                    <p class="prodt-nome">RX 550</p>
                    <p class="valor-novo">R$ 499,90 <span class="pg">à vista</span></p> 
                </div>

                <div class="prodt-card">
                    <img src="img/rx 9070.jpg" alt="rx9070" class="card-img">
                    <p class="prodt-nome">RX 9070 XT</p>
                    <p class="valor-novo">R$ 2.199,90 <span class="pg">à vista</span></p> 
                </div>
            </div>
        </section>
       
        <section class="promo">
            <div class="section-header">
                <h2>🔥 NVIDIA 🔥</h2>
            </div>

            <div class="prodt">
                <div class="prodt-card">
                    <img src="img/gtx1050.jpg" alt="gtx" class="card-img">
                    <p class="prodt-nome">GTX 1050</p>
                    <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <img src="img/rtx3050.jpg" alt="rtx3050" class="card-img">
                    <p class="prodt-nome">RTX 3050</p>
                    <p class="valor-novo">R$ 2.899,90 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <img src="img/rtx5090.jfif" alt="RTX5090" class="card-img">
                    <p class="prodt-nome">RTX 5090</p>
                    <p class="valor-novo">R$ 3.899,90 <span class="pg">à vista</span></p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>
         
    <script src="js/cadastro.js" defer></script>
    <script src="js/theme.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Produtos - ALL'DTech</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body onload="carregarUsuario()">

    <header class="header">
        <?php include 'components/header.php'; ?>
    </header>

    <main class="catalogo-main">
        <div class="section-header">
            <h2>Catálogo de Produtos</h2>
        </div>

        <div class="prodt">
            <div class="prodt-card">
                <img src="img/AMD Ryzen 5 5600X.png" alt="AMD Ryzen 5 5600X" class="card-img">
                <p class="prodt-nome">AMD Ryzen 5 5600X</p>
                <p class="valor-novo">R$ 1.599,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/AMD Ryzen 5 3600.png" alt="Ryzen 5 3600" class="card-img">
                <p class="prodt-nome">Ryzen 5 3600</p>
                <p class="valor-novo">R$ 899,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/ASRock B550 Steel Legend.png" alt="Placa-Mãe ASRock B550 Steel Legend" class="card-img">
                <p class="prodt-nome">Placa-Mãe ASRock B550 Steel Legend</p>
                <p class="valor-novo">R$ 1.599,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/Colorful BATTLE-AX A520M-K.png" alt="Placa-Mãe A520M-K Colorful Battle-AX" class="card-img">
                <p class="prodt-nome">Placa-Mãe A520M-K Colorful Battle-AX</p>
                <p class="valor-novo">R$ 999,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/SanDisk Ultra 3D SATA SSD – 500GB.png" alt="SSD SanDisk Ultra 3D SATA 500GB" class="card-img">
                <p class="prodt-nome">SSD SanDisk Ultra 3D SATA 500GB</p>
                <p class="valor-novo">R$ 249,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/AMD Ryzen 7 7700X.png" alt="Ryzen 7 7700X" class="card-img">
                <p class="prodt-nome">Ryzen 7 7700X</p>
                <p class="valor-novo">R$ 2.299,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/ASRock X670E Taichi.png" alt="Placa-Mãe Gigabyte X670 AORUS MASTER" class="card-img">
                <p class="prodt-nome">Placa-Mãe Gigabyte X670 AORUS MASTER</p>
                <p class="valor-novo">R$ 2.599,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/be quiet! Pure Rock 2 Black.png" alt="Air Cooler be quiet! Pure Rock 2 Black" class="card-img">
                <p class="prodt-nome">Air Cooler be quiet! Pure Rock 2 Black</p>
                <p class="valor-novo">R$ 399,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/Intel Core i7-13700K.png" alt="Intel core i7-13700k" class="card-img">
                <p class="prodt-nome">Intel Core i7-13700K</p>
                <p class="valor-novo">R$ 2.499,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/Gigabyte Z790 AORUS ELITE AX..png" alt="Placa mãe ROG Strix Z790-E" class="card-img">
                <p class="prodt-nome">Placa Mãe ROG Strix Z790-E</p>
                <p class="valor-novo">R$ 1.199,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/WD Black SN850X NVMe SSD – 1TB.png" alt="SSD WD Black SN850X NVMe 1TB" class="card-img">
                <p class="prodt-nome">SSD WD Black SN850X NVMe 1TB</p>
                <p class="valor-novo">R$ 459,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/Corsair Dominator Platinum RGB DDR5 – 32GB (2x16GB) 6000MHz CL36.png" alt="Corsair Dominator Platinum DDR5 32GB (2x16GB)" class="card-img">
                <p class="prodt-nome">Corsair Dominator Platinum DDR5 32GB</p>
                <p class="valor-novo">R$ 1.299,99 <span class="pg">à vista</span></p>
            </div>

            <div class="prodt-card">
                <img src="img/ADATA XPG Spectrix D60G DDR4 – 16GB (2x8GB) 3600MHz CL18.png" alt="Adata XPG Spectrix DDR4 16GB (2x8GB)" class="card-img">
                <p class="prodt-nome">Adata XPG Spectrix DDR4 16GB</p>
                <p class="valor-novo">R$ 1.299,99 <span class="pg">à vista</span></p>
            </div>
        </div>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>
     
    <script src="js/theme.js"></script>
    <script src="js/cadastro.js" defer></script>
</body>

</html>

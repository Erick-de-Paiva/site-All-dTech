<?php
session_start();
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
    <script src="js/carrossel.js"></script>
    <script src="js/acess.js"></script>
    <title>All'Dtech</title>
</head>

<body>    
    <header class="header">
        <?php include 'components/header.php'; ?>
    </header>

    <main class="main-content">
        <section class="hero-carousel">
            <div class="slides">
                <div class="slide"><img src="img/banner teste .png" alt=""></div>
                <div class="slide"><img src="img/A1.png" alt=""></div>
                <div class="slide"><img src="img/BANNER 1.png" alt=""></div>
                <div class="slide"><img src="img/BANNER 4.png" alt=""></div>
                <div class="slide"><img src="img/PROPCARROSSEL3.svg" alt=""></div>
            </div>

            <!-- Botões -->
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
        </section>

        <section class="cards-section">
            <h2>⚡ SUPER DESTAQUES</h2>

            <div class="cards-container">
                <div class="card">
                    <img src="img/block-banner-1.png" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">Placa De Vídeo</h5>
                        <p class="card-text"></p><br><br>
                        <a href="#" class="btn">Comprar</a>
                    </div>
                </div>
        
                <div class="card">
                    <img src="img/block-banner-2.png" class="card-img-top" alt="Produto 2">
                    <div class="card-body">
                        <h5 class="card-title">Processador AMD</h5>
                        <p class="card-text"></p><br><br>
                        <a href="#" class="btn">Comprar</a>
                    </div>
                </div>
        
                <div class="card">
                    <img src="img/block-banner-3.png" class="card-img-top" alt="Produto 3">
                    <div class="card-body">
                        <h5 class="card-title">Processador Intel</h5>
                        <p class="card-text"></p> <br><br>
                        <a href="#" class="btn">Comprar</a>
                    </div>
                </div>

                <div class="card">
                    <img src="img/block-banner-4.webp" class="card-img-top" alt="Produto 4">
                    <div class="card-body">
                        <h5 class="card-title">Monitor</h5>
                        <p class="card-text"></p> <br><br>
                        <a href="#" class="btn">Comprar</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="promo">
            <div class="section-header">
                <h2>🔥🎄 DESCONTOS NATALINOS 🎄🔥</h2>
            </div>

            <div class="prodt">
                <div class="prodt-card">
                    <div class="desc">-30% OFF</div>
                    <img src="img/AMD Ryzen 5 7600.png" alt="Processador AMD Ryzen" id="card-img">
                    <p class="prodt-nome">Processador AMD Ryzen 5 5600X, 6-Cores, Com Cooler</p>
                    <p class="valor-antg">De: R$ 1.199,00</p>
                    <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <div class="desc">-30% OFF</div>
                    <img src="img/ASUS PRIME Z690-P..png" alt="ASUS PRIME Z690-P" id="card-img">
                    <p class="prodt-nome">ASUS PRIME Z690-P</p>
                    <p class="valor-antg">De: R$ 1.399,00</p>
                    <p class="valor-novo">R$ 999,90 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <div class="desc">-30% OFF</div>
                    <img src="img/Intel Core i5-11400F.png" alt="Intel Core i5" id="card-img">
                    <p class="prodt-nome">Intel Core i5-11400F</p>
                    <p class="valor-antg">De: R$ 799,00</p>
                    <p class="valor-novo">R$ 599,90 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <div class="desc">-30% OFF</div>
                    <img src="img/Crucial Ballistix DDR4 – 32GB (2x16GB) 3600MHz CL16.png" alt="Crucial Ballistix DDR4" id="card-img">
                    <p class="prodt-nome">Crucial Ballistix DDR4 RGB</p>
                    <p class="valor-antg">De: R$ 999,00</p>
                    <p class="valor-novo">R$ 799,90 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <div class="desc">-30% OFF</div>
                    <img src="img/PcGamer_Preto.png" alt="PC COMPLETO" id="card-img">
                    <p class="prodt-nome">Kit gamer completo</p>
                    <p class="valor-antg">De: R$ 3.299,00</p>
                    <p class="valor-novo">R$ 2.800,00 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <div class="desc">-30% OFF</div>
                    <img src="img/Gigabyte X670 AORUS MASTER.png" alt="Gigabyte X670 AORUS MASTER" id="card-img">
                    <p class="prodt-nome">Gigabyte X670 AORUS MASTER</p>
                    <p class="valor-antg">De: R$ 1.899,00</p>
                    <p class="valor-novo">R$ 1.560,00 <span class="pg">à vista</span></p>
                </div>
            </div>
        </section>

        <section class="promo">
            <div class="section-header">
                <h2>🔥 Mais Procurados 🔥</h2>
            </div>

            <div class="prodt">
                <div class="prodt-card">
                    <img src="img/cadeira gamer.jpg" alt="cadeira" id="card-img">
                    <p class="prodt-nome">Cadeira Gamer</p>
                    <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p>
                </div>

                <div class="prodt-card">
                    <img src="img/monitorgamer.webp" alt="monitor" id="card-img">
                    <p class="prodt-nome">Monitor gamer 144hz</p>
                    <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p> 
                </div>

                <div class="prodt-card">
                    <img src="img/g203.jpg" alt="mouse" id="card-img">
                    <p class="prodt-nome">Mouse Logitech G203</p>
                    <p class="valor-novo">R$ 199,90 <span class="pg">à vista</span></p> 
                </div>

                <div class="prodt-card">
                    <img src="img/AMD Ryzen 7 7700X.png" alt="processador" id="card-img">
                    <p class="prodt-nome">AMD Ryzen 7 7700X</p>
                    <p class="valor-novo">R$ 2.199,90 <span class="pg">à vista</span></p> 
                </div>

                <div class="prodt-card">
                    <img src="img/Corsair iCUE H100i Elite Capellix.png" alt="water cooler" id="card-img">
                    <p class="prodt-nome">Corsair iCUE H100i Elite</p>
                    <p class="valor-novo">R$ 1.899,90 <span class="pg">à vista</span></p> 
                </div>
            </div>    
        </section>
           
        <section class="localizacao">
            <h2 id="localizacao1">Onde Estamos</h2>
            <p class="endereco-texto">Av. Paris, 84 - Bonsucesso, Rio de Janeiro - RJ</p>

            <div class="mapa-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.252011705955!2d-43.256086026311074!3d-22.867147136452378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997c03b24d186f%3A0xf3dd300862682520!2sUNISUAM!5e0!3m2!1spt-BR!2sbr!4v1759760222394!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

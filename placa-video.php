<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="css/acessibilidade.css">
        <script src="js/carrossel.js"></script>
        <script src="js/acess.js"></script>
</head>

<body onload="carregarUsuario()">
    
    <header class="header">
        
    <?php include 'components/header.php'; ?>

    <section class="promo"> <br><br>
     <div class="section-header">
        <h2>🔥AMD🔥</h2>
     </div>

     <div class="prodt">
        
        <div class="prodt-card">
            <img src="img/rx 7600.webp" alt="rx7600" id="card-img">
            <p class="prodt-nome">RX 7600</p>
            <p class="valor-novo">R$ 2.899,90 <span class="pg">à vista</span></p>
        </div>

        <div class="prodt-card">
            <img src="img/rx570.jpeg" alt="rx570" id="card-img">
            <p class="prodt-nome">RX 570</p>
            <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p> 
        </div>

        <div class="prodt-card">
            <img src="img/rx550.webp" alt="rx550" id="card-img">
            <p class="prodt-nome">RX 550</p>
            <p class="valor-novo">R$ 499,90 <span class="pg">à vista</span></p> 
        </div>

        <div class="prodt-card">
            <img src="img/rx 9070.jpg" alt="rx9070" id="card-img">
            <p class="prodt-nome">RX 9070 XT</p>
            <p class="valor-novo">R$ 2.199,90 <span class="pg">à vista</span></p> 
        </div> <br>
    </section>
   
     <section class="promo"> <br><br>
     <div class="section-header">
        <h2>🔥NVIDIA🔥</h2>
     </div>

     <div class="prodt">
        
        <div class="prodt-card">
            <img src="img/gtx1050.jpg" alt="gtx" id="card-img">
            <p class="prodt-nome">GTX 1050</p>
            <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p>
        </div>

        <div class="prodt-card">
            <img src="img/rtx3050.jpg" alt="rtx3050" id="card-img">
            <p class="prodt-nome">RTX 3050</p>
            <p class="valor-novo">R$ 2.899,90 <span class="pg">à vista</span></p>
        </div>

        <div class="prodt-card">
            <img src="img/rtx5090.jfif" alt="RTX5090" id="card-img">
            <p class="prodt-nome">RTX 5090</p>
            <p class="valor-novo">R$ 3.899,90 <span class="pg">à vista</span></p>
        </div>
    </section>

<footer>
    <?php include 'components/footer.php'; ?>
</footer>
     
  </main>

<script src="js/cadastro.js" defer></script>
<script src="js/theme.js"></script>
</body>

</html>
        
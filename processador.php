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
<body>
    <body onload="carregarUsuario()">
    
    <header class="header">
        
    <?php include 'components/header.php'; ?>

    <section class="promo"> <br><br>
     <div class="section-header">
        <h2>🔥INTEL🔥</h2>
     </div>

     <div class="prodt">
        
        <div class="prodt-card">
            <img src="img/Intel Core i5-11400F.png" alt="i5" id="card-img">
            <p class="prodt-nome">Intel Core i5-11400F</p>
            <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p>
        </div>

        <div class="prodt-card">
            <img src="img/Intel Core i5-12600K.png" alt="i5" id="card-img">
            <p class="prodt-nome">Intel Core i5-12600K</p>
            <p class="valor-novo">R$ 999,90 <span class="pg">à vista</span></p> 
        </div>

        <div class="prodt-card">
            <img src="img/Intel Core i7-11700K.png" alt="I7" id="card-img">
            <p class="prodt-nome">Intel Core i7-11700K</p>
            <p class="valor-novo">R$ 1.499,90 <span class="pg">à vista</span></p> 
        </div>
    </section>
   
     <section class="promo"> <br><br>
     <div class="section-header">
        <h2>🔥AMD🔥</h2>
     </div>

     <div class="prodt">
        
        <div class="prodt-card">
            <img src="img/AMD Ryzen 5 7600.png" alt="ryzen 5 7" id="card-img">
            <p class="prodt-nome">AMD Ryzen 5 7600</p>
            <p class="valor-novo">R$ 899,90 <span class="pg">à vista</span></p>
        </div>

        <div class="prodt-card">
            <img src="img/AMD Ryzen 7 7700X.png" alt="rz7" id="card-img">
            <p class="prodt-nome">AMD Ryzen 7 7700X</p>
            <p class="valor-novo">R$ 1.199,90 <span class="pg">à vista</span></p>
        </div>

        <div class="prodt-card">
            <img src="img/AMD Ryzen 5 5600X.png" alt="R5" id="card-img">
            <p class="prodt-nome">AMD Ryzen 5 5600X</p>
            <p class="valor-novo">R$ 699,90 <span class="pg">à vista</span></p>
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
        
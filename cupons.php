<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cupons.css">
    <title>Cupons - ALL'DTech</title>
</head>

<body>
    
    <?php include 'components/header.php'; ?>

    <main class="cupons-main">
        <h1 class="titulo-pagina">Cupons de Desconto</h1>
        
        <div class="cupons-container">
            <div class="card">
                <img src="img/desconto-placavidio.png" class="card-img-top" alt="Desconto Placa de Vídeo">
                <div class="card-body">
                    <h5 class="card-title">PLACA-VIDEO10%OFF</h5>
                    <p class="card-text">10% DE DESCONTO EM PLACAS DE VÍDEO NVIDIA</p>
                </div>
            </div>

            <div class="card">
                <img src="img/desconto-memoria.png" class="card-img-top" alt="Desconto Memória RAM">
                <div class="card-body">
                    <h5 class="card-title">MEMÓRIARAM10%OFF</h5>
                    <p class="card-text">CUPOM DE 10% DE DESCONTO NA COMPRA DE DUAS MEMÓRIAS DE 8GB</p>
                </div>
            </div>

            <div class="card">
                <img src="img/primeira-compra.png" class="card-img-top" alt="Primeira Compra">
                <div class="card-body">
                    <h5 class="card-title">PRIMEIRACOMPRA</h5>
                    <p class="card-text">NA SUA PRIMEIRA COMPRA GANHE 15% DE DESCONTO</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/theme.js"></script>
</body>

</html>

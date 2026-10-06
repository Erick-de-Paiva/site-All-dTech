<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/cupons.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Cupons</title>
</head>
<body onload="carregarUsuario()">
    <header class="header">
        
    <?php include 'components/header.php'; ?>

    <div class="card" style="width: 18rem;">
 <br> <br> <img src="img/desconto-placavidio.png" class="card-img-top" alt="imagem 1" width="150px"> 
    <h5 class="card-title">PLACA-VIDEO10%OFF</h5> <br>
    <p class="card-text">10% DE DESCONTO EM PLACAS DE VIDEO NVIDIA</p> <br> <br>
    
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="img/desconto-memoria.png" class="card-img-top" alt="imagem 2" width="150px">
  <div class="card-body">
    <h5 class="card-title">MEMÓRIARAM10%OFF</h5> <br>
    <p class="card-text">CUPOM DE 10% DE DESCONTO NA COMPRA DE DUAS MEMORIAS DE 8GB</p> <br> <br>
  
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="img/primeira-compra.png" class="card-img-top" alt="imagem 3" width="150px">
  <div class="card-body">
    <h5 class="card-title">PRIMEIRACOMPRA</h5> <br> 
    <p class="card-text"> NA SUA PRIMEIRA COMPRA GANHA 15% DE DESCONTO</p> <br> <br>
    
  </div>
</div>
<footer>
    <?php include 'components/footer.php'; ?>
</footer>
<script src="js/theme.js"></script>
<script src="js/cadastro.js" defer></script>
</body>
</html>
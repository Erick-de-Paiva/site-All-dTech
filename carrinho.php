<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$paginas = ['index.php', 'produtos.php', 'placa-video.php', 'processador.php'];

function preco_para_centavos($texto) {
    if (!preg_match('/R\$\s*([\d.]+),(\d{2})/', $texto, $m)) return null;
    return ((int) str_replace('.', '', $m[1])) * 100 + (int) $m[2];
}

function limpar_nome($nome) {
    return trim(preg_replace('/\s+/', ' ', $nome));
}

function formatar($centavos) {
    return 'R$ ' . number_format($centavos / 100, 2, ',', '.');
}

function carregar_catalogo($paginas) {
    $catalogo = [];
    libxml_use_internal_errors(true);

    foreach ($paginas as $pagina) {
        $html = @file_get_contents(__DIR__ . '/' . $pagina);
        if ($html === false) continue;

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $html);
        $xpath = new DOMXPath($dom);

        foreach ($xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' prodt-card ')]") as $card) {
            $n = $xpath->query(".//*[contains(@class,'prodt-nome')]", $card)->item(0);
            $v = $xpath->query(".//*[contains(@class,'valor-novo')]", $card)->item(0);
            $i = $xpath->query(".//img", $card)->item(0);
            if (!$n || !$v) continue;

            $nome = limpar_nome($n->textContent);
            $centavos = preco_para_centavos($v->textContent);
            if ($centavos === null) continue;

            $catalogo[md5($nome . '|' . $centavos)] = [
                'nome'  => $nome,
                'preco' => $centavos,
                'img'   => $i ? $i->getAttribute('src') : ''
            ];
        }
    }
    return $catalogo;
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'add') {
        header('Content-Type: application/json');
        $nome = limpar_nome($_POST['nome'] ?? '');
        $centavos = preco_para_centavos($_POST['preco'] ?? '');
        $id = md5($nome . '|' . $centavos);
        $catalogo = carregar_catalogo($paginas);

        if ($centavos === null || !isset($catalogo[$id])) {
            http_response_code(400);
            echo json_encode(['ok' => false]);
            exit;
        }

        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id]['qtd']++;
        } else {
            $_SESSION['carrinho'][$id] = $catalogo[$id] + ['qtd' => 1];
        }

        echo json_encode(['ok' => true, 'count' => array_sum(array_column($_SESSION['carrinho'], 'qtd'))]);
        exit;
    }

    if ($acao === 'remover') {
        unset($_SESSION['carrinho'][$_POST['id'] ?? '']);
    }

    if ($acao === 'limpar') {
        $_SESSION['carrinho'] = [];
    }

    header('Location: carrinho.php');
    exit;
}

$itens = $_SESSION['carrinho'];
$total = 0;
foreach ($itens as $item) {
    $total += $item['preco'] * $item['qtd'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - ALL'DTech</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
</head>

<body>

    <?php include 'components/header.php'; ?>

    <main class="catalogo-main">
        <div class="section-header">
            <h2>Meu Carrinho</h2>
        </div>

        <div class="carrinho-box">
            <?php if (!$itens): ?>
                <div class="carrinho-vazio">
                    <p>Seu carrinho está vazio.</p>
                    <p><a href="produtos.php">Ver produtos</a></p>
                </div>
            <?php else: ?>
                <?php foreach ($itens as $id => $item): ?>
                    <div class="carrinho-item">
                        <img src="<?php echo htmlspecialchars($item['img']); ?>" alt="">
                        <div class="carrinho-info">
                            <p><strong><?php echo htmlspecialchars($item['nome']); ?></strong></p>
                            <p><?php echo formatar($item['preco']); ?> &times; <strong><?php echo (int) $item['qtd']; ?></strong></p>
                        </div>
                        <div class="carrinho-sub"><?php echo formatar($item['preco'] * $item['qtd']); ?></div>
                        <form method="POST" action="carrinho.php">
                            <input type="hidden" name="acao" value="remover">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                            <button type="submit" class="btn-remover">Excluir</button>
                        </form>
                    </div>
                <?php endforeach; ?>

                <div class="carrinho-total">
                    <span>Total: <?php echo formatar($total); ?></span>
                    <form method="POST" action="carrinho.php">
                        <input type="hidden" name="acao" value="limpar">
                        <button type="submit" class="btn-limpar">Esvaziar carrinho</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/theme.js"></script>
</body>

</html>

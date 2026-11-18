<?php
$paginas = ['produtos.php', 'placa-video.php', 'processador.php'];

function normalizar($t) {
    $t = mb_strtolower($t, 'UTF-8');
    $t = strtr($t, [
        'á'=>'a','à'=>'a','â'=>'a','ã'=>'a','ä'=>'a','é'=>'e','è'=>'e','ê'=>'e',
        'í'=>'i','ì'=>'i','î'=>'i','ó'=>'o','ò'=>'o','ô'=>'o','õ'=>'o','ö'=>'o',
        'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u','ç'=>'c','-'=>' '
    ]);
    return $t;
}

$q = trim($_GET['q'] ?? '');
$palavras = array_filter(explode(' ', normalizar($q)));
$resultados = [];
$vistos = [];

if ($palavras) {
    foreach ($paginas as $pagina) {
        $html = @file_get_contents(__DIR__ . '/' . $pagina); 
        if ($html === false) continue;

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $html);
        $xpath = new DOMXPath($dom);

        foreach ($xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' prodt-card ')]") as $card) {
            $nomeNode = $xpath->query(".//*[contains(@class,'prodt-nome')]", $card)->item(0);
            $nome = $nomeNode ? trim($nomeNode->textContent) : '';
            $texto = normalizar($nome . ' ' . $card->textContent);

            foreach ($palavras as $p) {
                if (strpos($texto, $p) === false) continue 2;
            }

            $chave = normalizar($nome) . '|' . trim($card->textContent); 
            if (isset($vistos[$chave])) continue;
            $vistos[$chave] = true;

            $resultados[] = $dom->saveHTML($card);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa - ALL'DTech</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
</head>

<body>

    <?php include 'components/header.php'; ?>

    <main class="catalogo-main">
        <div class="section-header">
            <h2>Resultados da pesquisa</h2>
        </div>

        <?php if ($q === ''): ?>
            <p style="text-align:center;">Digite algo na barra de pesquisa.</p>
        <?php elseif (!$resultados): ?>
            <p style="text-align:center;">Nenhum produto encontrado para "<strong><?php echo htmlspecialchars($q); ?></strong>".</p>
        <?php else: ?>
            <p style="text-align:center; font-size:1.3rem; margin-bottom:20px;">
                <?php echo count($resultados); ?> produto(s) encontrado(s) para "<strong><?php echo htmlspecialchars($q); ?></strong>"
            </p>
            <div class="prodt">
                <?php echo implode("\n", $resultados); ?>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/theme.js"></script>
</body>

</html>

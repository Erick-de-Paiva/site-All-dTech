<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'conexao.php';

function responder($sucesso, $mensagem) {
    echo json_encode([
        'sucesso' => $sucesso,
        'mensagem' => $mensagem
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);

if (!is_array($dados)) {
    responder(false, 'Dados inválidos.');
}

$nome = trim($dados['nome'] ?? '');
$nasc = trim($dados['nasc'] ?? '');
$sexo = trim($dados['sexo'] ?? '');
$materno = trim($dados['materno'] ?? '');
$cpf = trim($dados['cpf'] ?? '');
$email = trim($dados['email'] ?? '');
$celular = trim($dados['celular'] ?? '');
$fixo = trim($dados['fixo'] ?? '');
$cep = preg_replace('/\D/', '', $dados['cep'] ?? '');
$rua = trim($dados['rua'] ?? '');
$numero = trim($dados['numero'] ?? '');
$complemento = trim($dados['complemento'] ?? '');
$login = trim($dados['login'] ?? '');
$senha = $dados['senha'] ?? '';
$senha2 = $dados['senha2'] ?? '';

if (
    $nome === '' || $nasc === '' || $sexo === '' ||
    $materno === '' || $cpf === '' || $email === '' ||
    $celular === '' || $fixo === '' || $cep === '' ||
    $rua === '' || $numero === '' || $login === '' ||
    $senha === '' || $senha2 === ''
) {
    responder(false, 'Preencha todos os campos obrigatórios.');
}

if (
    mb_strlen($nome) < 15 ||
    mb_strlen($nome) > 80 ||
    !preg_match('/^[\p{L}\s]+$/u', $nome)
) {
    responder(false, 'O nome deve ter entre 15 e 80 caracteres e conter apenas letras.');
}

$data = DateTime::createFromFormat('Y-m-d', $nasc);

if (!$data || $data->format('Y-m-d') !== $nasc || $data > new DateTime('today')) {
    responder(false, 'Data de nascimento inválida.');
}

if (!in_array($sexo, ['M', 'F', 'O'], true)) {
    responder(false, 'Selecione uma opção válida para o sexo.');
}

$cpfNumeros = preg_replace('/\D/', '', $cpf);

if (strlen($cpfNumeros) !== 11 || preg_match('/^(\d)\1{10}$/', $cpfNumeros)) {
    responder(false, 'CPF inválido.');
}

$soma = 0;

for ($i = 0; $i < 9; $i++) {
    $soma += (int)$cpfNumeros[$i] * (10 - $i);
}

$digito1 = ($soma * 10) % 11;
if ($digito1 === 10) $digito1 = 0;

if ($digito1 !== (int)$cpfNumeros[9]) {
    responder(false, 'CPF inválido.');
}

$soma = 0;

for ($i = 0; $i < 10; $i++) {
    $soma += (int)$cpfNumeros[$i] * (11 - $i);
}

$digito2 = ($soma * 10) % 11;
if ($digito2 === 10) $digito2 = 0;

if ($digito2 !== (int)$cpfNumeros[10]) {
    responder(false, 'CPF inválido.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
    responder(false, 'E-mail inválido.');
}

if (!preg_match('/^\+55\(\d{2}\)\d{5}-\d{4}$/', $celular)) {
    responder(false, 'Celular inválido. Use o formato +55(XX)XXXXX-XXXX.');
}

if (!preg_match('/^\+55\(\d{2}\)\d{4}-\d{4}$/', $fixo)) {
    responder(false, 'Telefone fixo inválido. Use o formato +55(XX)XXXX-XXXX.');
}

if (strlen($cep) !== 8) {
    responder(false, 'CEP inválido. Informe os 8 números.');
}

if (
    mb_strlen($materno) > 100 ||
    mb_strlen($rua) > 150 ||
    mb_strlen($numero) > 20 ||
    mb_strlen($complemento) > 100
) {
    responder(false, 'Um ou mais campos ultrapassaram o limite permitido.');
}

if (!preg_match('/^[a-zA-Z]{6}$/', $login)) {
    responder(false, 'O login deve conter exatamente 6 letras.');
}

if (!preg_match('/^[a-zA-Z]{8}$/', $senha)) {
    responder(false, 'A senha deve conter exatamente 8 letras.');
}

if ($senha !== $senha2) {
    responder(false, 'As senhas não coincidem.');
}

try {
    $sqlVerifica = "
        SELECT id FROM usuarios
        WHERE cpf = :cpf OR email = :email OR login = :login
    ";

    $stmtVerifica = $pdo->prepare($sqlVerifica);

    $stmtVerifica->execute([
        ':cpf' => $cpf,
        ':email' => $email,
        ':login' => $login
    ]);

    if ($stmtVerifica->fetch()) {
        responder(false, 'CPF, e-mail ou login já cadastrados no sistema.');
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "
        INSERT INTO usuarios
        (nome, nasc, sexo, materno, cpf, email, celular, fixo,
         cep, rua, numero, complemento, login, senha)
        VALUES
        (:nome, :nasc, :sexo, :materno, :cpf, :email, :celular, :fixo,
         :cep, :rua, :numero, :complemento, :login, :senha)
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':nasc' => $nasc,
        ':sexo' => $sexo,
        ':materno' => $materno,
        ':cpf' => $cpf,
        ':email' => $email,
        ':celular' => $celular,
        ':fixo' => $fixo,
        ':cep' => $cep,
        ':rua' => $rua,
        ':numero' => $numero,
        ':complemento' => $complemento !== '' ? $complemento : null,
        ':login' => $login,
        ':senha' => $senhaHash
    ]);

    responder(true, 'Cadastro realizado com sucesso!');

} catch (PDOException $e) {
    error_log('Erro no cadastro: ' . $e->getMessage());
    responder(false, 'Não foi possível realizar o cadastro. Verifique os dados e tente novamente.');
}
?>

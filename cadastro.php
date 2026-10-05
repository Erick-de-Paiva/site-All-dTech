<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

<header>
        <a href="index.php">
            <img src="img/logo-branca.png" alt="logo" width="200" style="cursor:pointer;">
        </a>    
</header>

<div class="container">
    <h2>Cadastro de Usuário</h2>

    <div id="msgBox" class="msg"></div>

    <form onsubmit="cadastrar(event)">
        <label>Nome completo *</label>
        <input id="nome" required minlength="15" maxlength="80" pattern="[A-Za-zÀ-ÿ ]+">
        <span class="erro" id="erro-nome"></span>

        <label>Data de nascimento *</label>
        <input type="date" id="nasc" required>

        <div class="sexo">
            <p>Sexo *</p>
            <input type="radio" name="sexo" id="masculino" value="M" required>
            <label for="masculino">Masculino</label>
            <input type="radio" name="sexo" id="feminino" value="F">
            <label for="feminino">Feminino</label>
            <input type="radio" name="sexo" id="outros" value="O">
            <label for="outros">Outros</label> <br><br>
        </div>

        <label>Nome Materno *</label>
        <input id="materno" required>

        <label>CPF *</label>
        <input id="cpf" required placeholder="000.000.000-00" maxlength="14">
        <span class="erro" id="erro-cpf"></span>

        <label>E-mail *</label>
        <input type="email" id="email" required>

        <label>Telefone Celular *</label>
        <input id="celular" required placeholder="+xx(xx)00000-0000">
        <span class="erro" id="erro-celular"></span>

        <label>Telefone Fixo *</label>
        <input id="fixo" required placeholder="+xx(xx)0000-0000">
        <span class="erro" id="erro-fixo"></span>

        <label>CEP *</label>
        <input id="cep" onblur="buscarCEP()" required maxlength="8">

        <label>Rua *</label>
        <input id="rua" required>

        <label>Numero *</label>
        <input id="numero" required>

        <label>Complemento</label>
        <input id="complemento">

        <label>Login *</label>
        <input id="login" required maxlength="6">
        <span class="erro" id="erro-login"></span>

        <label>Senha *</label>
        <input id="senha" type="password" required>
        <span class="erro" id="erro-senha"></span>

        <label>Confirmar Senha *</label>
        <input id="senha2" type="password" required>
        <span class="erro" id="erro-senha2"></span>

        <button type="submit">Enviar</button>
        <button type="reset" class="btn-secondary">Limpar</button>
    </form>

    <p style="text-align:center;margin-top:10px;">
        Já tem conta? <a href="login.php" id="log">Faça login</a>
    </p>
</div>

<script src="js/cadastro.js" defer></script>

</body>
</html>
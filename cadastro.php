<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - ALL'DTech</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,400;0,500;0,700;1,100;1,700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'components/header.php'; ?>

    <main class="main-container">
        <h1 class="titulo-secao">Cadastro de Usuário</h1>

        <div class="form-card">
            <div id="msgBox" class="msg"></div>

            <form onsubmit="cadastrar(event)" class="auth-form">
                <div class="input-group">
                    <label for="nome">Nome completo *</label>
                    <input id="nome" required minlength="15" maxlength="80" pattern="[A-Za-zÀ-ÿ ]+" placeholder="Nome completo">
                    <span class="erro" id="erro-nome"></span>
                </div>

                <div class="input-group">
                    <label for="nasc">Data de nascimento *</label>
                    <input type="date" id="nasc" required>
                    <span class="erro" id="erro-nasc"></span>
                </div>

                <div class="input-group sexo-group">
                    <p style="margin: 0 0 8px 0; font-size: 14px; color: #ccc;">Sexo *</p>
                    <div style="display: flex; gap: 20px; align-items: center;">
                        <label style="display: flex; align-items: center; gap: 6px; cursor: pointer; color: #fff;">
                            <input type="radio" name="sexo" id="masculino" value="M" required> Masculino
                        </label>
                        <label style="display: flex; align-items: center; gap: 6px; cursor: pointer; color: #fff;">
                            <input type="radio" name="sexo" id="feminino" value="F"> Feminino
                        </label>
                        <label style="display: flex; align-items: center; gap: 6px; cursor: pointer; color: #fff;">
                            <input type="radio" name="sexo" id="outros" value="O"> Outros
                        </label>
                    </div>
                </div>

                <div class="input-group">
                    <label for="materno">Nome Materno *</label>
                    <input id="materno" required placeholder="Nome completo da mãe">
                    <span class="erro" id="erro-materno"></span>
                </div>

                <div class="input-group">
                    <label for="cpf">CPF *</label>
                    <input id="cpf" required placeholder="000.000.000-00" maxlength="14">
                    <span class="erro" id="erro-cpf"></span>
                </div>

                <div class="input-group">
                    <label for="email">E-mail *</label>
                    <input type="email" id="email" required placeholder="seu@email.com">
                    <span class="erro" id="erro-email"></span>
                </div>

                <div class="input-group">
                    <label for="celular">Telefone Celular *</label>
                    <input id="celular" required placeholder="+55(00)00000-0000">
                    <span class="erro" id="erro-celular"></span>
                </div>

                <div class="input-group">
                    <label for="fixo">Telefone Fixo *</label>
                    <input id="fixo" required placeholder="+55(00)0000-0000">
                    <span class="erro" id="erro-fixo"></span>
                </div>

                <div class="input-group">
                    <label for="cep">CEP *</label>
                    <input id="cep" onblur="buscarCEP()" required maxlength="8" placeholder="Somente números">
                    <span class="erro" id="erro-cep"></span>
                </div>

                <div class="input-group">
                    <label for="rua">Rua *</label>
                    <input id="rua" required placeholder="Nome da rua / logradouro">
                    <span class="erro" id="erro-rua"></span>
                </div>

                <div class="input-group">
                    <label for="numero">Número *</label>
                    <input id="numero" required placeholder="Número">
                    <span class="erro" id="erro-numero"></span>
                </div>

                <div class="input-group">
                    <label for="complemento">Complemento</label>
                    <input id="complemento" placeholder="Apto, bloco, etc. (opcional)">
                </div>

                <div class="input-group">
                    <label for="login">Login *</label>
                    <input id="login" required maxlength="6" placeholder="Exatamente 6 letras">
                    <span class="erro" id="erro-login"></span>
                </div>

                <div class="input-group">
                    <label for="senha">Senha *</label>
                    <input id="senha" type="password" required placeholder="Exatamente 8 letras">
                    <span class="erro" id="erro-senha"></span>
                </div>

                <div class="input-group">
                    <label for="senha2">Confirmar Senha *</label>
                    <input id="senha2" type="password" required placeholder="Repita a senha">
                    <span class="erro" id="erro-senha2"></span>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn-submit">Enviar</button>
                    <button type="reset" class="btn-secondary">Limpar</button>
                </div>
            </form>

            <p style="text-align:center; margin-top:20px; color: #ccc; font-size: 1.3rem;">
                Já tem conta? <a href="login.php" id="log" style="color: #00bcd4; text-decoration: none; font-weight: 600;">Faça login</a>
            </p>
        </div>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>

    <script src="js/cadastro.js" defer></script>
    <script src="js/theme.js"></script>
</body>
</html>

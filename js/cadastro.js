function showMessage(text, type) {
    const box = document.getElementById("msgBox");
    box.innerText = text;
    box.className = "msg " + type + " show";

    setTimeout(() => {
        box.classList.remove("show");
    }, 4000);
}

function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, "");

    if (cpf.length !== 11) return false;

    let soma = 0;

    for (let i = 0; i < 9; i++)
        soma += parseInt(cpf[i]) * (10 - i);

    let dig1 = (soma * 10) % 11;
    if (dig1 === 10) dig1 = 0;

    if (dig1 !== parseInt(cpf[9])) return false;

    soma = 0;

    for (let i = 0; i < 10; i++)
        soma += parseInt(cpf[i]) * (11 - i);

    let dig2 = (soma * 10) % 11;
    if (dig2 === 10) dig2 = 0;

    return dig2 === parseInt(cpf[10]);
}

async function buscarCEP() {
    let cep = document.getElementById("cep").value.replace(/\D/g, "");
    if (cep.length !== 8) return;

    try {
        let r = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        let dados = await r.json();

        if (!dados.erro) {
            document.getElementById("rua").value = dados.logradouro;
        }

    } catch {}
}

async function cadastrar(e) {
    e.preventDefault();

    const campos = ["nome", "nasc", "materno", "cpf", "email", "celular", "fixo", "cep", "rua", "numero", "login", "senha", "senha2"];

    let valido = true;

    campos.forEach(c => {
        if (!validarCampo(c)) valido = false;
    });

    if (!valido) {
        showMessage("Corrija os erros antes de enviar.", "err");
        return;
    }

    const usuario = {
        nome: document.getElementById("nome").value,
        nasc: document.getElementById("nasc").value,
        sexo: document.querySelector('input[name="sexo"]:checked') ? document.querySelector('input[name="sexo"]:checked').value : "",
        materno: document.getElementById("materno").value,
        cpf: document.getElementById("cpf").value,
        email: document.getElementById("email").value,
        celular: document.getElementById("celular").value,
        fixo: document.getElementById("fixo").value,
        cep: document.getElementById("cep").value,
        rua: document.getElementById("rua").value,
        numero: document.getElementById("numero").value,
        complemento: document.getElementById("complemento").value,
        login: document.getElementById("login").value,
        senha: document.getElementById("senha").value
    };

    try {
        let resposta = await fetch("processar_cadastro.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(usuario)
        });

        let resultado = await resposta.json();

        if (resultado.sucesso) {
            showMessage(resultado.mensagem, "ok");
            setTimeout(() => {
                window.location.href = "login.html";
            }, 1500);
        } else {
            showMessage(resultado.mensagem, "err");
        }

    } catch (erro) {
        showMessage("Erro de comunicação com o servidor.", "err");
    }
}

function entrar(e) {
    e.preventDefault();

    let login = document.getElementById("login").value;
    let senha = document.getElementById("senha").value;

    // A lógica de login via PHP faremos no próximo passo!
}

function carregarUsuario() {
    const user = localStorage.getItem("logado");
    if (user && document.getElementById("userTop")) {
        document.getElementById("userTop").innerText = user;
    }
}

function logout() {
    localStorage.removeItem("logado");
    window.location.href = "index.html";
}

function maskCPF(value) {
    value = value.replace(/\D/g, "");
    value = value.replace(/(\d{3})(\d)/, "$1.$2");
    value = value.replace(/(\d{3})(\d)/, "$1.$2");
    value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    return value;
}

function maskTelefoneCel(value) {
    value = value.replace(/\D/g, "");

    if (value.length > 0) value = "+" + value;
    if (value.length > 3) value = value.replace(/(\+\d{2})(\d)/, "$1($2");
    if (value.length > 6) value = value.replace(/(\+\d{2}\(\d{2})(\d)/, "$1)$2");
    if (value.length > 11) value = value.replace(/(\d{5})(\d)/, "$1-$2");

    return value.substring(0, 17);
}

function maskTelefoneFixo(value) {
    value = value.replace(/\D/g, "");

    if (value.length > 0) value = "+" + value;
    if (value.length > 3) value = value.replace(/(\+\d{2})(\d)/, "$1($2");
    if (value.length > 6) value = value.replace(/(\+\d{2}\(\d{2})(\d)/, "$1)$2");
    if (value.length > 10) value = value.replace(/(\d{4})(\d)/, "$1-$2");

    return value.substring(0, 16);
}

document.addEventListener("input", function (e) {
    if (e.target.id === "cpf") e.target.value = maskCPF(e.target.value);
    if (e.target.id === "celular") e.target.value = maskTelefoneCel(e.target.value);
    if (e.target.id === "fixo") e.target.value = maskTelefoneFixo(e.target.value);
    if (e.target.id === "cep") buscarCEP();
});

const mensagensErro = {
    nome: "O nome deve ter entre 15 e 80 caracteres.",
    nasc: "Data de nascimento inválida.",
    materno: "Nome materno obrigatório.",
    cpf: "CPF inválido.",
    email: "E-mail inválido.",
    celular: "Telefone celular deve estar no formato +XX(XX)XXXXX-XXXX.",
    fixo: "Telefone fixo deve estar no formato +XX(XX)XXXX-XXXX.",
    cep: "CEP inválido.",
    rua: "Rua obrigatória.",
    numero: "Número obrigatório.",
    login: "Login deve ter exatamente 6 letras.",
    senha: "A senha deve ter exatamente 8 caracteres alfabéticos.",
    senha2: "As senhas não coincidem."
};

function mostrarErro(id, msg) {
    const span = document.getElementById("erro-" + id);
    const input = document.getElementById(id);

    if (span) {
        span.innerText = msg;
        span.style.display = "block";
    }

    if (input) {
        input.classList.add("erroCampo");
        input.classList.remove("okCampo");
    }
}

function limparErro(id) {
    const span = document.getElementById("erro-" + id);
    const input = document.getElementById(id);

    if (span) {
        span.innerText = "";
        span.style.display = "none";
    }

    if (input) {
        input.classList.remove("erroCampo");
        input.classList.add("okCampo");
    }
}

function validarCampo(id) {
    const input = document.getElementById(id);
    if (!input) return true;
    const valor = input.value;

    if (id === "nome" && (valor.length < 15 || valor.length > 80)) {
        mostrarErro(id, mensagensErro[id]);
        return false;
    }

    if (id === "cpf" && !validarCPF(valor)) {
        mostrarErro(id, mensagensErro[id]);
        return false;
    }

    if (id === "celular" && !/^\+\d{2}\(\d{2}\)\d{5}-\d{4}$/.test(valor)) {
        mostrarErro(id, mensagensErro[id]);
        return false;
    }

    if (id === "fixo" && !/^\+\d{2}\(\d{2}\)\d{4}-\d{4}$/.test(valor)) {
        mostrarErro(id, mensagensErro[id]);
        return false;
    }

    if (id === "login" && !/^[a-zA-Z]{6}$/.test(valor)) {
        mostrarErro(id, mensagensErro[id]);
        return false;
    }

    if (id === "senha" && !/^[a-zA-Z]{8}$/.test(valor)) {
        mostrarErro(id, mensagensErro[id]);
        return false;
    }

    if (id === "senha2" && valor !== document.getElementById("senha").value) {
        mostrarErro(id, mensagensErro[id]);
        return false;
    }

    if (["nasc", "materno", "email", "cep", "rua", "numero"].includes(id) && valor.trim() === "") {
        mostrarErro(id, mensagensErro[id]);
        return false;
    }

    limparErro(id);
    return true;
}

document.addEventListener("input", e => {
    if (e.target.id) validarCampo(e.target.id);
});

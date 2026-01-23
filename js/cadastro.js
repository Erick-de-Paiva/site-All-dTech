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

function cadastrar(e) {
    e.preventDefault();

    const campos = ["nome", "cpf", "celular", "fixo", "login", "senha", "senha2"];

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
        cpf: document.getElementById("cpf").value,
        login: document.getElementById("login").value,
        senha: document.getElementById("senha").value
    };

    localStorage.setItem("usuario", JSON.stringify(usuario));

    showMessage("Cadastro realizado com sucesso!", "ok");

    setTimeout(() => {
        window.location.href = "login.html";
    }, 1500);
}

function entrar(e) {
    e.preventDefault();

    let user = JSON.parse(localStorage.getItem("usuario"));
    let login = document.getElementById("login").value;
    let senha = document.getElementById("senha").value;

    if (!user) {
        showMessage("Nenhum usuário cadastrado!", "err");
        return;
    }

    if (login === user.login && senha === user.senha) {
        localStorage.setItem("logado", login);
        window.location.href = "index.html";
    } else {
        showMessage("Login ou senha incorretos!", "err");
    }
}

function carregarUsuario() {
    const user = localStorage.getItem("logado");
    document.getElementById("userTop").innerText = user;
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
});

const mensagensErro = {
    nome: "O nome deve ter entre 15 e 80 caracteres.",
    cpf: "CPF inválido.",
    celular: "Telefone celular deve estar no formato +XX(XX)XXXXX-XXXX.",
    fixo: "Telefone fixo deve estar no formato +XX(XX)XXXX-XXXX.",
    login: "Login deve ter exatamente 6 letras.",
    senha: "A senha deve ter exatamente 8 caracteres alfabéticos.",
    senha2: "As senhas não coincidem."
};

function mostrarErro(id, msg) {
    const span = document.getElementById("erro-" + id);
    const input = document.getElementById(id);

    span.innerText = msg;
    span.style.display = "block";

    input.classList.add("erroCampo");
    input.classList.remove("okCampo");
}

function limparErro(id) {
    const span = document.getElementById("erro-" + id);
    const input = document.getElementById(id);

    span.innerText = "";
    span.style.display = "none";

    input.classList.remove("erroCampo");
    input.classList.add("okCampo");
}

function validarCampo(id) {
    const input = document.getElementById(id);
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

    limparErro(id);
    return true;
}

document.addEventListener("input", e => validarCampo(e.target.id));
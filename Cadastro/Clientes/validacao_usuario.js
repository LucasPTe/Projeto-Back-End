// Validação para o input "Nome Completo".
const inputNomeCompleto = document.getElementById("nome_completo");
inputNomeCompleto.addEventListener("input", function () {
  validarCampoTexto(this, 15, 80);
});

// Validação para o input "Nome da Mãe".
const inputMae = document.getElementById("mae");
inputMae.addEventListener("input", function () {
  validarCampoTexto(this, 15, 80);
});

// Validação para o input "Data de Nascimento".
const inputData = document.getElementById("data");
inputData.addEventListener("input", function () {
  const data = new Date(this.value);
  const dataAtual = new Date();
  const dataMinima = new Date(1940, 0, 1);
  if (data > dataAtual || data < dataMinima) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Validação para o input "E-mail".
const inputEmail = document.getElementById("email");
inputEmail.addEventListener("input", function () {
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailRegex.test(this.value)) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Função para formatar o CPF no formato (xxx.xxx.xxx-xx)
function formatarCPF(cpf) {
  return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
}

// Função para validar CPF
function validarCPF(cpf) {
  cpf = cpf.replace(/\D/g, "");
  if (/(\d)\1{10}/.test(cpf) || cpf.length !== 11) {
    return false;
  }
  let soma = 0;
  for (let i = 0; i < 9; i++) {
    soma += parseInt(cpf.charAt(i)) * (10 - i);
  }
  let resto = 11 - (soma % 11);
  let digito1 = resto >= 10 ? 0 : resto;
  if (digito1 != parseInt(cpf.charAt(9))) {
    return false;
  }
  soma = 0;
  for (let i = 0; i < 10; i++) {
    soma += parseInt(cpf.charAt(i)) * (11 - i);
  }
  resto = 11 - (soma % 11);
  let digito2 = resto >= 10 ? 0 : resto;
  return digito2 == parseInt(cpf.charAt(10));
}

// Adicione um listener de evento de input ao campo CPF
document.getElementById("cpf").addEventListener("input", function () {
  let cpf = this.value.replace(/\D/g, "");
  this.value = formatarCPF(cpf);
  if (!validarCPF(cpf) || temNumerosRepetidos(cpf)) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Função para verificar se há números iguais em sequência
function temNumerosRepetidos(numero) {
  return /^(.)\1+$/.test(numero);
}

// Função para formatar o número de celular
function formatarCelular(numero) {
  return numero.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/, "($1) $2 $3-$4");
}

// Adicione um listener de evento de input ao campo celular
document.getElementById("celular").addEventListener("input", function () {
  let celular = this.value.replace(/\D/g, "");
  this.value = formatarCelular(celular);
  if (celular.length !== 11 || temNumerosRepetidos(celular)) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Função para formatar o número de telefone fixo
function formatarFixo(numero) {
  return numero.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
}

// Adicione um listener de evento de input ao campo telefone fixo
document.getElementById("fixo").addEventListener("input", function () {
  let fixo = this.value.replace(/\D/g, "");
  this.value = formatarFixo(fixo);
  if (fixo.length !== 10 || temNumerosRepetidos(fixo)) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Comando de busca do CEP no API do Correios:
document.getElementById("CEP").addEventListener("blur", function () {
  const cep = this.value.replace(/\D/g, "");
  if (cep.length === 8) {
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
      .then((response) => response.json())
      .then((data) => {
        if (!data.erro) {
          document.getElementById("bairro").value = data.bairro;
          document.getElementById("municipio").value = data.localidade;
          document.getElementById("estado").value = data.uf;
          document.getElementById("endereco").value = data.logradouro;
          validarCampoTexto(document.getElementById("bairro"), 2, 50);
          validarCampoTexto(document.getElementById("municipio"), 2, 50);
          validarCampoTexto(document.getElementById("estado"), 2, 2);
          validarCampoTexto(document.getElementById("endereco"), 5, 100);
        } else {
          marcarCamposInvalidos();
          alert("CEP não encontrado.");
        }
      })
      .catch((error) => console.error("Erro ao consultar o CEP:", error));
  }
});

function marcarCamposInvalidos() {
  const campos = ["bairro", "municipio", "estado", "endereco"];
  campos.forEach((campo) => {
    const elemento = document.getElementById(campo);
    elemento.classList.remove("is-valid");
    elemento.classList.add("is-invalid");
  });
}

// Função para validar campos de texto
function validarCampoTexto(campo, min, max) {
  const valor = campo.value.trim();
  const isValid = valor.length >= min && valor.length <= max;
  if (isValid) {
    campo.classList.remove("is-invalid");
    campo.classList.add("is-valid");
    return true;
  } else {
    campo.classList.remove("is-valid");
    campo.classList.add("is-invalid");
    return false;
  }
}

// Adicione ouvintes de eventos de entrada para validar campos de texto
document.getElementById("bairro").addEventListener("input", function () {
  validarCampoTexto(this, 3, 50);
});

document.getElementById("municipio").addEventListener("input", function () {
  validarCampoTexto(this, 4, 50);
});

document.getElementById("estado").addEventListener("input", function () {
  validarCampoTexto(this, 2, 2);
});

document.getElementById("endereco").addEventListener("input", function () {
  validarCampoTexto(this, 5, 100);
});

// Adicione um listener de evento de input ao campo de número
document.getElementById("numero").addEventListener("input", function () {
  let numero = this.value.trim();
  if (numero.length > 0) {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  } else {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  }
});

// Validação do login:
document.getElementById("usuario").addEventListener("input", function () {
  let usuario = this.value.trim();
  let labelUsuario = document.getElementById("labelUsuario");
  if (/^[\w\-_]{6}$/.test(usuario)) {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
    labelUsuario.textContent = "Login";
  } else {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
    labelUsuario.textContent = "Login";
  }
});

// Adicione um listener de evento de input ao campo de senha
document.getElementById("senha").addEventListener("input", function () {
  validarSenha();
  validarConfirmacaoSenha();
});

// Adicione um listener de evento de input ao campo de confirmação de senha
document.getElementById("confirmSenha").addEventListener("input", function () {
  validarConfirmacaoSenha();
});

// Função para validar senha
function validarSenha() {
  let senha = document.getElementById("senha").value;
  let labelSenha = document.getElementById("labelSenha");
  if (/^[a-zA-Z0-9@#%&*!]{6,}$/.test(senha)) {
    document.getElementById("senha").classList.remove("is-invalid");
    document.getElementById("senha").classList.add("is-valid");
    labelSenha.textContent = "Senha";
  } else {
    document.getElementById("senha").classList.remove("is-valid");
    document.getElementById("senha").classList.add("is-invalid");
    labelSenha.textContent = "Senha deve conter pelo menos 6 caracteres.";
  }
}

// Função para validar confirmação de senha
function validarConfirmacaoSenha() {
  let senha = document.getElementById("senha").value;
  let confirmSenha = document.getElementById("confirmSenha").value;
  let labelConfirmSenha = document.getElementById("labelConfirmSenha");
  if (senha === confirmSenha && confirmSenha.length >= 6) {
    document.getElementById("confirmSenha").classList.remove("is-invalid");
    document.getElementById("confirmSenha").classList.add("is-valid");
    labelConfirmSenha.textContent = "Confirmar senha";
  } else {
    document.getElementById("confirmSenha").classList.remove("is-valid");
    document.getElementById("confirmSenha").classList.add("is-invalid");
    labelConfirmSenha.textContent = "As senhas não coincidem.";
  }
}

// Validação do termo de compromisso
document.getElementById("termo").addEventListener("change", function () {
  if (this.checked) {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  } else {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  }
});

// Validação do botão de envio
document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();
  let valido = true;
  if (!document.getElementById("termo").checked) {
    valido = false;
    document.getElementById("termo").classList.remove("is-valid");
    document.getElementById("termo").classList.add("is-invalid");
  }

  const camposTexto = [
    "nome_completo",
    "mae",
    "bairro",
    "municipio",
    "estado",
    "endereco",
    "numero",
  ];
  camposTexto.forEach((campo) => {
    const input = document.getElementById(campo);
    if (!validarCampoTexto(input, 3, 100)) {
      valido = false;
    }
  });

  if (!validarSenha() || !validarConfirmacaoSenha()) {
    valido = false;
  }

  if (valido) {
    alert("Formulário enviado com sucesso!");
    this.submit();
  } else {
    alert("Por favor, corrija os erros no formulário.");
  }
});

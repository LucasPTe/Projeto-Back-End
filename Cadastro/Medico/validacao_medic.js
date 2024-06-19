
// Validação para o input "Nome Completo".
const inputNomeCompleto = document.getElementById("nome_completo");

inputNomeCompleto.addEventListener("input", function () {
  if (this.value.length < 15 || this.value.length > 80) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Validação para o input "Nome da Mãe".
const inputMae = document.getElementById("mae");

inputMae.addEventListener("input", function () {
  if (this.value.length < 15 || this.value.length > 80) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Validação para o input "Data de Nascimento".
const inputData = document.getElementById("data");

inputData.addEventListener("input", function () {
  const data = new Date(this.value);
  const dataAtual = new Date();
  const dataMinima = new Date();
  dataMinima.setFullYear(1940, 0, 1);

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

// Obtém o elemento de entrada de especialização
const inputEspecializacao = document.getElementById("especializacao");

// Adiciona um ouvinte de evento de entrada ao campo de especialização
inputEspecializacao.addEventListener("input", function () {
  // Verifica se o valor do campo tem pelo menos 3 caracteres
  if (this.value.length < 3) {
    // Se o valor for menor que 3 caracteres, adiciona a classe 'is-invalid' para destacar o campo
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    // Se o valor for válido, remove a classe 'is-invalid' e adiciona 'is-valid'
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
  // Remover caracteres não numéricos
  cpf = cpf.replace(/\D/g, "");

  // Verificar se todos os dígitos são iguais
  if (/(\d)\1{10}/.test(cpf)) {
    return false;
  }

  // Verificar se o CPF tem 11 dígitos
  if (cpf.length !== 11) {
    return false;
  }

  // Calcular primeiro dígito verificador
  let soma = 0;
  for (let i = 0; i < 9; i++) {
    soma += parseInt(cpf.charAt(i)) * (10 - i);
  }
  let resto = 11 - (soma % 11);
  let digito1 = resto >= 10 ? 0 : resto;

  // Verificar primeiro dígito verificador
  if (digito1 != parseInt(cpf.charAt(9))) {
    return false;
  }

  // Calcular segundo dígito verificador
  soma = 0;
  for (let i = 0; i < 10; i++) {
    soma += parseInt(cpf.charAt(i)) * (11 - i);
  }
  resto = 11 - (soma % 11);
  let digito2 = resto >= 10 ? 0 : resto;

  // Verificar segundo dígito verificador
  if (digito2 != parseInt(cpf.charAt(10))) {
    return false;
  }

  return true;
}

// Função para verificar se há números iguais em sequência
function temNumerosRepetidos(numero) {
  return /^(.)\1+$/.test(numero);
}

// Adicione um listener de evento de input ao campo CPF
document.getElementById("cpf").addEventListener("input", function (event) {
  let cpf = this.value.replace(/\D/g, ""); // Remove caracteres não numéricos

  // Formatar CPF no formato (191.761.947-28)
  this.value = formatarCPF(cpf);

  // Verificar se o CPF é válido
  if (!validarCPF(cpf)) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else if (temNumerosRepetidos(cpf)) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Adicione um listener de evento de input ao campo celular
document.getElementById("celular").addEventListener("input", function (event) {
  let celular = this.value.replace(/\D/g, ""); // Remove caracteres não numéricos
  let formattedCelular = formatarCelular(celular); // Formata o número de celular

  // Atualiza o valor do campo com o número formatado
  this.value = formattedCelular;

  // Verifica se o número de celular possui 11 dígitos
  if (celular.length !== 11) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
    return; // Retorna imediatamente se o número de dígitos não for igual a 11
  }

  // Verifica se o número de celular possui números repetidos
  if (temNumerosRepetidos(celular)) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Função para formatar o número de celular
function formatarCelular(numero) {
  // Adiciona os parênteses e o hífen conforme o formato (XX) X XXXX-XXXX
  return numero.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/, "($1) $2 $3-$4");
}

// Função para verificar se o número de celular possui números repetidos
function temNumerosRepetidos(numero) {
  // Verifica se todos os dígitos do número de celular são iguais
  return /^(.)\1+$/.test(numero);
}

// Adicione um listener de evento de input ao campo telefone fixo
document.getElementById("fixo").addEventListener("input", function (event) {
  let fixo = this.value.replace(/\D/g, ""); // Remove caracteres não numéricos
  let formattedFixo = formatarFixo(fixo); // Formata o número de telefone fixo

  // Atualiza o valor do campo com o número formatado
  this.value = formattedFixo;

  // Verifica se o telefone fixo possui 10 dígitos e não contém números repetidos
  if (fixo.length !== 10 || temNumerosRepetidos(fixo)) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }
});

// Função para formatar o número de telefone fixo
function formatarFixo(numero) {
  // Adiciona os parênteses e o hífen conforme o formato (XX) XXXX-XXXX
  return numero.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
}

// Função para verificar se o número de telefone fixo possui números repetidos
function temNumerosRepetidos(numero) {
  // Verifica se todos os dígitos do número de telefone fixo são iguais
  return /^(.)\1+$/.test(numero);
}

// Obtém o elemento de entrada do CRM
const inputCRM = document.getElementById("CRM");

// Adiciona um ouvinte de evento de entrada ao campo do CRM
inputCRM.addEventListener("input", function () {
  // Remove todos os caracteres que não são números usando expressão regular
  this.value = this.value.replace(/[^a-zA-Z0-9-]/g, "");

  // Verifica se o comprimento do CRM é exatamente 6 caracteres
  if (this.value.length !== 9) {
    // Se o comprimento não for 6, adiciona a classe 'is-invalid' para destacar o campo
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  } else {
    // Se o comprimento for 6, remove a classe 'is-invalid' e adiciona 'is-valid'
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  }

  $(document).ready(function () {
    $("#CRM").mask("SS-000.000", {
      translation: {
        S: { pattern: /[A-Za-z]/, optional: true },
        0: { pattern: /[0-9]/ },
      },
    });
  });
});

function validateCRM(input) {
  // Armazena a posição atual do cursor
  var start = input.selectionStart;
  var end = input.selectionEnd;

  // Filtra os caracteres permitidos (letras, números e '-')
  var filteredValue = input.value.replace(/[^a-zA-Z0-9-]/g, "").toUpperCase();

  // Atualiza o valor do campo
  input.value = filteredValue;

  // Restaura a posição do cursor utilizando setTimeout
  setTimeout(function () {
    input.setSelectionRange(start, end);
  }, 0);
}

// Comando de busca do CEP no API do Correios:
document.getElementById("CEP").addEventListener("blur", function () {
  const cep = this.value.replace(/\D/g, ""); // Remove caracteres não numéricos

  // Verifica se o CEP possui 8 dígitos
  if (cep.length === 8) {
    // Faz uma requisição para a API dos Correios
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
      .then((response) => response.json())
      .then((data) => {
        if (!data.erro) {
          // Preenche os campos com os dados retornados pela API
          document.getElementById("bairro").value = data.bairro;
          document.getElementById("municipio").value = data.localidade;
          document.getElementById("estado").value = data.uf;
          document.getElementById("endereco").value = data.logradouro;

          // Chama a função de validação para cada campo preenchido
          validarCampoTexto(document.getElementById("bairro"), 2, 50);
          validarCampoTexto(document.getElementById("municipio"), 2, 50);
          validarCampoTexto(document.getElementById("estado"), 2, 2);
          validarCampoTexto(document.getElementById("endereco"), 5, 100);
        } else {
          // Se o CEP não for encontrado, define os campos como inválidos
          document.getElementById("bairro").classList.remove("is-valid");
          document.getElementById("bairro").classList.add("is-invalid");
          document.getElementById("municipio").classList.remove("is-valid");
          document.getElementById("municipio").classList.add("is-invalid");
          document.getElementById("estado").classList.remove("is-valid");
          document.getElementById("estado").classList.add("is-invalid");
          document.getElementById("endereco").classList.remove("is-valid");
          document.getElementById("endereco").classList.add("is-invalid");

          alert("CEP não encontrado.");
        }
      })
      .catch((error) => console.error("Erro ao consultar o CEP:", error));
  }
});

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

// Função para validar o CEP
function validarCEP(cep) {
  // Adicione aqui a lógica de validação do CEP, se necessário
  // Por exemplo, você pode verificar se o CEP possui o formato correto
  // e retornar true ou false conforme necessário
  return cep.length === 8 && /^[0-9]+$/.test(cep);
}

// Função para preencher automaticamente os campos com base no CEP
function preencherCamposComCEP(cep) {
  document.getElementById("bairro").value = "";
  document.getElementById("municipio").value = "";
  document.getElementById("estado").value = "";
  document.getElementById("endereco").value = "";

  // Chama a função de validação para cada campo preenchido
  validarCampoTexto(document.getElementById("bairro"), 3, 50);
  validarCampoTexto(document.getElementById("municipio"), 4, 50);
  validarCampoTexto(document.getElementById("estado"), 2, 2);
  validarCampoTexto(document.getElementById("endereco"), 5, 100);
}

// Adiciona ouvinte de evento de entrada para validar o CEP
document.getElementById("CEP").addEventListener("input", function () {
  if (validarCEP(this.value)) {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
    // Chama a função para preencher automaticamente os campos
    preencherCamposComCEP(this.value);
  } else {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  }
});

// Adiciona ouvintes de eventos de entrada para validar campos de texto
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
document.getElementById("numero").addEventListener("input", function (event) {
  let numero = this.value.trim(); // Remove espaços em branco

  // Verifica se o número é válido (não está vazio)
  if (numero.length > 0 && /^\d+$/.test(numero)) {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  } else {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
  }
});

// Validação do login:
document.getElementById("usuario").addEventListener("input", function (event) {
  let usuario = this.value.trim(); // Remove espaços em branco do início e do final
  let labelUsuario = document.getElementById("labelUsuario");

  // Verifica se o usuário possui exatamente 6 caracteres alfanuméricos, hífen ou sublinhado
  if (/^[\w\-_]{6}$/.test(usuario)) {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
    labelUsuario.textContent = "Login"; // Altera o texto do label para indicar que o login é válido
  } else {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
    labelUsuario.textContent = "Login"; // Altera o texto do label para indicar que o login é inválido
  }
});

// Adicione um listener de evento de input ao campo de senha
document.getElementById("senha").addEventListener("input", function (event) {
  let senha = this.value.trim(); // Remove espaços em branco

  // Verificar se a senha tem pelo menos 8 caracteres
  if (senha.length < 8) {
    this.classList.remove("is-valid");
    this.classList.add("is-invalid");
    labelSenha.textContent = "Senha deve conter 8 caracteres.";
  } else {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
    labelSenha.textContent = "Senha";
  }

  // Verificar se a confirmação de senha é idêntica à senha
  validarConfirmacaoSenha();
});

// Adicione um listener de evento de input ao campo de confirmação de senha
document
  .getElementById("confirmSenha")
  .addEventListener("input", function (event) {
    // Verificar se a confirmação de senha é idêntica à senha
    validarConfirmacaoSenha();
  });

// Função para validar a confirmação de senha
function validarConfirmacaoSenha() {
  let senha = document.getElementById("senha").value;
  let confirmacaoSenha = document.getElementById("confirmSenha").value;

  // Verificar se a confirmação de senha é idêntica à senha
  if (senha === confirmacaoSenha && senha.length >= 8) {
    document.getElementById("confirmSenha").classList.remove("is-invalid");
    document.getElementById("confirmSenha").classList.add("is-valid");
    labelConfirmSenha.textContent = "Confirmar senha";
  } else {
    document.getElementById("confirmSenha").classList.remove("is-valid");
    document.getElementById("confirmSenha").classList.add("is-invalid");
    labelConfirmSenha.textContent = "As senhas não coincidem.";
  }
}

// Adicione um listener de evento de click ao botão limpar dados
document.getElementById("botaoLimpar").addEventListener("click", function () {
  // Chama a função para limpar os inputs
  limparInputs();

  // Limpa o campo de data
  document.getElementById("data").value = "";

  // Limpa todas as validações
  var inputs = document.querySelectorAll("input, select, textarea");
  inputs.forEach(function (input) {
    input.setCustomValidity(""); // Limpa a mensagem de validade personalizada
    input.classList.remove("is-invalid"); // Remove a classe 'is-invalid'
    input.classList.remove("is-valid"); // Remove a classe 'is-valid'
  });
});

function limparInputs() {
  var inputs = document.querySelectorAll("input, select, textarea");
  inputs.forEach(function (input) {
    // Verifica se o tipo do input é diferente de "date"
    if (input.type !== "date") {
      // Limpa o valor de cada input
      input.value = "";

      // Define a mensagem de validade personalizada como inválida
      input.setCustomValidity("Este campo é inválido");

      // Remove a classe 'is-invalid' se estiver presente
      input.classList.remove("is-invalid");

      // Remove a classe 'is-valid' se estiver presente
      input.classList.remove("is-valid");

      // Disparar evento de entrada (input) para forçar a reavaliação da validação
      input.dispatchEvent(new Event("input"));
    }
  });
}

// Adicione um listener de evento de click ao botão cadastrar
document
  .getElementById("cadastrar")
  .addEventListener("click", function (event) {
    // Impedir o envio do formulário se algum input estiver inválido, exceto para o campo de gênero
    if (!validarFormulario()) {
      event.preventDefault();
    }
  });

// Função para validar todo o formulário
function validarFormulario() {
  // Obter todos os inputs do formulário, exceto o campo de gênero
  let inputs = document.querySelectorAll('input:not([name="ExampleRadios"])');

  // Verificar se todos os inputs são válidos
  let formularioValido = true;
  for (let i = 0; i < inputs.length; i++) {
    if (!inputs[i].classList.contains("is-valid")) {
      inputs[i].classList.add("is-invalid"); // Adiciona classe de inválido
      inputs[i].setAttribute("required", true); // Adiciona o atributo required
      formularioValido = false; // Define o formulário como inválido
    } else {
      inputs[i].classList.remove("is-invalid"); // Remove classe de inválido, se presente
      inputs[i].removeAttribute("required"); // Remove o atributo required, se presente
    }
  }

  return formularioValido; // Retorna verdadeiro se todos os inputs forem válidos
}


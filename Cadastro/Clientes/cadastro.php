<?php

// Assim que apertar o botão de cadastrar, ele irá executar:
if(isset($_POST["cadastrar"]))
{

// Criando às variáveis para as colunas da tabela "clientes":  
    include_once('cadastro_config.php');

    $nome_completo = $_POST['nome_completo'];
    $data = $_POST['data'];
    $email = $_POST['email'];
    $genero = $_POST['exampleRadios'];
    $nome_da_mae = $_POST['mae'];
    $CPF = $_POST['cpf'];
    $celular = $_POST['celular'];
    $telefone = $_POST['fixo'];
    $CEP = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $login = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confirm = $_POST['confirmsenha'];
    
    $result = mysqli_query($conexao, "INSERT INTO clientes(nome_completo,data_nasc,email,sexo,nome_mae,CPF,numero_cel,numero_tel,CEP,bairro,municipio,estado,endereco,numero,usuario,senha,confirm_senha) 
    VALUES ('$nome_completo','$data','$email','$genero','$nome_da_mae','$CPF','$celular','$telefone','$CEP','$bairro','$municipio','$estado','$endereco','$numero','$login','$senha','$confirm')");

 }


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Med+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style_cadastro.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">

</head>

<body>
    
    <form action="cadastro.php" method="POST">

        <!--Main Container-->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">


            <!--Login Container-->

            <div class="row border rounded-5 p-3 bg-white shadow box-area" id="box-area">   
            
                    <div class="input-group mb-3">
                        
                        <a style="border-radius: 15px" class="btn btn-primary botao_card" href="http://localhost/Projeto-Back-End/Login/Login.php" role="button">Tenho Login</a>
                        <a style="margin-left: 20rem; border-radius: 15px;" class="btn btn-primary botao_card" id="botao_medic" href="http://localhost/Projeto-Back-End/Cadastro/Medico/cadastro_medic.php" role="button">Sou Médico</a>

                    </div>
                    
                    <p class="d-flex justify-content-center cadastro_titulo" id="cadastro_titulo">CADASTRE-SE</p>

                    <!--Left Box-->

                    <div class="col-md-6 right-box" id="right-box">
                        <div class="row align-items-center">
                            
                            <label for="nome_completo" id="labelNome">Nome completo</label>                   
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" id="nome_completo" name="nome_completo" autocomplete="off" minlength="15" maxlength="80" required placeholder="">
                            </div>
                            
                            <label for="data_de_nascimento" id="label-data">Data de Nascimento</label>                  
                            <div class="input-group mb-3">
                                <input type="date" class="form-control form-control-lg bg-light fs-6" id="data" name="data" autocomplete="off" required placeholder="">
                            </div>

                            <label for="e-mail">E-mail</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control form-control-lg bg-light fs-6" required id="email" name="email" autocomplete="off" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'example@domain.com'">
                            </div>

                                    <p>Gênero</p>

                                    <div class="form-check genero-input">
                                        
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Masculino" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Másculino
                                        </label>

                                    </div>

                                    <div class="form-check genero-input" id="genero">
                                        
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Feminio" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Feminino
                                        </label>

                                    </div>

                                    <div class="form-check genero-input" id="genero">
                                        
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Discreto" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Prefiro não dizer
                                        </label>

                                    </div>   
                            
                            <label style="margin-top: 10px;" for="nome_da_mae" id="labelMae">Nome da Mãe</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" id="mae" name="mae" autocomplete="off" minlength="15" maxlength="80" required placeholder="">
                            </div>
                            
                            <label for="CPF" id="labelCpf">CPF</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6 cpf-input" required id="cpf" name="cpf" maxlength="11" autocomplete="off" placeholder="">
                            </div>
                            
                            <label for="numero_de_celular" id="labelCelular">Número de Celular</label>
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control form-control-lg bg-light fs-6" minlength="11" maxlength="11" required id="celular" name="celular" autocomplete="off" placeholder="">
                            </div>

                            <label for="telefone_fixo" id="labelFixo">Telefone Fixo</label>
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control form-control-lg bg-light fs-6" minlength="10" maxlength="10" required id="fixo" name="fixo" autocomplete="off" placeholder="">
                            </div>

                            <div class="d-grid gap-2 d-md-block">
                                <button style="font-size: 18px;" class="btn btn-primary" id="cadastrar" name="cadastrar" type="submit">Cadastre-se</button>
                                <button style="font-size: 18px;" class="btn btn-primary" name="limpar" type="submit">Limpar Dados</button>
                            </div>
                        
                        </div>

                    </div>

                    <!--Right Box-->
                    <div class="col-md-6 right-box" id="right-box">
                        <div class="row align-items-center">

                            <label for="CEP" id="labelCep">CEP</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="CEP" name="cep" maxlength="8" autocomplete="off" placeholder="">
                            </div>

                            <label for="bairro" id="labelBairro">Bairro</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="bairro" name="bairro" autocomplete="off" placeholder="">
                            </div>

                            <label for="municipio" id="labelMinicipio">Município</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="municipio" name="municipio" autocomplete="off" placeholder="">
                            </div>

                            <label for="estado" id="labelEstado">Estado</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="estado" name="estado" autocomplete="off" placeholder="">
                            </div>

                            <label for="endereco" id="labelEndereco">Endereço</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="endereco" name="endereco" autocomplete="off" placeholder="Ex: Rua Castro">
                            </div>

                            <label for="numero" id="labelNumero">Número</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6 numero-input" required id="numero" name="numero" autocomplete="off" placeholder="Ex: n° 105">
                            </div>

                            <label for="nome_de_usuario" id="labelUsuario">Login</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" minlength="6" maxlength="6" id="usuario" name="usuario" autocomplete="off" required placeholder="">
                            </div>

                            <label for="senha" id="labelSenha">Senha</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" required id="senha" name="senha" minlength="8" maxlength="8" autocomplete="off" placeholder="">
                            </div>

                            <label for="confirmar_senha" id="labelConfirmSenha">Confirmar Senha</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" required id="confirmSenha" name="confirmsenha" minlength="8" maxlength="8" autocomplete="off" placeholder="">
                            </div>

                        </div>
                
                    </div>

            </div>

        </div>

    </form>

            <script>
            
            // Validação para o input "Nome Completo".
            const inputNomeCompleto = document.getElementById('nome_completo');

            inputNomeCompleto.addEventListener('input', function() {
                if (this.value.length < 15 || this.value.length > 80) {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }

                });

                // Validação para o input "Nome da Mãe".
                const inputMae = document.getElementById('mae');

                inputMae.addEventListener('input', function() {
                    if (this.value.length < 15 || this.value.length > 80) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });

                // Validação para o input "Data de Nascimento".
                const inputData = document.getElementById('data');

                inputData.addEventListener('input', function() {
                    const data = new Date(this.value);
                    const dataAtual = new Date();
                    const dataMinima = new Date();
                    dataMinima.setFullYear(1940, 0, 1);

                    if (data > dataAtual || data < dataMinima) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });

                // Validação para o input "E-mail".
                const inputEmail = document.getElementById('email');

                inputEmail.addEventListener('input', function() {
                    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                    if (!emailRegex.test(this.value)) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });

                // Função para formatar o CPF no formato (xxx.xxx.xxx-xx)
                function formatarCPF(cpf) {
                    return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                }

                // Função para validar CPF
                function validarCPF(cpf) {
                    // Remover caracteres não numéricos
                    cpf = cpf.replace(/\D/g, '');

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
                    let digito1 = (resto >= 10) ? 0 : resto;

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
                    let digito2 = (resto >= 10) ? 0 : resto;

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
                document.getElementById('cpf').addEventListener('input', function(event) {
                    let cpf = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

                    // Formatar CPF no formato (191.761.947-28)
                    this.value = formatarCPF(cpf);

                    // Verificar se o CPF é válido
                    if (!validarCPF(cpf)) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else if (temNumerosRepetidos(cpf)) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });

                // Adicione um listener de evento de input ao campo celular
                document.getElementById('celular').addEventListener('input', function(event) {
                let celular = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
                let formattedCelular = formatarCelular(celular); // Formata o número de celular

                // Atualiza o valor do campo com o número formatado
                this.value = formattedCelular;

                // Verifica se o número de celular possui 11 dígitos
                if (celular.length !== 11) {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                    return; // Retorna imediatamente se o número de dígitos não for igual a 11
                }

                // Verifica se o número de celular possui números repetidos
                if (temNumerosRepetidos(celular)) {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });

            // Função para formatar o número de celular
            function formatarCelular(numero) {
                // Adiciona os parênteses e o hífen conforme o formato (XX) X XXXX-XXXX
                return numero.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/, '($1) $2 $3-$4');
            }

            // Função para verificar se o número de celular possui números repetidos
            function temNumerosRepetidos(numero) {
                // Verifica se todos os dígitos do número de celular são iguais
                return /^(.)\1+$/.test(numero);
            }
              
            // Adicione um listener de evento de input ao campo telefone fixo
            document.getElementById('fixo').addEventListener('input', function(event) {
            let fixo = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            let formattedFixo = formatarFixo(fixo); // Formata o número de telefone fixo

            // Atualiza o valor do campo com o número formatado
            this.value = formattedFixo;

            // Verifica se o telefone fixo possui 10 dígitos e não contém números repetidos
            if (fixo.length !== 10 || temNumerosRepetidos(fixo)) {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });

        // Função para formatar o número de telefone fixo
        function formatarFixo(numero) {
            // Adiciona os parênteses e o hífen conforme o formato (XX) XXXX-XXXX
            return numero.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
        }

        // Função para verificar se o número de telefone fixo possui números repetidos
        function temNumerosRepetidos(numero) {
            // Verifica se todos os dígitos do número de telefone fixo são iguais
            return /^(.)\1+$/.test(numero);
        }

                // Comando de busca do CEP no API do Correios:
                document.getElementById('CEP').addEventListener('blur', function() {
                const cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

                // Verifica se o CEP possui 8 dígitos
                if (cep.length === 8) {
                    // Faz uma requisição para a API dos Correios
                    fetch(`https://viacep.com.br/ws/${cep}/json/`)
                        .then(response => response.json())
                        .then(data => {
                            if (!data.erro) {
                                // Preenche os campos com os dados retornados pela API
                                document.getElementById('bairro').value = data.bairro;
                                document.getElementById('municipio').value = data.localidade;
                                document.getElementById('estado').value = data.uf;
                                document.getElementById('endereco').value = data.logradouro;
                            } else {
                                // Se o CEP não for encontrado, limpa os campos
                                document.getElementById('bairro').value = '';
                                document.getElementById('municipio').value = '';
                                document.getElementById('estado').value = '';
                                document.getElementById('endereco').value = '';
                                alert('CEP não encontrado.');
                            }
                        })
                        .catch(error => console.error('Erro ao consultar o CEP:', error));
                }
            });

            // Função para validar campos de texto
            function validarCampoTexto(campo, min, max) {
                const valor = campo.value.trim();
                const isValid = valor.length >= min && valor.length <= max;
                if (isValid) {
                    campo.classList.remove('is-invalid');
                    campo.classList.add('is-valid');
                    return true;
                } else {
                    campo.classList.remove('is-valid');
                    campo.classList.add('is-invalid');
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
                
                document.getElementById('bairro').value = 'EX bairro';
                document.getElementById('municipio').value = 'EX Município';
                document.getElementById('estado').value = 'EX';
                document.getElementById('endereco').value = 'EX rua';

                // Chama a função de validação para cada campo preenchido
                validarCampoTexto(document.getElementById('bairro'), 2, 50);
                validarCampoTexto(document.getElementById('municipio'), 2, 50);
                validarCampoTexto(document.getElementById('estado'), 2, 2);
                validarCampoTexto(document.getElementById('endereco'), 5, 100);
            }

            // Adiciona ouvinte de evento de entrada para validar o CEP
            document.getElementById('CEP').addEventListener('input', function() {
                if (validarCEP(this.value)) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                    // Chama a função para preencher automaticamente os campos
                    preencherCamposComCEP(this.value);
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });

            // Adiciona ouvintes de eventos de entrada para validar campos de texto
            document.getElementById('bairro').addEventListener('input', function() {
                validarCampoTexto(this, 2, 50);
            });

            document.getElementById('municipio').addEventListener('input', function() {
                validarCampoTexto(this, 2, 50);
            });

            document.getElementById('estado').addEventListener('input', function() {
                validarCampoTexto(this, 2, 2);
            });

            document.getElementById('endereco').addEventListener('input', function() {
                validarCampoTexto(this, 5, 100);
            });

            // Adicione um listener de evento de input ao campo de número
            document.getElementById('numero').addEventListener('input', function(event) {
                let numero = this.value.trim(); // Remove espaços em branco

                // Verifica se o número é válido (não está vazio)
                if (numero.length > 0) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });

            // Validação do login:
            document.getElementById('usuario').addEventListener('input', function(event) {
            let usuario = this.value.trim(); // Remove espaços em branco do início e do final
            let labelUsuario = document.getElementById('labelUsuario');

            // Verifica se o usuário possui exatamente 6 caracteres alfanuméricos, hífen ou sublinhado
            if (/^[\w\-_]{6}$/.test(usuario)) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                labelUsuario.textContent = "Login"; // Altera o texto do label para indicar que o login é válido
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
                labelUsuario.textContent = "Login"; // Altera o texto do label para indicar que o login é inválido
            }
        });

        // Adicione um listener de evento de input ao campo de senha
        document.getElementById('senha').addEventListener('input', function(event) {
            let senha = this.value.trim(); // Remove espaços em branco

            // Verificar se a senha tem pelo menos 8 caracteres
            if (senha.length < 8) {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }

            // Verificar se a confirmação de senha é idêntica à senha
            validarConfirmacaoSenha();
        });

        // Adicione um listener de evento de input ao campo de confirmação de senha
        document.getElementById('confirmSenha').addEventListener('input', function(event) {
            // Verificar se a confirmação de senha é idêntica à senha
            validarConfirmacaoSenha();
        });

        // Função para validar a confirmação de senha
        function validarConfirmacaoSenha() {
            let senha = document.getElementById('senha').value;
            let confirmacaoSenha = document.getElementById('confirmSenha').value;

            // Verificar se a confirmação de senha é idêntica à senha
            if (senha === confirmacaoSenha && senha.length >= 8) {
                document.getElementById('confirmSenha').classList.remove('is-invalid');
                document.getElementById('confirmSenha').classList.add('is-valid');
            } else {
                document.getElementById('confirmSenha').classList.remove('is-valid');
                document.getElementById('confirmSenha').classList.add('is-invalid');
            }
        }

        // Adicione um listener de evento de click ao botão cadastrar
        document.getElementById('cadastrar').addEventListener('click', function(event) {
            // Impedir o envio do formulário se algum input estiver inválido, exceto para o campo de gênero
            if (!validarFormulario()) {
                event.preventDefault();
            }
        });

        // Função para validar todo o formulário
        function validarFormulario() {
            // Obter todos os inputs do formulário, exceto o campo de gênero
            let inputs = document.querySelectorAll('input:not([name="exampleRadios"])');

            // Verificar se todos os inputs são válidos
            for (let i = 0; i < inputs.length; i++) {
                if (!inputs[i].classList.contains('is-valid')) {
                    return false; // Retorna falso se algum input estiver inválido
                }
            }

            return true; // Retorna verdadeiro se todos os inputs forem válidos
        }
                
           
        </script>

        <style>
            .is-invalid {
                border-color: red;
            }

            .is-valid {
                border-color: green;
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php require 'head.php'; ?>

<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container-custom-form" style="width: 400px;">
        <h2 class="mb-4 text-center">Cadastro de Usuário</h2>
        <form id="registerForm">
            <div class="form-group mb-3" method="POST">
                <input type="text" id="nome" class="form-control form-control-custom" placeholder="Nome" required>
            </div>
            <div class="form-group mb-3">
                <input type="text" id="usuario" class="form-control form-control-custom" placeholder="Usuário" required>
            </div>
            <div class="form-group mb-3">
                <input type="email" id="email" class="form-control form-control-custom" placeholder="Email" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" id="senha" class="form-control form-control-custom" placeholder="Senha" required>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-custom" onclick="Cadastrar()">Cadastrar</button>
            </div>
            <div class="form-group">
                <a type="button" class="btn btn-custom" href="login.php"  >Voltar</a>
            </div>
            <div id="mensagem" class="mt-4"></div>
        </form>
    </div>

    <script type="text/javascript">
        function Cadastrar(){
            var formData = {
                nome: $('#nome').val(),
                usuario: $('#usuario').val(),
                email: $('#email').val(),
                senha: $('#senha').val()
            };
           
            $.ajax({
                url: 'http://localhost/GreenTox_API/agrotoxicos/cadastrar',
                type: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify(formData),
                success: function(dados){
                    $('#mensagem').html('<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>');
                    $('#registerForm')[0].reset();
                    setTimeout(function() {
                        window.location.href = 'http://localhost/GreenTox_API/api_cliente/login';
                    }, 2000);
                },
                error: function(erro){
                    console.error('Erro na API: ' + erro);
                    $('#mensagem').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API.</div>');
                }
            });
        }
    </script>
</body>
</html>

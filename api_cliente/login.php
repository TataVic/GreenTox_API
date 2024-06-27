<?php require 'head.php'; ?>

<html>
    <body>  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <div class="container-custom-form">
            <h2 class="mb-4 text-center">Login</h2>
            <form id="loginForm" method="POST">
                <div class="form-group mb-3">
                    <input type="text" id="usuario" class="form-control form-control-custom" placeholder="Usuário" required>
                </div>
                <div class="form-group mb-3">
                    <input type="password" id="senha" class="form-control form-control-custom" placeholder="Senha" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-custom" >Entrar</button> 
                </div>
                <div class="form-group mb-3">
                    <p id="texto">Não possui Cadastro? <a href="/GreenTox_API/api_cliente/cadastro.php" font-size:>Cadastra-se aqui</a></p>
                </div>
                <div id="mensagem" ></div>
            </form>
        </div>

    
      <script type="text/javascript">
        $(document).ready(function() { //por causa do submit do button
                $('#loginForm').on('submit', function(event) {
                    event.preventDefault(); // Previne o envio padrão do formulário
                    Entrar();
                });
            });

        function Entrar(){
                var formData = {
                    usuario: $('#usuario').val(),
                    senha: $('#senha').val()
                };
                $.ajax({
                    url: 'http://localhost/GreenTox_API/agrotoxicos/login',
                    type: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    data: JSON.stringify(formData),
                    success: function(dados) {
                        $('#registerForm')[0].reset();
                    setTimeout(function() {
                        window.location.href = 'http://localhost/GreenTox_API/api_cliente/index';
                    }, 2000);
                    },
                    error: function(erro) {
                        console.error('Erro na API: ' + erro);
                        $('#mensagem').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API - logar.</div>');
                    }
                });
        }
        </script>
    </body>
</html>
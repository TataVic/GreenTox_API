<?php require 'head.php'; ?>
<body>
    <div class="container mt-5">
        <div class="container-custom">
            <h2 class="mb-4">Login</h2>
            <div class="mb-3">
                <input type="text" id="usuario" class="form-control form-control-custom" placeholder="Usuário">
            </div>
            <div class="mb-3">
                <input type="password" id="senha" class="form-control form-control-custom" placeholder="Senha">
            </div>
            <button type="button" class="btn btn-custom" onclick="login()">Login</button>
            <div id="mensagem" class="mt-4"></div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        function login() {
            var usuario = $('#usuario').val();
            var senha = $('#senha').val();

            $.ajax({
                url: 'http://localhost/GreenTox_API/agrotoxicos/login',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ usuario: usuario, senha: senha }),
                success: function(response) {
                    if (response.status === 'OK') {
                        $('#mensagem').html('<div class="alert alert-success" role="alert">Login bem-sucedido! Redirecionando...</div>');
                        setTimeout(function() {
                            window.location.href = 'index.php';
                        }, 2000);
                    } else {
                        $('#mensagem').html('<div class="alert alert-danger" role="alert">' + response.message + '</div>');
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Erro desconhecido';
                    $('#mensagem').html('<div class="alert alert-danger" role="alert">Erro ao conectar com a API: ' + errorMessage + '</div>');
                }
            });
        }
    </script>
</body>
</html>

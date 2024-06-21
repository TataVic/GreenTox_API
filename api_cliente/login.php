<?php require 'head.php'; ?>

<html>
    <body>  
        <div class="container-custom-form">
            <h2 class="mb-4 text-center">Login</h2>
            <form id="loginForm">
                <div class="form-group mb-3">
                    <input type="text" id="username" class="form-control form-control-custom" placeholder="Usuário" required>
                </div>
                <div class="form-group mb-3">
                    <input type="password" id="password" class="form-control form-control-custom" placeholder="Senha" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-custom">Entrar</button>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </body>
</html>
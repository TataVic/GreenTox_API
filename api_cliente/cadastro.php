<?php require 'head.php'; ?>

<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-custom-form" style="width: 400px;">
        <h2 class="mb-4 text-center">Cadastro de Usuário</h2>
        <form id="registerForm">
            <div class="form-group mb-3">
                <input type="text" id="nome" class="form-control form-control-custom" placeholder="Nome" required>
            </div>
            <div class="form-group mb-3">
                <input type="text" id="username" class="form-control form-control-custom" placeholder="Usuário" required>
            </div>
            <div class="form-group mb-3">
                <input type="email" id="email" class="form-control form-control-custom" placeholder="Email" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" id="password" class="form-control form-control-custom" placeholder="Senha" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-custom">Cadastrar</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>

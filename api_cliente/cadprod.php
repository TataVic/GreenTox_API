<?php require 'head.php'; ?>
<body>
    <div class="container-custom-form produtos">
        <h2 class="mb-6">Agrotóxicos</h2>
        <form action="visualizacao.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control form-control-custom" required>
                </div>
                <div class="col-md-6">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" class="form-control form-control-custom" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fabricante" class="form-label">Fabricante:</label>
                    <input type="text" id="fabricante" name="fabricante" class="form-control form-control-custom" required>
                </div>
                <div class="col-md-6">
                    <label for="registro_anvisa" class="form-label">Registro ANVISA:</label>
                    <input type="text" id="registro_anvisa" name="registro_anvisa" class="form-control form-control-custom" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <input type="text" id="categoria" name="categoria" class="form-control form-control-custom" required>
                </div>
                <div class="col-md-6">
                    <label for="classe" class="form-label">Classe:</label>
                    <input type="text" id="classe" name="classe" class="form-control form-control-custom" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="preco" class="form-label">Preço:</label>
                    <input type="number" id="preco" name="preco" step="0.01" class="form-control form-control-custom" required>
                </div>
                <div class="col-md-6">
                    <label for="qtd_estoque" class="form-label">Quantidade em Estoque:</label>
                    <input type="number" id="qtd_estoque" name="qtd_estoque" class="form-control form-control-custom" required min="1">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="precaucoes" class="form-label">Precauções:</label>
                    <textarea id="precaucoes" name="precaucoes" rows="4" class="form-control form-control-custom" required></textarea>
                </div>
                <div class="col-md-6">
                    <label for="modo_uso" class="form-label">Modo de Uso:</label>
                    <textarea id="modo_uso" name="modo_uso" rows="4" class="form-control form-control-custom" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-custom" onclick="cadastrarprod()">Cadastrar Produto</button>
        </form>
</div>

    <script type="text/javascript">
         function cadastrarprod(event){
        event.preventDefault(); // Prevenir o envio do formulário padrão
        
        var dados = {
            nome: $('#nome').val(),
            tipo: $('#tipo').val(),
            fabricante: $('#fabricante').val(),
            registro_anvisa: $('#registro_anvisa').val(),
            categoria: $('#categoria').val(),
            classe: $('#classe').val(),
            preco: $('#preco').val(),
            qtd_estoque: $('#qtd_estoque').val(),
            precaucoes: $('#precaucoes').val(),
            modo_uso: $('#modo_uso').val()
        };

        $.ajax({
            url: 'http://localhost/GreenTox_API/agrotoxicos/create',
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify(dados),
            success: function(response) {
                alert('Produto cadastrado com sucesso!');
                window.location.href = 'index.php';
            },
            error: function(error) {
                alert('Erro ao cadastrar o produto!');
                console.log(error);
            }
        });
    }

    $('form').on('submit', cadastrarprod);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
<?php require 'head.php'; ?>

<body>
    <div class="container-custom-form produtos">
        <h2 class="mb-4">Agrotóxicos</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control form-control-custom" disabled>
            </div>
            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo:</label>
                <input type="text" id="tipo" name="tipo" class="form-control form-control-custom" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fabricante" class="form-label">Fabricante:</label>
                <input type="text" id="fabricante" name="fabricante" class="form-control form-control-custom" disabled>
            </div>
            <div class="col-md-6">
                <label for="registro_anvisa" class="form-label">Registro ANVISA:</label>
                <input type="text" id="registro_anvisa" name="registro_anvisa" class="form-control form-control-custom" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="categoria" class="form-label">Categoria:</label>
                <input type="text" id="categoria" name="categoria" class="form-control form-control-custom" disabled>
            </div>
            <div class="col-md-6">
                <label for="classe" class="form-label">Classe:</label>
                <input type="text" id="classe" name="classe" class="form-control form-control-custom" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="preco" class="form-label">Preço:</label>
                <input type="number" id="preco" name="preco" step="0.01" class="form-control form-control-custom" disabled>
            </div>
            <div class="col-md-6">
                <label for="qtd_estoque" class="form-label">Quantidade em Estoque:</label>
                <input type="number" id="qtd_estoque" name="qtd_estoque" class="form-control form-control-custom" min="1" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="precaucoes" class="form-label">Precauções:</label>
                <textarea id="precaucoes" name="precaucoes" rows="4" class="form-control form-control-custom" disabled></textarea>
            </div>
            <div class="col-md-6">
                <label for="modo_uso" class="form-label">Modo de Uso:</label>
                <textarea id="modo_uso" name="modo_uso" rows="4" class="form-control form-control-custom" disabled></textarea>
            </div>
        </div>
        <a href="index.php" class="btn btn-secondary mb-3">Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');

            if (id) {
                $.ajax({
                    url: `http://localhost/GreenTox_API/agrotoxicos/get?id=${id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); 
                        if (response.status) {
                            const agrotoxico = response.dados;
                            $('#nome').val(agrotoxico.nome);
                            $('#tipo').val(agrotoxico.tipo);
                            $('#fabricante').val(agrotoxico.fabricante);
                            $('#registro_anvisa').val(agrotoxico.registro_anvisa);
                            $('#categoria').val(agrotoxico.categoria);
                            $('#classe').val(agrotoxico.classe);
                            $('#preco').val(agrotoxico.preco);
                            $('#qtd_estoque').val(agrotoxico.qtd_estoque);
                            $('#precaucoes').val(agrotoxico.precaucoes);
                            $('#modo_uso').val(agrotoxico.modo_uso);
                        } else {
                            alert('Erro ao carregar os dados do agrotóxico.');
                        }
                    },
                    error: function(error) {
                        console.error('Erro:', error);
                    }
                });
            }
        });
    </script>
</body>
</html>

<?php require 'head.php'; ?>

<body>
<div class="container-custom">
        <form action="processar_cadastro.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control-custom" required><br><br>

            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" class="form-control-custom" required><br><br>

            <label for="fabricante">Fabricante:</label>
            <input type="text" id="fabricante" name="fabricante" class="form-control-custom" required><br><br>

            <label for="registro_anvisa">Registro ANVISA:</label>
            <input type="text" id="registro_anvisa" name="registro_anvisa" class="form-control-custom" required><br><br>

            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" class="form-control-custom" required><br><br>

            <label for="classe">Classe:</label>
            <input type="text" id="classe" name="classe" class="form-control-custom" required><br><br>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" class="form-control-custom" required><br><br>

            <label for="qtd_estoque">Quantidade em Estoque:</label>
            <input type="number" id="qtd_estoque" name="qtd_estoque" class="form-control-custom" required min="1"><br><br>

            <label for="precaucoes">Precauções:</label><br>
            <textarea id="precaucoes" name="precaucoes" rows="4" cols="50" class="form-control-custom" required></textarea><br><br>

            <label for="modo_uso">Modo de Uso:</label><br>
            <textarea id="modo_uso" name="modo_uso" rows="4" cols="50" class="form-control-custom" required></textarea><br><br>

            <input type="submit" value="Cadastrar Produto" class="btn-custom">
        </form>
    </div>
</body>
</html>

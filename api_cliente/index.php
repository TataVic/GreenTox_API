<!DOCTYPE html>

<?php require 'head.php'; ?>

<html>
<body>
    <div class="container mt-5">
        <div class="container-custom">
            <h2 class="mb-4">Consulta de Agrotóxicos</h2>
            <div class="mb-3">
                <label><input type="radio" name="searchType" value="id" checked> Pesquisar por ID</label>
                <label><input type="radio" name="searchType" value="nome"> Pesquisar por Nome</label>
            </div>
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control form-control-custom" placeholder="Digite o valor da pesquisa">
            </div>
            <div class="button-group mb-4">
                <button type="button" class="btn btn-custom" onclick="PesquisaTipo()">Pesquisar</button>
                <button type="button" class="btn btn-custom" onclick="Listartodos()">Consultar Todos</button>
            </div>
            <div id="dados-todos" class="mb-4"></div>
            <div id="dados-id" class="mt-4"></div>
        </div>
    </div>

    <script type="text/javascript">
        function Listartodos(){
            $.ajax({
                url: 'http://localhost/GreenTox_API/agrotoxicos',
                type: 'GET',
                dataType: 'json',
                success: function(dados){
                    $('#dados-todos').html('<pre>' + JSON.stringify(dados, null, 4) + '</pre>');
                },
                error: function(erro){
                    console.error('Erro na API: ' + erro);
                    $('#dados-todos').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API.</div>');
                }
            });
        }
        function PesquisaTipo(){
            var searchType = $('input[name="searchType"]:checked').val();
            var searchInput = $('#searchInput').val();
            if (searchInput) {
                var url = '';
                if (searchType === 'id') {
                    url = 'http://localhost/GreenTox_API/agrotoxicos/get?id=' + searchInput;
                } else if (searchType === 'nome') {
                    url = 'http://localhost/GreenTox_API/agrotoxicos/search?nome=' + searchInput;
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(dados){
                        $('#dados-id').html('<pre>' + JSON.stringify(dados, null, 4) + '</pre>');
                    },
                    error: function(erro){
                        console.error('Erro na API: ' + erro);
                        $('#dados-id').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API.</div>');
                    }
                });
            } else {
                $('#dados-id').html('<div class="alert alert-warning" role="alert">Por favor, digite um valor de pesquisa.</div>');
            }
        }
    </script>
</body>
</html>

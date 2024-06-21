<!DOCTYPE html>

<?php require 'head.php'; ?>

<html>
<body>
    <div class="container mt-5">
        <div class="container-custom">
            <h2 class="mb-4">Consulta de Agrotóxicos</h2>
            <div class="mb-3">
                <input type="text" id="produtoId" class="form-control form-control-custom" placeholder="Digite o ID do produto">
            </div>
            <div class="button-group mb-4">
                <button type="button" class="btn btn-custom" onclick="Listartodos()">Consultar Todos</button>
                <button type="button" class="btn btn-custom" onclick="PesquisaID()">Pesquisar</button>
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
                    $('#dados-todos').html(JSON.stringify(dados, null, 4));
                },
                error: function(erro){
                    console.error('Erro na API: '+erro);
                    $('#dados-todos').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API.</div>');
                }
            });
        }

        function PesquisaID(){
            var id = $('#produtoId').val();
            if (id) {
                $.ajax({
                    url: 'http://localhost/GreenTox_API/agrotoxicos/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(dados){
                        $('#dados-id').html(JSON.stringify(dados, null, 4));
                    },
                    error: function(erro){
                        console.error('Erro na API: '+erro);
                        $('#dados-id').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API.</div>');
                    }
                });
            } else {
                $('#dados-id').html('<div class="alert alert-warning" role="alert">Por favor, digite um ID de produto.</div>');
            }
        }
    </script>
</body>
</html>

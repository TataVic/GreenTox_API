<!DOCTYPE html>
<?php require 'head.php'; ?>

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
                <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#resultModal" onclick="Listartodos()">Consultar Todos</button>
            </div>
            <div id="dados-todos" class="mb-4"></div>
            <div id="dados-id" class="mt-4"></div>
                
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border: 2px solid rgb(153, 189, 115); background-color: rgb(246, 239, 223);">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Agrotóxicos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal-dados-todos"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function Listartodos(){
            $.ajax({
                url: 'http://localhost/GreenTox_API/agrotoxicos',
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    if(response.status && response.dados.length > 0) {
                        $('#modal-dados-todos').html(formatarDados(response.dados));
                    } else {
                        $('#modal-dados-todos').html('<div class="alert alert-warning" role="alert">Nenhum dado encontrado.</div>');
                    }
                },
                error: function(erro){
                    console.error('Erro na API: ' + erro);
                    $('#modal-dados-todos').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API.</div>');
                }
            });
        }

        function formatarDados(dados) {
            let table = `<table class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Categoria</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>`;
            dados.forEach(dado => {
                table += `<tr style="text-align: center;">
                            <td>${dado.nome}</td>
                            <td>${dado.tipo}</td>
                            <td>${dado.categoria}</td>
                            <td>${dado.preco}</td>
                            <td>
                                <button class="btn btn-info btn-sm">
                                    <img></button>
                                <button class="btn btn-warning btn-sm">
                                <img></button>
                                <button class="btn btn-danger btn-sm">
                                <img></button>
                            </td>
                          </tr>`;
            });
            table += `</tbody></table>`;
            return table;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

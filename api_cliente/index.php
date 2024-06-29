
<?php require 'head.php'; ?>
<body>
    <div class="container mt-5">
        <div class="container-custom">
            <h2 class="mb-4">Consulta de Agrotóxicos</h2>
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control form-control-custom" placeholder="Digite o nome do agrotóxico">
            </div>
            <div class="button-group mb-4">
                <button type="button" class="btn btn-custom" onclick="PesquisaNome()">Pesquisar</button>
                <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#resultModal" onclick="Listartodos()">Consultar Todos</button>
                <button type="button" class="btn btn-custom" onclick="window.location.href='cadprod.php'">Cadastrar produto</button>
            </div>
            <div id="dados-todos" class="mb-4"></div>
            <div id="dados-nome" class="mt-4"></div>
        </div>
    </div>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        function Listartodos() {
            $.ajax({
                url: 'http://localhost/GreenTox_API/agrotoxicos',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status && response.dados.length > 0) {
                        $('#modal-dados-todos').html(formatarDados(response.dados));
                    } else {
                        $('#modal-dados-todos').html('<div class="alert alert-warning" role="alert">Nenhum dado encontrado.</div>');
                    }
                },
                error: function(erro) {
                    console.error('Erro na API: ' + erro);
                    $('#modal-dados-todos').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API.</div>');
                }
            });
        }

        function PesquisaNome() {
            var searchInput = $('#searchInput').val();
            if (searchInput) {
                var url = 'http://localhost/GreenTox_API/agrotoxicos/search?nome=' + encodeURIComponent(searchInput);

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(dados) {
                        if (dados.status && dados.dados.length > 0) {
                            $('#modal-dados-todos').html(formatarDados(dados.dados)); 
                        } else {
                            $('#modal-dados-todos').html('<div class="alert alert-warning" role="alert">Nenhum dado encontrado.</div>');
                        }
                        $('#resultModal').modal('show'); 
                    },
                    error: function(erro) {
                        console.error('Erro na API: ' + erro);
                        $('#modal-dados-todos').html('<div class="alert alert-danger" role="alert">Erro ao consultar a API.</div>');
                        $('#resultModal').modal('show'); 
                    }
                });
            } else {
                $('#modal-dados-todos').html('<div class="alert alert-warning" role="alert">Por favor, digite um nome para pesquisa.</div>');
                $('#resultModal').modal('show'); 
            }
        }

        function formatarDados(dados) {
    let table = `<table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Categoria</th>
                            <th>Estoque</th>
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
                    <td>${dado.qtd_estoque}</td>
                    <td>${dado.preco}</td>
                    <td>
                 <a href="visuprod.php?id=${dado.id}" class="btn btn-sm btn-menu">
    <img src="images/olho.png" alt="Visualizar">
</a>
                       <button onclick="editarProduto(${dado.id})" class="btn btn-sm btn-editar">
                            <img src="images/lapis.png" alt="Editar">
                        </button>
                        <button class="btn btn-sm btn-excluir" onclick="excluirProduto(${dado.id})">
                            <img src="images/lixeira.png" alt="Excluir">
                        </button>
                    </td>
                  </tr>`;
    });
    table += `</tbody></table>`;
    return table;
}

function editarProduto(id) {
    console.log('ID do produto:', id); // Verifique se o ID está sendo capturado corretamente
    window.location.href = 'prodedit.php?id=' + id;
}

function excluirProduto(id) {
    if (confirm("Você tem certeza que deseja excluir este produto?")) {
        // Fazendo a requisição AJAX para excluir o produto
        fetch(`http://localhost/GreenTox_API/agrotoxicos/delete?id=${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro ao excluir o produto');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert("Produto deletado com sucesso!");
                // Remover o elemento do DOM ou recarregar a lista de produtos
                location.reload(); // Exemplo: recarregar a página
            } else {
                alert("Erro ao deletar o produto: " + data.error);
            }
        })
        .catch(error => {
            alert("Erro ao deletar o produto: " + error.message);
        });
    }
}

       

    </script>
</body>
</html>

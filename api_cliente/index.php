<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consumir API</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>	
   <button type="button" onclick="Listartodos()">Consultar</button>
   <div id="dados"></div>

   <input type="text" id="produtoId" placeholder="Digite o ID do produto">
    <button type="button" onclick="PesquisaID()">Pesquisar</button>
    <div id="dados"></div>

   <script type="text/javascript">
   		function Listartodos(){
   			$.ajax({
   				url: 'http://localhost/GreenTox_API/agrotoxicos',
   				type: 'GET',
   				dataType: 'json',
   				//headers: {'AUTH': '123456'},
   				success: function(dados){
   					$('#dados').html(JSON.stringify(dados));
   				},
   				error: function(erro){
   					console.error('erro na api: '+erro);
   				}
   			});
   		}

           function PesquisaID(){
   			$.ajax({
   				url: 'http://localhost/GreenTox_API/agrotoxicos/get',
   				type: 'GET',
   				dataType: 'json',
   			// falta
   			});
   		}

    
   </script>
</body>
</html>
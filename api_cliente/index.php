<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consumir API</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>	
   <button type="button" onclick="Listartodos()">Consultar</button>
   <div id="dados"></div>

   <!-- <input type="text" id="produtoId" placeholder="Digite o ID do produto">
    <button type="button" onclick="PesquisaID()">Pesquisar</button>
    <div id="dados"></div> -->

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

      
   </script>
</body>
</html>
# GreenTox_API
API de cadastro de agrotóxicos e autenticação por usuário e token 🔒
---
**Base URL {URL_API}**: 🗝️
'' localhost/GreenTox_API/agrotoxicos/

**Parâmetros do Agrotóxicos:**
```
nome (string, obrigatório): Nome do agrotóxico.
tipo (string, obrigatório): Tipo do agrotóxico.
fabricante (string, obrigatório): Fabricante do agrotóxico.
registro_anvisa (integer, obrigatório): Registro do produto na ANVISA.
categoria (string, obrigatório): Categoria do agrotóxico.
classe (string, obrigatório): Classe do agrotóxico.
preco (float, obrigatório): Preço do agrotóxico.
qtd_estoque (integer, obrigatório): Quantidade em estoque.
precaucoes (string, obrigatório): Precauções a serem tomadas ao usar o agrotóxico.
modo_uso (string, obrigatório): Modo de uso do agrotóxico.
```
**Parâmetros do Usuário:**
```
nome (string, obrigatório): Nome do usuário.
usuario (string, obrigatório): username do usuário.
senha (string, obrigatório): senha do usuário.
email (string, obrigatório): email do usuário.
```

## **EndPoints - Agrotóxicos** : Métodos para criar, ler, atualizar e excluir produtos agrotóxicos (CRUD).
### Cadastrar Agrotóxico (POST_TOX)
Endpoint: {URL_API}/create

Método HTTP: POST

Descrição: Realiza o cadastro de novos produtos agrotóxicos.

Requisição:
```
{ 
"nome": "Veneno de mato",
"tipo": "Veneno",
"fabricante": "AhgroQuimic",
"registro_anvisa": 147258,
"categoria": "Veneno de matin",
"classe": "Herbicida",
"preco": 523,
"qtd_estoque": 5,
"precaucoes": "Use luva e máscara",
"modo_uso": "utilize em ambiente aberto"
}
```

### Visualizar Agrotóxico (GET_TOX)
Endpoint: {URL_API}/get

Método HTTP: GET

Descrição: Realiza a visualização dos agrotóxicos.

Requisição:
```
{ "status": true,
"titulo": "todos os produtos", "dados": 
{
"id": 1,
nome": "Veneno de mato",
"tipo": "Veneno",
"fabricante": "AhgroQuimic",
"registro_anvisa": 147258,
"categoria": "Veneno de matin",
"classe": "Herbicida",
"preco": 523,
"qtd_estoque": 5,
"precaucoes": "Use luva e máscara",
"modo_uso": "utilize em ambiente aberto"
}
```
### Atualizar Agrotóxico (PUT_TOX)
Endpoint: {URL_API}/update

Método HTTP: PUT

Descrição: Realiza a atualização dos agrotóxicos, de acordo com o campo que foi alterado.

```
{
"id": 1,
nome": "----------",
"tipo": "-------",
"fabricante": "--------",
"registro_anvisa": ------,
"categoria": "---------",
"classe": "------",
"preco": -----,
"qtd_estoque": ----,
"precaucoes": "-------",
"modo_uso": "------------" 
}
```

### Deletar Agrotóxico (DELETE_TOX)
Endpoint: {URL_API}/delete

Método HTTP: DELETE

Descrição: Deletar os agrotóxicos.

Requisição:

```
{
"id": 1,
nome": "Veneno de mato",
"tipo": "Veneno",
"fabricante": "AhgroQuimic",
"registro_anvisa": 147258,
"categoria": "Veneno de matin",
"classe": "Herbicida",
"preco": 523,
"qtd_estoque": 5,
"precaucoes": "Use luva e máscara",
"modo_uso": "utilize em ambiente aberto"
}
```



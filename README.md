# GreenTox_API - API de cadastro de agrotóxicos e autenticação por usuário e token 🔒

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

## PostMan:	
[Para conferir as requisições](https://time-agro.postman.co/workspace/Time-Agro-Workspace~d86c2b54-15ca-4d00-8734-c9b9df7f101a/collection/36432648-5e45dcb6-905c-4200-9b3d-985bcf389de6?action=share&creator=36432648) 


## **EndPoints - Agrotóxicos** : Métodos para criar, ler, atualizar e excluir agrotóxicos (CRUD).
### Cadastrar Agrotóxico (POST_TOX)
**Endpoint:** {URL_API}/create

**Método HTTP:** POST

**Descrição:** Realiza o cadastro de novos produtos agrotóxicos.

**Requisição:**
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
**Resposta de Sucesso:**
```
{
    "status": true,
    "titulo": "Produto agrotóxico cadastrado com sucesso!",
    "dados": {
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
    },
    "versao": "v1"
}
```
**Resposta de Erro:**
```
{
    "status": false,
    "titulo": "Erro no cadastro do agrotóxico: ",
    excecao: ""
}
```

### Visualizar Agrotóxico (GET_TOX)
**Endpoint:** {URL_API}/get

**Método HTTP:** GET

**Descrição:** Realiza a visualização dos agrotóxicos.

**Requisição:**
```
{ "status": true,
  "titulo": "todos os produtos",
  "dados":[ 
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
]}
```
**Resposta de Sucesso:**
```
{
    "status": true,
    "titulo": "Consulta Realizada",
    "retorno": {
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
    },
    "versao": "v1"
}
```
**Resposta de Erro:**
```
{
    "status": false,
    "titulo": "Nenhum registro encontrado para o parâmetro informado"
}
```

### Visualizar Agrotóxico por Nome(GETNOME_TOX)
**Endpoint:** {URL_API}/getnome

**Método HTTP:** GET

**Descrição:** Realiza a visualização dos agrotóxicos, a partir da busca pelo seu nome.

**Requisição:**

```
{
  "nome": "Veneno de mato",
  "tipo": "Veneno",
  "categoria": "Veneno de matin",
  "preco": 523,
  "qtd_estoque": 5,
}
```
**Resposta de Sucesso:**
```
{
    "status": true,
    "titulo": "Consulta Realizada",
    "retorno": {
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
    },
    "versao": "v1"
}
```
**Resposta de Erro:**
```
{
    "status": false,
    "titulo": "Nenhum registro cadastrado"
}
```

### Atualizar Agrotóxico (PUT_TOX)
**Endpoint:** {URL_API}/update

**Método HTTP:** PUT

**Descrição:** Realiza a atualização dos agrotóxicos, de acordo com o campo que foi alterado.

**Requisição:**
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
**Resposta de Sucesso:**
```
{
    "status": true,
    "titulo": "Registro atualizado com sucesso.",
    "retorno": {
        "nome": "Veneno de mato",
        ... (o que foi atualizado)
    },
    "versao": "v1"
}
```
**Resposta de Erro:**
```
{
    "status": false,
    "titulo": "Nenhuma alteração foi realizada."
}
```

### Deletar Agrotóxico (DELETE_TOX)
**Endpoint:** {URL_API}/delete

**Método HTTP:** DELETE

**Descrição:** Deletar os agrotóxicos.

**Requisição:**

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

**Resposta de Sucesso:**
```
{
    "status": true,
    "titulo": "Agrotóxico deletado com sucesso",
    "retorno": {
        "id": " ",
    },
    "versao": "v1"
}
```
**Resposta de Erro:**
```
{
    "status": false,
    "titulo": "Erro ao deletar o agrotóxico",
    "retorno": {
        "id": " ",
    },
    "versao": "v1"
}
```

## **EndPoints - Usuários** : Métodos para criar e consultar usuários.
### Cadastrar Usuário (POST_USER)

**Endpoint:** {URL_API}/cadastrar

**Método HTTP:** POST

**Descrição:** Realiza o cadastro de novo usuário.

**Requisição:**
```
{
  "nome":"Ani ", 
  "usuario":"anis", 
  "email":"ani@example.com",
  "senha":"123"
}
```
**Resposta de Sucesso:**
```
{
    "status": true,
    "titulo": "Cadastro realizado com sucesso!",
    "retorno": {
      "nome":"Ani ", 
      "usuario":"anis", 
      "email":"ani@example.com",
      "senha":""&¨%#GSDA"
    },
    "versao": "v1"
}
```
**Resposta de Erro:**
```
{
    "status": false,
    "titulo": "Erro ao cadastrar, revise os campos!",
 "retorno": {
      "nome":"Ani ", 
      "usuario":" ", 
      "email":"ani@example.com",
      "senha":""&¨%#GSDA"
    },
    "versao": "v1"
}
```

### Visualizar Agrotóxico (GET_USER)

**Endpoint:** {URL_API}/login

**Método HTTP:** GET

**Descrição:** Realiza a visualização e validação do usuário cadastrado, no login.

**Requisição**:

```
{
  "usuario":"anis", 
  "senha":"123"
}
```
      **Requisição:**
```
{
  "nome":"Ani ", 
  "usuario":"anis", 
  "email":"ani@example.com",
  "senha":"123"
}
```
**Resposta de Sucesso:**
```
{
    "status": true,
    "titulo": "Logado com sucesso!",
    "retorno": {
      "usuario":"anis", 
      "senha":"&¨%#GSDA"
    },
    "versao": "v1"
}
```
**Resposta de Erro:**
```
{
    "status": false,
    "titulo": "Erro ao logar, verifique as credenciais!",
 "retorno": {
      "nome":"Ani ", 
      "usuario":"anis", 
      "email":"ani@example.com",
      "senha":""&¨%#GSDA "
    },
    "versao": "v1"
}
```

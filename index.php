<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "css/style.css">
    <title>CRUD</title>
</head>
<body>

<div id = "painel">
    CRUD</br></br>
    <form action="post">
    Nome: <input type="text" name="nome" id="nome"></br></br>
    Data de Nascimento: <input type="date" name="nascimento" id="nascimento"></br></br>
    Telefone: <input type="tel" name="telefone" id="telefone"></br></br>
    <button id="create" class="opcao">Adicionar</button>
    <button id="read" class="opcao">Consultar</button>
    <div id = "result"></div>
    <button id="update" class="opcao">Editar</button>
    <button id="delete" class="opcao">Deletar</button>
    </form>
</div>
    
    <script src = "js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
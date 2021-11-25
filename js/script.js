var id;

$('#result').hide();
$('#update').hide();
$('#delete').hide();

$('.opcao').on("click", function (event) {
event.preventDefault();


var opcao = this.id;
var nome = $('#nome').val();
var nascimento = $('#nascimento').val();
var telefone = $('#telefone').val();

var dados = {
    'opcao': opcao,
    'nome': nome,
    'nascimento': nascimento,
    'telefone': telefone,
    'id': id,
  }

dados = JSON.stringify(dados);

$.ajax({
    url: 'http://localhost/CRUD/sql.php',
    method: 'POST',
    data: {data: dados},
    dataType: 'json',
    success: function (result) {
      
      opcao = result['opcao']
      nome = result['nome']
      nascimento = result['nascimento']
      telefone = result['telefone']
      id = result['id']

    if(opcao == "create") $('#result').html("Cadastrado com Sucesso!</br>Nome: "+nome+"</br>Data de Nascimento: "+nascimento+"</br>Telefone: "+telefone);
    else if(opcao == "update") $('#result').html("Cadastrado alterado Sucesso!</br>Nome: "+nome+"</br>Data de Nascimento: "+nascimento+"</br>Telefone: "+telefone);
    else if(opcao == "delete") $('#result').html("Cadastrado removido Sucesso!");
    else
    {
        $('#result').html("Nome: "+nome+"</br>Data de Nascimento: "+nascimento+"</br>Telefone: "+telefone);
        $('#update').show();
        $('#delete').show();
    }  

    $('#result').show();

    if(opcao != "read" && opcao != "update")
    {
        $('#update').hide();
        $('#delete').hide();
    }

    },
    error: function (result) {
      alert(JSON.stringify(result));
    }
  })

});
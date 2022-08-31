
<?php
       require('db/conexao.php');
       $sql = $pdo->prepare('SELECT * FROM pessoas');
       $sql-> execute();
       $dados = $sql-> fetchAll() 
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./jquery.min.js"></script> 
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    
    
     <div id="dFormPessoas" >
          <form name="formPessoas" method="post" id="formPessoas" action="index.php">
               <h2 style="font-size: 25px;">Informações basicas</h2>
               <div id="nomePessoa" class="row">
                    <div class="col-5">
                         <label for="nome" class="form-label">Nome</label>
                         <input type="text" name="nome" id = "nome" class="form-control" required>
                    </div>
                    <div class="col-5">
                         <label for="sobrenome" class="form-label">Sobrenome</label>
                         <input type="text" name="sobrenome" id = "sobrenome" class="form-control" required>
                    </div>
                    <div class="col-2">
                         <label for="idade" class="form-label">idade</label>
                         <input type="text" name="idade" id = "idade"  class="form-control" required>
                    </div>
               </div>
               <h2 style="font-size: 25px;">Endereço</h2>
               <div id="endereçoPessoa" class="row">
                    <div class="col-3">
                         <label for="cep" class="form-label">Cep</label>
                         <input type="text" name="cep" id = "cep"  class="form-control" required>
                    </div>
                    <div class="col-7">
                         <label for="rua" class="form-label">Rua</label>
                         <input type="text" name="rua" id = "rua"  class="form-control" required>
                    </div>
                    
                    <div class="col-2">
                         <label for="Numero" class="form-label">Número</label>
                         <input type="text" name="numero" id = "numero"  class="form-control" required>
                    </div>
                    <div class="col-4">
                         <label for="bairro" class="form-label">Bairro</label>
                         <input type="text" name="bairro" id = "bairro"  class="form-control" required>
                    </div>
                    <div class="col-4">
                         <label for="cidade" class="form-label">Cidade</label>
                         <input type="text" name="cidade" id = "cidade"  class="form-control" required>
                    </div>
                    <div class="col-4">
                         <label for="estado" class="form-label">Estado</label>
                         <input type="text" name="estado" id = "estado"  class="form-control" >
                    </div>
               </div>
               <div style="display: flex; justify-content: flex-end;"> 
                    <input type="button" id="excluirTudo" onclick="excluirAll()" value="Excluir Lista" class="btn btn-danger" style="margin-top:10px; margin-right: 10px;" >
                    <input type="submit" id="botao" onclick="window.location.reload();" value="Adicionar" class="btn btn-primary" style="margin-top:10px" >
               </div>
          </form>
     </div>
     <div class="row">
          <div class="col-12" style="overflow-x:auto;">
 
<?php


     //EXIBIR BANCO DE DADOS NA TELA

    
     
     if(count($dados)> 0){
          echo "
          
          <table id='myForm' class='table col-12 table-striped mt-4'>
               <thead id='topTabela'class='>
                    <tr class='col-12' id = '>

                         <th scope='col'>
                              <input type='checkbox' onclick='marcarTodos()' name='checkAll' id='checkAll'>
                         </th>

                         <th scope='col-'>ID</th>
                         <th id='name' scope='col'>Nome</th>
                         <th scope='col'>Sobrenome</th>
                         <th scope='col'>Idade</th>
                         <th scope='col'>Cep</th>
                         <th scope='col'>Rua</th>
                         <th scope='col'>Número</th>
                         <th scope='col'>Bairro</th>
                         <th scope='col'>Cidade</th>
                         <th scope='col'>Estado</th>
                    <tr>
               </thead>";

          foreach($dados as $chave => $valor){
                    echo "<tr name='formulario' id=".$valor['id']." class='col-12'>
                         <td class='col-1'> <input type='checkbox' name='checkLinha' id='checkLinha' ></td>                  
                         <td class='col-1'>".$valor['nome']."</td>
                         <td class='col-1'>".$valor['sobrenome']."</td>
                         <td class='col-1'>".$valor['idade']."</td>
                         <td class='col-1'>".$valor['cep']."</td>
                         <td class='col-1'>".$valor['rua']."</td>
                         <td class='col-1'>".$valor['numero']."</td>
                         <td class='col-1'>".$valor['bairro']."</td>
                         <td class='col-1'>".$valor['cidade']."</td>
                         <td class='col-1'>".$valor['uf']."</td>
                    </tr>";
          
        
                    
          }
          echo "</tbody>";
          echo "</table>";
          
     };

     // CAPITAÇÂO E INCUSÂO NO BANCO DE DADOS

          if(isset($_POST['nome']) 
               && isset($_POST['sobrenome'])
               && isset($_POST['idade'])
               && isset($_POST['cep'])
               && isset($_POST['rua'])
               && isset($_POST['numero'])
               && isset($_POST['bairro'])
               && isset($_POST['cidade'])
               && isset($_POST['estado'])){
                    $nome= $_POST['nome'];
                    $sobrenome= $_POST['sobrenome'];
                    $idade= $_POST['idade'];
                    $cep= $_POST['cep'];
                    $rua= $_POST['rua'];
                    $numero= $_POST['numero'];
                    $bairro= $_POST['bairro'];
                    $cidade= $_POST['cidade'];
                    $estado= $_POST['estado'];


                    $sql = $pdo->prepare("INSERT INTO pessoas VALUES(default,'$nome','$sobrenome','$idade','$cep','$rua','$numero','$bairro','$cidade','$estado')");
                    $sql->execute();
               };


     
               
               exit;

?>
          

</div>
</div> 

</body>
</html>


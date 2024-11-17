<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <?php
        include "conexao.php";
        $pesquisa = $_POST['busca'] ?? "";
        
        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

        $dados = mysqli_query($conn, $sql);
       

    ?>
    <div class="container">
        <h1>Pesquisar</h1>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search" action='pesquisar.php' method="POST">
                    <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca"> <!-- O name serve para a criação da variável-->
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de Nasc.</th>
                    <th scope="col">Funções</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php        
                    while ($linha = mysqli_fetch_assoc($dados)) {//remove a próxima linha do conjunto de dados e a dispõe em forma de array associativo
                    $cod_pessoa = $linha['cod_pessoa'];
                    $nome = $linha['nome'];
                    $endereco = $linha['endereco'];
                    $telefone = $linha['telefone'];
                    $email = $linha['email'];
                    $data_nascimento = $linha['data_nascimento'];
                    $data_nascimento = mostrar_data($data_nascimento);
                    
                    echo"
                    <tr>
                    <th scope='row'>$nome</th>
                    <td>$endereco</td>
                    <td>$telefone</td>
                    <td>$email</td>
                    <td>$data_nascimento</td>
                    <td>
                        <a href='cadastro_editar.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#'class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' 
                        onclick=" .'"' ."pegar_dados($cod_pessoa, '$nome')" .'"' .">Remover</a>
                    </td>
                    </tr>";
                    }
                ?>

                
                
            </tbody>
        </table>
        <a href='index.php' role='button' class='btn btn-primary btn-lg'>Voltar</a>
    </div>

    <div class="modal fade" tabindex="-1" id='confirma'aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir: <b id='pessoaExcluida'> $pessoa?</b></p>
            </div>
            <div class="modal-footer">
                <form action='excluir_script.php' method='POST'>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type='hidden' name='id' id='cod_pessoa' value=''>
                    <input type='hidden' name='nome' id='nome_pessoa' value=''>
                    <input type="submit" class="btn btn-danger"value='Excluir'></button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <script>
        function pegar_dados(id, nome){
            document.getElementById('pessoaExcluida').innerHTML=nome+'?'
            document.getElementById('nome_pessoa').value=nome
            document.getElementById('cod_pessoa').value=id
            
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>


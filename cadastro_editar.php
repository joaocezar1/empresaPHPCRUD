<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php
    include "conexao.php";
    $id = $_GET['id'] ??'';
    $sql = " SELECT * FROM pessoas WHERE cod_pessoa = $id";
    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
    $cod_pessoa = $linha['cod_pessoa'];
    $nome = $linha['nome'];
    $endereco = $linha['endereco'];
    $telefone = $linha['telefone'];
    $email = $linha['email'];
    $data_nascimento = $linha['data_nascimento'];

    ?>
    <div class="container">
        <table>
            <tr>
                <th><h1>Alteração de Cadastro</h1></th>
                <!-- <th>Contact</th>
                <th>Country</th> --> 
            </tr>
                <tr>
                    <form action='editar_script.php' method='POST'>
                    <td>
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" placeholder='João da Silva' name='nome' required value= "<?php echo $nome; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="Enderço" class="form-label">Endereço completo</label>
                            <input type="text" class="form-control" placeholder='Rua dos Tabajaras, 123' name='endereco'required value= "<?php echo $endereco; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="Telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" placeholder='(XX) X XXXX-XXXX' name='telefone'required value= "<?php echo $telefone; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder='XXX@XXX.XXX' name='email'required value= "<?php echo $email; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="data_nascimento" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control" name='data_nascimento'required value= "<?php echo $data_nascimento; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <input type='submit' class='btn btn-success' value='Salvar alterações'>
                            <input type='hidden' name='cod_pessoa' value="<?php echo $linha['cod_pessoa'];?>">
                        </div>
                    </td>
                </tr>
            </form>
        </table>
        <a href='index.php' role='button' class='btn btn-primary btn-lg'>Voltar</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>


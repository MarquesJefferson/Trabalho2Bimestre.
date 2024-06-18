<?php
require_once './Model/CamisetaDAO.php';
// precisei criar as variaveis atribuindo valor para não estourar erros no PHP
$nome = '';
$tamanho = '';
$cor = '';
$preco = '';
$DAO = new CamisetaDAO;

// Verifica se existe o botão que estou clicando
if (isset($_POST['Salvar'])) {
    // Atribui os valores as variaveis
    $nome = $_POST['nome'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];
    $preco = $_POST['preco'];

 // Envia para o cadastro
    $retorno = $DAO->CadastrarCamiseta($nome, $tamanho, $cor, $preco);

}
// Consulta os cadastros
$camisetas = $DAO->ConsultarCamiseta();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Camisetas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Loja de Camisetas</h1>

        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome da Camiseta</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="tamanho">Tamanho</label>
                <input type="text" class="form-control" id="tamanho" name="tamanho" required>
            </div>
            <div class="form-group">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
            </div>
            <button name="Salvar" type="submit" class="btn btn-success">Cadastrar</button> 
        </form>
    <!--  -->
    <div class="panel-body mt-4">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome do produto</th>
                                                <th>Tamanho</th>
                                                <th>Cor</th>
                                                <th>Preço</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Laço para recuperar os valores da variavel camisetas -->
                                            <?php for ($i = 0; $i < count($camisetas); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $camisetas[$i]['nome'] ?></td>
                                                    <td><?= $camisetas[$i]['tamanho'] ?></td>
                                                    <td><?= $camisetas[$i]['cor'] ?></td>
                                                    <td><?= $camisetas[$i]['preco'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
    </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

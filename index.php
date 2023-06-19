<?php
    session_start();
    if(isset($_SESSION['mensagem'])){
        ?>
            <script>
                window.onload = function() {
                    alert('<?php echo $_SESSION['mensagem']; ?>');
                }
            </script>
        <?php
    }

    session_unset();
    include_once('config.php');
    $sql = "SELECT * FROM clientes";
    $resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            width:100%;
            height: 100vh;
        }
        .container{
            width:100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .msg{
            text-align: center;
            font-size: 22px;
        }
    </style>
</head>
<body>

    <div class="container">


        <h1>Tabela de usuários cadastrados</h1>
        <br>

        <table class="table table-hover table-striped table-bordered">

            <tr>
                <th>#</th>
                <th>Nome:</th>
                <th>Sobrenome:</th>
                <th>E-mail:</th>
                <th>Endereço:</th>
                <th>Criado no dia:</th>
                <th>Ações:</th>
            </tr>

            <?php while($dados = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td><?php echo $dados['id']; ?></td>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['sobrenome']; ?></td>
                    <td><?php echo $dados['email']; ?></td>
                    <td><?php echo $dados['endereco']; ?></td>
                    <td><?php echo $dados['data']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn btn-success">Editar</a>
                        <form action="deletar.php" method="POST">
                            <input type="hidden" name='id' value="<?php echo $dados['id']; ?>">
                            <button type="submit" name="btn-del" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
            
        <a class="btn btn-primary"href="cadastro.php">Criar cadastro</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<?php
    session_start();    

    include_once('config.php');

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM clientes WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sql);

        $dados = mysqli_fetch_array($resultado);
    }

    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['email']) && !empty($_POST['endereco'])){
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $sql = "UPDATE clientes set nome='$nome', sobrenome='$sobrenome', email='$email', endereco='$endereco' WHERE id = '$id'";

        if(mysqli_query($conn, $sql)){
            $_SESSION['mensagem'] = "Atualizado com sucesso";
            header('Location: index.php');
        }
        else{
            $_SESSION['mensagem'] = "Erro ao atualizar usuario!";
            header('Location: index.php');
        }
    }


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Edição de clientes</h1>
            <form action="editar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>"/>
                <div class="inputs">
                    <input type="text" placeholder="Digite seu nome" name="nome" value="<?php echo $dados['nome']; ?>">
                    <input type="text" placeholder="Digite seu sobrenome" name="sobrenome" value="<?php echo $dados['sobrenome']; ?>">
                    <input type="text" placeholder="Digite seu E-mail" name="email" value="<?php echo $dados['email']; ?>">
                    <input type="text" placeholder="Digite seu endereco" name="endereco" value="<?php echo $dados['endereco']; ?>">
                </div>
                <div class="buttons">
                    <button type="submit" name="submit">Editar</button>
                    <a href="index.php">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
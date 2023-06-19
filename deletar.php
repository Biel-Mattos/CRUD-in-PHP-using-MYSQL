<?php
session_start();

include_once('config.php');

if(isset( $_POST['btn-del'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($conn, $sql)){
        $_SESSION['mensagem'] = "Deletado com sucesso";
        header('Location: index.php');
    }
    else{
        $_SESSION['mensagem'] = "Erro ao deletar usuario!";
        header('Location: index.php');
    }
}
<?php
include 'conexao.php';

if (isset($_GET['id'])) { // Verifica se o id foi passado
    $id = $_GET['id']; // Recebe o id
    $sql = "DELETE FROM players WHERE id=$id"; // prepara a exclusão

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona se a exclusão for bem sucedida
    } else {
        echo "Erro " . $conn->error; // mostra o erro, se houver
    }
}
?>
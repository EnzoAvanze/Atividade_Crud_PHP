<?php
include 'conexao.php';

$sql = "SELECT * FROM players"; // Consulta todos os usuários
$result = $conn->query($sql);

if ($result->num_rows > 0) { // Se há resultados
    echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Time</th><th>Ações</th></tr>";
    while ($row = $result->fetch_assoc()) { // Para cada usuario
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["clube"] . "</td>
                <td>
                    <a href='update.php?id=" . $row["id"] . "'>Editar</a>
                    <a href='delete.php?id=" . $row["id"] . "'>Excluir</a>
                </td>
              </tr>";
    }
    echo "</table>"; // Fecha a tabela
}else {
    echo "Nenhum usuário encontrado."; // mensagem se nao houver usuarios
}
?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conectar ao banco de dados
include('conexao.php'); 

// Verificar se o id foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar o usuário no banco de dados
    $query = "SELECT * FROM players WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);  // 'i' para integer
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Se o usuário for encontrado, carrega os dados
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Usuário não encontrado!";
        exit;
    }
} else {
    echo "ID não especificado!";
    exit;
}

// Verificar se o formulário foi enviado para atualização
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Atualizar os dados no banco
    $nome = $_POST['nome'];
    $clube = $_POST['clube'];

    $update_query = "UPDATE players SET nome = ?, clube = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssi", $nome, $clube, $id);  // 's' para string, 'i' para integer
    $stmt->execute();

    // Redirecionar ou mostrar mensagem de sucesso
    header("Location: index.php");
    exit;
}
?>

<body>
    <h1>Atualizar Jogador</h1>
    <form action="" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo isset($usuario['nome']) ? $usuario['nome'] : ''; ?>" required>
        <label>Clube:</label>
        <input type="text" name="clube" value="<?php echo isset($usuario['clube']) ? $usuario['clube'] : ''; ?>" required>
        <input type="submit" value="Atualizar">
    </form>
</body>

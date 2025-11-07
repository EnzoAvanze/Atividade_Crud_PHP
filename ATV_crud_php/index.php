<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crud Simples</title>
</head>
<body>
    <h1>The Best</h1>
    <form action="store.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <label for="clube">Time:</label>
        <input type="text" name="clube" required>
        <input type="submit" value="Adicionar Jogador">
    </form>
    <hr>
    <h2>Lista de Jogadores</h2>
    <div class="usuarios">
        <?php include "read.php"; ?>
        <!-- Lista dos usuários da tabela -->
    </div>
</body>
</html>
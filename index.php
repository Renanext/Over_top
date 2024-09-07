<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'logic.php'; ?>

    <h1>Cadastro de Clientes</h1>

    <div class="form-container">
        <h2>Adicionar Cliente</h2>
        <div class="mensagem">
            <?php if (!empty($mensagem)) echo "<p style='color: green;'>$mensagem</p>"; ?>
        </div>
        <!-- Formulário de adicionar cliente -->
    </div>

    <div class="form-container">
        <h2>Deletar Cliente</h2>
        <!-- Formulário de deletar cliente -->
    </div>

    <div class="form-container">
        <h2>Consultar Clientes</h2>
        <!-- Formulário de consulta de clientes -->
        <!-- Exibição de resultados -->
    </div>

</body>
</html>

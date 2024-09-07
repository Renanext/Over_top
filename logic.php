<?php
include 'config.php'; // Certifique-se de que este arquivo contém a conexão ao banco de dados

$mensagem = '';
$clientes = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_cliente'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("INSERT INTO clientes (nome, cpf, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $cpf, $email);
        if ($stmt->execute()) {
            $mensagem = "Cliente adicionado com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar cliente: " . $conn->error;
        }
        $stmt->close();
    }

    if (isset($_POST['delete_cliente'])) {
        $search = $_POST['delete_search'];

        $query = "DELETE FROM clientes WHERE cliente_id = ? OR nome = ? OR cpf = ? OR email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isss", $search, $search, $search, $search);

        if ($stmt->execute()) {
            $mensagem = "Cliente deletado com sucesso!";
        } else {
            $mensagem = "Erro ao deletar cliente: " . $conn->error;
        }
        $stmt->close();
    }

    if (isset($_POST['search_cliente'])) {
        $search = $_POST['search'];

        $query = "SELECT * FROM clientes WHERE nome LIKE ? OR cpf LIKE ? OR email LIKE ?";
        $like_search = "%$search%";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $like_search, $like_search, $like_search);

        $stmt->execute();
        $result = $stmt->get_result();
        $clientes = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
}

$conn->close();
?>

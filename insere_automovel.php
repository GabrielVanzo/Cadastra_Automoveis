<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $placa = $_POST['placa'];
    $chassi = $_POST['chassi'];
    $montadora = $_POST['montadora'];
    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'test_webline_db');
    if (!$connection) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }
    $query = "INSERT INTO automoveis (nome, placa, chassi, montadora) VALUES ('$nome', '$placa', '$chassi', '$montadora')";
    if (mysqli_query($connection, $query)) {
        echo "Automóvel cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o automóvel: " . mysqli_error($connection);
    }
    mysqli_close($connection);
}
header("Location: listaautomoveis.php");
exit();
?>